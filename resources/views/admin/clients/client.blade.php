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
        <div class="col-12 col-md-12 col-lg- mx-auto text-center">
            <img src="https://via.placeholder.com/150x300" alt="" class="profile-pic my-2 mb-3">
            <h5 class="text-gray-800 font-weight-bold">{{$user->personal_detail->name ?? ''}}</h5>
            <p class="m-0">{{$user->email ?? ''}}</p>
            <p class="m-0">{{$user->personal_detail->mobile_number ?? ''}}</p>
            <button class="btn btn-sm btn-wd mt-2 font-weight-bold {{$user->status === 'APPROVED' ? 'btn-success' : ''}} {{$user->status === 'PENDING' ? 'btn-warning' : ''}} {{$user->status === 'DEACTIVATED' ? 'btn-danger' : ''}}" id="action_status">{{$user->status ?? ''}} <i class="ml-2 far fa-edit"></i></button>
        </div>

        <div class="col-12 col-md-12 col-lg- mx-auto mt-3">
            <div class="row">
                <div class="col-12">
                    <h5 class="title text-center text-sm-left">Personal Details</h5>
                </div>
            </div>
            <div class="row card-row shadow">
                <div class="col-12 col-sm-4 my-2">
                    <div><p class="label">Address</p>{{$user->personal_detail->address ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <div><p class="label">Province</p>{{$user->personal_detail->province->province_description ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <div><p class="label">City</p>{{$user->personal_detail->city->city_municipality_description ?? ''}}</div>
                </div>
            </div>
            <div class="row card-row shadow">
                <div class="col-12 col-sm-4 my-2 mb-3">
                    <div><p class="label">Date of Birth</p>{{$user->personal_detail->dob ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2 mb-3">
                    <div><p class="label">Civil Status</p>{{$user->personal_detail->civil_status ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2 mb-3">
                    <div><p class="label">Citizenship</p>{{$user->personal_detail->citizenship ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <div><p class="label">Source Of Fund</p>{{$user->personal_detail->source_of_fund ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <div><p class="label">Remarks</p>{{$user->remarks ?? ''}}</div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg- mx-auto mt-3">
            <div class="row">
                <div class="col-12">
                    <div class="d-block d-sm-flex justify-content-between align-items-center">
                        <h5 class="title text-center text-sm-left">Business Details</h5>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#permit">View Business Permit</button>
                    </div>
                </div>
            </div>
            <div class="row card-row shadow">
                <div class="col-12 col-sm-4 my-2">
                    <div><p class="label">Business Industry</p>{{$user->business_detail->business_industry ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <div><p class="label">Business Name</p>{{$user->business_detail->business_name ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2">
                    <div><p class="label">Business Phone Numbers</p>{{$user->business_detail->business_phone ?? ''}}</div>
                </div>
            </div>
            <div class="row card-row shadow">
                <div class="col-12 col-sm-4 my-2 mb-3">
                    <div><p class="label">Business Address</p>{{$user->business_detail->business_address ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2 mb-3">
                    <div><p class="label">Province</p>{{$user->business_detail->province->province_description ?? ''}}</div>
                </div>
                <div class="col-12 col-sm-4 my-2 mb-3">
                    <div><p class="label">City</p>{{$user->business_detail->city->city_municipality_description ?? ''}}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg- mx-auto">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                        </div>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user->products()->get() as $product)
                                <tr class='clickable-row' data-href="{{ route('admin.products.show', ['product' => $product->product_id]) }}">
                                    <td class="date-txt">{{$product->product_id ?? ''}}</td>
                                    <td>{{$product->title ?? ''}}</td>
                                    <td>{{$product->category ?? ''}}</td>
                                    <td> <span class="badge  {{$user->status === 'APPROVED' ? 'btn-success' : ''}} {{$user->status === 'PENDING' ? 'btn-warning' : ''}} {{$user->status === 'DEACTIVATED' ? 'btn-danger' : ''}}">{{$product->status ?? ''}}</span></td>
                                    <td class="date-txt">{{$product->created_at ?? ''}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
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
<div class="modal fade" id="permit" tabindex="-1" aria-labelledby="permitLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg  modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="permitLabel">{{$user->business_detail->business_name ?? ''}} Business Permit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="{{ asset('public/assets/business_permit') }}/{{$user->business_detail->business_permit ?? ''}}" alt="" class="w-100">
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