@extends('includes.master')

@section('title')
    Benefit Edit 
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
                            <li><a href="{{route('benefit.index')}}">Benefit</a></li>
                            <li class="active"><a href="/admin/benefit/{{$benefit->id_benefits}}/edit">Edit</a></li>
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
        <div class="card-header">Create benefit</div>
        <div class="card-body card-block">
                <form class="form-horizontal" data-toggle="validator" method="POST" action="{{route('benefit.update',$benefit->id_benefits)}}" enctype="multipart/form-data" >
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Foto</div>
                        <input type="file" id="foto" name="foto" class="form-control">
                    </div>
                    <img src="{{$benefit->foto}}" alt="" height="250px">
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Caption</div>
                        <input type="text" id="caption" name="caption" class="form-control" value="{{$benefit->caption}}">
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