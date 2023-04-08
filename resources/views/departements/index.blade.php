@extends('app')
@section('content')
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
<div class="text-end mb-2">
<form method="post" action="/index">
                        @csrf
							        <div class="input-group mb-4">
							            <input type="text" placeholder="Cari Nama Department..." required class="form-control" name="keyword">
							            <button type="submit" class="btn btn-primary">Cari</button>
							        </div>
							    </form>
<a class="btn btn-success" href="{{ route('departements.create') }}"> Add department</a>
</div>
<table class="table table-striped mg-b-0 text-md-nowrap border">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nama</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Manager Id</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($departements as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->location }}</td>
                        <td>{{ $data->manager_id }}</td>
                        <td>
                            <form action="{{ route('departements.destroy',$data->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('departements.edit',$data->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
  </tbody>
</table>
@endsection