@extends('backend.master.master')
@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div class="title"><b>Order</b></div>
            <div class="py-2">
{{--                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProduct">--}}
{{--                    <i class="fas fa-plus"></i><span class="ms-2">Add Product</span>--}}
{{--                </a>--}}
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-4 shadow">
                    <div class="card-header">
                        <h5 class="fw-bold">Order Products</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Discount <span class="text-danger">%</span></th>
                                <th>Total</th>
                                <th>
                                    <a href="#" class="btn btn-primary rounded-circle btn-sm add_more">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <select name="product_id" class="form-control product_id">

                                            @foreach($products as $product)
                                                <option value="{{$product->id}}">{{$product->product_name}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="quantity[]" id="quantity" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="price[]" id="price" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="discount[]" id="discount" class="form-control">
                                    </td>
                                    <td>
                                        <input type="number" name="total" id="total" class="form-control">
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-danger rounded-circle btn-sm delete">
                                            <i class="fas fa-xmark"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
{{--                            {!! $products->links() !!}--}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="card-header bg-success">
                        <h5 class="text-light d-flex justify-content-between"><b>Total</b> <span>0.00</span></h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
