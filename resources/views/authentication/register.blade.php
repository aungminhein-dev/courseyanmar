@extends('authentication.Layout')
@section('content')


    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
                Courseyanmar EDU
            </div>
            <div class="card-title text-uppercase text-center py-3">Sign Up</div>
            <form action="{{route('register')}}" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger input-group">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="exampleInputName" class="sr-only">Name</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" name="name" class="form-control input-shadow"
                            placeholder="Enter Your Name">
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmailId" class="sr-only">Email ID</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" name="email" class="form-control input-shadow"
                            placeholder="Enter Your Email ID">
                        <div class="form-control-position">
                            <i class="icon-envelope-open"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmailId" class="sr-only">Phone</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" class="form-control input-shadow" name="phone"
                            placeholder="Enter Your Phone Number">
                        <div class="form-control-position">
                            <i class="icon-phone"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmailId" class="sr-only">Address</label>
                    <div class="position-relative has-icon-right">

                        <textarea name="address" class="form-control" placeholder="Address" name="address"></textarea>

                        <div class="form-control-position">
                            <i class="icon-pin"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmailId" class="sr-only">Gender</label>
                    <div class="position-relative has-icon-right">

                        <div class="form-line">
                            <select class="form-control" name="gender">
                                <option value="" class="text-muted">Select Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                        <div class="form-control-position">
                            <i class="zmdi zmdi-male-female"></i>
                        </div>
                    </div>
                </div>



                <div class="form-group">
                    <label for="exampleInputPassword" class="sr-only">Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" name="password" class="form-control input-shadow"
                            placeholder="Create Password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword" class="sr-only">Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" name="password_confirmation" class="form-control input-shadow"
                            placeholder="Confirm Password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="icheck-material-white">
                        <input type="checkbox" id="user-checkbox" checked="" />
                        <label for="user-checkbox">I Agree With Terms & Conditions</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-light btn-block waves-effect waves-light">Sign Up</button>
                <div class="text-center mt-3">Sign Up With</div>

                <div class="form-row mt-4">
                    <div class="form-group mb-0 col-6">
                        <button type="button" class="btn btn-light btn-block"><i class="fa fa-facebook-square"></i>
                            Facebook</button>
                    </div>
                    <div class="form-group mb-0 col-6 text-right">
                        <button type="button" class="btn btn-light btn-block"><i class="fa fa-twitter-square"></i>
                            Twitter</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Already have an account? <a href="{{route('guest.login')}}"> Sign In here</a></p>
    </div>
    </div>
@endsection
