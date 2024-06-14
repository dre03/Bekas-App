<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WistlistController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $search = $request->input('search');
        $wistlists = Wishlist::where('user_id', $userId)
            ->when($search, function ($query, $search) {
                return $query->whereHas('product', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%')
                        ->orWhere('brand', 'like', '%' . $search . '%')
                        ->orWhere('production_year', 'like', '%' . $search . '%')
                        ->orWhere('type', 'like', '%' . $search . '%')
                        ->orWhere('price', 'like', '%' . $search . '%')
                        ->orWhere('description', 'like', '%' . $search . '%')
                        ->orWhere('color', 'like', '%' . $search . '%')
                        ->orWhere('condition', 'like', '%' . $search . '%');
                });
            })->latest()->get();
        return view('website.wishlist.index', [
            'wistlists' => $wistlists
        ]);
    }

    public function destroy($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
        //redirect to index
        return redirect()->route('wistlist')->with(['success' => 'Wistlist Berhasil Dihapus!']);
    }

    public function toggle(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);
        $wishlist = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $request->product_id)->first();

        if ($wishlist) {
            $wishlist->delete();
            return response()->json(['status' => 'removed']);
        } else {
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $request->product_id,
                'status' => 1,
            ]);
            return response()->json(['status' => 'added']);
        }
    }
}
