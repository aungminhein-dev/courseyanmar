@extends('authentication.Layout')
@section('content')
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
                <img src="{{ asset('admin/assets/images/logo-icon.png') }}" alt="logo icon">
            </div>
            <h3 class="text-center text-primary fw-bold text-uppercase py-3">
                Courseyanmar EDU
            </h3>
            <div class="card-title text-uppercase text-center py-3 text-muted">Sign Up</div>
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
                    <div class="position-relative has-icon-right">
                        <input type="text" name="name" class="form-control text-black"
                            placeholder="Enter Your Name">
                        <div class="form-control-position">
                            <i class="icon-user"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="position-relative has-icon-right">
                        <input type="text" name="email" class="form-control text-black"
                            placeholder="Enter Your Email ID">
                        <div class="form-control-position">
                            <i class="icon-envelope-open"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="position-relative has-icon-right">
                        <input type="text" class="form-control text-black" name="phone"
                            placeholder="Enter Your Phone Number">
                        <div class="form-control-position">
                            <i class="icon-phone"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="position-relative has-icon-right">

                        <textarea name="address" class="form-control text-black" placeholder="Address" name="address"></textarea>

                        <div class="form-control-position">
                            <i class="icon-pin"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="position-relative has-icon-right">

                        <div class="form-line">
                            <select class="form-control" name="gender">
                                <option value=""  class="opt" disabled selected>Select Gender</option>
                                <option value="male" class="opt">Male</option>
                                <option value="female" class="opt">Female</option>
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
                        <input type="password" name="password" class="form-control text-black"
                            placeholder="Create Password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword" class="sr-only">Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" name="password_confirmation" class="form-control text-black"
                            placeholder="Confirm Password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-success btn-block waves-effect waves-light">Sign Up</button>
                <div class="text-center mt-3">Sign Up With</div>

                <div class="form-group mb-0 col-12 text-right">
                    <a href="{{ route('googleLogin') }}" class="btn btn-warning btn-block"><i class="fa fa-google"></i>
                        Google</a>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer text-center py-3">
        <p class="text-warning mb-0">Already have an account? <a href="{{route('guest.login')}}"> Sign In here</a></p>
    </div>
    </div>
@endsection
