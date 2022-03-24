@extends('includes.master')

@section('title')
    Feature Create
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
                            <li><a href="{{route('feature.index')}}">Feature</a></li>
                            <li class="active"><a href="{{route('feature.create')}}">Create</a></li>
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
        <div class="card-header">Create Feature</div>
        <div class="card-body card-block">
            <form method="POST"action="{{route('feature.store')}}" enctype="multipart/form-data">
                {{ csrf_field() }} {{ method_field('POST') }}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Feature</div>
                        <input type="text" id="feature" name="feature" class="form-control">
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