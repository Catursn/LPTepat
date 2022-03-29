@extends('includes.master')

@section('title')
    Form Detail {{$form->nama}}
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
                            <li><a href="{{route('form.index')}}">Form</a></li>
                            <li><a href="/admin/form/{{$form->id_forms}}">Detail</a></li>
                            <li class="active"><a href="/admin/form/{{$form->id_forms}}">{{$form->nama}}</a></li>
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
        <div class="card-header">Create form</div>
        <div class="card-body card-block">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Nama</div>
                    <input type="text" id="nama" name="nama" class="form-control" value="{{$form->nama}}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Telepon / WA</div>
                    <input type="text" id="wa" name="wa" class="form-control" value="{{$form->wa}}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">email</div>
                    <input type="text" id="email" name="email" class="form-control" value="{{$form->email}}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Perusahaan</div>
                    <input type="text" id="perusahaan" name="perusahaan" class="form-control" value="{{$form->perusahaan}}">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-addon">Pesan</div>
                    <textarea name="pesan" id="pesan" cols="120" rows="10" class="form-control">{{$form->pesan}}</textarea>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
@endpush