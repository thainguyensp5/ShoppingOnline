@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/user/add/add.css')}}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/user/add/add.js')}}"></script>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' =>'User', 'key' => 'Edit'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{route('users.update', ['id' => $user->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Tên</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên">
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" value="{{$user->email}}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập email">
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập password">
                        </div>

                       

                        <div class=" mb-3 form_group">
                            <label>Chọn vai trò</label>
                            <select class="form-control  tags_select_choose select2_init" name="role_id[]" multiple>
                                <option value=""></option>
                                @foreach($roles as $role)
                                <option 
                                {{ $roleOfUser->contains('id', $role->id) ? 'selected' : ''}}
                                value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection