    <!-- Modal Login -->
    <div id="modalLogin" class="modalLogin">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="flex-container">
                <div class="flex-item-left">
                    <img src="{{ asset('asset_FE/img/img-loginT.jpg') }}" alt="" class="img-login">
                    <div class="atas">
                        <img src="{{ asset('asset_FE/svg/logo.svg') }}" alt="logo" class="logo-Login">
                        <span>Bekas</span>
                    </div>
                </div>
                <div class="flex-item-right">
                    <h4 class="mt-5 text-center">Silahkan Login</h4>
                    @if (session('error'))
                        <div class="text-center">
                            <span class="text-danger">{{ session('error') }}</span>
                        </div>
                    @endif
                    <form class="form-login item-form-login" action="{{ route('authUserlogin') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-2 mt-2">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="jhon@emai.com" required>
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="form-label">Password</label>
                            <div class="password-container">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                <i class="bi bi-eye toggle-password"></i>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="forgot">
                            <a href="#">Forgot Password?</a>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 btnLogin">Login</button>
                    </form>
                    <p class="mt-3 text-center">Or login with</p>
                    {{-- <a href="#" class="btn btn-google"><img src="assets/icon-google.svg" alt=""
                            class="me-2">
                        <span>Continue with google</span>
                    </a> --}}
                    <p class="mt-3 text-center">Belum punya akun? <span type="button" class="create-account"
                            id="btnRegis">Buat Akun</span></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Login -->

    <!-- Modal Register -->
    <div id="modalLRegis" class="modalLogin">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <div class="flex-container">
                <div class="flex-item-left">
                    <img src="{{ asset('asset_FE/img/img-loginT.jpg') }}" alt="" class="img-login">
                    <div class="atas">
                        <img src="{{ asset('asset_FE/svg/logo.svg') }}" alt="logo" class="logo-Login">
                        <span>Bekas</span>
                    </div>
                </div>
                <div class="flex-item-right">
                    <h4 class="mt-3 text-center">Buat Akun</h4>
                    <form class="form-login" id="form-regis" method="POST">
                        @csrf
                        <div>
                            <label class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" autocomplete="name">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="user@emai.com" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" required autocomplete="username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <label class="form-label">Password</label>
                            <div class="password-container">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <i class="bi bi-eye toggle-password"></i>
                            </div>
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 btnLogin">Buat Akun</button>
                    </form>
                    <p class="mt-2 text-center">Sudah punya akun? <span type="button"
                            class="openModalLogin create-account">Login</span></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body p-3 d-flex flex-column justify-content-center">
                    <span class="message text-center">Berhasil Registrasi, Silahkan Login</span>
                    <div class="div m-auto">
                        <button type="button" class="btn btn-primary btn-sm mt-2" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Register -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let btnLogin = document.getElementsByClassName("openModalLogin");
            let modalLogin = document.getElementById("modalLogin");
            let btnRegis = document.getElementById("btnRegis");
            let modalLRegis = document.getElementById("modalLRegis");

            function openModal(modal) {
                modal.style.display = "block";
            }

            function closeModal(modal) {
                modal.style.display = "none";
            }

            // Event listeners for opening the login modal
            for (let i = 0; i < btnLogin.length; i++) {
                let btn = btnLogin[i];
                btn.onclick = function() {
                    closeModal(modalLRegis);
                    openModal(modalLogin);
                }
            }

            // Event listeners for opening the register modal
            btnRegis.onclick = function() {
                closeModal(modalLogin);
                openModal(modalLRegis);
            }


            // Event listener to close modals when clicking outside of them
            window.onclick = function(event) {
                if (event.target === modalLogin) {
                    closeModal(modalLogin);
                } else if (event.target === modalLRegis) {
                    closeModal(modalLRegis);
                }
            }

            document.querySelectorAll('.close-modal').forEach(function(closeBtn) {
                closeBtn.addEventListener('click', function() {
                    closeModal(modalLogin);
                    closeModal(modalLRegis);
                });
            });
        });

        $(document).ready(function(){
            $('#form-regis').on('submit', function(event){
                event.preventDefault();

                $.ajax({
                    url: "{{ route('registrasi') }}",
                    method: "POST",
                    data: $(this).serialize(),
                    success: function(response){
                        if(response.success) {
                            $('.message').text(response.success);
                            $('#successModal').modal('show');
                            $('#modalLRegis').hide();
                        }
                    },
                    error: function(xhr){
                        // Handle error
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            let inputElement = $('input[name="' + key + '"]');
                            inputElement.addClass('is-invalid');
                            inputElement.next('.invalid-feedback').text(value[0]);
                        });
                    }
                });
            });

            // Menghapus kelas is-invalid saat pengguna mulai mengetik ulang
            $('input').on('input', function() {
                $(this).removeClass('is-invalid');
                $(this).next('.invalid-feedback').text('');
            });

            // Show password
            $('.toggle-password').on('click', function() {
                let input = $(this).siblings('input');
                let icon = $(this);

                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('bi-eye').addClass('bi-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('bi-eye-slash').addClass('bi-eye');
                }
            });
        });
    </script>
