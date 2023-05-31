@extends('home')
@section('content')
<form action="{{ route('dokters.update',$dokter->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name Dokter:</strong>
                <input type="text" name="name" value="{{ $dokter->name }}" class="form-control" placeholder="pasien name">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="alamat" name="alamat" class="form-control" placeholder="alamat" value="{{ $dokter->alamat }}">
                @error('alamat')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Spesialisasi:</strong>
                <select name="spesialisasi" class="form-control">
                    <option value="">Pilih spesialisasi</option>
                    <option value="Dokter Spesialis Dalam" {{ $dokter->spesialisasi == 'Dokter Spesialis Dalam' ? 'selected' : '' }}>Dokter Spesialis Dalam</option>
                    <option value="Dokter Spesialis Paru-paru" {{ $dokter->spesialisasi == 'Dokter Spesialis Paru-paru' ? 'selected' : '' }}>Dokter Spesialis Paru-paru</option>
                    <option value="Dokter Spesialis Mata" {{ $dokter->spesialisasi == 'Dokter Spesialis Mata' ? 'selected' : '' }}>Dokter Spesialis Mata</option>
                    <option value="Dokter Spesialis Anak" {{ $dokter->spesialisasi == 'Dokter Spesialis Anak' ? 'selected' : '' }}>Dokter Spesialis Anak</option>
                    <!-- Tambahkan opsi spesialisasi sesuai kebutuhan -->
                </select>
                @error('spesialisasi')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div>
            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('dokters.index') }}">Back</a>
        </div>
    </div>
</form>
@endsection