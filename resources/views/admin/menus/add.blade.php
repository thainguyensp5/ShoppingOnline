@extends('layouts.admin')

@section('title')

<title>Trang chu</title>

@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' =>'Menu', 'key' => 'Add'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{route('menus.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label>Tên menu</label>
                            <input type="text" name="name" class="form-control" placeholder="Nhập tên menu">
                        </div>
                        <div class="form-group" >
                            <label>Chọn menus cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn menus cha</option>
                                {!!$optionSelect!!}
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