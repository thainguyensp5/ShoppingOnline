@extends('layouts.admin')

@section('title')
<title>Setting</title>
@endsection

@section('css')
<link href="{{asset('admins/setting/index/index.css')}}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script>
<script src="{{ asset('admins/setting/index/index.js')}}"></script>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',[ 'name' => 'Setting', 'key' => 'List'])
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group float-right" >
                        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
                            Add Setting
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('setting.create') . '?type=text'}}" >Text</a></li>
                            <li><a href="{{route('setting.create') . '?type=textarea'}}" >Text area</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config Key</th>
                                <th scope="col">Config Value</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($settings as $setting)
                            <tr>
                                <td>{{$setting->id}}</td>
                                <td>{{$setting->config_key}}</td>
                                <td>{{$setting->config_value}}</td>
                                <td>
                                    <a href="{{route('setting.edit', ['id'=> $setting->id]) .'?type=' .$setting->type}}" class="btn btn-defaut">Edit</a>
                                    <a href="" 
                                        data-url="{{route('setting.delete', ['id' => $setting->id])}}" class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$settings->links()}}
            </div>
        </div>
    </div>
</div>

@endsection