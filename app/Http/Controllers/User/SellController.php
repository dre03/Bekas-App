<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Image;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SellController extends Controller
{
    protected function categorie()
    {
        $categories = Categorie::all();
        return view('website.sell.index', [
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'categorie' => 'required',
            'subCategorie' => 'required',
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'production_year' => 'required|integer',
            'type' => 'required|string|max:255',
            'color' => 'required|string|max:255',
            'condition' => 'required|in:Bekas,Baru',
            'price' => 'required|integer',
            'description' => 'required|string',
            'province' => 'required|integer|exists:provinces,id',
            'city' => 'required|integer|exists:cities,id',
            'district' => 'required|integer|exists:districts,id',
            'village' => 'required|integer|exists:villages,id',
            'images' => 'required|array|min:3',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'categorie.required' => 'Kategori Wajib diisi',
            'subCategorie.required' => 'Sub Kategori Wajib diisi',
            'name.required' => 'Nama Produk Wajib diisi',
            'brand.required' => 'Merek Wajib diisi',
            'production_year.required' => 'Tahun Produksi Wajib diisi',
            'type.required' => 'Tipe Wajib diisi',
            'color.required' => 'Warna Wajib diisi',
            'condition.required' => 'Kondisi Wajib diisi',
            'condition.in' => 'Kondisi harus dipilih dari daftar yang tersedia',
            'price.required' => 'Harga Wajib diisi',
            'description.required' => 'Deskripsi Wajib diisi',
            'province.required' => 'Provinsi Wajib diisi',
            'city.required' => 'Kota/Kab Wajib diisi',
            'district.required' => 'Kecamatan Wajib diisi',
            'village.required' => 'Desa Wajib diisi',
            'images.required' => 'Foto wajib diisi',
            'images.min' => 'Minimal 3 foto wajib diunggah',
            'images.*.mimes' => 'Format foto berupa jpeg, jpg, png',
            'images.*.max' => 'Maksimal ukuran foto 2 MB',   
        ]
    
    );

        $product = Product::create([
            'name' => $request->name,
            'brand' => $request->brand,
            'production_year' => $request->production_year,
            'type' => $request->type,
            'color' => $request->color,
            'condition' => $request->condition,
            'price' => $request->price,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'sub_categorie_id' => $request->subCategorie,
            'village_id' => $request->village,
            'status_id' => 1,
        ]);

        // Simpan data gambar
        if ($product) {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $imageName = time() . '-' . $file->getClientOriginalName();
                    $path = $file->storeAs('public/product', $imageName);
                    Image::create([
                        'path' => Storage::url($path),
                        'product_id' => $product->id
                    ]);
                }
            }
        }

        return redirect()->route('sell')->with('success', 'Produk Anda berhasil dibuat');
    }
}
