@include('website.layouts.meta')
@include('website.layouts.header')
<div class="section bg-primary"></div>
<div class="container section-profile">
    <div class="hero-profile">
        <div class="about-profile">
            <span>{{ Auth::user()->name }}</span>
            <form action="{{route('userLogout')}}" method="POST">
                @csrf
                @method('POST')
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
        <div class="foto-profile">
            <img src="{{ asset(Auth::user()->profile_pic ? 'storage/' . Auth::user()->profile_pic : 'https://cdn-icons-png.flaticon.com/512/3237/3237472.png') }}" alt="" class="rounded-circle">
            {{-- <div class="change-profile bg-primary" id="changeProfileBtn">
                <i class="bi bi-pencil-fill"></i>
            </div>
            <input type="file" id="fileInput"> --}}
        </div>
    </div>
    <hr class="profile-line">
    <div class="tabs">
        <div class="tab-links">
            <div class="tab-link active" onclick="openTab(event, 'tab1')">Info Profile</div>
            <div class="tab-link" onclick="openTab(event, 'tab2')">Iklan Saya</div>
        </div>
        <div class="tab-content">
            <div id="tab1" class="tab active">
                <div class="row">
                    <div class="col-lg-10 col-md-9 col-8">
                        <div class="line-heigh">
                            <p class="info-label text-primary">Nama</p>
                            <p class="info-isi">{{ Auth::user()->name }}</p>
                        </div>
                        <div class="line-heigh">
                            <p class="info-label">Username</p>
                            <p class="info-isi">{{ Auth::user()->username }}</p>
                        </div>
                        <div class="line-heigh">
                            <p class="info-label">Email</p>
                            <p class="info-isi">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="line-heigh">
                            <p class="info-label">No Telepon</p>
                            <p class="info-isi">{{ Auth::user()->phone_number }}</p>
                        </div>
                        <div class="line-heigh">
                            <p class="info-label">Jenis Kelamin</p>
                            <p class="info-isi">{{ Auth::user()->gender }}</p>
                        </div>
                        <div class="line-heigh">
                            <p class="info-label">Alamat</p>
                            <p class="info-isi">{{ Auth::user()->address }}</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3 col-4">
                        <a href="{{route('web.profile.edit')}}" class="btn btn-outline-primary btn-sm">Edit Profil</a>
                    </div>
                </div>
            </div>
            <div id="tab2" class="tab">
                <div class="row">
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
                                    <img src="{{ asset('asset_FE/img/mobil.png') }}" alt="Default Image"
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
                                                                height="16" fill="currentColor"
                                                                class="bi bi-heart-fill" viewBox="0 0 16 16">
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
                                        <form action="{{route('web.product.destroy', $product->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn d-flex justify-content-between mt-2 remove-wishlist" type="submit">
                                            <div>Hapus Iklan</div>
                                            <div><i class="bi bi-x-circle-fill"></i></div>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const changeProfileBtn = document.getElementById('changeProfileBtn');
        const fileInput = document.getElementById('fileInput');

        changeProfileBtn.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
        });
    });

    // Tab
    function openTab(event, tabId) {
        // Dapatkan semua elemen dengan class="tab" dan sembunyikan
        var tabs = document.getElementsByClassName("tab");
        for (var i = 0; i < tabs.length; i++) {
            tabs[i].style.display = "none";
            tabs[i].classList.remove("active");
        }

        // Dapatkan semua elemen dengan class="tab-link" dan hapus class "active"
        var tabLinks = document.getElementsByClassName("tab-link");
        for (var i = 0; i < tabLinks.length; i++) {
            tabLinks[i].classList.remove("active");
        }

        // Tampilkan tab yang dipilih, dan tambahkan class "active" ke tab dan tombol yang dibuka
        document.getElementById(tabId).style.display = "block";
        document.getElementById(tabId).classList.add("active");
        event.currentTarget.classList.add("active");
    }

    // Set tab default aktif
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementsByClassName("tab")[0].style.display = "block";
    });


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
