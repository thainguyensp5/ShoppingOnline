@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection

@section('css')
<link href="{{asset('admins/slider/edit/edit.css')}}" rel="stylesheet" />
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' =>'Slider', 'key' => 'Edit'])
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{route('slider.update',['id' => $slider->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label>Tên slider</label>
                            <input type="text" name="name" value="{{$slider->name}}" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên slider">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="floatingTextarea">Mô tả</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Nhập mô tả" rows="4">{{$slider->description}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Hình ảnh</label>
                            <input type="file" name="image_path"  class="form-control-file  @error('image_path') is-invalid @enderror">
                            <div>
                                <img class="image_slider_150_100" src="{{$slider->image_path}}" alt="">
                            </div>
                            @error('image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection