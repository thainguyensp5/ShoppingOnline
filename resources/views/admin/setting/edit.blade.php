@extends('layouts.admin')

@section('title')

<title>Setting</title>

@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' =>'Setting', 'key' => 'Edit'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{route('setting.update', ['id' => $setting->id])}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label>Config Key</label>
                            <input type="text" name="config_key" value="{{$setting->config_key}}" class="form-control @error('config_key') is-invalid @enderror" placeholder="Nhập Config Key">
                            @error('config_key')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if(request()->type == 'text')
                        <div class="mb-3">
                            <label>Config Value</label>
                            <input type="text" name="config_value" value="{{$setting->config_value}}"  class="form-control @error('config_value') is-invalid @enderror" placeholder="Nhập Config Value">
                            @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @elseif(request()->type == 'textarea')
                        <div class="mb-3">
                            <label>Config Value</label>
                            <textarea name="config_value" class="form-control @error('config_value') is-invalid @enderror" placeholder="Nhập Config Value" rows="5">{{$setting->config_value}}</textarea>
                            @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection