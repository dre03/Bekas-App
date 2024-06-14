@include('website.layouts.meta')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="jual-pasang text-primary mt-5">Pasang Iklan Anda</div>
            <div class="jual-kat mt-4">Pilih kategori</div>
        </div>
    </div>
    <form action="{{ route('sell.store') }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('POST')
        <div class="row mt-5">
            <div class="col-6">
                <div class="mb-3">
                    <label for="Kategori" class="form-label label-sell">Kategori</label>
                    <select class="form-select form-sell @error('categorie') is-invalid @enderror" name="categorie">
                        <option value="">Pilih Kategori Utama</option>
                        @foreach ($categories as $categorie)
                            <option value="{{ $categorie->id }}"{{ old('categorie') == $categorie->id ? 'selected' : '' }}>{{ $categorie->name }}</option>
                        @endforeach
                    </select>
                    @error('categorie')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="Sub Kategorie" class="form-label label-sell">Sub Kategori</label>
                    <select class="form-select form-sell @error('subCategorie') is-invalid @enderror" name="subCategorie">
                        <option value="">Pilih Sub Kategori</option>
                    </select>
                    @error('subCategorie')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label label-sell">Nama Produk</label>
                    <input type="text" class="form-control form-sell @error('name') is-invalid @enderror"
                        value="{{ old('name') }}" name="name" autocomplete="name">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="brand" class="form-label label-sell">Merek</label>
                    <input type="text" class="form-control form-sell @error('brand') is-invalid @enderror"
                        value="{{ old('brand') }}" name="brand">
                    @error('brand')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="production_year" class="form-label label-sell">Tahun Produksi</label>
                    <select class="form-select form-sell @error('production_year') is-invalid @enderror" name="production_year">
                        <option value="">Pilih Tahun Produksi</option>
                        @php
                            $pilihTahun = request('production_year');
                            $tahunIni = date('Y');
                        @endphp
                        @for ($tahun = $tahunIni; $tahun >= 2000; $tahun--)
                            @php
                                $selected = $tahun == $pilihTahun ? 'selected' : '';
                            @endphp
                            <option value="{{ $tahun }}" {{ old('production_year') == $tahun ? 'selected' : '' }}>{{ $tahun }}</option>
                        @endfor
                    </select>
                    @error('production_year')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="type" class="form-label label-sell">Tipe</label>
                    <input type="text" class="form-control form-sell @error('type') is-invalid @enderror"
                        value="{{ old('type') }}" name="type">
                    @error('type')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="Warna" class="form-label label-sell">Warna</label>
                    <input type="text" class="form-control form-sell @error('color') is-invalid @enderror"
                        value="{{ old('color') }}" name="color">
                    @error('color')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="price" class="form-label label-sell">Harga</label>
                    <input type="number" class="form-control form-sell @error('price') is-invalid @enderror"
                        name="price" value="{{ old('price') }}" placeholder="Rp.">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="condition" class="form-label label-sell">Kondisi</label>
                    <div class="d-flex justify-content-start">
                        <div class="form-check me-3">
                            <input class="form-check-input @error('condition') is-invalid @enderror" type="radio" name="condition" id="condition1" value="Bekas" {{ old('condition') == 'Bekas' ? 'checked' : '' }}>
                            <label class="form-check-label" for="condition1">Bekas</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input @error('condition') is-invalid @enderror" type="radio" name="condition" id="condition2" value="Baru" {{ old('condition') == 'Baru' ? 'checked' : '' }}>
                            <label class="form-check-label" for="condition2">Baru</label>
                        </div>
                    </div>
                    @error('condition')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="description" class="form-label label-sell">Deskripsi</label>
                    <textarea class="form-control form-sell @error('description') is-invalid @enderror" name="description"
                        rows="3">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <hr class="sell-line mt-3">
            <div class="jual-kat mt-3 mb-4">Konfirmasi Wilayah</div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="province" class="form-label label-sell">Provinsi</label>
                    <select class="form-select form-sell @error('province') is-invalid @enderror" name="province" id="province">
                        <option value="">Pilih Provinsi</option>
                    </select>
                    @error('province')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="city" class="form-label label-sell">Kota/Kab</label>
                    <select class="form-select form-sell @error('city') is-invalid @enderror" name="city" id="city">
                        <option value="">Pilih Kota/Kab</option>
                    </select>
                    @error('city')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="district" class="form-label label-sell">Kecamatan</label>
                    <select class="form-select form-sell @error('district') is-invalid @enderror" name="district"
                        id="district">
                        <option value="">Pilih Kecamatan</option>
                    </select>
                    @error('district')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="village" class="form-label label-sell">Desa</label>
                    <select class="form-select form-sell @error('village') is-invalid @enderror" name="village"
                        id="village">
                        <option value="">Pilih Desa</option>
                    </select>
                    @error('village')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <hr class="sell-line mt-3">
            <div class="jual-kat mt-3 mb-3">Unggah Foto</div>
            <div class="container alert-success p-3 rounded">
                <span><b>Informasi</b> : Minimal <b>3 foto wajib </b>diunggah, Format foto berupa <b>jpeg, jpg, dan png</b>, dan
                    Maksimal ukuran <b>foto 2 MB</b></span>
            </div>
            @for ($i = 0; $i < 10; $i++)
                <div class="col-lg-2 col-md-3 col-4 d-flex justify-content-center position-relative">
                    <button type="button" class="uf-card mt-3"
                        onclick="document.getElementById('file-input-{{ $i }}').click()">
                        <img id="preview-{{ $i }}" src="{{ asset('asset_FE/svg/add-photo.svg') }}"
                            alt="Add Photo" class="img-fluid">
                    </button>
                    <input type="file" id="file-input-{{ $i }}" class="@error('images.' . $i) is-invalid @enderror" name="images[]" style="display: none;" onchange="previewImage(event, {{ $i }})">
                    <button type="button" class="delete-btn" onclick="removeImage({{ $i }})" style="display: none;">&times;</button>
                </div>
            @endfor
            @if ($errors->has('images'))
                @foreach ($errors->get('images') as $error)
                    <span class="text-danger mt-2">{{ $error }}</span>
                @endforeach
            @endif
            @if ($errors->has('images.*'))
               <span class="text-danger">{{$errors->first('images.*')}}</span>
            @endif
        </div>
        <div class="col-12 d-flex justify-content-center mt-5">
            <a href="{{ route('homepage') }}" class="btn btn-secondary text-decoration me-2">Kembali</a>
            <button type="submit" class="btn btn-primary btn-sm">Pasang Iklan</button>
        </div>
    </form>
</div>
<script src="{{ asset('asset_FE/js/region.js') }}"></script>
<script>
    document.querySelectorAll('.file-input').forEach(input => {
        input.addEventListener('change', function() {
            if (this.files && this.files[0]) {}
        });
    });

    function previewImage(event, index) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById('preview-' + index);
            preview.src = reader.result;
            preview.classList.add('uploaded-img');
            document.querySelector(`#file-input-${index}`).nextElementSibling.style.display = 'block';
        }
        reader.readAsDataURL(input.files[0]);
    }

    function removeImage(index) {
        const preview = document.getElementById('preview-' + index);
        preview.src = '{{ asset('asset_FE/svg/add-photo.svg') }}';
        preview.classList.remove('uploaded-img');
        preview.classList.add('default-img');
        const fileInput = document.getElementById(`file-input-${index}`);
        fileInput.value = '';
        fileInput.nextElementSibling.style.display = 'none';
    }
</script>
<script>
    $(document).ready(function() {
        $('select[name="categorie"]').on('change', function() {
            var categoryId = $(this).val();
            if(categoryId) {
                $.ajax({
                    url: '/subcategories/' + categoryId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('select[name="subCategorie"]').empty();
                        $('select[name="subCategorie"]').append('<option value="">Pilih Sub Kategori</option>');
                        $.each(data, function(key, value) {
                            $('select[name="subCategorie"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            } else {
                $('select[name="subCategorie"]').empty();
                $('select[name="subCategorie"]').append('<option value="">Pilih Sub Kategori</option>');
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
@endif

@include('website.layouts.footer')
