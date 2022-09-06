@extends('layouts.admin')
@section('styles')
<style>
    .modal-content .modal-footer {
        border-top: none;
        padding-right: 24px;
        padding-bottom: 16px;
        padding-left: 24px;
        -webkit-justify-content: space-between;
        /* Safari 6.1+ */
        justify-content: space-between;
    }
    .select2{
            display: block;
            width: 100%;
            height: calc(1.5em + 0.75rem + 2px);
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #6e707e;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #d1d3e2;
            border-radius: 0.35rem;
            transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
    .select2-container--default .select2-selection--single {
        border: 0px solid #aaa !important;
    }
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 text-center m-2">
            <h5 class="text-gray-800 font-weight-bold">Product Details</h5>
        </div>
        <div class="col-md-12">
        
            <table class="table table-striped">
                
                <tbody>
                    <tr>
                        <th scope="row">Product Id</th>
                        <th>
                            
                            <h6 id="qrtext">{{$product->product_id ?? ''}}</h6>
                            <div id="qrcode"></div>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <th>
                            <button class="btn btn-sm btn-wd font-weight-bold
                            @if($product->status == 'PENDING')
                                    btn-warning
                            @elseif($product->status == 'APPROVED')
                                    btn-primary
                            @endif" id="action_status">{{$product->status ?? ''}}</button>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Image</th>
                        <th>
                            <img id="image_product" src="{{ asset('public/assets/product_image') }}/{{$product->image ?? ''}}" alt="{{$product->image ?? ''}}" width="100" height="100" >
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Title</th>
                        <th>
                                {{$product->title ?? ''}}
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Price</th>
                        <th>
                                {{$product->price ?? ''}}
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Qty</th>
                        <th>
                                {{$product->qty ?? ''}}
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Category</th>
                        <th>
                                {{$product->category ?? ''}}
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Expiration</th>
                        <th>
                                {{$product->expiration ?? ''}}
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Description</th>
                        <th>
                                {{$product->description ?? ''}}
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Created At</th>
                        <th>
                                {{$product->created_at ?? ''}}
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<form method="post" id="myForm" class="form-horizontal ">
    @csrf
    <div class="modal" id="myModal" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg  modal-dialog-centered ">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header ">
                    <p class="modal-title  text-uppercase font-weight-bold">SET STATUS</p>
                    <button type="button" class="close " data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label text-uppercase h6" >STATUS: <span class="text-danger">*</span></label>
                                <select name="status" id="status" class="form-control select2" style="width: 100%;">
                                    <option value="PENDING" {{$product->status == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                                    <option value="APPROVED" {{$product->status == 'APPROVED' ? 'selected' : '' }}>APPROVED</option>
                                    <option value="DECLINED" {{$product->status == 'DECLINED' ? 'selected' : '' }}>DECLINED</option>
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-status"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label text-uppercase h6" >PRODUCT REMARKS </label>
                                <textarea name="remarks" id="remarks" class="form-control"></textarea>
                            </div>
                        </div>
                        
                    </div>
                    <input type="hidden" readonly name="hidden_id" id="hidden_id" value="{{$product->id ?? ''}}"/>
                </div>
        
                <!-- Modal footer -->
                <div class="modal-footer bg-white">
                    <button type="button" class="btn btn-secondary text-uppercase" data-dismiss="modal">Close</button>
                    <input type="submit" name="action_button" id="action_button" class="text-uppercase btn btn-primary" value="SUBMIT" />
                </div>
        
            </div>
        </div>
    </div>
</form>
@endsection
@section('scripts')
<script src="{{ asset('public/assets/js/jquery.watermark.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/js/qrcode.min.js') }}" type="text/javascript"></script>
<script>
$(document).ready(function(){
    $(document).on('click', '#action_status', function(){
        var img = $('#image_product').attr('src');
        var qrtext = $('#qrtext').text();
        
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: qrtext,
            width: 128,
            height: 128,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });

        
        


    });
    $('#myForm').on('submit', function(event){
        event.preventDefault();
        $('.form-control').removeClass('is-invalid')
        
        var action_url = '{{ route("admin.client", ":user") }}';
            action_url = action_url.replace(':user', $('#hidden_id').val());

        var type = "POST";

        $.ajax({
            url: action_url,
            method:type,
            data:  new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType:"json",

            beforeSend:function(){
                $("#action_button").attr("disabled", true);
            },
            success:function(data){
                $("#action_button").attr("disabled", false);
                
                if(data.success){
                    $.confirm({
                        title: data.success,
                        content: "",
                        type: 'green',
                        buttons: {
                            confirm: {
                                text: '',
                                btnClass: 'btn-green',
                                keys: ['enter', 'shift'],
                                action: function(){
                                    location.reload();
                                }
                            },
                        }
                    });
                }
                
            }
        });
    });
});
</script>
@endsection