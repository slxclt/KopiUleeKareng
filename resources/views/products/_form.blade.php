<div class="form-group">
    <label for="nama_produk">Nama produk</label>
    <input
        id="nama_produk"
        name="nama_produk"
        type="text"
        value="{{ old('nama_produk', $product->nama_produk ?? '') }}"
        class="form-control @error('nama_produk') is-invalid @enderror"
    >
    @error('nama_produk')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="deskripsi">Deskripsi</label>
    <textarea
        id="deskripsi"
        name="deskripsi"
        rows="5"
        class="form-control @error('deskripsi') is-invalid @enderror"
    >{{ old('deskripsi', $product->deskripsi ?? '') }}</textarea>
    @error('deskripsi')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="harga">Harga</label>
    <input
        id="harga"
        name="harga"
        type="number"
        min="0"
        value="{{ old('harga', $product->harga ?? '') }}"
        class="form-control @error('harga') is-invalid @enderror"
    >
    @error('harga')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="gambar">Upload gambar (opsional)</label>
    <input
        id="gambar"
        name="gambar"
        type="file"
        accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
        class="form-control @error('gambar') is-invalid @enderror"
    >
    @if (!empty($product?->gambar))
        <small>Gambar saat ini: {{ basename($product->gambar) }}. Pilih file baru untuk menggantinya.</small>
    @endif
    @error('gambar')
        <small class="error">{{ $message }}</small>
    @enderror
</div>

<div class="form-actions">
    <button class="btn" type="submit">{{ $tombol }}</button>
    <a class="btn btn-secondary" href="{{ route('products.index') }}">
        Batal
    </a>
</div>
