<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Menampilkan daftar anggota (Member & Pekerja) di halaman Admin.
     */
        public function index()
    {
        // Cek siapa yang sedang login
        $user = auth()->user();

        // Jika yang login adalah Admin, tampilkan semua (Member & Pekerja)
        if ($user->role === 'admin') {
            $members = User::whereIn('role', ['member', 'pekerja'])->latest()->get();
        } 
        // Jika yang login adalah Pekerja, HANYA tampilkan Member
        else {
            $members = User::where('role', 'member')->latest()->get();
        }
        
        return view('admin.members', compact('members'));
    }

    /**
     * Menyimpan akun anggota baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role'     => 'required|in:member,pekerja'
        ]);

        User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => $validated['role'],
        ]);

        return redirect()->route('member.index')->with('success', 'Akun berhasil ditambahkan!');
    }

    /**
     * Memperbarui data anggota di database.
     */
    public function update(Request $request, string $id)
    {
        
        $member = User::findOrFail($id);

        // CEGAH PEKERJA MENGEDIT SESAMA PEKERJA/ADMIN
        if (auth()->user()->role === 'pekerja' && $member->role !== 'member') {
            return back()->withErrors(['Akses Ditolak: Kamu tidak bisa mengedit akun pekerja/admin lain.']);
        }

        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            // Pengecualian unique email untuk ID user yang sedang diedit
            'email' => 'required|email|max:255|unique:users,email,' . $member->id,
            'role'  => 'required|in:member,pekerja,admin',
        ]);

        // Cek jika admin mengisi kolom password baru
        if ($request->filled('password')) {
            $request->validate(['password' => 'min:8']);
            $validated['password'] = Hash::make($request->password);
        }

        $member->update($validated);

        return redirect()->route('member.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    /**
     * Menghapus akun anggota dari database.
     */
    public function destroy($id)
    {
        $member = User::findOrFail($id);
        
        // CEGAH PEKERJA MENGHAPUS SESAMA PEKERJA/ADMIN
        if (auth()->user()->role === 'pekerja' && $member->role !== 'member') {
            return back()->withErrors(['Akses Ditolak: Kamu tidak bisa menghapus akun pekerja/admin lain.']);
        }

        $member->delete();
        return redirect()->route('member.index')->with('success', 'Akun berhasil dihapus.');
    }
}