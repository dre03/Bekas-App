@extends('app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Profile</h1>
        </div><!-- End Page Title -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @if (Auth::user()->profile_pic)
                                <img src="{{ asset('storage/' . Auth::user()->profile_pic) }}" class="rounded-circle"
                                    alt="Error Image">
                            @else
                                <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" class="rounded-circle"
                                    alt="Error Image">
                            @endif
                            <h2>{{ Auth::user()->name }}</h2>
                            <h3>
                                @if (Auth::user()->role_id == 1)
                                    Admin
                                @endif
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">
                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#profile-change-password">Ubah Password</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">No Telepon</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->phone_number }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Username</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->username }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->gender }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Role</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->role->name }}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Alamat</div>
                                        <div class="col-lg-9 col-md-8">{{ Auth::user()->address }}</div>
                                    </div>
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                    <!-- Profile Edit Form -->
                                    <form action="{{ route('admin.upProfile') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <label for="profileImage"
                                                class="col-md-4 col-lg-3 col-form-label">Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="profile_pic" type="file"
                                                    class="form-control @error('profile_pic') is-invalid @enderror"
                                                    id="profile">
                                                @error('profile_pic')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="name" class="col-md-4 col-lg-3 col-form-label">Nama
                                                Lengkap</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="name" type="text"
                                                    class="form-control @error('name') is-invalid @enderror" id="name"
                                                    value="{{ Auth::user()->name }}" required>
                                                @error('name')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="Email" value="{{ Auth::user()->email }}" required>
                                                @error('email')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="phone_number" class="col-md-4 col-lg-3 col-form-label">No
                                                Telepon</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone_number" type="number"
                                                    class="form-control @error('phone_number') is-invalid @enderror"
                                                    id="phone_number" value="{{ Auth::user()->phone_number }}" required>
                                                @error('phone_number')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="username"
                                                class="col-md-4 col-lg-3 col-form-label">Username</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="username" type="text"
                                                    class="form-control @error('username') is-invalid @enderror"
                                                    id="username" value="{{ Auth::user()->username }}" required>
                                                @error('username')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="gender" class="col-md-4 col-lg-3 col-form-label">Jenis
                                                Kelamin</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="gender" id="gender"
                                                    class="form-select @error('gender') is-invalid @enderror" required>
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
                                        </div>
                                        <div class="row mb-3">
                                            <label for="address" class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    id="address" value="{{ Auth::user()->address }}" required>
                                                @error('address')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-main">Simpan</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->
                                </div>
                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form action="{{ route('admin.upPassword') }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-4 col-form-label">Password
                                                lama</label>
                                            <div class="col-md-8 col-lg-8">
                                                <input name="currentPassword" type="password"
                                                    class="form-control @error('currentPassword') is-invalid @enderror"
                                                    id="currentPassword" required>
                                                @error('currentPassword')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-4 col-form-label">Password
                                                baru</label>
                                            <div class="col-md-8 col-lg-8">
                                                <input name="newPassword" type="password"
                                                    class="form-control @error('newPassword') is-invalid @enderror"id="newPassword" required>
                                                @error('newPassword')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-4 col-form-label">Konfirmasi
                                                Password</label>
                                            <div class="col-md-8 col-lg-8">
                                                <input name="renewPassword" type="password"
                                                    class="form-control @error('renewPassword') is-invalid @enderror"
                                                    id="renewPassword" required>
                                                @error('renewPassword')
                                                    <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-main">Ubah Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->
                                </div>
                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
