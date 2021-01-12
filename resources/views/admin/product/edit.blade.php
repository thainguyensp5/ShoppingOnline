@extends('layouts.admin')

@section('title')
<title>Edit product</title>
@endsection

@section('css')
<link href="{{asset('vendors/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header', ['name' =>'Product', 'key' => 'Edit'])
    <form action="{{route('product.update',['id '=> $product->id ])}}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        @csrf
                        <div class="mb-3">
                            <label>Tên sản phẩm</label>
                            <input type="text" value="{{$product->name}}" name="name" class="form-control" placeholder="Nhập tên sản phẩm">
                        </div>

                        <div class="mb-3">
                            <label>Giá sản phẩm</label>
                            <input type="text" value="{{$product->price}}" name="price" class="form-control" placeholder="Nhập giá sản phẩm">
                        </div>

                        <div class="mb-3">
                            <label>Ảnh sản phẩm</label>
                            <input type="file" name="feature_image_path" class="form-control-file" placeholder="Nhập ảnh sản phẩm">
                            <div class="col-md-4 feature_image_container">
                                <div class="row">
                                    <div class="col-md-12">
                                        <img class="feature_image" src="{{$product->feature_image_path}}" alt="">
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="mb-3">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple="multiple" name="image_path[]" class="form-control-file" placeholder="Nhập ảnh chi tiết sản phẩm">
                            <div class="col-md-12 container_image_detail">
                                <div class="row">
                                    @foreach($product->images as $productImage)
                                    <div class="col-md-3">
                                        <img class="image_detail_product" src="{{$productImage->image_path}}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Chọn danh mục </label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Nhập tags cho sản phẩm </label>
                            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                            @foreach($product->tags as $tagItem) 
                               
                            <option value="{{$tagItem->id}}" selected>{{$tagItem->name}}</option>
                            @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <label>Nội dung</label>
                        <textarea name="contents" class="form-control tinymce_editor_init" rows="9">{{$product->content}}</textarea>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection
@section('js')
<script src="{{asset('vendors/select2/select2.min.js')}}"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script src="{{asset('admins/product/add/add.js')}}"></script>

</script>
@endsection