@extends('layouts.admin')

@section('title')
<title>Add product</title>
@endsection

@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css')}}">
@endsection

@section('js')
    <script src="{{ asset('vendors/sweetAlert2/sweetalert2@10.js')}}"></script>
    <script src="{{ asset('admins/product/index/list.js')}}"></script>
@endsection

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    @include('partials.content-header',[ 'name' => 'Product', 'key' => 'List'])
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('product.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá sản phẩm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $productItem)
                            <tr>
                                <td scoppe="row">{{$productItem->id}}</td>
                                <td>{{$productItem->name}}</td>
                                <td>{{$productItem->price}}</td>
                                <td>
                                    <img class="product_image_150_100" src="{{$productItem->feature_image_path}}" alt="">
                                </td>
                                <td>{{ optional($productItem->category)->name }}</td>
                                <td>
                                @can('product-edit')
                                    <a href="{{route('product.edit', ['id' => $productItem->id])}}" class="btn btn-defaut">Edit</a>
                                @endcan

                                    <a href="" 
                                            data-url="{{route('product.delete',['id'=> $productItem->id])}}"
                                            class="btn btn-danger action_delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection