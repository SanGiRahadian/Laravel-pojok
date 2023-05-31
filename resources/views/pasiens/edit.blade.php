@extends('home')
@section('content')
<form action="{{ route('pasiens.update',$pasien->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row g-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Position Name:</strong>
                <input type="text" name="name" value="{{ $pasien->name }}" class="form-control" placeholder="pasien name">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="keterangan" name="alamat" class="form-control" placeholder="alamat" value="{{ $pasien->alamat }}">
                @error('alamat')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jenis Penyakit:</strong>
                <select name="jenispenyakit" class="form-control">
                    <option value="">Pilih Jenis Penyakit</option>
                    <option value="Penyakit jantung">Penyakit jantung</option>
                    <option value="Penyakit pernapasan">Penyakit pernapasan</option>
                    <option value="Penyakit ginjal">Penyakit ginjal</option>
                </select>
                @error('jenispenyakit')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dokert:</strong>
                <select name="dokter" class="form-control">
                    @foreach ($dokters as $dokter)
                    <option value="{{ $dokter->name}}" {{($dokter->dokter == $dokter->name) ? 'selected' : ''}}>{{$dokter->name}}</option>
                    @endforeach
                </select>
                @error('dokter')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>


            <div>
                <button type="submit" class="btn btn-primary mt-4">Submit</button>
                <a button type="submit" class="btn btn-danger mt-4" href="{{ route('pasiens.index') }}">Back</a>
            </div>
        </div>
</form>
@endsection