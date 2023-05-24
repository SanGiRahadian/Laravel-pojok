@extends('layout')
@section('content')
<table class="table mt-5">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            
            <th scope="col">Position</th>
            <th scope="col">Departement</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 0; ?>
        @foreach ($user as $data)
        <?php $no++; ?>
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $data->name }}</td>
            <td>{{ $data->email }}</td>
            <td>{{ $data->positions }}</td>
            <td>{{ $data->departements }}</td>
            <!-- <td>{{
                (isset($data->getManager->name))?
                $data->getManager->name :
                'Tidak Ada' 
                }}
            </td> -->
        </tr>
        @endforeach
    </tbody>
</table>
@endsection