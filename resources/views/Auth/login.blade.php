@extends('products.app')

@section('title', 'Login Admin - Kopi Ulee Kareng')

@section('content')
<header class="navbar">
    <div class="container nav-inner">
        <a href="{{ route('landing') }}" class="login-brand">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Kopi Ulee Kareng" class="logo">
            <span>Kopi Ulee Kareng</span>
        </a>
        <nav>
            <a class="btn btn-secondary" href="{{ route('landing') }}">Kembali</a>
        </nav>
    </div>
</header>

<main class="login-page">
    <div class="container login-container">
        <section class="login-card" aria-labelledby="login-title">
            <div class="login-card-heading">
                <span class="eyebrow">Area pengelola</span>
                <h1 id="login-title">Selamat datang kembali</h1>
                <p>Masuk untuk mengelola produk Kopi Ulee Kareng.</p>
            </div>

            @if ($errors->any())
                <div class="login-error" role="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.process') }}" method="POST" class="login-form">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input
                        class="form-control @error('email') is-invalid @enderror"
                        type="email"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        autocomplete="username"
                        placeholder="nama@email.com"
                        required
                        autofocus
                    >
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        class="form-control @error('password') is-invalid @enderror"
                        type="password"
                        id="password"
                        name="password"
                        autocomplete="current-password"
                        placeholder="Masukkan password"
                        required
                    >
                </div>

                <button class="btn login-submit" type="submit">Masuk ke Dashboard</button>
            </form>

            <p class="login-note">Akses khusus administrator.</p>
        </section>
    </div>
</main>
@endsection
