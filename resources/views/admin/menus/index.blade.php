@extends('layouts.admin')

@section('title')

<title>Trang chu</title>

@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',[ 'name' => 'Menu', 'key' => 'List'])
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('menus.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên menus</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($menus as $menu)
                            <tr>
                                <td>{{$menu->id}}</td>
                                <td>{{$menu->name}}</td>
                                <td>
                                    <a href="{{route('menus.edit',['id'=> $menu->id])}}" class="btn btn-defaut">Edit</a>
                                    <a href="{{route('menus.delete',['id'=> $menu->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $menus->links()}}
            </div>
        </div>
    </div>
</div>

@endsection