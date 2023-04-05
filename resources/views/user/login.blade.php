<!-- navbar -->
<nav class="navbar navbar-dark bg-primary mb-4">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">LARAVEL RUMAH SAKIT</span>
      </div>
    </nav>
    <!-- akhir navbar -->

@extends('layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        @if(session('success'))
        <p class="alert alert-success">{{ session('success') }}</p>
        @endif
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('login.action') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Login</button>
                <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
            </div>
        </form>
        <a class="nav-link" href="/register">Belum punya akun? Register sekarang</a>
            </div>
    </div>
</div>
@endsection