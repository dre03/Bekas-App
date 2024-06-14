<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
    public function index()
    {
        $cateries = Categorie::orderBy('name', 'asc')->latest()->paginate();
        return view('pages.categorie.index', [
                'title' => 'Kategori',
                'categories' => $cateries
            ]
        );
    }

    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Kategori sudah ada',
            'image.required' => 'Image wajib diisi',
            'image.mimes' => 'Format File harus berupa jpeg,jpg,png',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/categories', $image->hashName());

        //create Moderator
        Categorie::create([
            'name' => $request->name,
            'image' => $image->hashName(),
        ]);

        //redirect to index
        return redirect()->route('categorie')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id)
    {
        //validate form
        $request->validate([
            'name' => 'required|unique:categories,name',
            'image' => 'image|mimes:jpeg,jpg,png|max:2048'
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'kategori sudah ada',
            'image.mimes' => 'Format File harus berupa jpeg,jpg,png',
        ]);

        $categorie = Categorie::findOrFail($id);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/categories', $image->hashName());
            //delete old image
            Storage::delete('public/categories/' . $categorie->image);

        $categorie->update([
            'name' => $request->name,
            'image' => $image->hashName(),
        ]);
        } else{
            $categorie->update([
                'name' => $request->name,
            ]);
        }

        //redirect to index
        return redirect()->route('categorie')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        if ($categorie->subcategories()->exists()) {
            return redirect()->back()->with(['warning' => 'Data tidak bisa dihapus karena terkait dengan data lain!']);
        }
        $categorie->delete();
        Storage::delete('public/categories/' . $categorie->image);
        //redirect to index
        return redirect()->route('categorie')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
