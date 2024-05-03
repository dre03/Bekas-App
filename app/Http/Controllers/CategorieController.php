<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $notif = $this->notif();
        $cateries = Categorie::latest()->paginate();
        return view('pages.categorie.index', [
                'notif' => $notif,
                'title' => 'Kategori',
                'categories' => $cateries
            ]
        );
    }

    public function store(Request $request)
    {
        //validate form
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
        ]);

        //create Moderator
        Categorie::create([
            'name' => $request->name,
        ]);

        //redirect to index
        return redirect()->route('categorie')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function update(Request $request, $id)
    {
        //validate form
        $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Nama wajib diisi',
        ]);

        $categorie = Categorie::findOrFail($id);

        $categorie->update([
            'name' => $request->name,
        ]);

        //redirect to index
        return redirect()->route('categorie')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();
        //redirect to index
        return redirect()->route('categorie')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
