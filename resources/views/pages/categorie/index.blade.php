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
                <div class="col-lg-7">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$title}}</h5>
                            <table class="table datatable">
                                <thead class="text-center">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($categories as $i => $item)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('categorie.delete', $item->id) }}" method="POST">
                                                    <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#categorie{{ $item->id }}"><i class="bi bi-pencil-square"></i></button>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">+ {{$title}}</h5>
                            <!-- Horizontal Form -->
                            <form action="{{ route('categorie.store') }}" method="POST">
                                @csrf
                                @method('POST')
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary">Simpan</button>
                                </div>
                            </form><!-- End Horizontal Form -->

                        </div>
                    </div>
                </div>
            </div>
        </section>
        @foreach ($categories as $item)
            <div class="modal fade" id="categorie{{ $item->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('categorie.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{ old('name', $item->name) }}"
                                            id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-secondary">Simpan</button>
                                </div>
                            </form><!-- End Horizontal Form -->
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        <!-- End Vertically centered Modal-->
    </main><!-- End #main -->
@endsection
