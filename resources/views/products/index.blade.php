@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
            @if(session('status'))
                <h6 class="alert alert-success">{{(session('status'))}}</h6>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h4>Add Product
                        <a href="{{ url('add_product') }}" class="btn btn-primary btn-sm float-end">Add Product </a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-brodered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->price }}</td>
                                    <!-- <td>{{ $item->image }}</td> -->
                                    <td>
                                        <img src="{{ asset('uploads/products/'.$item->image) }}" width="100px" hight="100px" alt="">
                                    </td>

                                    <td>
                                        <a href="{{url('edit_product/'.$item->id)}}" class="btn btn-success btn-sm">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{url('delete-product/'.$item->id)}}" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection