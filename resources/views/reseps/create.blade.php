@extends('home')
@section('content')
<form action="{{ route('dokters.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name:</strong>
                <input type="text" id="name" name="name" class="form-control" placeholder="Masukan name">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" class="form-control" placeholder="Masukan Lokasi">
                @error('alamat')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <strong>Spesialisasi:</strong>
                <select name="spesialisasi" class="form-control">
                    <option value="">Pilih Spesialisasi</option>
                    <option value="Dokter Spesialis Dalam">Dokter Spesialis Dalam</option>
                    <option value="Dokter Spesialis Paru-paru">Dokter Spesialis Paru-paru</option>
                    <option value="Dokter Spesialis Mata">Dokter Spesialis Mata</option>
                    <option value="Dokter Spesialis Anak">Dokter Spesialis Anak</option>
                    <!-- Tambahkan opsi spesialisasi yang lain sesuai kebutuhan -->
                </select>
                @error('spesialisasi')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('dokters.index') }}">Back</a>
        </div>
    </div>
</form>
@endsection