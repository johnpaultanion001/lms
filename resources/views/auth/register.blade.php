@extends('../layouts.app')
@section('sub-title','REGISTER')

@section('content')
<div class="card o-hidden border-0 shadow-lg my-5">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                    </div>
                    <form class="user" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group">
                                <label class="control-label h6" >Name: <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Your Name" id="name" name="name" value="Tom Oliver Chua" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label h6" >Email: <span class="text-danger">*</span></label>
                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email Address" id="email" name="email" value="tomchua@gmail.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <label class="control-label h6" >Password: <span class="text-danger">*</span></label>
                                <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password" value="password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label h6" >Repeat Password: <span class="text-danger">*</span></label>
                                <input type="password" class="form-control form-control-user" placeholder="Repeat Password" id="password-confirm" name="password_confirmation" value="password">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block">
                            Register Account
                        </button>
                        <hr>
                        <a href="index.html" class="btn btn-google btn-user btn-block">
                            <i class="fab fa-google fa-fw"></i> Register with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                            <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                    </div>
                    <div class="text-center">
                        <a class="small" href="{{ url('/login') }}">Already have an account? Login!</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection