<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\SubCategorie;
use Illuminate\Http\Request;

class SubCategoriController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $subCateries = SubCategorie::orderBy('name', 'asc')->latest()->get();
        return view('pages.subcategorie.index',
            [
                'title' => 'Sub Kategori',
                'categories' => $categories,
                'subCategories' => $subCateries,
            ]
        );
    }

    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'categorieId' => 'required|exists:categories,id',
            'name' => 'required|unique:sub_categories,name',
        ], [
            'categorieId.required' => 'Kategorie Utama wajib diisi',
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Sub kategori sudah ada',
        ]);

        SubCategorie::create([
            'categorie_id' => $request->categorieId,
            'name' => $request->name
        ]);

        //redirect to index
        return redirect()->route('subcategorie')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id)
    {
        //validate form
        $request->validate([
            'categorieId' => 'required',
            'name' => 'required',
        ], [
            'categorieId.required' => 'Kategori wajib diisi',
            'name.required' => 'Nama wajib diisi',
        ]);

        $categorie = SubCategorie::findOrFail($id);

        $categorie->update([
            'categorie_id' => $request->categorieId,
            'name' => $request->name
        ]);

        //redirect to index
        return redirect()->route('subcategorie')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $subcategorie = SubCategorie::findOrFail($id);
        if ($subcategorie->products()->exists()) {
            return redirect()->back()->with(['warning' => 'Data tidak bisa dihapus karena terkait dengan data lain!']);
        }
        $subcategorie->delete();
        //redirect to index
        return redirect()->route('subcategorie')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
