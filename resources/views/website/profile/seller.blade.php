@include('website.layouts.meta')
@include('website.layouts.header')
<section class="section-seller">
    <div class="hero-img-seller">
        <img src="{{asset('asset_FE/img/hero-seller.png')}}" alt="" class="w-100">
    </div>
    <div class="container container-seller">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="box-img">
                    <div class="image">
                        <img src="{{ asset($user->profile_pic ? 'storage/'.$user->profile_pic : 'https://cdn-icons-png.flaticon.com/512/3237/3237472.png') }}" alt="" class="rounded-circle">
                    </div>
                </div>
                <div class="card-info-seller">
                    <label for="" class="tab-link">Informasi</label>
                    <div class="mb-1">
                        <label for="" class="label-title">Nama</label>
                        <p class="label-value">{{$user->name}}</p>
                    </div>
                    <div class="mb-1">
                        <label for="" class="label-title">Email</label>
                        <p class="label-value">{{$user->email}}</p>
                    </div>
                    <div class="mb-1">
                        <label for="" class="label-title">No Telepon</label>
                        <p class="label-value">{{$user->phone_number}}</p>
                    </div>
                    <div class="mb-1">
                        <label for="" class="label-title">Jenis Kelamin</label>
                        <p class="label-value">{{$user->gender}}</p>
                    </div>
                    <div class="mb-1">
                        <label for="" class="label-title">Lokasi</label>
                        <p class="label-value">{{$user->address}}</p>
                    </div>
                    <div class="mb-1">
                        <label for="" class="label-title">Aktif Sejak</label>
                        <p class="label-value">{{$user->created_at->format('M Y')}}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-6">
                <div class="row">
                    @if ($noProducts)
                        <div class="col-12 mt-5">
                            <p class="alert-warning text-center mt-5 p-2 rounded">User belum memasang iklan</p>
                        </div>
                    @else
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-md-12 col-sm-6 col-6 mb-3 d-flex">
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
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        <button type="submit" class="btn-wishlist">
                                                            @if ($wishlist)
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-heart-fill"
                                                                    viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd"
                                                                        d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                                                                </svg>
                                                            @else
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-heart"
                                                                    viewBox="0 0 16 16">
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
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
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
</script>
@include('website.layouts.footer')