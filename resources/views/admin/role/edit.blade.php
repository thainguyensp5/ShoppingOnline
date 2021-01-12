@extends('layouts.admin')

@section('title')
<title>Role</title>
@endsection

@section('css')
<link href="{{asset('admins/role/add/add.css')}}" rel="stylesheet"/>
@endsection

@section('js')
<script src="{{asset('admins/role/add/add.js')}}" rel="stylesheet"></script>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' =>'Role', 'key' => 'Edit'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('roles.update',['id' => $role->id])}}" method="post" enctype="multipart/form-data" style="width:100%">

                    <div class="col-md-12">
                        @csrf
                        <div class="mb-3">
                            <label>Tên vai trò</label>
                            <input type="text" name="name" value="{{$role->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập vai trò">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="floatingTextarea">Mô tả vai trò</label>
                            <textarea name="display_name" class="form-control @error('description') is-invalid @enderror" placeholder="Nhập mô tả" rows="4">{{$role->display_name}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="div col-md-12">
                        <label>
                            <input type="checkbox" class="selectAll">
                            Chọn tất cả
                        </label>
                    </div>

                    <div class="div col-md-12">
                        <div class="div cow">
                            @foreach($permisssionParents as $permisssionParentItem)
                            <div class="card border-primary mb-3 col-md-12">
                                <div class="card-header">
                                    <label>
                                        <input type="checkbox" class="checkbox_wrapper" value="">
                                    </label>
                                    {{$permisssionParentItem->name}}
                                </div>
                                <div class="div row">
                                    @foreach($permisssionParentItem->permissionChildrent as $permisssionChildrentItem)
                                        <div class="card-body text-primary col-md-3">
                                            <h5 class="card-title">
                                                <label>
                                                    <input type="checkbox" name="permission_id[]"
                                                    {{$premissionChecked->contains('id',$permisssionChildrentItem->id)? 'checked': ''}}
                                                            class="checkbox_childrent"
                                                            value="{{$permisssionChildrentItem->id}}">
                                                </label>
                                                {{$permisssionChildrentItem->name}}
                                            </h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection
