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
                    <p class="ub-small-p">You are about to cash in</p>
                    <h2 class="my-3 text-center">PHP 10,000.00</h2>
                    <p class="ub-small-p">using your UnionBank account</p>
                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="ub-small-p">Please review to ensure that the details are correct before you proceed.</p>
                </div>
            </div>
        </div>
        <div class="col-12 mx-auto">
            <a href="{{route('unionbank.confirm')}}" class="btn btn-ub mt-4">CONFIRM</a>
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