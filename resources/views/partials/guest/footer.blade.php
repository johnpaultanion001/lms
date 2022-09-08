<div id="product" class="product-details">
    <button id="prod-close" style="z-index: 2;"><i class="fa-solid fa-circle-xmark"></i></button>
    <div class="container-fluid g-0">
        <div class="row g-0 h-100">
            <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-9">
                <div class="d-flex justify-content-center align-items-center h-100">
                        <div style="100%">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/DTI_Logo_2019.png/1095px-DTI_Logo_2019.png" class="dti_logo_img" alt="">
                            <img src="https://i.imgur.com/sk5VTNb.jpg" class="prod-image" style="width: 90vh !important;" alt="">
                            <h6 class="product_id_img" style=""></h6>
                        </div>
                        
                </div>
                
            </div>
            
            <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
                <div class="description-bar h-100">
                    <div class="details-cont p-4">
                        <h1 class="name"></h1>
                        <p class="price"></p>
                        <p class="location ellipsis"></p>
                        <p class="dti_approved"></p>
                        <p class="description ft-14"></p>
                        <div class="seller br-top pt-3 mt-3">
                            <p class="mb-2"><b>Seller Information</b></p>
                            <div class="d-flex">
                                <img src="https://i.imgur.com/sk5VTNb.jpg" class="prod-image rounded-circle" alt="">
                                <div class="px-2">
                                    <p class="ft-14 seller_name"><b>Juan Dela Cruz</b></p>
                                    <p class="dti_approved"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="message-now br-top py-3 px-4">
                        <p class="mb-2 ft-14"><i class="fa-brands fa-facebook-messenger"></i> Send seller a message</p>
                        <button id="show-msg" class="btn btn-submit w-100">Message</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="chat-box">
    <div class="chat-head py-2 px-2">
        <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
                <img src="https://i.imgur.com/sk5VTNb.jpg" class="prod-image rounded-circle" alt="">
                <p class="ft-14 px-2 seller_name"><b>Juan Dela Cruz</b></p>
                <p class="verified-badge ft-14"><i class="fa-solid fa-circle-check"></i></p>
            </div>
            <button id="chat-close" class="justify-self-end"><i class="fa-solid fa-xmark"></i></button>
        </div>
    </div>
    <div class="chat-body py-3 px-3">
            <div class="d-flex message-right justify-content-end">
            <p id="the-msg"></p>
            <img src="https://i.imgur.com/lPsEhkg.jpg" class="rounded-circle" alt="">
        </div>
        <div class="d-flex message-left">
            <img src="https://i.imgur.com/sk5VTNb.jpg" class="prod-image rounded-circle" alt="">
            <p>it's still available</p>
        </div>
        <div class="msg-payment">
            <em>Payment made easy with UnionBank</em>
            <a href="{{ route('unionbank') }}" class="btn btn-payment mb-2">Pay via UnionBank</a>
            <a href="#" class="btn btn-payment2 mb-1">Pay via Cash</a>
            <a href="#" class="btn btn-payment3 mb-1">Report a Problem</a>
        </div>
    </div>
    <div class="chat-footer py-3 px-3">
        <form id="chat-input" class="d-flex align-items-center">
            <i class="fa-solid fa-circle-plus pe-1"></i> <input type="text" class="msg-input" placeholder="Aa"> <i class="fa-solid fa-thumbs-up ps-1"></i>
        </form>
    </div>
</div>
