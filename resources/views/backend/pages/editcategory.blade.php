@extends('backend.master.master')
@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div class="title"><b>Category</b></div>
            <div class="py-2">
                <a href="{{route('category.show')}}" class="btn btn-primary">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="card mt-4 shadow">
                    <div class="card-header">
                        <h4 class="fw-bold">Update Category</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('category.update', $category->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row mb-3">
                                <div class="col-md-4">
                                    <lable class="form-label">Name :</lable>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" name="category_name" value="{{$category->category_name}}" class="form-control" placeholder="Category Name">
                                </div>
                            </div>
                            <div class="form-group row mb-3">
                                <div class="col-md-4">
                                    <lable class="form-label">Description :</lable>
                                </div>
                                <div class="col-md-8">
                                    <textarea type="text" name="category_description" class="form-control" placeholder="Category Description" rows="10">{{$category->category_description}}</textarea>
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
                                    <button class="btn btn-primary w-100">Update</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-3">
                @if($message = Session::get('success'))
                    <div class="alert alert-success">{{$message}}</div>
                @endif
                    <div id="title_text" class="fw-bold text-center text-uppercase alert alert-success">original</div>
                <img src="{{asset('/backend/assets/img/category/'.$category->category_avater)}}" id="previewImg" class="img-thumbnail img-fluid">

                    <script>
                    function previewFile(input){
                        var file = $("input[type=file]").get(0).files[0];

                        if(file){
                            var reader = new FileReader();

                            reader.onload = function(){
                                $("#previewImg").attr("src", reader.result);
                            }
                            reader.readAsDataURL(file);
                            $('#title_text').html('Will Update');
                        }
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
