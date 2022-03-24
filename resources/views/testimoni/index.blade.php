@extends('includes.master')

@section('title')
    Testimoni Table
@endsection

@push('style')
@endpush
@section('breadcrumbs')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Admin</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="{{route('testimoni.index')}}">Testimoni</a></li>
                            <li class="active" ><a href="{{route('testimoni.index')}}">Table</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            <div class="card-body">
                <table id="table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Perusahaan</th>
                            <th>Testimoni</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</div>
@foreach($testimoni as $list)
<!-- Modal -->
<div class="modal modal-danger fade" id="delete{{$list->id_testimonis}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title text-center" id="myModalLabel">Konfirmasi Delete</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        
            <div class="modal-body">
                    <p class="text-center">
                        Apa anda ingin menhapus data?
                        <br>
                        <span style="font-size:24px;">{{$list->nama}}</span>
                    </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                <a href="{{route('testimoni.delete',$list->id_testimonis)}}" class="btn btn-primary">Ya</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@push('script')
<script type="text/javascript">
    $(document).ready(function() {
    $('#bootstrap-data-table-export').DataTable();
} );
</script>
<script type="text/javascript">
var table, save_method;
$(function(){
   table = $('#table').DataTable({
     "processing" : true,
     "ajax" : {
       "url" : "{{ route('testimoni.data') }}",
       "type" : "GET"
     }
   }); 
   
});
</script>
@endpush