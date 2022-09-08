@extends('layouts.admin')
@section('styles')
    <link href="{{ asset('public/assets/wizard/paper-bootstrap-wizard.css') }}" rel="stylesheet" />
    <style>
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
    <!-- Content Row -->
    <div class="wizard-container">
        <div class="card wizard-card" data-color="blue" id="wizardProfile">
            <form id="myForm" method="post">
                @csrf
                <div class="wizard-header text-center">
                    <h3 class="wizard-title font-weight-bold">REGISTRATION PROCESS</h3>
                    @if(auth()->user()->isSubmit == 1)
                        @if(auth()->user()->status == 'PENDING')
                            <h5 class="text-success mt-2">* Wait for the admin responce to verify your account.</h5>
                        @elseif(auth()->user()->status == 'APPROVED')
                            <h5 class="text-success mt-2">{{auth()->user->remarks ?? ''}}</h5>
                        @elseif(auth()->user()->status == 'DEACTIVATED')
                            <h5 class="text-success mt-2">{{auth()->user->remarks ?? ''}}</h5>
                        @endif
                    @endif
                </div>
                <div class="wizard-navigation">
                    <div class="progress-with-circle">
                        <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                    </div>
                    <ul>
                        <li class="{{auth()->user()->reg_step == 'STEP1' ? 'active':''}}" id="nav_step1">
                            <a href="#step1" data-toggle="tab">
                                <div class="icon-circle">
                                    <i class="fas fa-user fa-sm"></i>
                                </div>
                                
                            </a>
                        </li>
                        <li class="{{auth()->user()->reg_step == 'STEP2' ? 'active':''}}" id="nav_step2">
                            <a href="#step2" data-toggle="tab">
                                <div class="icon-circle">
                                    <i class="fas fa-building fa-sm "></i>
                                </div>
                                
                            </a>
                        </li>
                        <li class="{{auth()->user()->reg_step == 'STEP3' ? 'active':''}}" id="nav_step3">
                            <a href="#step3" data-toggle="tab">
                                <div class="icon-circle">
                                    <i class="fas fa-file fa-sm"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                    <div class="tab-pane {{auth()->user()->reg_step == 'STEP1' ? 'active':''}}" id="step1">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="m-2">
                                    <h5 class="text-gray-800 font-weight-bold">Contact Details</h5>
                                    <div class="row m-2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Image: <span class="text-danger">*</span></label>
                                                <input type="file" class="form-control" name="image" id="image">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-image"></strong>
                                                </span>
                                                <a href="{{ asset('public/assets/image_user') }}/{{auth()->user()->personal_detail->image ?? ''}}" target="_blank">{{auth()->user()->personal_detail->image ?? ''}}</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email: <span class="text-danger">*</span></label>
                                                <input id="email" name="email" type="email" class="form-control" value="{{$user->email ?? ''}}">
                                             
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-email"></strong>
                                                </span>
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Mobile Number: <span class="text-danger">*</span></label>
                                                <input id="mobile_number" name="mobile_number" type="text" class="form-control" value="{{$user->personal_detail->mobile_number ?? '09776668820'}}">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-mobile_number"></strong>
                                                </span>
                                            </div> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address: <span class="text-danger">*</span></label>
                                                <textarea name="address" id="address" class="form-control" >{{auth()->user()->personal_detail->address ?? 'Casiz st. Sitio Eldorado'}}</textarea>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-address"></strong>
                                                </span>
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Province: <span class="text-danger">*</span></label>
                                                <select name="province_code" id="province_code" class="select2" style="width: 100%">
                                                    <option value="" disabled selected>Province</option>
                                                    @foreach ($provincies as $province)
                                                        <option value="{{$province->province_code}}" {{Auth::user()->personal_detail->province_code == $province->province_code ? 'selected' : '' }}>{{$province->province_description}}</option>
                                                    @endforeach
                                                </select>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-province_code"></strong>
                                                </span>
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>City: <span class="text-danger">*</span></label>
                                                <select name="city_municipality_code" id="city_municipality_code" class="select2" style="width: 100%">
                                                <option value="" disabled selected>City</option>
                                                    @foreach ($cities as $city)
                                                        <option value="{{$city->city_municipality_code}}" {{Auth::user()->personal_detail->city_municipality_code == $city->city_municipality_code ? 'selected' : '' }}>{{$city->city_municipality_description}}</option>
                                                    @endforeach

                                                </select>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-city_municipality_code"></strong>
                                                </span>
                                            </div> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Facebook Link / Shoppe Link / Lazada Link: <span class="text-danger">*</span></label>
                                                <input id="facebook_link" name="facebook_link" type="text" class="form-control" value="{{$user->personal_detail->facebook_link ?? 'https://web.facebook.com/'}}">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-facebook_link"></strong>
                                                </span>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="m-2">
                                    <h5 class="text-gray-800 font-weight-bold">Personal Details</h5>
                                    <div class="row m-2">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Name: <span class="text-danger">*</span></label>
                                                <input id="name" name="name" type="text" class="form-control" value="{{$user->personal_detail->name ?? ''}}">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-name"></strong>
                                                </span>
                                            </div> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Date of Birth: <span class="text-danger">*</span></label>
                                                <input id="dob" name="dob" type="date" class="form-control" value="{{$user->personal_detail->dob ?? '2000-02-21'}}">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-dob"></strong>
                                                </span>
                                            </div> 
                                        </div>
                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Civil Status: <span class="text-danger">*</span></label>
                                                <select name="civil_status" id="civil_status" class="select2" style="width: 100%">
                                                    <option value="" disabled selected>Civil Status</option>
                                                    <option value="Divorced" {{Auth::user()->personal_detail->civil_status == 'Divorced' ? 'selected' : '' }}>Divorced</option>
                                                    <option value="Married" {{Auth::user()->personal_detail->civil_status == 'Married' ? 'selected' : '' }}>Married</option>
                                                    <option value="Single" {{Auth::user()->personal_detail->civil_status == 'Single' ? 'selected' : 'selected' }}>Single</option>
                                                    <option value="Widowed" {{Auth::user()->personal_detail->civil_status == 'Widowed' ? 'selected' : '' }}>Widowed</option>
                                                    
                                                </select>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-civil_status"></strong>
                                                </span>
                                            </div> 
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Citizenship: <span class="text-danger">*</span></label>
                                                <select name="citizenship" id="citizenship" class="select2" style="width: 100%">
                                                    <option value="" disabled selected>Citizenship</option>
                                                    <option value="American" {{Auth::user()->personal_detail->citizenship == 'American' ? 'selected' : '' }}>American</option>
                                                    <option value="Chinese" {{Auth::user()->personal_detail->citizenship == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                                    <option value="Filipino" {{Auth::user()->personal_detail->citizenship == 'Filipino' ? 'selected' : 'selected' }}>Filipino</option>
                                                    <option value="Japanese" {{Auth::user()->personal_detail->citizenship == 'Japanese' ? 'selected' : '' }}>Japanese</option>
                                                    <option value="Other Citizenship" {{Auth::user()->personal_detail->citizenship == 'Other Citizenship' ? 'selected' : '' }}>Other Citizenship</option>
                                                </select>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-citizenship"></strong>
                                                </span>
                                            </div> 
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Source Of Fund: <span class="text-danger">*</span></label>
                                                <select name="source_of_fund" id="source_of_fund" class="select2" style="width: 100%">
                                                    <option value="" disabled selected>Source Of Fund</option>
                                                    <option value="Business Income" {{Auth::user()->personal_detail->source_of_fund == 'Business Income' ? 'selected' : '' }}>Business Income</option>
                                                    <option value="Investment" {{Auth::user()->personal_detail->source_of_fund == 'Investment' ? 'selected' : '' }}>Investment</option>
                                                    <option value="Pension" {{Auth::user()->personal_detail->source_of_fund == 'Pension' ? 'selected' : '' }}>Pension</option>
                                                    <option value="Personal Savings" {{Auth::user()->personal_detail->source_of_fund == 'Personal Savings' ? 'selected' : 'selected' }}>Personal Savings</option>
                                                    <option value="Others" {{Auth::user()->personal_detail->source_of_fund == 'Others' ? 'selected' : '' }}>Others</option>
                                                </select>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-source_of_fund"></strong>
                                                </span>
                                            </div> 
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane {{auth()->user()->reg_step == 'STEP2' ? 'active':''}}" id="step2">
                        <div class="row">
                            <div class="col-md-12 text-center m-2">
                                <h5 class="text-gray-800 font-weight-bold">Business Details</h5>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Business Industry: <span class="text-danger">*</span></label>
                                    <select name="business_industry" id="business_industry" class="select2" style="width: 100%">
                                        <option value="" disabled selected>Business Industry</option>
                                        <option value="Agriculture Hunting Foretry" {{Auth::user()->business_detail->business_industry  == 'Agriculture Hunting Foretry' ? 'selected' : '' }}>Agriculture, Hunting, Foretry</option>
                                        <option value="Computer Company" {{Auth::user()->business_detail->business_industry  == 'Computer Company' ? 'selected' : 'selected' }}>Computer Company</option>
                                        <option value="Construction Company" {{Auth::user()->business_detail->business_industry  == 'Construction Company' ? 'selected' : '' }}>Construction Company</option>
                                        <option value="Education" {{Auth::user()->business_detail->business_industry  == 'Education' ? 'selected' : '' }}>Education</option>
                                        <option value="Food Company" {{Auth::user()->business_detail->business_industry  == 'Food Company' ? 'selected' : '' }}>Food Company</option>
                                       
                                      
                                    </select>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-business_industry"></strong>
                                    </span>
                                </div> 
                                <div class="form-group">
                                    <label>Business Name: <span class="text-danger">*</span></label>
                                    <input id="business_name" name="business_name" type="text" class="form-control" value="{{$user->business_detail->business_name ?? 'Softsuptech'}}" >
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-business_name"></strong>
                                    </span>
                                </div> 
                                <div class="form-group">
                                    <label>Business Number: <span class="text-danger">*</span></label>
                                    <input id="business_phone" name="business_phone" type="text" class="form-control" value="{{$user->business_detail->business_phone ?? 'ABC123'}}" >
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-business_phone"></strong>
                                    </span>
                                </div>
                                <div class="form-group">
                                    <label>Business Phone Number: <span class="text-danger">*</span></label>
                                    <input id="business_phone_number" name="business_phone_number" type="number" class="form-control" value="{{$user->business_detail->business_phone_number ?? '09776668820'}}">
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-business_phone_number"></strong>
                                    </span>
                                </div> 
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Business Address: <span class="text-danger">*</span></label>
                                    <textarea name="business_address" id="business_address" class="form-control" >{{auth()->user()->business_detail->business_address ?? 'Casiz st. Sitio Eldorado'}}</textarea>
                                    <span class="invalid-feedback" role="alert">
                                        <strong id="error-business_address"></strong>
                                    </span>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Province: <span class="text-danger">*</span></label>
                                            <select name="business_province_code" id="business_province_code" class="select2" style="width: 100%">
                                                <option value="" disabled selected>Province</option>
                                                @foreach ($provincies as $province)
                                                    <option value="{{$province->province_code}}" {{Auth::user()->business_detail->business_province_code  == $province->province_code ? 'selected' : '' }}>{{$province->province_description}}</option>
                                                @endforeach
                                            </select>
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-business_province_code"></strong>
                                            </span>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>City: <span class="text-danger">*</span></label>
                                            <select name="business_city_municipality_code" id="business_city_municipality_code" class="select2" style="width: 100%">
                                            <option value="" disabled selected>City</option>
                                                @foreach ($cities as $city)
                                                    <option value="{{$city->city_municipality_code}}" {{Auth::user()->business_detail->business_city_municipality_code == $city->city_municipality_code ? 'selected' : '' }}>{{$city->city_municipality_description}}</option>
                                                @endforeach

                                            </select>
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-business_city_municipality_code"></strong>
                                            </span>
                                        </div> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Business Permit: <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="business_permit" id="business_permit">
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-business_permit"></strong>
                                            </span>
                                            <a href="{{ asset('public/assets/business_permit') }}/{{auth()->user()->business_detail->business_permit ?? ''}}" target="_blank">{{auth()->user()->business_detail->business_permit ?? ''}}</a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Valid ID: <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" name="valid_id" id="valid_id">
                                            <span class="invalid-feedback" role="alert">
                                                <strong id="error-valid_id"></strong>
                                            </span>
                                            <a href="{{ asset('public/assets/business_permit') }}/{{auth()->user()->business_detail->business_permit ?? ''}}" target="_blank">{{auth()->user()->business_detail->business_permit ?? ''}}</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane {{auth()->user()->reg_step == 'STEP3' ? 'active':''}}" id="step3">
                        <div class="row">
                            <div class="col-md-12 text-center m-2">
                                <h5 class="text-gray-800 font-weight-bold">Confirm Details</h5>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th scope="col">Personal Details</th>
                                        <td><a href="{{ asset('public/assets/image_user') }}/{{auth()->user()->personal_detail->image ?? ''}}" target="_blank">{{auth()->user()->personal_detail->image ?? ''}}</a></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Image</th>
                                            <td>{{auth()->user()->personal_detail->name ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Name</th>
                                            <td>{{auth()->user()->personal_detail->name ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{auth()->user()->email ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mobile Number</th>
                                            <td>{{auth()->user()->personal_detail->mobile_number ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td>{{auth()->user()->personal_detail->address ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Province</th>
                                            <td>{{auth()->user()->personal_detail->province->province_description ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">City</th>
                                            <td>{{auth()->user()->personal_detail->city->city_municipality_description ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Date of Birth</th>
                                            <td>{{auth()->user()->personal_detail->dob ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Civil Status</th>
                                            <td>{{auth()->user()->personal_detail->civil_status ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Citizenship</th>
                                            <td>{{auth()->user()->personal_detail->citizenship ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Source Of Fund</th>
                                            <td>{{auth()->user()->personal_detail->source_of_fund ?? ''}}</td>
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
                                            <td>{{auth()->user()->business_detail->business_industry ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Business Name</th>
                                            <td>{{auth()->user()->business_detail->business_name ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Business Number</th>
                                            <td>{{auth()->user()->business_detail->business_phone ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Business Phone Number</th>
                                            <td>{{auth()->user()->business_detail->business_phone_number ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Business Address</th>
                                            <td>{{auth()->user()->business_detail->business_address ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Province</th>
                                            <td>{{auth()->user()->business_detail->province->province_description ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">City</th>
                                            <td>{{auth()->user()->business_detail->city->city_municipality_description ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Business Permit</th>
                                            <td><a href="{{ asset('public/assets/business_permit') }}/{{auth()->user()->business_detail->business_permit ?? ''}}" target="_blank">{{auth()->user()->business_detail->business_permit ?? ''}}</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wizard-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <button type='button' class='btn btn-previous btn-warning btn-wd font-weight-bold text-uppercase m-2' name='previous'>Previous</button>
                        </div>
                        <div class="col-md-6 text-right">
                            <button type='submit' class='btn btn-fill btn-primary btn-wd m-2 font-weight-bold text-uppercase' id="action_button">Next</button>
                        </div>
                    </div>
                    <input type="hidden" readonly="on" id="action" name="action" value="{{auth()->user()->reg_step}}">
                </div>
            </form>
        </div>
    </div>
    <!-- Content Row -->
</div>
@endsection

@section('scripts')
<script src="{{ asset('public/assets/wizard/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/wizard/jquery.bootstrap.wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/wizard/paper-bootstrap-wizard.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/assets/wizard/jquery.validate.min.js') }}" type="text/javascript"></script>

<script>
$(document).ready(function(){
    if($('#action').val() == "STEP3"){
        $('#action_button').html('Submit');
    }else{
        $('#action_button').html('Next');
    }
    $('select[name="province_code"]').on("change", function(event){
        var province = $(this).val(); 
        $.ajax({
            url: "{{ route('admin.province') }}",
            type: "get",
            dataType: "json",
            data: {
                province:province ,_token: '{!! csrf_token() !!}',
            },
            beforeSend: function() {
                $('#province_code').addClass('is-invalid');
                $('#error-province_code').text('LOADING...');
            },
            success: function(data){
                $('#province_code').removeClass('is-invalid');
                var cities = '';
                cities += '<option value="" disabled selected>City</option>';
                $.each(data.cities, function(key,value){
                    cities += '<option value="'+value.city_municipality_code+'">'+value.city_municipality_description+'</option>';
                });
                $('#city_municipality_code').empty().append(cities);

            }	
        })


    });

    $('select[name="business_province_code"]').on("change", function(event){
        var province = $(this).val(); 
        $.ajax({
            url: "{{ route('admin.province') }}",
            type: "get",
            dataType: "json",
            data: {
                province:province ,_token: '{!! csrf_token() !!}',
            },
            beforeSend: function() {
                $('#business_province_code').addClass('is-invalid');
                $('#error-business_province_code').text('LOADING...');
            },
            success: function(data){
                $('#business_province_code').removeClass('is-invalid');
                var cities = '';
                cities += '<option value="" disabled selected>City</option>';
                $.each(data.cities, function(key,value){
                    cities += '<option value="'+value.city_municipality_code+'">'+value.city_municipality_description+'</option>';
                });
                $('#business_city_municipality_code').empty().append(cities);

            }	
        })


    });

    $('#myForm').on('submit', function(event){
        event.preventDefault();
        $('.form-control').removeClass('is-invalid')
        var action_url = "{{ route('admin.registration') }}";
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
                $("#action_button").attr("value", "Loading..");
            },
            success:function(data){
                $("#action_button").attr("disabled", false);
                $("#action_button").attr("value", "Submit");
            
                if(data.errors){
                    $.each(data.errors, function(key,value){
                        if(key == $('#'+key).attr('id')){
                            $('#'+key).addClass('is-invalid')
                            $('#error-'+key).text(value)
                        }
                    })
                }
                if(data.success){
                    location.reload();
                }
                
            }
        });
    });

    $(document).on('click', '.btn-previous', function(){
        if($('#action').val() == 'STEP2'){
            $('#action').val('STEP1');
            $('#action_button').html('Next');
        }
        if($('#action').val() == 'STEP3'){
            $('#action').val('STEP2');
            $('#action_button').html('Next');
        }
    });

    $(document).on('click', '#nav_step1', function(){
        $('#action').val('STEP1');
        $('#action_button').html('Next');
    });

    $(document).on('click', '#nav_step2', function(){
        $('#action').val('STEP2');
        $('#action_button').html('Next');
    });

    $(document).on('click', '#nav_step3', function(){
        $('#action').val('STEP3');
        $('#action_button').html('Submit');
    });

});
</script>
@endsection
