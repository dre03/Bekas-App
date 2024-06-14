@extends('website.app')
@section('content')
    <div class="container list-product">
        <div class="row">
            <div class="col-12">
                <div class="rekomen">Jelajahi Produk</div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-3 col-12 listCategori">
                <div class="card-list">
                    <p class="fw-bold">Kategori Utama</p>
                    <a href="{{ route('web.product') }}" class="btn btn-secondary btn-sm">Clear All</a>
                    <form id="categoryForm" action="{{ route('web.product') }}" method="GET">
                        @foreach ($categories as $item)
                            <div class="form-check mt-2">
                                <input class="form-check-input main-category" type="radio" name="categorie"
                                    id="item{{ $item->id }}" value="{{ $item->id }}"
                                    {{ request('categorie') == $item->id ? 'checked' : '' }} onchange="this.form.submit()">
                                <label class="form-check-label" for="item{{ $item->id }}">{{ $item->name }}</label>
                            </div>
                        @endforeach

                        @if ($subcategories->isNotEmpty())
                            <hr class="list-line">
                            <span class="fw-bold">Sub Kategori</span>
                            <div id="subcategories">
                                @foreach ($subcategories as $subitem)
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="radio" name="subcategorie"
                                            id="sub{{ $subitem->id }}" value="{{ $subitem->id }}"
                                            {{ request('subcategorie') == $subitem->id ? 'checked' : '' }}
                                            onchange="this.form.submit()">
                                        <label class="form-check-label"
                                            for="sub{{ $subitem->id }}">{{ $subitem->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        <hr class="list-line">
                        <span class="fw-bold">Harga</span>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="priceRange" value="1"
                                {{ request('priceRange') == '1' ? 'checked' : '' }} onchange="this.form.submit()">
                            <label class="form-check-label">
                                < 10 Juta</label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="priceRange" value="2"
                                {{ request('priceRange') == '2' ? 'checked' : '' }} onchange="this.form.submit()">
                            <label class="form-check-label"> 10 Juta - 20 Juta </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="priceRange" value="3"
                                {{ request('priceRange') == '3' ? 'checked' : '' }} onchange="this.form.submit()">
                            <label class="form-check-label"> 20 Juta - 30 Juta </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="priceRange" value="4"
                                {{ request('priceRange') == '4' ? 'checked' : '' }} onchange="this.form.submit()">
                            <label class="form-check-label"> 30 Juta - 50 Juta </label>
                        </div>
                        <div class="form-check mt-2">
                            <input class="form-check-input" type="radio" name="priceRange" value="5"
                                {{ request('priceRange') == '5' ? 'checked' : '' }} onchange="this.form.submit()">
                            <label class="form-check-label"> > 50 Juta </label>
                        </div>
                    </form>
                </div>
            </div>


            <div class="col-sm-12 filterCategori">
                <div class="d-flex justify-content-end">
                        <button class="btn btn-filter" type="button" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i
                                class="bi bi-filter"></i><span class="fw-bold">Filter</span></button>
                </div>
                <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
                    aria-labelledby="offcanvasWithBothOptionsLabel">
                    <div class="offcanvas-header d-flex justify-content-end">
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <p class="fw-bold">Kategori Utama</p>
                        <a href="{{ route('web.product') }}" class="btn btn-secondary btn-sm">Clear All</a>
                        <form id="categoryForm" action="{{ route('web.product') }}" method="GET">
                            @foreach ($categories as $item)
                                <div class="form-check mt-2">
                                    <input class="form-check-input main-category" type="radio" name="categorie"
                                        id="item{{ $item->id }}" value="{{ $item->id }}"
                                        {{ request('categorie') == $item->id ? 'checked' : '' }} onchange="this.form.submit()">
                                    <label class="form-check-label" for="item{{ $item->id }}">{{ $item->name }}</label>
                                </div>
                            @endforeach

                            @if ($subcategories->isNotEmpty())
                                <hr class="list-line">
                                <span class="fw-bold">Sub Kategori</span>
                                <div id="subcategories">
                                    @foreach ($subcategories as $subitem)
                                        <div class="form-check mt-2">
                                            <input class="form-check-input" type="radio" name="subcategorie"
                                                id="sub{{ $subitem->id }}" value="{{ $subitem->id }}"
                                                {{ request('subcategorie') == $subitem->id ? 'checked' : '' }}
                                                onchange="this.form.submit()">
                                            <label class="form-check-label"
                                                for="sub{{ $subitem->id }}">{{ $subitem->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                            <hr class="list-line">
                            <span class="fw-bold">Harga</span>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" name="priceRange" value="1"
                                    {{ request('priceRange') == '1' ? 'checked' : '' }} onchange="this.form.submit()">
                                <label class="form-check-label">
                                    < 10 Juta</label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" name="priceRange" value="2"
                                    {{ request('priceRange') == '2' ? 'checked' : '' }} onchange="this.form.submit()">
                                <label class="form-check-label"> 10 Juta - 20 Juta </label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" name="priceRange" value="3"
                                    {{ request('priceRange') == '3' ? 'checked' : '' }} onchange="this.form.submit()">
                                <label class="form-check-label"> 20 Juta - 30 Juta </label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" name="priceRange" value="4"
                                    {{ request('priceRange') == '4' ? 'checked' : '' }} onchange="this.form.submit()">
                                <label class="form-check-label"> 30 Juta - 50 Juta </label>
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="radio" name="priceRange" value="5"
                                    {{ request('priceRange') == '5' ? 'checked' : '' }} onchange="this.form.submit()">
                                <label class="form-check-label"> > 50 Juta </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9 col-12">
                <div class="row" id="product-list">
                    @if ($noProducts)
                        <div class="col-12">
                            <p class="alert-warning text-center mt-5 p-3 rounded">Produk tidak ditemukan</p>
                        </div>
                    @else
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-6 col-sm-6 col-6 mb-3 d-flex">
                                <div class="card h-100 w-100">
                                    @if (Auth::user())
                                        <a href="{{ route('web.product.detail', $product->id) }}">
                                        @else
                                            <a href="#" class="openModalLogin">
                                    @endif
                                    @php
                                        $firstImage = $product->images->first();
                                    @endphp
                                    @if ($firstImage && !empty($firstImage->path))
                                        <img src="{{ $firstImage->path }}" alt="Product Image" class="card-img-top">
                                    @else
                                        <img src="{{ asset('asset_FE/img/maintenance.jpg') }}" alt="Default Image"
                                            class="card-img-top">
                                    @endif
                                    </a>
                                    <div class="card-body d-flex flex-column">
                                        <div class="d-flex justify-content-between">
                                            <p class="harga">Rp. {{ number_format($product->price, 0, ',', '.') }}</p>
                                            <div class="icon-wishlist">
                                                @if (Auth::check())
                                                    @php
                                                        $wishlist = Auth::user()
                                                            ->wishlists->where('product_id', $product->id)
                                                            ->first();
                                                    @endphp
                                                    <form class="wishlist-form" method="POST" action="">
                                                        @csrf
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">
                                                        <button type="submit" class="btn-wishlist">
                                                            @if ($wishlist)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                                                </svg>
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor"
                                                                    class="bi bi-heart" viewBox="0 0 16 16">
                                                                    <path
                                                                        d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                                                </svg>
                                                            @endif
                                                        </button>
                                                    </form>
                                                @else
                                                    <a href="#" class="text-wishlist openModalLogin">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" class="bi bi-heart"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                                        </svg>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="tahun">{{ $product->condition }}</div>
                                        <div class="name">{{ $product->name }}</div>
                                        <div class="location">{{ $product->village->district->city->name }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        @include('website.layouts._paginate')
    </div>
    <script>
        $(document).ready(function() {
            $('.wishlist-form').on('submit', function(e) {
                e.preventDefault();
                var $form = $(this);
                var $button = $form.find('.btn-wishlist');
                var productId = $form.find('input[name="product_id"]').val();

                $.ajax({
                    url: '{{ route('wishlist.toggle') }}',
                    method: 'POST',
                    data: $form.serialize(),
                    success: function(response) {
                        if (response.status === 'added') {
                            $button.html(`
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314"/>
                            </svg>
                        `);
                        } else {
                            $button.html(`
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15"/>
                            </svg>
                        `);
                        }
                    },
                    error: function(xhr) {
                        // Handle error
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
