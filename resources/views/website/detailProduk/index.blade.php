@extends('website.app')
@section('content')
    <!-- Breadcrumb Start -->
    <nav aria-label="breadcrumb" class="path">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">Kategori</a></li>
            <li class="breadcrumb-item"><a href="{{ route('homepage') }}">{{ $product->subcategorie->categorie->name }}</a>
            </li>
            <li class="breadcrumb-item active text-dark">{{ $product->name }}</li>
        </ol>
    </nav>
    <!-- Breadcrumb End -->

    <!-- Image Start -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($product->images as $i => $image)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}"
                    class="{{ $i == 0 ? 'active' : '' }}" aria-label="Slide {{ $i + 1 }}"
                    {{ $i == 0 ? 'aria-current="true"' : '' }}></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @if ($product->images && $product->images->isNotEmpty())
                @foreach ($product->images as $i => $image)
                    <div class="carousel-item {{ $i == 0 ? 'active' : '' }}">
                        <img src="{{ asset($image->path) }}" alt="Product Image" class="d-block w-100 card-img-top">
                    </div>
                @endforeach
            @else
                <div class="carousel-item active">
                    <img src="{{ asset('asset_FE/img/maintenance.jpg') }}" alt="Default Image"
                        class="d-block w-100 card-img-top">
                </div>
            @endif
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Image End -->

    <!-- Info Produk Start -->
    <div class="container mt-sm-4 mt-3">
        <div class="row">
            <div class="col-12">
                <div class="ip-title">{{ $product->name }}</div>
                <div class="ip-harga mt-2">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
            </div>
        </div>
        <div class="row py-sm-4 py-3">
            <hr class="line-detail mb-4">
            <div class="col-sm-8">
                <div class="ip-lokasi d-flex align-items-center">
                    <img class="icon-lokasi" alt="" src="{{ asset('asset_FE/svg/icon-lokasi.svg') }}">
                    <div class="ip-alamat">{{ $product->village->district->name }},
                        {{ $product->village->district->city->name }},
                        {{ $product->village->district->city->province->name }}</div>
                </div>
                <div class="ip-kalender d-flex align-items-center mt-sm-3 mt-2">
                    <img class="icon-kalender" alt="" src="{{ asset('asset_FE/svg/icon-kalender.svg') }}">
                    <div class="ip-tanggal">{{ $product->created_at->format('d M Y') }}</div>
                </div>
            </div>
            <div class="col-sm-4 ip-wrapper align-items-center mt-3">
                {{-- <button type="button" class="btn btn-primary btn-sm me-2">Nego</button> --}}
                @php
                    $wishlist = Auth::user()
                        ->wishlists->where('product_id', $product->id)
                        ->first();
                @endphp
                <form class="wishlist-form" method="POST" action="">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class="btn btn-primary btn-sm btnWishlist me-2">
                        @if ($wishlist)
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-heart-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                            </svg>
                        @endif
                    </button>
                </form>
                <a href="https://wa.me/62{{$product->user->phone_number}}?text=Saya%20berminat%20dengan%20iklan%20anda" class="btn-nego-svg"
                    target="_blank"><img src="{{ asset('asset_FE/svg/whatsapp.svg') }}" alt="">
                </a>

            </div>
            <hr class="line-detail mt-3 mb-3">
            <div class="col-sm-4 col-lg-12 col-md-12">
                <h4 class="deskripsi-detail">Detail Informasi</h4>
                <div class="d-flex justify-content-between">
                    <div class="text-center">
                        <p class="label-desk">Merek</p>
                        <p>{{ $product->brand ? $product->brand : '-' }}</p>
                    </div>
                    <div class="text-center">
                        <p class="label-desk">Warna</p>
                        <p>{{ $product->color ? $product->color : '-' }}</p>
                    </div>
                    <div class="text-center">
                        <p class="label-desk">Tahun</p>
                        <p>{{ $product->production_year ? $product->production_year : '-' }}</p>
                    </div>
                    <div class="text-center">
                        <p class="label-desk">Kondisi</p>
                        <p>{{ $product->condition ? $product->condition : '-' }}</p>
                    </div>
                    <div class="text-center">
                        <p class="label-desk">Tipe</p>
                        <p>{{ $product->type ? $product->type : '-' }}</p>
                    </div>
                </div>
            </div>
            <hr class="line-detail mt-3">
        </div>
    </div>
    <!-- Info Produk End -->

    <!-- Detail Info Start -->
    <div class="container mt-sm-1">
        <div class="row">
            <div class="col-12">
                <p class="di-title">Detail Informasi</p>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <p class="di-deskripsi">{{ $product->description }}</p>
            </div>
        </div>
    </div>
    <!-- Detail Info End -->

    <!-- User Profile Start -->
    @if ($product->user->id !== Auth::user()->id)
        <div class="container-fluid up-start mt-sm-4 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="up-profile d-flex">
                            @if ($product->user->profile_pic)
                                <img class="up-picprofile rounded-circle" alt=""
                                    src="{{ asset('storage/' . $product->user->profile_pic) }}">
                            @else
                                <img class="up-picprofile rounded-circle" alt=""
                                    src="https://cdn-icons-png.flaticon.com/512/3237/3237472.png">
                            @endif
                            <div class="up-userinfo">
                                <div class="up-name">{{ $product->user->name }}</div>
                                <div class="up-date">Anggota sejak {{ $product->user->created_at->format('M Y') }}</div>
                                <div class="up-lp"><a href="{{ route('web.profile.seller', $product->user->id) }}">Lihat
                                        Profil</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <!-- User Profile End -->
    <script>
        $(document).ready(function() {
            $('.wishlist-form').on('submit', function(e) {
                e.preventDefault();
                var $form = $(this);
                var $button = $form.find('.btnWishlist');
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
