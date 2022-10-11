@extends('backend.master.master')
@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <div class="title"><b>Users</b></div>
            <div class="py-2">
                <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                    <i class="fas fa-plus"></i><span class="ms-2">Add User</span>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card mt-4 shadow">
                    <div class="card-header">
                        <h5 class="fw-bold">All Users</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $key=>$user)
                                <tr>
                                    <td>{{$key+$users->firstItem()}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>@if($user->is_admin == 1) <span class="badge bg-success">Admin</span> @elseif($user->is_admin == 2) <span class="badge bg-primary">Cashier</span> @endif</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="#" class="btn btn-success btn-sm mx-1"
                                               data-bs-toggle="modal"
                                               data-bs-target="#editUser{{$user->id}}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm mx-1"
                                               data-bs-toggle="modal"
                                               data-bs-target="#deleteUser{{$user->id}}">
                                                <i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Edit User Modal -->
                                <div class="modal right fade" id="editUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('user.update', $user->id)}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="form-group mb-3">
                                                        <lable class="form-label">Name</lable>
                                                        <input type="text" value="{{$user->name}}" name="name" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <lable class="form-label">Email</lable>
                                                        <input type="email" value="{{$user->email}}" name="email" class="form-control">
                                                    </div>
                                                    <div class="form-group mb-3">
                                                        <lable class="form-label">Role</lable>
                                                        <select name="is_admin" id="" class="form-control">
                                                            <option value="1" @if($user->is_admin == 1) selected @endif>Admin</option>
                                                            <option value="2" @if($user->is_admin == 2) selected @endif>Cashier</option>
                                                        </select>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-warning w-100">Update</button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <!-- Delete User Modal -->
                                <div class="modal right fade" id="deleteUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6>Are You Sure To Delete <span class="text-danger">{{$user->name}}</span></h6>
                                                <form action="{{route('user.destroy', $user->id)}}" method="post">
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
                            {!! $users->links() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h5><b>Search User</b></h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal right fade" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <div class="form-group mb-3">
                                <lable class="form-label">Name</lable>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <lable class="form-label">Email</lable>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <lable class="form-label">Password</lable>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <lable class="form-label">Confirm Password</lable>
                                <input type="password" name="confirm_password" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <lable class="form-label">Role</lable>
                                <select name="is_admin" id="" class="form-control">
                                    <option value="1">Admin</option>
                                    <option value="2">Cashier</option>
                                </select>
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
