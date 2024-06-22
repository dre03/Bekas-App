@include('website.layouts.meta')
@include('website.layouts.header')
<div class="section bg-primary">
</div>
<div class="container section-profile">
    <form action="{{ route('web.profile.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="hero-profile d-flex justify-content-center">
            <div class="foto-profile">
                <img src="{{ asset(Auth::user()->profile_pic ? 'storage/' . Auth::user()->profile_pic : 'https://static-00.iconduck.com/assets.00/user-circle-icon-2048x2048-lmkqor95.png') }}"
                    alt="" class="rounded-circle" id="profileImage">
                <div class="change-profile bg-primary" id="changeProfileBtn">
                    <i class="bi bi-pencil-fill"></i>
                </div>
                <input type="file" id="fileInput" accept="image/*" name="profile_pic"
                    class="@error('profile_pic') is-invalid @enderror">
            </div>
        </div>
        @error('profile_pic')
            <div class="text-danger text-center">{{ $message }}</div>
        @enderror
        <p class="text-center edit-name">{{ Auth::user()->name }}</p>
        <hr class="sell-line">
        <div class="tabs">
            <div class="tab-links">
                <div class="tab-link active">Edit Profile</div>
            </div>
            <div class="tab-content">
                <div id="tab1" class="tab active">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label info-isi">Nama Lengkap</label>
                                <input type="text"
                                    class="form-control input-edit @error('name') is-invalid @enderror" name="name"
                                    value="{{ Auth::user()->name }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label info-isi">Username</label>
                                <input type="text"
                                    class="form-control input-edit @error('username') is-invalid @enderror"
                                    name="username" value="{{ Auth::user()->username }}">
                                @error('username')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label info-isi">Email</label>
                                <input type="email"
                                    class="form-control input-edit @error('email') is-invalid @enderror" name="email"
                                    value="{{ Auth::user()->email }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label info-isi">No Telepon</label>
                                <input type="number"
                                    class="form-control input-edit @error('phone_number') is-invalid @enderror"
                                    name="phone_number" value="{{ Auth::user()->phone_number }}">
                                @error('phone_number')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label info-isi">Jenis Kelamin</label>
                                <select name="gender" id="gender"
                                    class="form-select select-edit-profile @error('gender') is-invalid @enderror"
                                    required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="Laki-Laki"
                                        {{ Auth::user()->gender == 'Laki-Laki' || old('gender') == 'Laki-Laki' ? 'selected' : '' }}>
                                        Laki-Laki</option>
                                    <option value="Perempuan"
                                        {{ Auth::user()->gender == 'Perempuan' || old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                        Perempuan</option>
                                </select>
                                @error('gender')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label info-isi">Alamat</label>
                                <input type="text" class="form-control input-edit @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label info-isi">Password Lama</label>
                                <input type="password"
                                    class="form-control input-edit @error('currentPassword') is-invalid @enderror"
                                    name="currentPassword">
                                @error('currentPassword')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label info-isi">Password Baru</label>
                                <input type="password"
                                    class="form-control input-edit @error('newPassword') is-invalid @enderror"
                                    name="newPassword">
                                @error('newPassword')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label info-isi">Konfirmasi Password Baru</label>
                                <input type="password"
                                    class="form-control input-edit @error('renewPassword') is-invalid @enderror"
                                    name="renewPassword">
                                @error('renewPassword')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="/profile" class="btn btn-secondary text-decoration me-2">Kembali</a>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', (event) => {
        const changeProfileBtn = document.getElementById('changeProfileBtn');
        const fileInput = document.getElementById('fileInput');
        const profileImage = document.getElementById('profileImage');

        changeProfileBtn.addEventListener('click', () => {
            fileInput.click();
        });

        fileInput.addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    profileImage.src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>
@if (session('success'))
    <script>
        Swal.fire({
            icon: "success",
            title: "{{ session('success') }}",
        });
    </script>
@elseif(session('error'))
    <script>
        Swal.fire({
            icon: "error",
            title: "{{ session('error') }}",
        });
    </script>
@endif
