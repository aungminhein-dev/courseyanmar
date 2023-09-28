@extends('admin.layouts.app')
@section('content')
    <div class="container rounded bg-light mt-5 mb-5">
        <div class="row">
            <div class="col-md-8">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-center">Add New User</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert bg-light form-group py-2">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('admin.addNewUser') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text"
                                    class="form-control" name="name" placeholder="Name"> </div>
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                    class="form-control" name="phone" placeholder="Enter phone number"> </div>
                            <div class="col-md-12"><label class="labels">Email</label><input type="email"
                                    class="form-control" name="email" placeholder="Email"> </div>
                            <div class="col-md-12">
                                <label for="" class="labels">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="col-md-12"><label class="labels">Address</label><input type="text"
                                    class="form-control" name="address" placeholder="Address"> </div>
                            <div class="col-md-12">
                                <label class="labels">Role</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <select class="form-control" name="role">
                                            <option value="admin">Admin
                                            </option>
                                            <option value="user">
                                                User
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">Photo</label><input class="form-control"
                                    type="file" id="formFile" onchange="preview()"name="image"></div>
                            <div class="col-md-6">
                                <label class="labels">Gender</label>
                                <div class="form-group">
                                    <label for="exampleInputEmailId" class="sr-only">Gender</label>
                                    <div class="position-relative has-icon-right">

                                        <div class="form-line">
                                            <select class="form-control" name="gender">
                                                <option value="male">Male
                                                </option>
                                                <option value="female">
                                                    Female
                                                </option>
                                            </select>
                                        </div>

                                        <div class="form-control-position">
                                            <i class="zmdi zmdi-male-female"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button"
                                type="submit">Create</button></div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 mt-5">
                <img src="" class="w-100 d-block mx-auto img-fluid" onchange="preview()" id="my-image">
            </div>
        </div>
    </div>
@endsection
@section('myScript')
    <script>
        let frame = document.getElementById('my-image')
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>
@endsection
