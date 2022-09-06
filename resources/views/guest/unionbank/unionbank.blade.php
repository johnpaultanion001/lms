@extends('layouts.guest')
@section('content')
<div class="ub-header">
    <h1>UnionBank Linking</h1>
</div>
<div class="container ub">
    <div class="row">
        <div class="col-12 mx-auto">
            <img src="public/assets/marketplace/img/uborange.svg" class="ub-logo d-block mx-auto" alt="Logo">
            <h3>Confirm Your Online Payment</h3>
        </div>
        <div class="col-10 col-sm-7 col-md-7 col-lg-4 mx-auto mt-3">
            <div class="row g-3">
                <div class="col-12">
                    <input type="text" class="form-control" placeholder="User ID">
                </div>
                <div class="col-12">
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <em>By accessing your UnionBank Online Account through, you consent to the processing and disclosure of you account information and transaction dedtails in order to fulfill the services you wish UnionBank to provide you.</em>
            </div>
        </div>
        <div class="col-12 mx-auto">
            <a href="{{route('unionbank.payment')}}" class="btn btn-ub mt-4">LOG IN</a>
            <p class="or text-center">or</p>
            <a href="{{route('marketplace')}}" class="btn btn-ubreg">CANCEL</a>
        </div>
    </div>
</div>
@endsection
@section('scripts')
 <script>
 </script>
@endsection