@extends('user.layouts.app')
@section('content')
    <div class="container-fluid">
        <h4>Change Password</h4>
        <div class="row align-items-center">

            <div class="col-3"></div>
            <div class="col-6">
                <div class="card bg-light">
                    <form action="{{route('admin.changePassword')}}" method="post" class="p-3">
                        @csrf
                        <h5 class="text-primary">Enter your old password and then fill out your new password!</h5>

                        <div class="form-group">
                            <label >Old Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" class="form-control input-shadow" placeholder="Enter Password"
                                    name="oldPassword">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label >New Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" class="form-control input-shadow" placeholder="Enter Password"
                                    name="newPassword">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <div class="position-relative has-icon-right">
                                <input type="password" class="form-control input-shadow" placeholder="Enter Password"
                                    name="confirmPassword">
                                <div class="form-control-position">
                                    <i class="icon-lock"></i>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary profile-button" type="submit">
                            <i class="fa-solid fa-check"></i>
                            Change Password
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection
