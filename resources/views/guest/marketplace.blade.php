@extends('layouts.guest')
@section('styles')
<style>
    .product_id {
        bottom: 0;
        position: absolute;
        text-align: center;
        width: 100%;
        color: white;
        background-color: blue;
        border: 1px solid blue;
    }
    .product_id_img {
        text-align: center;
        width: 100%;
        color: white;
        background-color: blue;
        border: 1px solid blue;
    }
    .dti_logo_img{
        position: absolute;
        width: 50px !important;
        height: 50px !important;
        object-fit: scale-down !important;
    }
    .dti_logo{
        position: absolute;
        right: 0;
        width: 50px !important;
        height: 50px !important;
        object-fit: scale-down !important;
    }
    
</style>
@endsection
@section('content')
<div class="container-fluid g-0">
    <div class="row g-0 h-100">
        <div class="col-12 col-sm-5 col-md-3 col-xxl-2">
            @include('partials.guest.sidebar')
        </div>
        <div class="col-12 col-sm-7 col-md-9 col-lg-9 col-xl-9 col-xxl-10">
            <div class="content px-4 py-4 py-sm-5">
                <div>
                    <div class="row g-1">
                        <div class="col px-2">
                            <h2>Today's picks</h2>
                        </div>
                    </div>
                    <div class="row g-1 py-2">
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <a href="javascript:void(0)" class="prod-btn">
                                <div class="product p-2">
                                    <div class="img-cont mb-2">
                                        <div class="img">
                                            <img src="https://i.imgur.com/sk5VTNb.jpg" class="prod-img" alt="">
                                        </div>
                                        <p class="dti_approved"></p>
                                    </div>
                                    <p class="seller_name d-none d-none">Juan Dela Cruz</p>
                                    <p class="price">$1000</p>
                                    <p class="name ellipsis">iPhone 13 64GB Factory Unlocked</p>
                                    <p class="location ellipsis">Quezon City, National Capital Region</p>
                                    <p class="desc">
                                        iPhone 11 Pro Max No Power due to Over Charged(Full Shorted) 100% Fixed!<br>
                                        iPhone 12 Cracked Glass (Reglass) Retained Lcd Orig 100% Back to Original!<br>
                                        iPhone 8 Plus Lcd and Housing Replacement!<br>
                                        iPhone Technician Here👋 We Have Shop at Greehills Mall! Legitness Visit My timeline  to See my work and feedbacks!<br>
                                        Shop address: Greenhills Shopping Center San  Juan City<br>
                                        ☎️: 09087128999<br>
                                        Check my Timeline for legitimacy and feedbacks😇<br>
                                        Legit Technician Since 2015😊<br>
                                        Please visit, like and share our page for more information and stories!<br>
                                        👍 Meet Up Repair Will Do Also<br>
                                        👍Home Service within (MetroManila)<br>
                                        👍Madaling Kausap<br>
                                        👍Di Pangit Kabonding<br>
                                        👍All Prices Are Negotiable<br>
                                        👍All Parts Have a Warranty<br>
                                        👍Very Responsive Tech<br>
                                        #reliabletech<br>
                                        #trustworthytech<br>
                                        #highqualityparts<br>
                                        #highqualityServices<br>
                                        #nofixnopaypolicy!<br>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <a href="javascript:void(0)" class="prod-btn">
                                <div class="product p-2">
                                    <div class="img-cont mb-2">
                                        <div class="img">
                                            <img src="https://i.imgur.com/VoA0FiL.jpg" class="prod-img" alt="">
                                        </div>
                                    <p class="dti_approved"></p>
                                    </div>
                                    <p class="seller_name d-none">Juan Dela Cruz</p>
                                    <p class="price">$5000</p>
                                    <p class="name ellipsis">Redmi note 8pro 6/128 gb</p>
                                    <p class="location ellipsis">Makati City, National Capital Region</p>
                                    <p class="desc">
                                        For sale or swap sa lower unit.. <br>
                                        pre add cash ka <br>
                                        Pass sa add ako <br>
                                        Pass sa straight swap<br>
                                        6/128gb <br>
                                        Gaming unit and good for selfie… <br>
                                        Pm sa interested….<br>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <a href="javascript:void(0)" class="prod-btn">
                                <div class="product p-2">
                                    <div class="img-cont mb-2">
                                        <div class="img">
                                            <img src="https://i.imgur.com/6Ovc8gx.jpg" class="prod-img" alt="">
                                        </div>
                                    <p class="dti_approved"></p>
                                    </div>
                                    <p class="seller_name d-none">Juan Dela Cruz</p>
                                    <p class="price">$2000</p>
                                    <p class="name ellipsis">iPhone 12</p>
                                    <p class="location ellipsis">Mandaluyong, National Capital Region</p>
                                    <p class="desc">
                                        Gaming unit and good for selfie… <br>
                                        Pm sa interested….<br>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <a href="javascript:void(0)" class="prod-btn">
                                <div class="product p-2">
                                    <div class="img-cont mb-2">
                                        <div class="img">
                                            <img src="https://i.imgur.com/CVeNNdk.jpg" class="prod-img" alt="">
                                        </div>
                                    <p class="dti_approved"></p>
                                    </div>
                                    <p class="seller_name d-none">Juan Dela Cruz</p>
                                    <p class="price">$3000</p>
                                    <p class="name ellipsis">1995 Mitsubishi</p>
                                    <p class="location ellipsis">Plaridel, National Capital Region</p>
                                    <p class="desc">
                                        For sale or swap sa lower unit.. <br>
                                        pre add cash ka <br>
                                        Pass sa add ako <br>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <a href="javascript:void(0)" class="prod-btn">
                                <div class="product p-2">
                                    <div class="img-cont mb-2">
                                        <div class="img">
                                            <img src="https://i.imgur.com/sk5VTNb.jpg" class="prod-img" alt="">
                                        </div>
                                    <p class="dti_approved"></p>
                                    </div>
                                    <p class="seller_name d-none">Juan Dela Cruz</p>
                                    <p class="price">$1000</p>
                                    <p class="name ellipsis">iPhone 13 64GB Factory Unlocked</p>
                                    <p class="location ellipsis">Quezon City, National Capital Region</p>
                                    <p class="desc">
                                        iPhone 11 Pro Max No Power due to Over Charged(Full Shorted) 100% Fixed!<br>
                                        iPhone 12 Cracked Glass (Reglass) Retained Lcd Orig 100% Back to Original!<br>
                                        iPhone 8 Plus Lcd and Housing Replacement!<br>
                                        iPhone Technician Here👋 We Have Shop at Greehills Mall! Legitness Visit My timeline  to See my work and feedbacks!<br>
                                        Shop address: Greenhills Shopping Center San  Juan City<br>
                                        ☎️: 09087128999<br>
                                        Check my Timeline for legitimacy and feedbacks😇<br>
                                        Legit Technician Since 2015😊<br>
                                        Please visit, like and share our page for more information and stories!<br>
                                        👍 Meet Up Repair Will Do Also<br>
                                        👍Home Service within (MetroManila)<br>
                                        👍Madaling Kausap<br>
                                        👍Di Pangit Kabonding<br>
                                        👍All Prices Are Negotiable<br>
                                        👍All Parts Have a Warranty<br>
                                        👍Very Responsive Tech<br>
                                        #reliabletech<br>
                                        #trustworthytech<br>
                                        #highqualityparts<br>
                                        #highqualityServices<br>
                                        #nofixnopaypolicy!<br>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <a href="javascript:void(0)" class="prod-btn">
                                <div class="product p-2">
                                    <div class="img-cont mb-2">
                                        <div class="img">
                                            <img src="https://i.imgur.com/VoA0FiL.jpg" class="prod-img" alt="">
                                        </div>
                                    <p class="dti_approved"></p>
                                    </div>
                                    <p class="seller_name d-none">Juan Dela Cruz</p>
                                    <p class="price">$5000</p>
                                    <p class="name ellipsis">Redmi note 8pro 6/128 gb</p>
                                    <p class="location ellipsis">Makati City, National Capital Region</p>
                                    <p class="desc">
                                        For sale or swap sa lower unit.. <br>
                                        pre add cash ka <br>
                                        Pass sa add ako <br>
                                        Pass sa straight swap<br>
                                        6/128gb <br>
                                        Gaming unit and good for selfie… <br>
                                        Pm sa interested….<br>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <a href="javascript:void(0)" class="prod-btn">
                                <div class="product p-2">
                                    <div class="img-cont mb-2">
                                        <div class="img">
                                            <img src="https://i.imgur.com/6Ovc8gx.jpg" class="prod-img" alt="">
                                        </div>
                                    <p class="dti_approved"></p>
                                    </div>
                                    <p class="seller_name d-none">Juan Dela Cruz</p>
                                    <p class="price">$2000</p>
                                    <p class="name ellipsis">iPhone 12</p>
                                    <p class="location ellipsis">Mandaluyong, National Capital Region</p>
                                    <p class="desc">
                                        Gaming unit and good for selfie… <br>
                                        Pm sa interested….<br>
                                    </p>
                                </div>
                            </a>
                        </div>
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <a href="javascript:void(0)" class="prod-btn">
                                <div class="product p-2">
                                    <div class="img-cont mb-2">
                                        <div class="img">
                                            <img src="https://i.imgur.com/CVeNNdk.jpg" class="prod-img" alt="">
                                        </div>
                                    </div>
                                    <p class="dti_approved"></p>
                                    <p class="seller_name d-none">Juan Dela Cruz</p>
                                    <p class="price">$3000</p>
                                    <p class="name ellipsis">1995 Mitsubishi</p>
                                    <p class="location ellipsis">Plaridel, National Capital Region</p>
                                    <p class="desc">
                                        For sale or swap sa lower unit.. <br>
                                        pre add cash ka <br>
                                        Pass sa add ako <br>
                                    </p>
                                </div>
                            </a>
                        </div>
                        @foreach($products as $product)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xxl-2">
                            <a href="javascript:void(0)" class="prod-btn">
                                <div class="product p-2">
                                    <div class="img-cont mb-2">
                                        
                                        <div class="img">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/DTI_Logo_2019.png/1095px-DTI_Logo_2019.png" class="dti_logo" alt="">
                                            <img src="{{ asset('public/assets/product_image') }}/{{$product->image ?? ''}}" class="prod-img" alt="">
                                            <h6 class="product_id">{{$product->product_id}}</h6>
                                        </div>
                                    </div>
                                    <p class="verified-badge ft-14 dti_approved"><i class="fa-solid fa-circle-check"></i> DTI Approved</p>
                                    <p class="seller_name d-none">{{$product->user->business_detail->business_name ?? ''}}</p>
                                    <p class="price">${{$product->price ?? ''}}</p>
                                    <p class="name ellipsis">{{$product->title ?? ''}}</p>
                                    <p class="location ellipsis">{{$product->user->personal_detail->city->city_municipality_description ?? ''}}, {{$product->user->personal_detail->province->province_description ?? ''}}</p>
                                    <p class="desc">
                                        For sale or swap sa lower unit.. <br>
                                        pre add cash ka <br>
                                        Pass sa add ako <br>
                                    </p>
                                    
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>   
    </div>
