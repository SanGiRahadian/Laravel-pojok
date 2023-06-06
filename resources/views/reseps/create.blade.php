@extends('home')
@section('content')
<form action="{{ route('reseps.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Resep</strong>
                <input type="text" id="name" name="name" class="form-control" placeholder="Masukan name">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal :</strong>
                <input type="date" name="tgl" class="form-control" placeholder="Tanggal">
                @error('location')
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
                <strong>Penyusun:</strong>
                <select name="penyusun" id="penyusun" class="form-select" >
                        <option value="">Pilih</option>
                        @foreach($managers as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                </select>
                @error('alias')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>

            <button type="submit" class="btn btn-primary mt-4">Submit</button>
            <a button type="submit" class="btn btn-danger mt-4" href="{{ route('dokters.index') }}">Back</a>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <table id="example" class="table table-striped" style="width:100%">
    <thead>
        <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Pasien</th>
      <th scope="col">Nama Dokter</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Sub Total</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
</table>
</div>
        <tbody id="detail">
           
    </div>
</form>

@endsection
@section('js')
<script type="text/javascript">
    var path = "{{ route('search.product') }}";
  
    $("#search").autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#search').val(ui.item.label);
           //console.log(ui.item); 
           add(ui.item.id);
           return false;
        }
      });

      function add(id){
        const path = "{{ route('pasiens.index')}}/"+id;
        var html = "";
        var no=0;
       if($('#detail tr').length > no){
        html = $('#detail').html();
        no = no+$('#detail tr').length;
       }
        
       
        $.ajax({
            url: path,
            type: 'GET",
            dataType: "json",
            succes: function( data ) {
                console.log(data);
                no++;
                html +=  '<tr>'+
                '<td> '+no+'<input type="text" name="no_resep'+no+'" class="form-control" value="'+data.id+'"></td>'+
                '<td> <input type="text" name="nama_pasien'+no+'" class="form-control" value="'+data.nama+'"></td>'+
                '<td> <input type="text" name="nama_dokter'+no+'" class="form-control" value="'+data.doter+'"></td>'+
                '<td> <input type="date" name="tgl'+no+'" class="form-control" value="'+data.id+'"></td>'+
                '<td> <input type="text" name="sub_total'+no+'" class="form-control" value="'+data.id+'"></td>'+
                '</tr>';
                $('#detail').html(html);
            }
        });
    }
    //untuk perhitungan price * qyt
       /* function sumQyt(no, q){
            var price = $("input[name=price"+no+"]").val();
            var subtotal = q*parseInt(price);;
            $("input[name=sub_total"+no+']).val(subtotal);
            consol.log(q+"*"+price+"="+subtotal);
        } */

      
  
</script>
@endsection