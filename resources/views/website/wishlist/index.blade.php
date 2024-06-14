@extends('website.app')
@section('content')
    <div class="container container-wishlist">
        <div class="row">
            <div class="col-12">
                <p class="wishlist">Favorit</p>
            </div>
        </div>
        <div class="row">
            @if (!$wistlists->isEmpty())
                @foreach ($wistlists as $wishlist)
                    <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4 d-flex">
                        <div class="card h-100 w-100">
                            <a href="{{route('web.product.detail', $wishlist->product->id)}}">
                                @php
                                    $firstImage = $wishlist->product->images->first();
                                @endphp
                                @if ($firstImage && !empty($firstImage->path))
                                    <img src="{{ $firstImage->path }}" alt="Product Image" class="card-img-top">
                                @else
                                    <img src="{{ asset('asset_FE/img/mobil.png') }}" alt="Default Image" class="card-img-top">
                                @endif
                            </a>
                            <div class="card-body">
                                <div class="harga">Rp. {{ number_format($wishlist->product->price, 0, ',', '.') }}</div>
                                <div class="condition">{{$wishlist->product->condition}}</div>
                                <div class="name">{{$wishlist->product->name}}</div>
                                <div class="location">{{$wishlist->product->village->district->city->name}}</div>
                                <form action="{{route('wistlist.delete', $wishlist->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn d-flex justify-content-between mt-2 remove-wishlist" type="submit">
                                        <div>Hapus Favorit</div>
                                        <div><i class="bi bi-x-circle-fill"></i></div>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <div class="d-flex justify-content-center">
                <div class="alert-primary p-3 d-flex gap-3 rounded"> 
                    <i class="bi bi-info-circle"></i>
                    <span class="">Tidak ada produk favorite anda</span>
                </div>
            </div>
            @endif
        </div>
    </div>
@if (session('success'))
    <script>
        Swal.fire({
            position: "top-center",
            icon: "success",
            text: "{{ session('success') }}",
            showConfirmButton: false,
            timer: 2000
        });
    </script>
@endif
@endsection