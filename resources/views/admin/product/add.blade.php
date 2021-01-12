@extends('layouts.admin')

@section('title')
<title>Add product</title>
@endsection

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' =>'Product', 'key' => 'Add'])
    <div class="div col-md-12">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            @csrf
                            <div class="mb-3">
                                <label>Tên sản phẩm</label>
                                <input type="text" name="name" 
                                class="form-control @error('name') is-invalid @enderror" 
                                value="{{old('name')}}"
                                placeholder="Nhập tên sản phẩm">
                                <div class="div mb-3" style="background-color:crimson;">
                                    <spam style="color:seashell; ">
                                        @error('name')
                                        {{ $message }}
                                        @enderror
                                    </spam>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Giá sản phẩm</label>
                                <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" placeholder="Nhập giá sản phẩm">
                                <div class="div mb-3" style="background-color:crimson;">
                                    <spam style="color:seashell; ">
                                        @error('price')
                                        {{ $message }}
                                        @enderror
                                    </spam>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label>Ảnh sản phẩm</label>
                                <input type="file" name="feature_image_path" class="form-control-file" placeholder="Nhập ảnh sản phẩm">
                            </div>

                            <div class="mb-3">
                                <label>Ảnh chi tiết</label>
                                <input type="file" multiple="multiple" name="image_path[]" class="form-control-file" placeholder="Nhập ảnh chi tiết sản phẩm">
                            </div>


                            <div class="form-group">
                                <label>Chọn danh mục </label>
                                <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                                    <option value="">Chọn danh mục</option>
                                    {!! $htmlOption !!}
                                </select>
                                <div class="div mb-3" style="background-color:crimson;">
                                    <spam style="color:seashell; ">
                                        @error('category_id')
                                        {{ $message }}
                                        @enderror
                                    </spam>
                                </div>
                            </div>

                            <div class="form-group">
                                <label> Nhập tags cho sản phẩm </label>
                                <select name="tags[]" class="form-control tags_select_choose" multiple="multiple"></select>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <label>Nội dung</label>
                            <textarea name="content"  class="form-control tinymce_editor_init @error('content') is-invalid @enderror " rows="9">{{old('content')}}</textarea>
                            <div class="div mb-3" style="background-color:crimson;">
                                <spam style="color:seashell; ">
                                    @error('content')
                                    {{ $message }}
                                    @enderror
                                </spam>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>

@endsection
@section('js')
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{asset('admins/product/add/add.js')}}"></script>

</script>
@endsection