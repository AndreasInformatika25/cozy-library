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
        // Ambil user dengan role member dan pekerja, urutkan dari yang terbaru
        $members = User::whereIn('role', ['member', 'pekerja'])->latest()->get();
        
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
        $member->delete();
        
        return redirect()->route('member.index')->with('success', 'Akun berhasil dihapus.');
    }
}