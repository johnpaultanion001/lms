@extends('layouts.guest')

<nav class="navbar navbar-expand-lg navbar-light bg-light navbar fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('search') }}"><img src="{{ asset('public/assets/img/ekyc-logo.png') }}" alt="Logo" class="the-logo"> EKYC</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ url('search') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('documentation') }}">Documentation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}">Register</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
@section('content')
<style>
    body{
        background-image: url('{{ asset('public/assets/img/bg.jpg') }}');
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
    }
    .bg-light {
        background: linear-gradient(180deg, #0e3ba0 0%, #2c2f7c 100%);
        background-color: transparent !important;
    }
    .dti_logo{
        position: absolute;
        width: 50px !important;
        height: 50px !important;
        object-fit: scale-down !important;
    }
</style>
<section class="search-header py-5 mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-4">
                    <img src="{{ asset('public/assets/img/ekyc-logo.png') }}" alt="Logo" class="admin-logo">
                    <h5>VERIFY BEFORE YOU BUY</h5>
                    <h1 class="m-0">DTI CERTIFIED PRODUCTS</h1>
                    <h3>KEEPING YOU SAFE WHEN BUYING ONLINE</h3>
                </div>
                <div class="card search-card">
                    <div class="card-body">
                        <div class="form-group">
                            <div class="col-12">
                                <input type="text" class="form-control" id="search" placeholder="Search ID" value="PROD4400702">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-1 show-info">
                    <div class="col-12 col-md-8">
                        <div class="card h-100">
                            <div class="card-body shadow h-100 d-flex align-items-center">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-12 col-lg-5">
                                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/DTI_Logo_2019.png/1095px-DTI_Logo_2019.png" class="dti_logo" alt="">
                                                <img class="image image-guest" src="http://localhost/dti-main/public/assets/product_image/2_Gaming%20Chair.jpg" alt="image">
                                            </div>
                                            <div class="col-12 col-lg-7 theproductdeatails mt-3 mt-lg-0">
                                                <p><span class="title"></span></p>
                                                <p class="small-label">#<span class="product_id"></span><span class="ms-3 status"></span></p>
                                                <p class="large-label">₱<span class="price"></span></p>
                                                <div class="row">
                                                    <div class="col-12 my-2">
                                                        <p class="label">Category</p>
                                                        <p class="category"></p>
                                                    </div>
                                                    <div class="col-12 my-2">
                                                        <p class="label">Qty</p>
                                                        <p class="qty"></p>
                                                    </div>
                                                    <div class="col-12 my-2">
                                                        <p class="label">Created At</p>
                                                        <p class="date-txt created_at"></p>
                                                    </div>
                                                    <div class="col-12 my-2">
                                                        <p class="label">Expiration</p>
                                                        <p class="date-txt expiration"></p>
                                                    </div>
                                                    <div class="col-12 my-2">
                                                        <p class="label">Description</p>
                                                        <p class="description"></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-body shadow p-0 py-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-block text-center">
                                                    <img src="https://via.placeholder.com/150x300" alt="" class="profile-pic mt-2">
                                                    <div class="seller-info">
                                                        <p class="py-2 name"></p>
                                                        <p><i class="fa-solid fa-mobile-screen-button"></i> <span class="mobile_number"></span></p>
                                                        <p><i class="fa-solid fa-at"></i> <span class="email"></span></p>
                                                        <p><i class="fa-solid fa-location-dot"></i> <span class="address"></span></p>
                                                    </div>
                                                    <div class="seller-info bb mt-3">
                                                        <p class="label">Business Details</p>
                                                        <p><span class="bn"></span></p>
                                                        <p><i class="fa-solid fa-mobile-screen-button"></i> <span class="bpn"></span></p>
                                                        <p><i class="fa-solid fa-location-dot"></i> <span class="ba"></span></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
 <script>
        $('#search').on('keyup',function(){
            var action_url = '{{ route("search.product", ":product") }}';
                action_url = action_url.replace(':product', $(this).val());
            $.ajax({
                url : action_url,
                dataType:"json",
                beforeSend:function(){
                
                },
                success:function(data){
                    $('.show-info').css('display', 'flex');
                    $('.product_id').html(data.product_id);
                    $('.title').html(data.title);
                    $('.image').attr('src',data.image)
                    $('.price').html(data.price);
                    $('.qty').html(data.qty);
                    $('.category').html(data.category);
                    $('.expiration').html(data.expiration);
                    $('.description').html(data.description);
                    $('.created_at').html(data.created_at);
                    if(data.status == 'APPROVED'){
                        $('.status').html('<i class="fa-solid fa-circle-check"></i> DTI Approved');
                    }else{
                        $('.status').html('<i class="fa-solid fa-circle-xmark text-danger"></i> DTI Not Approved');
                    }
                    $('.name').html(data.name);
                    $('.email').html(data.email);
                    $('.mobile_number').html(data.mobile_number);
                    $('.address').html(data.address);
                    $('.bn').html(data.bn);
                    $('.bpn').html(data.bpn);
                    $('.ba').html(data.ba);
                }
            })
        });
</script>

@endsection