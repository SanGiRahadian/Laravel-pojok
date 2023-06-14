@extends('app')
@section('content')
<form action="{{ route('reseps.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Resep:</strong>
                <input type="text" name="no_resep" class="form-control" placeholder="No Resep">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Resep :</strong>
                <input type="date" name="tgl_resep" class="form-control" placeholder="Tanggal Resep">
                @error('location')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pasien:</strong>
                <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Lahir :</strong>
                <input type="date" name="tgl_lahir" class="form-control" placeholder="Tanggal Lahir">
                @error('location')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Dokter:</strong>
                <input type="text" name="nama_dokter" class="form-control" placeholder="Nama Dokter">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No SIP:</strong>
                <input type="text" name="no_sip" class="form-control" placeholder="No SIP">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Umur Pasien:</strong>
                <input type="text" name="umur_pasien" class="form-control" placeholder="Umur Pasien">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Riwayat Alergi:</strong>
                <input type="text" name="riwayat_alergi" class="form-control" placeholder="Riwayat Alergi">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
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
        
        <div class="row col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="col-md-10 form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Masukan Nama / Kode Obat">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2 form-group text-center">
                <button class="btn btn-secondary" type="button" name="btnAdd" id="btnAdd"><i class="fa fa-plus"></i>Tambah</button>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">No Resep</th>
                    <th scope="col">Nama Obat</th>
                    <th scope="col">Jenis Obat</th>
                    <th scope="col">Bentuk Obat</th>
                    <th scope="col">Aturan Minum</th>
                    <th scope="col">Harga</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Sub Total</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="detail">
                    
                </tbody>
            </table>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="jml" class="form-control" >
                <div class="form-group">
                    <strong>Grand Total:</strong>
                    <input type="text" name="total" class="form-control" placeholder="Rp. 0">
                    @error('tgl_resep')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
    </div>
</form>
@endsection
@section('js')
<script type="text/javascript">
    var path = "{{ route('search.obat') }}";
  
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
           console.log($("input[name=jml]").val());
            if($("input[name=jml]").val() > 0){
                for (let i = 1; i <=  $("input[name=jml]").val(); i++) {
                    id = $("input[name=nama_obat"+i+"]").val();
                    if(id==ui.item.id){
                        alert(ui.item.value+' sudah ada!');
                        break;
                    }else{
                        add(ui.item.id);
                    }
                }
            }else{
                add(ui.item.id);
            } 
           return false;
        }
      });
      function add(id){
        const path = "{{ route('obats.index') }}/"+id;
        var html = "";
        var no=0;
        if($('#detail tr').length > no){
            html = $('#detail').html();
            no = no+$('#detail tr').length;
        }
        $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            success: function( data ) {
                console.log(data);
                no++;
                html += '<tr>'+
                            '<td>'+no+'<input type="hidden" name="nama_obat'+no+'" class="form-control" value="'+data.id+'"></td>'+
                         
                             '<td><input type="text" name="jenis_obat'+no+'" class="form-control" value="'+data.jenis_obat+'"></td>'+
                              '<td><input type="text" name="bentuk_obat'+no+'" class="form-control" value="'+data.bentuk_obat+'"></td>'+
                             '<td><input type="text" name="aturan_minum'+no+'" class="form-control" value="'+data.aturan_minum+'"></td>'+
                            '<td><input type="text" name="price'+no+'" class="form-control" value="'+data.price+'"></td>'+
                            '<td><input type="text" name="qty'+no+'" class="form-control" oninput="sumQty('+no+', this.value)" value="1"></td>'+
                            '<td><input type="text" name="sub_total'+no+'" class="form-control"></td>'+
                            '<td><a href="#" class="btn btn-sm btn-danger">X</a></td>'+
                        '</tr>';
                    $('#detail').html(html);
                    $("input[name=jml]").val(no);
                    sumQty(no, 1);
               }
          });       
    }
    
    function sumQty(no, q){
        var price = $("input[name=price"+no+"]").val();
        var subtotal = q*parseInt(price);
        $("input[name=sub_total"+no+"]").val(subtotal);
        console.log(q+"*"+price+"="+subtotal);
        sumTotal();
    }

    function sumTotal(){
    var total = 0;
       for (let i = 1; i <=  $("input[name=jml]").val(); i++) {
        var sub = $("input[name=sub_total"+i+"]").val();
        total = total + parseInt(sub);
       }
       $("input[name=total]").val(total);
    }

</script>
@endsection