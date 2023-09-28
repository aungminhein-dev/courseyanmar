@extends('authentication.Layout')
@section('content')
    <div class="card-body">
        <div class="card-content p-2">
            <div class="text-center">
                <img src="{{ asset('admin/assets/images/logo-icon.png') }}" alt="logo icon">
            </div>
            <div class="card-title text-uppercase text-center py-3">Sign In</div>
            @if (session('message'))
                <div class="alert alert-success fade show" role="alert">
                <i class="fa-solid fa-check me-2"></i><strong>{{$message}}</strong>
            </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                @if ($errors->any())
                    <div class="mb-2">
                        <ul class="m-0 px-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="form-group">
                    <label for="exampleInputUsername" class="sr-only">Email</label>
                    <div class="position-relative has-icon-right">
                        <input type="text" class="form-control input-shadow" placeholder="Enter Email" name="email">
                        <div class="form-control-position">
                            <i class="icon-envelope"></i>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword" class="sr-only">Password</label>
                    <div class="position-relative has-icon-right">
                        <input type="password" class="form-control input-shadow" placeholder="Enter Password"
                            name="password">
                        <div class="form-control-position">
                            <i class="icon-lock"></i>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-6">
                        <div class="icheck-material-white">
                            <input type="checkbox" id="user-checkbox" checked="" />
                            <label for="user-checkbox">Remember me</label>
                        </div>
                    </div>
                    <div class="form-group col-6 text-right">
                        <a href="reset-password.html">Reset Password</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-light btn-block">Sign In</button>
                <div class="text-center mt-3">Sign In With</div>

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
        <p class="text-warning mb-0">Do not have an account? <a href="{{ route('guest.register') }}"> Sign Up here</a></p>
    </div>
    </div>
@endsection
