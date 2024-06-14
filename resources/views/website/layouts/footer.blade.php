    <!-- Footer Start -->
    <footer class="footer-start">
        <div class="row">
            <div class="col-lg-4 col-md-5">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 footcol1">
                        <a href="index.html" class="d-flex mb-3 text-decoration-none">
                            <img src="{{ asset('asset_FE/svg/logo.svg') }}" alt="" width="30" height="24"
                                class="d-inline-block align-text-top">
                            <span>Bekas.id</span>
                        </a>
                            <div class="text-cpr">Copyright © 2024 Virtual Intership Maxy Academy</div>
                            <div class="text-cpr">All rights reserved</div>
                        <div class="mt-2 footer-sosmed">
                            <a href="#"><img src="{{asset('asset_FE/svg/icon-ig.svg')}}" alt="" class="me-2"></a>
                            <a href="#"><img src="{{asset('asset_FE/svg/icon-dribble.svg')}}" alt="" class="me-2"></a>
                            <a href="#"><img src="{{asset('asset_FE/svg/icon-twitter.svg')}}" alt="" class="me-2"></a>
                            <a href="#"><img src="{{asset('asset_FE/svg/icon-yt.svg')}}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6">
                <div class="row">
                    <div class="col-lg-7 col-md-8 col-sm-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h5 class="footer-title">Kategori</h5>
                                <ul class="nav flex-column mt-3">
                                    <li class="nav-item mb-2"><a href="{{route('web.product')}}" class="foot-nav p-0 text-decoration-none">Kendaraan</a></li>
                                    <li class="nav-item mb-2"><a href="{{route('web.product')}}" class="foot-nav p-0 text-decoration-none">Properti</a></li>
                                    <li class="nav-item mb-2"><a href="{{route('web.product')}}" class="foot-nav p-0 text-decoration-none">Olahraga</a></li>
                                    <li class="nav-item mb-2"><a href="{{route('web.product')}}" class="foot-nav p-0 text-decoration-none">Elektronik & Gedget</a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <h5 class="footer-title">Populer</h5>
                                <ul class="nav flex-column mt-3">
                                    <li class="nav-item mb-2"><a href="{{route('web.product')}}" class="foot-nav p-0 text-decoration-none">Motor</a></li>
                                    <li class="nav-item mb-2"><a href="{{route('web.product')}}" class="foot-nav p-0 text-decoration-none">Rumah</a></li>
                                    <li class="nav-item mb-2"><a href="{{route('web.product')}}" class="foot-nav p-0 text-decoration-none">Sepatu</a></li>
                                    <li class="nav-item mb-2"><a href="{{route('web.product')}}" class="foot-nav p-0 text-decoration-none">Handphone</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-4 col-sm-12">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <h5 class="footer-title">Stay up to date</h5>
                                <form class="footer-input d-flex mt-4">
                                    <input class="input-email" type="email" placeholder="Your email address" aria-label="Email">
                                    <button class="btn-send" type="submit"><img src="{{asset('asset_FE/svg/icon-send.svg')}}" alt=""></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </footer>
    <!-- Footer End -->
    <!-- Js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Js Bootstrap 5 -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    </body>
    </html>
