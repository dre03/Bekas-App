@extends('app')
@section('content')
    <main id="main" class="main">
        @if (session('success'))
            <div class="alert alert-success d-flex justify-content-between">
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
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{$title}}</h5>
                            <div class="table-responsive">
                                <table class="table datatable">
                                    <thead class="text-center">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            {{-- <th>Merek</th> --}}
                                            <th>Kondisi</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @foreach ($products as $i => $item)
                                            <tr>
                                                <td>{{ ++$i }}</td>
                                                <td>{{ $item->name }}</td>
                                                {{-- <td>{{ $item->brand }}</td> --}}
                                                <td>{{ $item->condition }}</td>
                                                <td>Rp. {{ number_format($item->price, 0, ',', '.') }}</td>
                                                <td>
                                                    @php
                                                        $optionClass = '';
                                                        $label = '';
                                                    @endphp
                                                    @if ($item->statusProduct->status == 'Terjual')
                                                        @php
                                                            $optionClass = 'btn btn-success';
                                                            $label = 'Terjual';
                                                        @endphp
                                                    @elseif ($item->statusProduct->status == 'Dijual')
                                                        @php
                                                            $optionClass = 'btn btn-warning';
                                                            $label = 'Dijual';
                                                        @endphp
                                                    @endif
                                                    @if ($item->statusProduct->status === 'Terjual')
                                                        <button class="badge {{ $optionClass }}" style="width: 100%">{{ $label }}</button>
                                                    @else
                                                        <form id="updateStatus{{ $item->id }}"
                                                            action="{{ route('product.updateStatus', $item->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            <select name="status" id="status{{ $item->id }}"
                                                                class="badge form-select form-select-sm {{ $optionClass }} text-white fw-bold"
                                                                onchange="submitForm('{{ $item->id }}')">
                                                                @php
                                                                    $optionClass = '';
                                                                @endphp
                                                                @foreach ($statusProducts as $status)
                                                                    @if ($status->status === 'Terjual')
                                                                        @php
                                                                            $optionClass = 'bg-success';
                                                                        @endphp
                                                                    @elseif ($status->status === 'Dijual')
                                                                        @php
                                                                            $optionClass = 'bg-warning';
                                                                        @endphp
                                                                    @endif
                                                                    <option class="badge {{ $optionClass }} text-white"
                                                                        value="{{ $status->id }}"
                                                                        {{ $item->statusProduct->status == $status->status ? 'selected' : '' }}>
                                                                        {{ $status->status }}</option>
                                                                @endforeach
                                                            </select>
                                                        </form>
                                                    @endif
                                                </td>
                                                <td>
                                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                        action="{{ route('product.delete', $item->id) }}" method="POST">
                                                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#productModal{{$item->id}}"><i class="bi bi-eye-fill"></i></button>
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash-fill"></i></button> --}}
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
        <!-- End Vertically centered Modal-->
        @foreach ($products as $item)
            <div class="modal fade" id="productModal{{$item->id}}" tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{$title}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                @for ($i = 1; $i < 10; $i++)
                                    <div class="col-md-4 mt-2">
                                        <img src="https://akcdn.detik.net.id/visual/2022/01/17/yamaha-rilis-motor-hybrid-bergaya-retro-harga-jauh-di-bawah-pcx-ehev_169.jpeg?w=200"
                                            alt="">
                                    </div>
                                @endfor
                            </div>
                            <hr>
                            <div class="row mt-2">
                                <p class="fw-bold">Detail</p>
                                <div class="col-md-4">
                                    <p><span>Nama</span><span class="float-sm-end">{{ $item->name }}</span></p>
                                    <p><span>Merek</span><span class="float-end">{{ $item->brand }}</span></p>
                                    <p><span>Tahun Produksi</span><span
                                            class="float-end">{{ $item->production_year }}</span></p>

                                </div>
                                <div class="col-md-4">
                                    <p><span>Tipe</span><span class="float-end">{{ $item->type }}</span></p>
                                    <p><span>Warna</span><span class="float-end">{{ $item->color }}</span></p>
                                    <p><span>Kondisi</span><span class="float-end">{{ $item->condition }}</span></p>
                                </div>
                                <div class="col-md-4">
                                    <p><span>Harga</span><span class="float-end">Rp. {{ number_format($item->price, 0, ',', '.') }}</span></p>
                                    <p><span>Kategori </span><span class="float-end">{{ $item->subcategorie->categorie->name }}</span>
                                    </p>
                                    <p><span>Penjual </span><span class="float-end">{{ $item->user->name }}</span></p>
                                </div>
                                <hr>
                                <div class="col-md-12">
                                    <p class="fw-bold">Deskripsi</p>
                                    <p>{{ $item->description }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div><!-- End Large Modal-->
        @endforeach
    </main><!-- End #main -->
@endsection
<script>
    function submitForm(formId) {
        document.getElementById('updateStatus' + formId).submit();
    }
</script>