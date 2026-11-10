<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;


class ProductController extends Controller
{

public function landing() 
    {
        $products = Product::latest()->get();
        return view('landing', compact('products'));
    }
    
    public function index()
    {
        $products = Product::query()->latest()->get();
        return view('products.index', compact('products'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate(
            [
            'nama_produk' => ['required', 'string', 'max:100'],
            'deskripsi' => ['required', 'string'],
            'harga' => ['required', 'integer', 'min:0'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ],
        $this->validationMessages()
        );

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('products', 'public');
        }

        Product::query()->create($validated);

        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil ditambahkan.');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(
        Request $request,
        Product $product
        ): RedirectResponse
    {
        $validated = $request->validate(
            [
                'nama_produk' => ['required', 'string', 'max:100'],
                'deskripsi' => ['required', 'string'],
                'harga' => ['required', 'integer', 'min:0'],
                'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            ],
            $this->validationMessages() 
        );

        if ($request->hasFile('gambar')) {
            if ($product->gambar) {
                Storage::disk('public')->delete($product->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('products', 'public');
        } else {
            unset($validated['gambar']);
        }

        $product->update($validated);
        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        if ($product->gambar) {
            Storage::disk('public')->delete($product->gambar);
        }

        $product->delete();
        return redirect()
            ->route('products.index')
            ->with('success', 'Produk berhasil dihapus.');
    }
    private function validationMessages(): array
    {
        return [
            'nama_produk.required' => 'Nama produk wajib diisi.',
            'nama_produk.max' => 'Nama maksimal 100 karakter.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'harga.required' => 'Harga wajib diisi.',
            'harga.integer' => 'Harga harus berupa bilangan bulat.',
            'harga.min' => 'Harga tidak boleh negatif.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus berformat JPG, JPEG, PNG, atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ];
    }
}

