        <div id="product" class="product-details">
            <button id="prod-close"><i class="fa-solid fa-circle-xmark"></i></button>
            <div class="container-fluid g-0">
                <div class="row g-0 h-100">
                    <div class="col-12 col-sm-12 col-md-7 col-lg-8 col-xl-9">
                        <div class="d-flex justify-content-center align-items-center h-100">
                            <img src="https://i.imgur.com/sk5VTNb.jpg" class="prod-image d-block mx-auto" alt="">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-5 col-lg-4 col-xl-3">
                        <div class="description-bar h-100">
                            <div class="details-cont p-4">
                                <h1 class="name"></h1>
                                <p class="price"></p>
                                <p class="location ellipsis"></p>
                                <p class="verified-badge ft-14 my-3"><i class="fa-solid fa-circle-check"></i> DTI approved</p>
                                <p class="description ft-14"></p>
                                <div class="seller br-top pt-3 mt-3">
                                    <p class="mb-2"><b>Seller Information</b></p>
                                    <div class="d-flex">
                                        <img src="https://i.imgur.com/sk5VTNb.jpg" class="rounded-circle" alt="">
                                        <div class="px-2">
                                            <p class="ft-14"><b>Juan Dela Cruz</b></p>
                                            <p class="verified-badge ft-14"><i class="fa-solid fa-circle-check"></i> DTI approved</p>
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
                        <img src="https://i.imgur.com/sk5VTNb.jpg" class="rounded-circle" alt="">
                        <p class="ft-14 px-2"><b>Juan Dela Cruz</b></p>
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
                    <img src="https://i.imgur.com/sk5VTNb.jpg" class="rounded-circle" alt="">
                    <p>it's still available</p>
                </div>
                <div class="msg-payment">
                    <em>Payment made easy with UnionBank</em>
                    <a href="unionbank.php" class="btn btn-payment mb-2">Pay via UnionBank</a>
                    <a href="#" class="btn btn-payment2 mb-1">Pay via Cash</a>
                </div>
            </div>
            <div class="chat-footer py-3 px-3">
                <form id="chat-input" class="d-flex align-items-center">
                    <i class="fa-solid fa-circle-plus pe-1"></i> <input type="text" class="msg-input" placeholder="Aa"> <i class="fa-solid fa-thumbs-up ps-1"></i>
                </form>
            </div>
        </div>
    </body>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.min.js"></script>
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
            $('#product').find(".name").html(name);
            $('#product').find(".price").html(price);
            $('#product').find(".location").html(location);
            $('#product').find(".description").html(desc);
            $('#product').find(".prod-image").attr('src', img);
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
</html>