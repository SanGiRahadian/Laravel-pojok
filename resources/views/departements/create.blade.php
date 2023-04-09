@extends('app')
@section('content')
<form action="{{ route('departements.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Departement Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Departement Name">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Location :</strong>
                <input type="text" name="location" class="form-control" placeholder="Location">
                @error('location')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <label for="manager_id" class="form-label">Manager Id</label>
            <select id="manager_id" name="manager_id" class="form-select">
                <option selected>Choose...</option>
                <option value="0" <?php if (!empty($_GET['id'])) {
                                        if ($usr['manager_id'] == 0) {
                                            echo "selected";
                                        } else {
                                            echo "";
                                        }
                                    } ?>>1</option>
            </select>
            <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
        </div>
</form>
@endsection