<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Product;
use App\Models\SubCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->input('search');
        $categorie = $request->input('categorie');
        $products = Product::where('status_id', 1)
            ->when($search, function ($query, $search) {
                return $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('brand', 'like', '%' . $search . '%')
                        ->orWhere('production_year', 'like', '%' . $search . '%')
                        ->orWhere('type', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('color', 'like', '%' . $search . '%')
                        ->orWhere('condition', 'like', '%' . $search . '%');
                });
            })
            ->when($categorie, function ($query, $categorie) {
                return $query->whereHas('subcategorie', function ($q) use ($categorie) {
                    $q->whereHas('categorie', function ($q) use ($categorie) {
                        $q->where('name', $categorie);
                    });
                });
            })->latest()->paginate(8);

        $categories = Categorie::all();
        return view('website.home', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }

    public function detail($id)
    {
        $product = Product::find($id);
        return view('website.detailProduk.index', [
            'product' => $product
        ]);
    }

    public function product(Request $request)
    {
        $categories = Categorie::orderBy('name', 'asc')->get();
        $subcategories = collect();
        $search = $request->input('search');
        $categorie = $request->input('categorie');
        $subcategorie = $request->input('subcategorie');
        $priceRange = $request->input('priceRange');

        if ($categorie) {
            $subcategories = SubCategorie::where('categorie_id', $categorie)->orderBy('name', 'asc')->get();
        }

        $productsQuery = Product::where('status_id', 1);
        if($search) {
            $productsQuery->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                    ->orWhere('brand', 'like', '%' . $search . '%')
                    ->orWhere('production_year', 'like', '%' . $search . '%')
                    ->orWhere('type', 'like', '%' . $search . '%')
                    ->orWhere('price', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('color', 'like', '%' . $search . '%')
                    ->orWhere('condition', 'like', '%' . $search . '%');
            });
        }
        if ($categorie) {
            $productsQuery->whereHas('subcategorie', function ($q) use ($categorie) {
                $q->whereHas('categorie', function ($q) use ($categorie) {
                    $q->where('id', $categorie);
                });
            });
        }

        if ($subcategorie) {
            $productsQuery->whereHas('subcategorie', function ($q) use ($subcategorie) {
                $q->where('id', $subcategorie);
            });
        }

        if ($priceRange) {
            switch ($priceRange) {
                case '1':
                    $productsQuery->where('price', '<', 10000000);
                    break;
                case '2':
                    $productsQuery->whereBetween('price', [10000000, 20000000]);
                    break;
                case '3':
                    $productsQuery->whereBetween('price', [20000000, 30000000]);
                    break;
                case '4':
                    $productsQuery->whereBetween('price', [30000000, 50000000]);
                    break;
                case '5':
                    $productsQuery->where('price', '>', 50000000);
                    break;
            }
        }

        $products = $productsQuery->latest()->paginate(8);
        $noProducts = $products->isEmpty();
        return view('website.product.index', [
            'title' => 'Produk',
            'categories' => $categories,
            'subcategories' => $subcategories,
            'products' => $products,
            'noProducts' => $noProducts
        ]);
    }

    public function getSubcategories($id)
    {
        $subcategories = SubCategorie::where('categorie_id', $id)->orderBy('name', 'asc')->get();
        return response()->json($subcategories);
    }


    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            // Ambil semua gambar terkait
            $images = $product->images;
            // Hapus semua gambar dari penyimpanan
            foreach ($images as $image) {
                Storage::delete('public/product/' . $image->path);
                $image->delete(); // Hapus entri gambar dari basis data
            }

            // Hapus produk
            $product->delete();

            return redirect()->back()->with(['success' => 'Iklan Anda Berhasil Dihapus!']);
        }

        return redirect() - back()->with(['error' => 'Produk tidak ditemukan!']);
    }
}
