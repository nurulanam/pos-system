@extends('backend.master.master')
@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div class="title"><b>Products</b></div>
            <div class="py-2">
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">
                    <i class="fas fa-plus"></i><span class="ms-2">Add Product</span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-4 shadow">
                    <div class="card-header">
                        <h5 class="fw-bold">All Products</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($products as $key=>$product)
                                <tr>
                                    <td>{{$key+$products->firstItem()}}</td>
                                    <td>{{$product->product_name}}</td>
                                    <td>{{$product->brand}}</td>
                                    <td>{{number_format($product->price, 2)}}</td>
                                    <td>
                                        @if($product->alert_stock >=$product->quantity)
                                            <span class="badge bg-danger">{{$product->quantity}}</span>
                                        @else
                                            <span class="badge bg-success">{{$product->quantity}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-success btn-sm mx-1"
                                               data-bs-toggle="modal"
                                               data-bs-target="#editProduct{{$product->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm mx-1"
                                               data-bs-toggle="modal"
                                               data-bs-target="#deleteProduct{{$product->id}}">
                                                <i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit User Modal -->
                                <div class="modal right fade" id="editProduct{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('product.update', $product->id)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group mb-3">
                                                        <lable class="form-label">Product Name</lable>
                                                        <input type="text" value="{{$product->product_name}}" name="product_name" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <lable class="form-label">Brand</lable>
                                                        <input type="text" value="{{$product->brand}}"  name="brand" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <lable class="form-label">Price</lable>
                                                        <input type="number" value="{{$product->price}}"  name="price" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <lable class="form-label">Quantity</lable>
                                                        <input type="number" value="{{$product->quantity}}"  name="quantity" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <lable class="form-label">Alert Stock</lable>
                                                        <input type="number" value="{{$product->alert_stock}}"  name="alert_stock" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <lable class="form-label">Description</lable>
                                                        <textarea name="description" id="" rows="3" class="form-control">{{$product->description}}</textarea>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-success w-100">Update</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Delete User Modal -->
                                <div class="modal right fade" id="deleteProduct{{$product->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Are You Sure To Delete <span class="text-danger">{{$product->product_name}}</span></h6>
                                                <form action="{{route('product.destroy', $product->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')

                                                    <div class="modal-footer">
                                                        <button class="btn btn-danger w-100">Delete</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            {!! $products->links() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h5><b>Search Products</b></h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal right fade" id="addProduct" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('product.store')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <lable class="form-label">Product Name</lable>
                                <input type="text" name="product_name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <lable class="form-label">Brand</lable>
                                <input type="text" name="brand" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <lable class="form-label">Price</lable>
                                <input type="number" name="price" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <lable class="form-label">Quantity</lable>
                                <input type="number" name="quantity" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <lable class="form-label">Alert Stock</lable>
                                <input type="number" name="alert_stock" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <lable class="form-label">Description</lable>
                                <textarea name="description" id="" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary w-100">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



    </div>
@endsection
