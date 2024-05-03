<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StatusProduct;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $notif = $this->notif();
        $products = Product::latest()->paginate(10);
        $statusProducts = StatusProduct::all();
        return view('pages.product.index', [
            'title' => 'Produk',
            'products' => $products,
            'statusProducts' => $statusProducts,
            'notif' => $notif
        ]);
    }

    public function updateStatus(Request $request)
    {
        $product = Product::find($request->id);
        $product->update([
            'status_id' => $request->status
        ]);

        return redirect()->route('product')->with(['success' => 'Produk milik customer ' . $product->user->name . ' berhasil diubah menjadi ' . $product->statusProduct->status]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        //redirect to index
        return redirect()->route('product')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
