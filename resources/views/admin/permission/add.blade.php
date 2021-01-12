@extends('layouts.admin')

@section('title')
<title>Role</title>
@endsection

@section('css')
<link href="{{asset('admins/role/add/add.css')}}" rel="stylesheet" />
@endsection

@section('js')
<script src="{{asset('admins/role/add/add.js')}}" rel="stylesheet"></script>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' =>'Permission', 'key' => 'Add'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('permissions.store')}}" method="post" style="width:100%">
                    @csrf
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Chọn tên module</label>
                            <select class="form-control" name="module_parent">
                                <option value="">chọn module</option>
                                @foreach(config('permissions.table_module') as $permission)
                                <option value="{{$permission}}">{{$permission}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="div col-md-12">
                        <label>
                            <input type="checkbox" class="selectAll">
                            Chọn tất cả
                        </label>
                    </div>
                    <div class="div col-md-12">

                        
                        <div class="div row">
                            @foreach(config('permissions.module_childrent') as $module_childrent)
                            <div class="card-body text-primary col-md-3">
                                <h5 class="card-title">
                                    <label>
                                        <input type="checkbox" class="checkbox_childrent"
                                         value="{{$module_childrent}}" name="module_chilrent[]">  
                                        {{   $module_childrent}}
                                    </label>
                                </h5>
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