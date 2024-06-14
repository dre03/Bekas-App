@extends('app')
@section('content')
    <main id="main" class="main">
        @if (session('success'))
            <div class="alert alert-success d-flex justify-content-between">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif (session('warning'))
                <div class="alert alert-warning d-flex justify-content-between">
                    {{ session('warning') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
        @endif
        <div class="pagetitle">
            <h1>{{ $title }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">{{ $title }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $title }}</h5>
                            <div class="table-responsive">
                                <div class="d-flex justify-content-start">
                                    <button class="btn btn-main btn-sm mb-2" data-bs-toggle="modal"
                                        data-bs-target="#modalCategorie">+ Tambah</button>
                                </div>
                                <table class="table datatable">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Nama</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($subCategories as $i => $item)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{$item->categorie->name}}</td>
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('subcategorie.delete', $item->id) }}" method="POST">
                                                        <button type="button" class="btn btn-warning btn-sm"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#subcategorie{{ $item->id }}"><i
                                                                class="bi bi-pencil-square"></i></button>
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i
                                                                class="bi bi-trash-fill"></i></button>
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
                <div class="modal fade" id="modalCategorie" tabindex="-1" aria-labelledby="modalCategorie"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">+ {{ $title }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('subcategorie.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-4 col-form-label">Kategori</label>
                                        <div class="col-sm-8">
                                            <select class="form-select @error('categorieId') is-invalid @enderror" name="categorieId">
                                                <option value="">Pilih Kategori</option>
                                                @foreach ($categories as $categorie )
                                                    <option value={{$categorie->id}}>{{$categorie->name}}</option> 
                                                @endforeach
                                            </select>
                                            @error('categorieId') <div class="text-danger mt-1"> {{ $message }}</div>@enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="name" class="col-sm-4 col-form-label">Nama</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                                            @error('name')<div class="text-danger mt-1">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-main btn-sm">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @foreach ($subCategories as $item)
            <div class="modal fade" id="subcategorie{{ $item->id }}" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('subcategorie.update', $item->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <select class="form-select @error('categorieId') is-invalid @enderror" name="categorieId">
                                            <option value="">Pilih Kategori Utama</option>
                                            @foreach ($categories as $categorie )
                                                <option value="{{ $categorie->id }}"{{ $categorie->id == $item->categorie_id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('categorieId')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$item->name}}">
                                    @error('name')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                                    </div>
                                </div>
                                <div class="modal-footer d-flex justify-content-center">
                                    <button type="submit" class="btn btn-main btn-sm">Simpan</button>
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
