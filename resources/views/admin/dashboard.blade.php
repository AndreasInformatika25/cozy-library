@extends('layouts.admin')

@section('title', 'Dashboard')

@push('styles')
<style>
    /* Khusus halaman Dashboard: Padding lebih lega */
    .content {
        padding: 32px 64px;
        width: 100%;
    }

    /* ============ HERO ============ */
    .hero {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 32px; align-items: center;
        margin-bottom: 32px;
    }
    .hero h1 {
        font-size: 42px; line-height: 1.15;
        font-weight: 700;
    }
    .hero p {
        color: var(--text-muted);
        margin: 16px 0 24px;
        line-height: 1.6;
        max-width: 340px; font-size: 15px;
    }
    .hero-img {
        height: 320px; border-radius: 20px; overflow: hidden;
        background: var(--brand-soft);
        display: grid; place-items: center;
        font-size: 72px;
        box-shadow: 0 10px 30px rgba(196, 154, 128, 0.25);
    }
    .hero-img img {
        width: 100%; height: 100%; object-fit: cover;
    }

    /* ============ STATS ============ */
    .stats {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 18px; margin-bottom: 28px;
    }
    .stat {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 22px;
        display: flex; align-items: center; gap: 14px;
        transition: transform .2s, box-shadow .2s;
    }
    .stat:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
    }
    .stat .icon {
        width: 52px; height: 52px; border-radius: 50%;
        background: var(--brand-soft);
        color: var(--brand);
        display: grid; place-items: center;
        flex-shrink: 0;
    }
    .stat .num {
        font-size: 26px; font-weight: 700;
        line-height: 1.1; color: var(--text-dark);
    }
    .stat .label {
        color: var(--text-muted);
        font-size: 13px; margin-top: 2px;
    }
    .stat .arrow {
        margin-left: auto;
        width: 32px; height: 32px; border-radius: 50%;
        border: 1px solid var(--border);
        display: grid; place-items: center;
        color: var(--brand);
        transition: background .2s, color .2s, border-color .2s;
    }
    .stat .arrow:hover {
        background: var(--brand);
        color: #fff;
        border-color: var(--brand);
    }
    .stat .arrow svg { width: 14px; height: 14px; }

    /* ============ PANELS ============ */
    .panels {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 24px;
    }
    .panel {
        background: #fff;
        border: 1px solid var(--border);
        border-radius: 16px;
        padding: 22px;
    }
    .panel-head {
        display: flex; justify-content: space-between;
        align-items: center; margin-bottom: 16px;
    }
    .panel-head h2 {
        font-size: 20px; font-weight: 700;
    }
    .view-all {
        font-size: 12px; font-weight: 500;
        color: var(--brand);
        display: flex; align-items: center; gap: 5px;
    }
    .view-all:hover { color: var(--brand-hover); }
    .view-all svg { width: 13px; height: 13px; }

    /* Activity */
    .activity {
        display: flex; align-items: center; gap: 12px;
        padding: 12px 0;
        border-bottom: 1px solid #f5f5f5;
    }
    .activity:last-child { border-bottom: none; }
    .activity .icon {
        width: 40px; height: 40px; border-radius: 50%;
        background: var(--brand-soft);
        color: var(--brand);
        display: grid; place-items: center;
        flex-shrink: 0;
    }
    .activity .icon svg { width: 18px; height: 18px; }
    .activity .info { flex: 1; min-width: 0; }
    .activity .info b {
        font-weight: 500;
        display: block; font-size: 14px;
        color: var(--text-dark);
    }
    .activity .info span {
        color: var(--text-muted); font-size: 12px;
    }
    .activity time {
        color: var(--text-muted);
        font-size: 12px; flex-shrink: 0;
    }

    /* Popular books */
    .books {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }
    .book .cover {
        aspect-ratio: 3/4;
        border-radius: 10px;
        margin-bottom: 10px;
        box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12);
        display: flex; align-items: flex-end;
        padding: 10px;
        color: #fff;
        font-weight: 700; font-size: 13px;
        overflow: hidden;
    }
    /* Gradient cover pakai tone brand yang lebih hangat */
    .c1 { background: linear-gradient(180deg, #6a8fb5, #a9cde8 70%, #f2d9b8); }
    .c2 { background: linear-gradient(180deg, #7a8a8f, #b9bfb8); }
    .c3 { background: linear-gradient(180deg, #3a2b23, #7a4f35 70%, #c49a5d); }
    .book b {
        display: block; font-weight: 600;
        font-size: 14px; color: var(--text-dark);
    }
    .book span {
        color: var(--text-muted); font-size: 12px;
    }

    /* ============ RESPONSIVE ============ */
    @media (max-width: 1100px) {
        .stats { grid-template-columns: repeat(2, 1fr); }
        .panels { grid-template-columns: 1fr; }
        .hero { grid-template-columns: 1fr; }
    }
    @media (max-width: 760px) {
        .content { padding: 20px; }
        .hero h1 { font-size: 30px; }
        .hero-img { height: 220px; }
    }
</style>
@endpush

@section('content')
    <!-- Hero -->
    <section class="hero">
        <div>
            <h1>Welcome back,<br>{{ Auth::user()->name ?? 'Andreas' }}! 👋</h1>
            <p>Let's make more people fall in love with books today.</p>
            <a href="{{ url('/') }}" class="btn-brand">
                Go to Library
                <svg viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>
        <div class="hero-img">
            <img src="{{ asset('img/Hero.jpg') }}" alt="Hero Image">
        </div>
    </section>

    <!-- Stats -->
    <section class="stats">
        <div class="stat">
            <div class="icon">
                <svg viewBox="0 0 24 24"><path d="M2 5.5S5 4 8 4s4 1 4 1 1-1 4-1 6 1.5 6 1.5V19s-3-1.5-6-1.5-4 1-4 1-1-1-4-1-6 1.5-6 1.5z"/><path d="M12 5v13.5"/></svg>
            </div>
            <div>
                <div class="num">{{ number_format($totalBooks, 0, ',', '.') }}</div>
                <div class="label">Total Books</div>
            </div>
            <a href="{{ route('book.index') }}" class="arrow">
                <svg viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>
        <div class="stat">
            <div class="icon">
                <svg viewBox="0 0 24 24"><circle cx="9" cy="8" r="3.5"/><path d="M2.5 20c0-3.5 3-6 6.5-6s6.5 2.5 6.5 6"/><circle cx="17" cy="9" r="2.5"/><path d="M17 14c2.5 0 4.5 1.8 4.5 5"/></svg>
            </div>
            <div>
                <div class="num">{{ number_format($totalUsers, 0, ',', '.') }}</div>
                <div class="label">Total Users</div>
            </div>
            <a href="{{ route('member.index') }}" class="arrow">
                <svg viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>
        <div class="stat">
            <div class="icon">
                <svg viewBox="0 0 24 24"><path d="M21 12a9 9 0 0 1-15.5 6.2L3 16M3 12a9 9 0 0 1 15.5-6.2L21 8M3 21v-5h5M21 3v5h-5"/></svg>
            </div>
            <div>
                <div class="num">{{ number_format($totalBorrowings, 0, ',', '.') }}</div>
                <div class="label">Total Borrowings</div>
            </div>
            <a href="{{ route('borrow.index') }}" class="arrow">
                <svg viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>
        <div class="stat">
            <div class="icon">
                <svg viewBox="0 0 24 24"><rect x="3" y="5" width="18" height="16" rx="2"/><path d="M3 10h18M8 3v4M16 3v4"/></svg>
            </div>
            <div>
                <div class="num">{{ number_format($borrowThisMonth, 0, ',', '.') }}</div>
                <div class="label">This Month</div>
            </div>
            <a href="#" class="arrow">
                <svg viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg>
            </a>
        </div>
    </section>

    <!-- Panels -->
    <section class="panels">
        <div class="panel">
            <div class="panel-head">
                <h2>Recent Activity</h2>
                <a href="{{ route('borrow.index') }}" class="view-all">View all <svg viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
            </div>
            
            @forelse($recentActivities as $activity)
                <div class="activity">
                    <div class="icon">
                        @if($activity->status == 'returned')
                            <svg viewBox="0 0 24 24"><path d="M21 12a9 9 0 0 1-15.5 6.2L3 16M3 12a9 9 0 0 1 15.5-6.2L21 8M3 21v-5h5M21 3v5h-5"/></svg>
                        @else
                            <svg viewBox="0 0 24 24"><path d="M2 5.5S5 4 8 4s4 1 4 1 1-1 4-1 6 1.5 6 1.5V19s-3-1.5-6-1.5-4 1-4 1-1-1-4-1-6 1.5-6 1.5z"/><path d="M12 5v13.5"/></svg>
                        @endif
                    </div>
                    <div class="info">
                        <b>{{ $activity->status == 'returned' ? 'Book returned' : 'Book borrowed' }}</b>
                        <span>{{ $activity->book->judul ?? 'Buku dihapus' }} oleh {{ $activity->user->name ?? 'User' }}</span>
                    </div>
                    <time>{{ $activity->created_at->diffForHumans() }}</time>
                </div>
            @empty
                <p class="text-muted small text-center my-4">Belum ada aktivitas peminjaman.</p>
            @endforelse
        </div>
        
        <div class="panel">
            <div class="panel-head">
                <h2>Buku Terbaru</h2>
                <a href="{{ route('book.index') }}" class="view-all">View all <svg viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
            </div>
            <div class="books">
                @foreach($latestBooks as $book)
                    <a href="{{ route('book.detail', $book->id) }}" class="book">
                        @if($book->cover)
                            <img src="{{ asset('storage/' . $book->cover) }}" 
                                style="aspect-ratio: 3/4; border-radius: 10px; margin-bottom: 10px; box-shadow: 0 6px 14px rgba(0, 0, 0, 0.12); width: 100%; object-fit: cover;"
                                alt="{{ $book->judul }}">
                        @else
                            <div class="cover c1">{{ Str::limit($book->judul, 15) }}</div>
                        @endif
                        <b>{{ Str::limit($book->judul, 18) }}</b>
                        <span>{{ $book->penulis }}</span>
                    </a>
                @endforeach
            </div>
        </div>
        
        <!-- Recent Activity (User Terbaru) -->
        <div class="panel">
            <div class="panel-head">
                <h2>Recent Activity</h2>
                <a href="{{ route('member.index') }}" class="view-all">View all <svg viewBox="0 0 24 24"><path d="M5 12h14M13 6l6 6-6 6"/></svg></a>
            </div>
            
            @forelse($recentActivities as $user)
                <div class="activity">
                    <div class="icon">
                        {{-- Ikon User --}}
                        <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.5-7 8-7s8 3 8 7"/></svg>
                    </div>
                    <div class="info">
                        <b>New user registered</b>
                        <span>{{ $user->name }}</span>
                    </div>
                    {{-- Menampilkan waktu daftar, misal: "2 hours ago" --}}
                    <time>{{ $user->created_at->diffForHumans() }}</time>
                </div>
            @empty
                <div class="text-center py-4 text-muted">
                    <small>Belum ada user yang mendaftar.</small>
                </div>
            @endforelse
        </div>
    </section>
@endsection