@extends('../layouts.app')
@section('sub-title','LOGIN')

@section('content')
<style>
    body{
        height: 100vh;
    }
    .admin-logo{
        width: 150px;
        max-width: 100%;
    }
    .bg-gradient-primary {
        background-image: linear-gradient(180deg, #2c2f7c 10%, #224abe 100%);
    }
    .btn-google {
        color: #fff;
        background-color: #ea4335;
        border-color: #ea4335;
    }
    .btn-facebook {
        color: #fff;
        background-color: #3b5998;
        border-color: #3b5998;
    }
    h1 {
        font-size: 24px;
        font-weight: 700;
        color: #2c2f7c;
    }
</style>
<div class="row h-100 justify-content-center align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <img src="{{ asset('public/assets/img/ekyclogo.png') }}" alt="Logo" class="admin-logo mb-2">
                                <p class="text-danger" id="text_warning">
                                </p>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="user">
                            @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Email Address" autofocus>
                                        @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <hr>
                                <a href="javascript:;" id="googleLogin" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Login with Google
                                </a>
                                <a  href="javascript:;" id="facebookLogin" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                </a>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="{{ url('/register') }}">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<!-- Firebase files -->
<!-- Insert these scripts at the bottom of the HTML, but before you use any Firebase services -->

<!-- Firebase App (the core Firebase SDK) is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-app.js"></script>

<!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-analytics.js"></script>

<!-- Add Firebase products that you want to use -->
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-auth.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.5/firebase-firestore.js"></script>
<!-- firebase Conf -->
<script type="text/javascript" src="{{ url('public/assets/js/firebase/firebase-conf.js') }}"></script>
<!-- facebook provider -->
<script type="text/javascript" src="{{ url('public/assets/js/firebase/facebook.js') }}"></script>
<script type="text/javascript" src="{{ url('public/assets/js/firebase/google.js') }}"></script>

<script> 

</script>
@endsection