@extends('layouts.admin')

@section('title')
<title>Role</title>
@endsection

@section('css')
<link href="{{asset('admins/slider/index/index.css')}}" rel="stylesheet" />
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script> 
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script>
    <script src="{{ asset('admins/slider/index/index.js')}}"></script>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',[ 'name' => 'Role', 'key' => 'List'])
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên vai trò</th>
                                <th scope="col">Mô tả vai trò</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->display_name}}</td>
                                <td>
                                    <a href="{{route('roles.edit', ['id' => $role->id])}}" class="btn btn-defaut">Edit</a>
                                    <a href=""
                                        data-url = "{{route('roles.delete', ['id' => $role->id])}}"
                                        class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{$roles->links()}}
            </div>
        </div>
    </div>
</div>

@endsection