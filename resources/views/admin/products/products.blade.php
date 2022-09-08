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

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="m-0 font-weight-bold text-primary">Product</h6>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-primary" id="create_button">Add Product</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Product ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Created At</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td><a class="btn btn-primary btn-sm text-uppercase" href="{{ route('admin.products.show', ['product' => $product->product_id]) }}">Details</a></td>
                            <td>{{$product->product_id ?? ''}}</td>
                            <td>{{$product->title ?? ''}}</td>
                            <td>{{$product->category ?? ''}}</td>
                            <td> <span class="badge  
                                    @if($product->status == 'PENDING')
                                        badge-warning 
                                    @elseif($product->status == 'APPROVED')
                                        badge-primary
                                    @endif">
                                        {{$product->status ?? ''}}
                                 </span></td>
                            <td>{{$product->created_at ?? ''}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th></th>
                            <th>Product ID</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Created At</th>
                        </tr>
                    </tfoot>
                </table>
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
                    <p class="modal-title  text-uppercase font-weight-bold">PRODUCT</p>
                    <button type="button" class="close " data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase h6" >Title: <span class="text-danger">*</span></label>
                                <input type="text" name="title" id="title" class="form-control" value="CCTV">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-title"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase h6" >Category: <span class="text-danger">*</span></label>
                                <select name="category" id="category" class="form-control select2" style="width: 100%;">
                                    <option value="Appliances">Appliances</option>
                                    <option value="Household">Household</option>
                                    <option value="Mobile Phone">Mobile Phone</option>
                                    <option value="Computer Item" selected>Computer Item</option>
                                    <option value="Food Item">Food Item</option>
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-category"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase h6" >Qty: <span class="text-danger">*</span></label>
                                <input type="number" name="qty" id="qty" class="form-control" value="50">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-qty"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase h6" >Price: <span class="text-danger">*</span></label>
                                <input type="number" name="price" id="price" class="form-control" value="560">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-price"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase h6" >Expiration:</label>
                                <input type="date" name="expiration" id="expiration" class="form-control">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-expiration"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="control-label text-uppercase h6" >Image: <span class="text-danger">*</span></label>
                                <input type="file" name="image" id="image" class="form-control">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-image"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label text-uppercase h6" >Description:</label>
                                <textarea name="description" id="description" class="form-control">For testing</textarea>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-description"></strong>
                                </span>
                            </div>
                        </div>
                        
                        
                    </div>
                    <input type="hidden" readonly name="hidden_id" id="hidden_id" />
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
<script>
$(document).ready(function(){
    $(document).on('click', '#create_button', function(){
        $('#myModal').modal('show');
        $('#myForm')[0].reset();
        $('.form-control').removeClass('is-invalid');
    });
    $('#myForm').on('submit', function(event){
        event.preventDefault();
        $('.form-control').removeClass('is-invalid')
        
        var action_url = '{{ route("admin.products.store") }}';
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
                if(data.errors){
                    $.each(data.errors, function(key,value){
                        if(key == $('#'+key).attr('id')){
                            $('#'+key).addClass('is-invalid')
                            $('#error-'+key).text(value)
                        }
                    })
                }
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