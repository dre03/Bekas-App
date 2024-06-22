@extends('website.app')
@section('content')
    <!-- Hero Start -->
    <div class="hero-section">
        <div class="row">
            <div class="col">
                <img src="{{ asset('asset_FE/img/hero.png') }}" alt="" class="hero-img">
                <p class="hero-produk">BARANG BEKAS BERKUALITAS</p>
                <p class="hero-text">cara cerdas belanja barang bekas hanya di bekas.id</p>
                <button class="btn-mj" type="submit">Mulai Menjual</button>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!-- Kategori Start -->
    <div class="container categorie">
        <h3 class="title-categorie">Kategori Utama</h3>
        <div class="row mt-4">
            @foreach ($categories as $categorie)
                <div class="col-lg-2 col-md-3 col-3">
                    @if (Auth::user())
                        <a href="{{ route('homepage', ['categorie' => $categorie->name]) }}"
                            class="mx-sm-auto kat4-wrapper">
                        @else
                            <a href="{{ route('home', ['categorie' => $categorie->name]) }}"
                                class="mx-sm-auto kat4-wrapper">
                    @endif
                    <div class="kat4-card text-center ">
                        <img src="{{ asset('/storage/categories/' . $categorie->image) }}" alt="Server error">
                        <p class=" mt-3">{{ $categorie->name }}</p>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
    <!-- Kategori End -->
    {{-- START New Kategorie --}}
    <div class="container mt-sm-3 mb-sm-3 mt-2">
        <h3 class="title-categorie">Penawaran Terbaik</h3>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/mobile.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Dapatkan gadget impianmu disini</div>
                                    <div class="sub-judul">Upgrade hpmu sekanrang!</div>
                                    @auth
                                        <a href="{{ route('web.product') }}" class="btn btn-primary">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @else
                                        <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/per-rumah.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Kemudahan hidup dimulai disini</div>
                                    <div class="sub-judul">Belanja elektronik untuk semua kebutuhan!</div>
                                    @auth
                                        <a href="{{ route('web.product') }}" class="btn btn-primary">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @else
                                        <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/buku.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Belanja buku mudah dan aman</div>
                                    <div class="sub-judul">Temukan buku impianmu</div>
                                    @auth
                                        <a href="{{ route('web.product') }}" class="btn btn-primary">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @else
                                        <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/elektronik.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Jelajahi berbagai hobi anda</div>
                                    <div class="sub-judul">Temukan dunia game favoriteu disini!</div>
                                    @auth
                                        <a href="{{ route('web.product') }}" class="btn btn-primary">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @else
                                        <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/apartemen.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Apartemen idaman, hidup nyaman.</div>
                                    <div class="sub-judul">Temukan apartemen impianmu!</div>
                                    @auth
                                        <a href="{{ route('web.product') }}" class="btn btn-primary">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @else
                                        <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/interior.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Temukan hunian nyaman anda</div>
                                    <div class="sub-judul">Penawaran eksklusif</div>
                                    @auth
                                        <a href="{{ route('web.product') }}" class="btn btn-primary">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @else
                                        <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/mobil.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Temukan mobil Idamanmu disini</div>
                                    <div class="sub-judul">Penawaran terbaik!</div>
                                    @auth
                                        <a href="{{ route('web.product') }}" class="btn btn-primary">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @else
                                        <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/motor.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Upgrade kendaraan anda</div>
                                    <div class="sub-judul">Temukan motor terbaik disini!</div>
                                    <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/kacamata.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Gaya tanpa batas harga terjangkau</div>
                                    <div class="sub-judul">Dapatkan penawaranterbaik untuk fashion impianmu!</div>
                                    @auth
                                        <a href="{{ route('web.product') }}" class="btn btn-primary">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @else
                                        <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/sepatu.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Lengkapilah gayamu dengan sepatu yang sempurna</div>
                                    <div class="sub-judul">Penawaran terbaik!</div>
                                    @auth
                                        <a href="{{ route('web.product') }}" class="btn btn-primary">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @else
                                        <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/baju.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Berburu harta karun fashion yang seru</div>
                                    <div class="sub-judul">Temukan gaya barumu!</div>
                                    @auth
                                        <a href="{{ route('web.product') }}" class="btn btn-primary">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @else
                                        <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="card-categorie">
                                <img src="{{ asset('asset_FE/img/kategori/haiking.jpg') }}" alt=""
                                    class="img-categories">
                                <div class="information-cat text-white">
                                    <div class="judul">Temukan perlengkapan hobimu</div>
                                    <div class="sub-judul">belanja perlengkapannya disini!</div>
                                    <a href="#" class="btn btn-primary openModalLogin">Beli Sekarang <i class="bi bi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="prev">
                <span class="panah" aria-hidden="true"><img src="{{ asset('asset_FE/img/kategori/arrorw-left.svg') }}"
                        alt=""></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                data-bs-slide="next">
                <span class="panah" aria-hidden="true"><img src="{{ asset('asset_FE/img/kategori/arrow-right.svg') }}"
                        alt=""></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    {{-- END New Kategorie --}}
    <div class="container mt-sm-5 mt-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-between">
                <div class="rekomen">Rekomendasi Untuk Kamu</div>
                <div class="rekom my-auto">
                    @auth
                        <a href="{{ route('web.product') }}" class="rekom-a">
                            <div class="rekomls-wrapper">Lihat Semua</div>
                        </a>
                    @else
                        <a href="#" class="rekom-a openModalLogin">
                            <div class="rekomls-wrapper">Lihat Semua</div>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
        <div class="row rowmobile">
            @foreach ($products as $product)
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 mb-4 d-flex">
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
                                            $wishlist = Auth::user()->wishlists->where('product_id', $product->id)->first();
                                        @endphp
                                        <form class="wishlist-form" method="POST">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <button type="submit" class="btn-wishlist">
                                                @if ($wishlist)
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-heart-fill" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd"
                                                            d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                                    </svg>
                                                @else
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                        <path
                                                            d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                                                    </svg>
                                                @endif
                                            </button>
                                        </form>
                                    @else
                                        <a href="#" class="text-wishlist openModalLogin">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
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
        </div>
    </div>
    @include('website.layouts._paginate')

    <!-- Rekomendasi Card End -->
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
