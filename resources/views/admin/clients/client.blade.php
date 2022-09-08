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
            <h5 class="text-gray-800 font-weight-bold">{{$user->personal_detail->name ?? ''}}</h5>
        </div>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="row">Account Status</th>
                        <th>
                            <button class="btn btn-warning btn-sm btn-wd font-weight-bold" id="action_status">{{$user->status ?? ''}}</button>
                        </th>
                    </tr>
                    <tr>
                        <th scope="row">Account Ramarks</th>
                        <th>{{$user->remarks ?? ''}}</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Personal Details</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Name</th>
                        <td>{{$user->personal_detail->name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{$user->email ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Mobile Number</th>
                        <td>{{$user->personal_detail->mobile_number ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Address</th>
                        <td>{{$user->personal_detail->address ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Province</th>
                        <td>{{$user->personal_detail->province->province_description ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">City</th>
                        <td>{{$user->personal_detail->city->city_municipality_description ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Date of Birth</th>
                        <td>{{$user->personal_detail->dob ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Civil Status</th>
                        <td>{{$user->personal_detail->civil_status ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Citizenship</th>
                        <td>{{$user->personal_detail->citizenship ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Source Of Fund</th>
                        <td>{{$user->personal_detail->source_of_fund ?? ''}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Business Details</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">Business Industry</th>
                        <td>{{$user->business_detail->business_industry ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Business Name</th>
                        <td>{{$user->business_detail->business_name ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Business Phone Number</th>
                        <td>{{$user->business_detail->business_phone ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Business Address</th>
                        <td>{{$user->business_detail->business_address ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Province</th>
                        <td>{{$user->business_detail->province->province_description ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">City</th>
                        <td>{{$user->business_detail->city->city_municipality_description ?? ''}}</td>
                    </tr>
                    <tr>
                        <th scope="row">Business Permit</th>
                        <td><a href="{{ asset('public/assets/business_permit') }}/{{$user->business_detail->business_permit ?? ''}}" target="_blank">{{$user->business_detail->business_permit ?? ''}}</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
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
                                @foreach($user->products()->get() as $product)
                                <tr>
                                    <td><a class="btn btn-primary btn-sm text-uppercase" href="{{ route('admin.products.show', ['product' => $product->product_id]) }}">Details</a></td>
                                    <td>{{$product->product_id ?? ''}}</td>
                                    <td>{{$product->title ?? ''}}</td>
                                    <td>{{$product->category ?? ''}}</td>
                                    <td> <span class="badge badge-warning">{{$product->status ?? ''}}</span></td>
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
                                    <option value="PENDING" {{$user->status == 'PENDING' ? 'selected' : '' }}>PENDING</option>
                                    <option value="APPROVED" {{$user->status == 'APPROVED' ? 'selected' : '' }}>APPROVED</option>
                                    <option value="DEACTIVATED" {{$user->status == 'DEACTIVATED' ? 'selected' : '' }}>DEACTIVATED</option>
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="error-status"></strong>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="control-label text-uppercase h6" >ACCOUNT REMARKS </label>
                                <textarea name="remarks" id="remarks" class="form-control">{{$user->remarks ?? ''}}</textarea>
                            </div>
                        </div>
                        
                    </div>
                    <input type="hidden" readonly name="hidden_id" id="hidden_id" value="{{$user->id ?? ''}}"/>
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
    $(document).on('click', '#action_status', function(){
        $('#myModal').modal('show');
        $('#myForm')[0].reset();
        $('.form-control').removeClass('is-invalid');
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