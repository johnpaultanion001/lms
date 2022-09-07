@extends('layouts.guest')
@section('styles')
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
                    <div class="row g-1 py-2">
                        <div class="col-12 col-lg-8 mx-auto">
                            <div class="create-card">
                                <div class="row">
                                    <div class="col-12 mx-auto mb-2">
                                        <h2>Create new listing</h2>
                                    </div>
                                    <div class="col-12 mx-auto">
                                        <form method="post" id="myForm" class="form-horizontal ">
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label class="control-label h6" >Title: <span class="text-danger">*</span></label>
                                                    <input class="form-control form-control-lg" id="title" name="title" type="text" placeholder="Title" value="CCTV">
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label class="control-label h6" >Cetegory: <span class="text-danger">*</span></label>
                                                    <select name="category" id="category" class="form-select form-select-lg">
                                                        <option value="Appliances">Appliances</option>
                                                        <option value="Computer Item">Computer Item</option>
                                                        <option value="Household">Household</option>
                                                        <option value="Electronic Item" selected>Electronic Item</option>
                                                        <option value="Mobile Phone">Mobile Phone</option>
                                                        <option value="Food Item">Food Item</option>
                                                    </select>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <label class="control-label h6" >Condition: <span class="text-danger">*</span></label>
                                                    <select name="condition" id="condition" class="form-select form-select-lg">
                                                        <option value="New" selected>New</option>
                                                        <option value="Used - Like New">Used - Like New</option>
                                                        <option value="Used - Good">Used - Good</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <label class="control-label h6" >Description: </label>
                                                    <textarea class="form-control" rows="5" placeholder="Description" id="description" name="description"></textarea>
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <label class="control-label h6" >Price: <span class="text-danger">*</span></label>
                                                    <input class="form-control form-control-lg" type="number" id="price" name="price" placeholder="Price" value="1050">
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <label class="control-label h6" >Qty: <span class="text-danger">*</span></label>
                                                    <input class="form-control form-control-lg" type="number" id="qty" name="qty" placeholder="Qty" value="100">
                                                </div>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <label class="control-label h6" >Expiration: </label>
                                                    <input class="form-control form-control-lg" id="expiration" name="expiration" type="date">
                                                </div>
                                                <div class="col-12">
                                                    <input class="form-control form-control-lg" id="image" name="image" type="file">
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit"  class="btn btn-submit w-100" id="action_button">Submit</button>
                                                </div>
                                            </div>
                                        </form>
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
   $('#myForm').on('submit', function(event){
        event.preventDefault();
        $('.form-control').removeClass('is-invalid')
        
        var action_url = '{{ route("marketplace.create") }}';
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
</script>
@endsection