@extends('admin.layouts.app')
@section('content')
    <div class="container rounded bg-light mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    @if ($userDetail->image)
                        <img src="{{ asset('storage/' . $userDetail->image) }}" style="width:150px;" alt=""
                            class="rounded-circle mt-5">
                    @else
                        <img class="rounded-circle mt-5" width="150px"
                            src="{{ $userDetail->gender == 'male' ? asset('images/user-male.jpg') : asset('images/female.png') }}">
                    @endif
                    <span class="font-weight-bold">{{ $userDetail->name }}</span><span
                        class="text-black-50">{{ $userDetail->email }}</span>
                    <div class="mt-5 text-center">
                        <a href="{{ route('admin.changePasswordPage') }}"
                            class="btn btn-primary profile-button @if ($userDetail->id != Auth::user()->id) d-none @endif"
                            type="submit">
                            <i class="fa-solid fa-lock"></i>
                            Change Password
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-5  @if ($userDetail->id != Auth::user()->id) border-right @endif">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">Profile</h4>
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
                    <form action="{{ route('admin.updateProfile') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="userId" value="{{ $userDetail->id }}">
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">Name</label><input type="text"
                                    class="form-control" name="name" placeholder="Name" value="{{ $userDetail->name }}"
                                    @disabled($userDetail->id != Auth::user()->id)>
                            </div>
                            <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text"
                                    class="form-control" name="phone" placeholder="enter phone number"
                                    value="{{ $userDetail->phone }}" @disabled($userDetail->id != Auth::user()->id)>
                            </div>
                            <div class="col-md-12"><label class="labels">Email</label><input type="email"
                                    class="form-control" name="email" placeholder="Email"
                                    value="{{ $userDetail->email }}" @disabled($userDetail->id != Auth::user()->id)>
                            </div>
                            <div class="col-md-12"><label class="labels">Address</label><input type="text"
                                    class="form-control" name="address" placeholder="Address"
                                    value="{{ $userDetail->address }}" @disabled($userDetail->id != Auth::user()->id)>
                            </div>
                            <div class="col-md-12">
                                <div class="form-line">
                                    <label class="labels">Role</label>
                                    <select class="form-control" name="role" @disabled($userDetail->id != Auth::user()->id)>
                                        <option value="admin" @if ($userDetail->role == 'admin') selected @endif>Admin
                                        </option>
                                        <option value="user" @if ($userDetail->role == 'user') selected @endif>User
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3 @if ($userDetail->id != Auth::user()->id) d-none @endif">
                            <div class="col-md-6"><label class="labels">Photo</label><input type="file"
                                    class="form-control" name="image" placeholder="Photo"></div>
                            <div class="col-md-6">
                                <label class="labels">Gender</label>
                                <div class="form-group">
                                    <label for="exampleInputEmailId" class="sr-only">Gender</label>
                                    <div class="position-relative has-icon-right">

                                        <div class="form-line">
                                            <select class="form-control" name="gender" @disabled($userDetail->id != Auth::user()->id)>
                                                <option value="male"
                                                    {{ $userDetail->gender == 'male' ? 'selected' : '' }}>Male</option>
                                                <option value="female"
                                                    {{ $userDetail->gender == 'female' ? 'selected' : '' }}>Female</option>
                                            </select>
                                        </div>

                                        <div class="form-control-position">
                                            <i class="zmdi zmdi-male-female"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="mt-5 text-center @if ($userDetail->id != Auth::user()->id) d-none @endif"><button
                                class="btn btn-primary profile-button" type="submit">Save
                                Profile</button></div>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row p-3 py-5">
                    @if ($userDetail->role == 'user')

                        @if ($userDetail->enrolledCourses)
                            <h4 class="text-white">
                                Enrolled Courses
                            </h4>

                            @foreach ($userEnrolledCourses as $c)
                                <div class="col-md-4 mt-2">
                                    <img src="{{ asset('storage/' . $c->image) }}" alt=""
                                        class="img-fluid mx-auto d-block rounded" width="100px">
                                </div>
                            @endforeach
                        @else
                            <h4 class="text-white">No Enrolled Courses</h4>
                        @endif

                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
