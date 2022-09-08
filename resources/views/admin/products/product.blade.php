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
    .dti_logo_img{
        position: absolute;
        width: 50px !important;
        height: 50px !important;
        object-fit: scale-down !important;
    }
    
    
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-12 col-lg- mx-auto text-center text-align-center">
                @if($product->status === 'APPROVED')
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/14/DTI_Logo_2019.png/1095px-DTI_Logo_2019.png" class="dti_logo_img" alt="">
                @endif
                <img id="image_product" class="my-2 mb-3" src="{{ asset('public/assets/product_image') }}/{{$product->image ?? ''}}" alt="{{$product->image ?? ''}}">
                <h5 class="text-gray-800 font-weight-bold">{{$product->title ?? ''}}</h5>
                <button class="btn btn-sm btn-wd mt-2 font-weight-bold {{$product->status === 'APPROVED' ? 'btn-success' : ''}} {{$product->status === 'PENDING' ? 'btn-warning' : ''}} {{$product->status === 'DEACTIVATED' ? 'btn-danger' : ''}}" id="action_status">{{$product->status ?? ''}} <i class="ml-2 far fa-edit"></i></button>
                @if($product->status === 'APPROVED')
                    <a href="{{ asset('public/assets/download_product') }}/{{$product->id ?? ''}}.png" download class="btn btn-sm btn-wd mt-2 font-weight-bold btn-primary">Download Product</a>
                @endif
        </div>
        <div class="col-12 col-md-12 col-lg- mx-auto mt-3">
            <div class="row">
                <div class="col-12">
                    <h5 class="title text-center text-sm-left">Product Details</h5>
                </div>
            </div>
            <div class="row card-row shadow">
                <div class="col-12 col-sm-4 my-2">
                    <div><p class="label">Product Id</p>{{$product->product_id ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <div><p class="label">Price</p>{{$product->price ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <div><p class="label">QTY</p>{{$product->qty ?? ''}}</div>
                </div>
            </div>
            <div class="row card-row shadow">
                <div class="col-12 col-sm-4 my-2 mb-3">
                    <div><p class="label">Category</p>{{$product->category ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2 mb-3">
                    <div><p class="label">Expiration</p>{{$product->expiration ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2 mb-3">
                    <div><p class="label">Created At</p>{{$product->created_at ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-12 my-2">
                    <div><p class="label">Description</p>{{$product->description ?? ''}}</div>
                </div>
            </div>
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
        $('#myModal').modal('show');
        $('#myForm')[0].reset();
        $('.form-control').removeClass('is-invalid');

    });
    $('#myForm').on('submit', function(event){
        event.preventDefault();
        $('.form-control').removeClass('is-invalid')
        
        var action_url = '{{ route("admin.product", ":product") }}';
            action_url = action_url.replace(':product', $('#hidden_id').val());

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