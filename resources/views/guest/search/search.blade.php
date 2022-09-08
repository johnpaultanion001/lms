@extends('layouts.guest')

@section('content')
<div class="container-fluid g-0">
    <div class="row g-0 h-100">
       
        <div class="col-12 col-sm-7 col-md-9 col-lg-9 col-xl-9 col-xxl-10 mx-auto">
            <div class="content px-4 py-4 py-sm-5">
                    <div class="row g-1">
                        <div class="col px-2">
                            <h2>Search product ID</h2>
                        </div>
                    </div>
                    <div class="row g-1 py-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="col-12">
                                        <input type="text" class="form-control" id="search" placeholder="Search ID" >
                                    </div>
                                </div>
                            </div>
                        </div>
                       <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-6">
                                                <img class="image image-guest" src="http://localhost/dti-main/public/assets/product_image/2_Gaming%20Chair.jpg" alt="image">
                                            </div>
                                            <div class="col-6">
                                                <p class="product_id"></p>
                                                <p class="title"></p>
                                                <p class="status"></p>
                                                <p>₱<span class="price"></span></p>
                                                <div class="row">
                                                    <div class="col-12 col-md-6 my-2">
                                                        <p class="label">Qty</p>
                                                        <p class="qty"></p>
                                                    </div>
                                                    <div class="col-12 col-md-6 my-2">
                                                        <p class="label">Category</p>
                                                        <p class="category"></p>
                                                    </div>
                                                    <div class="col-12 col-md-6 my-2">
                                                        <p class="label">Created At</p>
                                                        <p class="created_at"></p>
                                                    </div>
                                                    <div class="col-12 col-md-6 my-2">
                                                        <p class="label">Expiration</p>
                                                        <p class="expiration"></p>
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
                       <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <h5>Owner Details / Business Details</h5>
                                            </div>
                                            <div class="col-12 col-md-4 my-2">
                                                <p class="label">Name</p>
                                                <p class="name"></p>
                                            </div>
                                            <div class="col-12 col-md-4 my-2">
                                                <p class="label">Email</p>
                                                <p class="email"></p>
                                            </div>
                                            <div class="col-12 col-md-4 my-2">
                                                <p class="label">Mobile Number</p>
                                                <p class="mobile_number"></p>
                                            </div>
                                            <div class="col-12 col-md-12 my-2">
                                                <p class="label">Address</p>
                                                <p class="address"></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-4 my-2">
                                                <p class="label">Business Name</p>
                                                <p class="bn"></p>
                                            </div>
                                            <div class="col-12 col-md-4 my-2">
                                                <p class="label">Business Phone Number</p>
                                                <p class="bpn"></p>
                                            </div>
                                            <div class="col-12 col-md-4 my-2">
                                                <p class="label">Business Address</p>
                                                <p class="ba"></p>
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
        })
</script>

@endsection