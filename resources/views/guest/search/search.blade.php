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
                                    <div class="col-md-6">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <th scope="col">Product Details</th>
                                                <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Product Id</th>
                                                    <th class="product_id"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Image</th>
                                                    <th>
                                                        <img class="image" src="" alt="image" width="200" height="200" >
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Title</th>
                                                    <th class="title"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Price</th>
                                                    <th class="price"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Qty</th>
                                                    <th class="qty"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Category</th>
                                                    <th class="category"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Expiration</th>
                                                    <th class="expiration"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Description</th>
                                                    <th class="description"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Created At</th>
                                                    <th class="created_at"></th>
                                                </tr>
                                                <tr>
                                                    <div class="row">
                                                        <th scope="row">Status</th>
                                                        <th class="status">
                                                            
                                                        </th>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-6">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                <th scope="col">Owner Details / Business Details</th>
                                                <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">Name</th>
                                                    <th class="name"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Email</th>
                                                    <th class="email"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Mobile Number</th>
                                                    <th class="mobile_number"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Address</th>
                                                    <th class="address"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row"></th>
                                                    <th></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Business Name</th>
                                                    <th class="bn"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Business Phone Number</th>
                                                    <th class="bpn"></th>
                                                </tr>
                                                <tr>
                                                    <th scope="row">Business Address</th>
                                                    <th class="ba"></th>
                                                </tr>
                                            </tbody>
                                        </table>
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