@extends('includes.master')

@section('title')
    Feature Edit {{$feature->feature}}
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
                            <li><a href="/admin/feature/{{$feature->id_features}}/edit">Edit</a></li>
                            <li class="active"><a href="/admin/feature/{{$feature->id_features}}/edit">{{$feature->feature}}</a></li>
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
        <div class="card-header">Create feature</div>
        <div class="card-body card-block">
                <form class="form-horizontal" data-toggle="validator" method="POST" action="{{route('feature.update',$feature->id_features)}}" enctype="multipart/form-data" >
                        {{ csrf_field() }} {{ method_field('PATCH') }}
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">Feature</div>
                        <input type="text" id="feature" name="feature" class="form-control" value="{{$feature->feature}}">
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