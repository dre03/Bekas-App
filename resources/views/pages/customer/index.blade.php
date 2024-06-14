@extends('app')
@section('content')
    <main id="main" class="main">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="pagetitle">
            <h1>{{$title}}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-md-12 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$title}}</h5>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>No Telepon</th>
                                            <th>Jenis Kelaminn</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($customers as $i => $item)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->email }}</td>
                                                <td>{{ $item->phone_number }}</td>
                                                <td>{{ $item->gender }}</td>
                                                <td>{{ $item->address }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#customerModal{{$item->id}}"><i class="bi bi-eye-fill"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        @foreach ($customers as $item)
            <div class="modal fade" id="customerModal{{ $item->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{$title}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                @if ($item->profile_pic)
                                        <img src="{{ asset('storage/' . $item->profile_pic) }}" style="max-width: 80%; width: 150px" class="rounded-circle mx-auto d-block" alt="Error Image">
                                @else
                                    <img src="https://cdn-icons-png.flaticon.com/512/9131/9131529.png" style="max-width: 80%; width: 150px" class="rounded-circle mx-auto d-block p-3" alt="Error Image">
                                @endif

                            <div class="card-body">
                                <table class="table table-borderless">
                                    <thead>
                                        <tr>
                                            <th scope="col">Nama</th>
                                            <td>: {{ $item->name }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="col">email</th>
                                            <td>: {{ $item->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>No Telepon</th>
                                            <td>: {{ $item->phone_number }}</td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>: {{ $item->username }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Lahir</th>
                                            <td>: {{ $item->birth_date }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tempat Lahir</th>
                                            <td>: {{ $item->birth_place }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>: {{ $item->gender }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>: {{ $item->address }}</td>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </main><!-- End #main -->
@endsection