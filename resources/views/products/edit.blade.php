@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if(session('status'))
                <h6 class="alert alert-success">{{(session('status'))}}</h6>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Product
                        <a href="{{ url('products') }}" class="btn btn-danger btn-sm float-end">Back </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                        <div class="from-group mb-3">
                            <label for="">Product Name</label>
                            <input type="text" name="name" value="{{$product->name }}" class="form-control">
                        </div>
                        <div class="from-group mb-3">
                            <label for="">Description </label>
                            <textarea name="description" value="" id=""  class="form-control" >{{$product->description}}</textarea>
                        </div>
                        <div class="from-group mb-3">
                            <label for="">Price</label>
                            <input type="text" name="price" value="{{$product->price}}" class="form-control">
                        </div>
                        <div class="from-group mb-3">
                            <label for="">Image Upload</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{ asset('uploads/products/'.$product->image) }}" width="100px" hight="100px" alt="">
                        </div>

                        <div class="from-group mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection