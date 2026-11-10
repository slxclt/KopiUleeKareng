@extends('products.app')

@section('title', 'Kelola Produk')

@section('content')
<main class="admin-page">
    <div class="container admin-container wide">
        <div class="page-heading">
            <div>
                <span class="eyebrow">Dashboard sederhana</span>
                <h1>Kelola Produk</h1>
            </div>
            <div class="heading-actions">
                <a class="btn btn-secondary" href="{{ route('landing') }}">
                    Lihat Landing Page
                </a>
                <a class="btn" href="{{ route('products.create') }}">
                    Tambah Produk
                </a>
              <form class="btn btn-danger" href="{{ route('logout') }}" method="POST">
                Logout
    @csrf

</form>
            </div>
        </div>

        @if (session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                <strong>{{ $product->nama_produk }}</strong>
                                <small>{{ $product->deskripsi }}</small>
                            </td>
                            <td>
                                Rp{{ number_format($product->harga, 0, ',', '.') }}
                            </td>
                            <td>
                                @if ($product->gambar)
                                    <img src="{{ asset('storage/' . $product->gambar) }}" height="100" width="100" style="object-fit: cover;"
                                         alt="{{ $product->nama_produk }}">
                                @else
                                    Tidak ada gambar
                                @endif
                            </td>
                            <td class="actions">
                                <a class="btn btn-small btn-edit"
                                   href="{{ route('products.edit', $product) }}">
                                    Edit
                                </a>
                                <form method="POST"
                                      action="{{ route('products.destroy', $product) }}"
                                      onsubmit="return confirm('Hapus produk ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-small btn-danger"
                                            type="submit">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty-state">
                                Belum ada produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