</div>

@endsection
@section('scripts')
 <script>
        //Marketplace mobile toggle
        $('#sidebar-menu').click(function(){
            $(".sidebar-toggle").toggle();
        });
        //Clone product details from Marketplace.php to Product Modal
        $('.prod-btn').click(function(){
            var name = $(this).find(".name").html();
            var price = $(this).find(".price").html();
            var location = $(this).find(".location").html();
            var desc = $(this).find(".desc").html();
            var img = $(this).find(".prod-img").attr('src');
            var seller_name = $(this).find(".seller_name").html();
            var dti_approved = $(this).find(".dti_approved").html();
            var product_id = $(this).find(".product_id").html();
            

            $('#product').find(".name").html(name);
            $('#product').find(".seller_name").html(seller_name);
            $('#product').find(".price").html(price);
            $('#product').find(".location").html(location);
            $('#product').find(".description").html(desc);
            $('#product').find(".dti_approved").html(dti_approved);
            $('#product').find(".prod-image").attr('src', img);
            $('#product').find(".product_id_img").html(product_id);
            if(dti_approved == ""){
                $('#product').find(".dti_logo_img").addClass('d-none');
                $('#product').find(".product_id_img").addClass('d-none');
            }else{
                $('#product').find(".dti_logo_img").removeClass('d-none');
                $('#product').find(".product_id_img").removeClass('d-none');
            }
            

            $('.chat-box').find(".seller_name").html(seller_name);
            $('.chat-box').find(".prod-image").attr('src', img);

            $('#product').toggle();
        });
        $('#chat-input').submit(function(e){
            var message = $('.msg-input').val();
            e.preventDefault();
            $('#the-msg').html(message);
            $('.msg-input').val("");
            $('.message-right p, .message-right img').show(0);
            $('.message-left p, .message-left img').delay(1500).show(0);
            $('.msg-payment').delay(2500).show(0);
        });
        $('#prod-close').click(function(){
            $('#product').toggle();
        });
        $('#show-msg').click(function(){
            $('.chat-box').show();
            $('.chat-body').show();
            $('.chat-footer').show();
        });
        $('#chat-close').click(function(){
            $('.chat-box').hide();
        });
        $('.chat-head').click(function(){
            $('.chat-body').toggle();
            $('.chat-footer').toggle();
        });
</script>

@endsection