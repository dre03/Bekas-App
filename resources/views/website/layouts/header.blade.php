@include('website.layouts.meta')

<body>
    <!-- Navbar Start -->
    <nav class="fixed-top">
        <div class="logo">
            <a href="{{ route('homepage') }}" style="text-decoration: none;">
                <img src="{{ asset('asset_FE/img/logo.png') }}" alt="Error">
                <span>Bekas.id</span>
            </a>
        </div>
        <div class="menu-aksi">
            <!-- <div class="search"> -->
            @if (Auth::user())
                {{-- <form action="{{route('homepage')}}" class="form-search"> --}}
                @php
                    $currentRoute = '';
                    if (request()->is('home')) {
                        $currentRoute = route('homepage');
                    } elseif (request()->is('product')) {
                        $currentRoute = route('web.product');
                    } elseif (request()->is('wishlist')) {
                        $currentRoute = route('wistlist');
                    } else {
                        $currentRoute = route('web.product');
                    }
                    // Tambahkan kondisi lain sesuai kebutuhan
                @endphp
                <form action="{{ $currentRoute }}" class="form-search">
                @else
                    <form action="{{ route('home') }}" class="form-search">
            @endif
            <input type="search" placeholder="Temukan..." name="search" value="{{ request('search') }}"
                class="form-control input-search">
            <button class="btn btn-search"><i class="bi bi-search"></i></button>
            </form>
            <!-- </div> -->
            <div class="tombol-aksi">
                @if (Auth::user())
                    <a href="{{ route('wistlist') }}" class="btn btn-primary btn-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314" />
                        </svg>
                    </a>
                    <a href="{{ route('sell') }}" class="btn btn-jual">Jual</a>
                    <div class="btn-group d-flex align-items-center">
                        @if (Auth::user()->profile_pic)
                            <img src="{{ asset('storage/' . Auth::user()->profile_pic) }}" alt=""
                                style="width: 35px; height: 35px;" class="rounded-circle me-2">
                        @else
                            <img src="https://cdn-icons-png.flaticon.com/512/3237/3237472.png" alt=""
                                style="width: 35px; height: 35px;" class="rounded-circle me-2">
                        @endif
                        <span class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            @php
                                $name = Auth::user()->name;
                                $firstName = explode(' ', $name)[0];
                            @endphp
                            Hi, {{ $firstName }}
                        </span>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ route('web.profile') }}">
                                    <i class="bi bi-person me-2"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <form action="{{ route('userLogout') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <button type="submit" class="dropdown-item d-flex align-items-center">
                                        <svg class="me-2" width="16" height="16" viewBox="0 0 31 31"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.332 24.4502C11.9029 25.3572 13.6848 25.8346 15.4987 25.8346C17.3126 25.8346 19.0945 25.3572 20.6654 24.4502C22.2362 23.5433 23.5407 22.2388 24.4476 20.668C25.3546 19.0971 25.832 17.3152 25.832 15.5013C25.832 13.6874 25.3546 11.9055 24.4476 10.3346C23.5407 8.76377 22.2362 7.45931 20.6654 6.55237C19.0945 5.64543 17.3126 5.16797 15.4987 5.16797C13.6848 5.16797 11.9029 5.64543 10.332 6.55237"
                                                stroke="#33363F" stroke-width="2" />
                                            <path
                                                d="M2.58203 15.5013L1.80116 14.8766L1.30141 15.5013L1.80116 16.126L2.58203 15.5013ZM14.207 16.5013C14.7593 16.5013 15.207 16.0536 15.207 15.5013C15.207 14.949 14.7593 14.5013 14.207 14.5013V16.5013ZM6.96783 8.41827L1.80116 14.8766L3.3629 16.126L8.52957 9.66766L6.96783 8.41827ZM1.80116 16.126L6.96783 22.5843L8.52957 21.3349L3.3629 14.8766L1.80116 16.126ZM2.58203 16.5013H14.207V14.5013H2.58203V16.5013Z"
                                                fill="#33363F" />
                                        </svg>
                                        <span>Logout</span>
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <a href="#" class="btn btn-primary btn-sm openModalLogin"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-heart" viewBox="0 0 16 16">
                            <path
                                d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                        </svg></a>
                    <button class="btn btn-login openModalLogin">Login</button>
                    <a href="#" class="btn btn-jual openModalLogin">Jual</a>
                @endif
            </div>
            <button class="btn menu-toggle"><i class="bi bi-list"></i></button>
            <ul id="slide">
                @auth
                    <li><a href="{{ route('web.profile') }}">
                            <i class="bi bi-person-circle"></i>
                            <span>Profile</span>
                        </a>
                    </li>
                    <li><a href="{{ route('wistlist') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                            </svg>
                            <span>Wishlist</span>
                        </a>
                    </li>
                    <li><a href="{{ route('sell') }}">
                            <i class="bi bi-bag"></i>
                            <span>Jual</span>
                        </a>
                    </li>
                    <li>
                        <form action="{{ route('userLogout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-wishlist">
                                <i class="bi bi-box-arrow-in-left"></i>
                                <span>Logout</span>
                            </button>
                        </form>
                    </li>
                @else
                    <li class="openModalLogin"><span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-heart" viewBox="0 0 16 16">
                                <path
                                    d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143q.09.083.176.171a3 3 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15" />
                            </svg>
                            <span>Wishlist</span>
                        </span>
                    </li>
                    <li class="openModalLogin"><span>
                            <i class="bi bi-bag"></i>
                            <span>Jual</span>
                        </span>
                    </li>
                    <li class="openModalLogin">
                        <span>
                            <i class="bi bi-box-arrow-in-left"></i>
                            <span>Login</span>
                        </span>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
    <!-- Navbar End -->
    <script>
        $(document).ready(function() {
            $('.menu-toggle').click(function() {
                $('#slide').toggleClass('slide')
            })

            $(document).click(function(event) {
                // Check if the click was outside of the #slide and .menu-toggle elements
                if (!$(event.target).closest('.menu-toggle, #slide').length) {
                    $('#slide').removeClass('slide');
                }
            });
        })
    </script>
