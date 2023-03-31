@extends('app')
@section('content')
<div class="text-end mb-2">
                    <a class="btn btn-success" href="{{ route('positions.create') }}"> Add position</a>
                </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Keterangan</th>
      <th scope="col">Alias</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  @foreach ($positions as $data)
                    <tr>
                        <td>{{ $data->id }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->keterangan }}</td>
                        <td>{{ $data->alias }}</td>
                        <td>
                            <form action="{{ route('positions.destroy',$data->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('positions.edit',$data->id) }}">Edit</a>
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