@extends('home')
@section('content')

<form action="{{ route('pasiens.store') }}" method="POST" enctype="multipart/form-data">
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
            <div class="form-group">
                <label for="dokters"><strong>Dokter :</strong></label>
                <select name="dokter" class="form-select">
                    @foreach ($dokters as $dokters)
                    <option value="{{ $dokters->name}}">{{$dokters->name}}</option>
                    @endforeach
                </select>
            </div>


            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('pasiens.index') }}">Back</a>
        </div>
    </div>
</form>
@endsection