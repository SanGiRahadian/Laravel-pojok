<!-- navbar -->
<nav class="navbar navbar-dark bg-primary mb-4">
      <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">LARAVEL RUMAH SAKIT</span>
      </div>
    </nav>
    <!-- akhir navbar -->

@extends('layout')
@section('content')
<div class="container" >
    <div class="row">
        <div class="col-md-6">
        <div class="wrapper bg-white text-center p-12">
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
                        @if(session('register'))
                        <div class="alert alert-success my-4">
                            {{session('register')}}
                        </div>
                        @endif
                        
                        @if(session('email'))
                        <div class="alert alert-danger my-4">
                            {{session('email')}}
                            </div>
                        @endif
                        
                        @if(session('password'))
                        <div class="alert alert-danger my-4">
                            {{session('password')}}
                        </div>
                        @endif
            <div class="mb-3">
                <label>Email <span class="text-danger">*</span></label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}" />
            </div>
            <div class="mb-3">
                <label>Password <span class="text-danger">*</span></label>
                <input class="form-control" type="password" name="password" />
            </div>
            <div class="d-block mb-3">
                            <button type="submit" class="btn btn-success -block">Login</button>
                <a class="btn btn-danger" href="{{ route('home') }}">Back</a>
            </div>
            <div>
        <p >Belum punya akun? <a class="nav-link"  style="color:blue" href="/register">Register</a></p> 
            </div>
        </form>
        </div>
        </div>
    </div>
</div>

<!-- content -->


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

@endsection