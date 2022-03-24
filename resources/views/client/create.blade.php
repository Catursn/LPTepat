@extends('includes.master')

@section('title')
    Client Create
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
                            <li><a href="{{route('client.index')}}">Client</a></li>
                            <li class="active"><a href="{{route('client.create')}}">Create</a></li>
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
        <div class="card-header">Create Client</div>
        <div class="card-body card-block">
            <form method="POST"action="{{route('client.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Foto</div>
                        <input type="file" id="foto" name="foto" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Link</div>
                        <input type="text" id="link" name="link" class="form-control">
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