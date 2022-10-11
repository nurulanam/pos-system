@extends('backend.master.master')
@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div class="title"><b>Manage Category</b></div>
            <div class="py-2">
                <a href="{{route('category.add')}}" class="btn btn-primary">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                @if($message = Session::get('success'))
                    <div class="alert alert-success">{{$message}}</div>
                @endif
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Avater</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Sl</th>
                        <th>Name</th>
                        <th>Avater</th>
                        <th>Details</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($categories as $key=>$category)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{$category->category_name}}</td>
                        <td class="text-center">
                            <img src="{{asset('backend/assets/img/category/'.$category->category_avater)}}" class="img-fluid img-thumbnail" width="50">
                        </td>
                        <td>{{$category->category_description}}</td>
                        <td></td>
                        <td>
                            <div class="d-flex">
{{--                                <button--}}
{{--                                   data-id="{{$category->id}}"--}}
{{--                                   data-name="{{$category->category_name}}"--}}
{{--                                   data-des="{{$category->category_description}}"--}}
{{--                                   data-bs-toggle="modal"--}}
{{--                                   data-bs-target="#editModal">--}}
{{--                                    <i class="fas fa-edit mx-2 text-primary edit_btn"></i>--}}
{{--                                </button>--}}
                                <a href="{{url('/dashboard/category/'.$category->category_slug.'/edit')}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#"><i class="fas fa-trash-alt mx-2 text-danger"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <div class="col-md-4">
                                            <lable class="form-label">Name :</lable>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Category Name">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-4">
                                            <lable class="form-label">Description :</lable>
                                        </div>
                                        <div class="col-md-8">
                                            <textarea type="text" name="category_description" id="category_description" class="form-control" placeholder="Category Description" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-4">
                                            <lable class="form-label">Avater :</lable>
                                        </div>
                                        <div class="col-md-8">
                                            <input type="file" name="category_avater" id="category_avater" onchange="previewFile(this);" class="form-control" placeholder="Category Avater">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-4">

                                        </div>
                                        <div class="col-md-8">
                                            <button class="btn btn-primary w-100">Save</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
