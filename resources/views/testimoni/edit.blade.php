@extends('includes.master')

@section('title')
    Testimoni Edit 
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
                            <li><a href="/admin/testimoni/{{$testimoni->id_testimonis}}/edit">Edit</a></li>
                            <li class="active"><a href="/admin/testimoni/{{$testimoni->id_testimonis}}/edit">{{$testimoni->nama}}</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">Create testimoni</div>
        <div class="card-body card-block">
                <form class="form-horizontal" data-toggle="validator" method="POST" action="{{route('testimoni.update',$testimoni->id_testimonis)}}" enctype="multipart/form-data" >
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Nama</div>
                        <input type="text" id="nama" name="nama" class="form-control" value="{{$testimoni->nama}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Perusahaan</div>
                        <input type="text" id="perusahaan" name="perusahaan" class="form-control" value="{{$testimoni->perusahaan}}">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Testimoni</div>
                        <input type="text" id="testi" name="testi" class="form-control" value="{{$testimoni->testi}}">
                    </div>
                </div>
                <div class="form-actions form-group">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('script')
@endpush