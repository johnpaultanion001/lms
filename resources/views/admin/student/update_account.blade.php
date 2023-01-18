@extends('layouts.student')
@section('sub-title','UPDATE ACCOUNT')

@section('content')
<style>
    body{
        background-image: url('{{ asset('assets/img/bg.jpg') }}');
        background-position: center;
        background-size: cover;
        background-attachment: fixed;
    }
    .bg-light {
        background: linear-gradient(180deg, #0e3ba0 0%, #2c2f7c 100%);
        background-color: transparent !important;
    }
    
</style>
<section class="search-header py-5 mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="mb-4">
                    <h1 class="m-0 text-center mb-2">UPDATE YOUR INFOMATION</h1>
                  
                   <div class="card">
                        <div class="card-body">
                            <form method="post" id="myForm" class="form-horizontal ">
                                    @csrf
                                    <div class="row p-2">
                                        <div class="col-md-6 p-2">
                                            <div class="form-group">
                                                <label class="control-label">Name: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Your Name" id="name" name="name" value="{{auth()->user()->name}}" autofocus>
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-name"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 p-2">
                                            <div class="form-group">
                                                <label class="control-label" >Student No.: <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Student No." id="student_no" name="student_no"  value="{{auth()->user()->student_no}}">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-student_no"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 p-2">
                                            <div class="form-group">
                                                <label class="control-label" >Email: <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email Address" id="email" name="email" value="{{auth()->user()->email}}">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-email"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 p-2">
                                            <div class="form-group">
                                                <label class="control-label" >Contact Number: <span class="text-danger">*</span></label>
                                                <input type="number" class="form-control" placeholder="Contact Number" id="contact_number" name="contact_number" value="{{auth()->user()->contact_number}}">
                                                <span class="invalid-feedback" role="alert">
                                                    <strong id="error-contact_number"></strong>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-6 p-2">
                                            <div class="form-group">
                                                <label class="control-label" >Gender: <span class="text-danger">*</span></label>
                                                <select name="gender" id="gender" class="form-control">
                                                    <option value="MALE" {{auth()->user()->gender == 'MALE' ? 'selected' : '' }}>MALE</option>
                                                    <option value="FEMALE" {{auth()->user()->gender == 'FEMALE' ? 'selected' : '' }}>FEMALE</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 p-2">
                                            <div class="form-group">
                                                <label class="control-label" >Course: <span class="text-danger">*</span></label>
                                                <select name="course" id="course" class="form-control">
                                                    <option value="BSIT"  {{auth()->user()->course == 'BSIT' ? 'selected' : '' }}>BSIT</option>
                                                    <option value="BSCS"  {{auth()->user()->course == 'BSCS' ? 'selected' : '' }}>BSCS</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 p-2">
                                            <div class="form-group">
                                                <label class="control-label" >Year: <span class="text-danger">*</span></label>
                                                <select name="year" id="year" class="form-control">
                                                    <option value="1st Year" {{auth()->user()->year == '1st Year' ? 'selected' : '' }}>1st Year</option>
                                                    <option value="2nd Year" {{auth()->user()->year == '2nd Year' ? 'selected' : '' }}>2nd Year</option>
                                                    <option value="3rd Year" {{auth()->user()->year == '3rd Year' ? 'selected' : '' }}>3rd Year</option>
                                                    <option value="4th Year" {{auth()->user()->year == '4th Year' ? 'selected' : '' }}>4th Year</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6 p-2">
                                            <div class="form-group">
                                                <label class="control-label" >Section: <span class="text-danger">*</span></label>
                                                <select name="section" id="section" class="form-control">
                                                  
                                                    <option value="BSIT 1A" {{auth()->user()->section == 'BSIT 1A' ? 'selected' : '' }}>BSIT 1A</option>
                                                    <option value="BSIT 1B" {{auth()->user()->section == 'BSIT 1B' ? 'selected' : '' }}>BSIT 1B</option>
                                                    <option value="BSIT 1C" {{auth()->user()->section == 'BSIT 1C' ? 'selected' : '' }}>BSIT 1C</option>

                                                    <option value="BSIT 2A" {{auth()->user()->section == 'BSIT 2A' ? 'selected' : '' }}>BSIT 2A</option>
                                                    <option value="BSIT 2B" {{auth()->user()->section == 'BSIT 2B' ? 'selected' : '' }}>BSIT 2B</option>
                                                    <option value="BSIT 2C" {{auth()->user()->section == 'BSIT 2C' ? 'selected' : '' }}>BSIT 2C</option>

                                                    <option value="BSIT 3A" {{auth()->user()->section == 'BSIT 3A' ? 'selected' : '' }}>BSIT 3A</option>
                                                    <option value="BSIT 3B" {{auth()->user()->section == 'BSIT 3B' ? 'selected' : '' }}>BSIT 3B</option>
                                                    <option value="BSIT 3C" {{auth()->user()->section == 'BSIT 3C' ? 'selected' : '' }}>BSIT 3C</option>

                                                    <option value="BSIT 4A" {{auth()->user()->section == 'BSIT 4A' ? 'selected' : '' }}>BSIT 4A</option>
                                                    <option value="BSIT 4B" {{auth()->user()->section == 'BSIT 4B' ? 'selected' : '' }}>BSIT 4B</option>
                                                    <option value="BSIT 4C" {{auth()->user()->section == 'BSIT 4C' ? 'selected' : '' }}>BSIT 4C</option>

                                                    <option value="BSCS 1A" {{auth()->user()->section == 'BSCS 1A' ? 'selected' : '' }}>BSCS 1A</option>
                                                    <option value="BSCS 1B" {{auth()->user()->section == 'BSCS 1B' ? 'selected' : '' }}>BSCS 1B</option>
                                                    <option value="BSCS 1C" {{auth()->user()->section == 'BSCS 1C' ? 'selected' : '' }}>BSCS 1C</option>

                                                    <option value="BSCS 2A" {{auth()->user()->section == 'BSCS 2A' ? 'selected' : '' }}>BSCS 2A</option>
                                                    <option value="BSCS 2B" {{auth()->user()->section == 'BSCS 2B' ? 'selected' : '' }}>BSCS 2B</option>
                                                    <option value="BSCS 2C" {{auth()->user()->section == 'BSCS 2C' ? 'selected' : '' }}>BSCS 2C</option>

                                                    <option value="BSCS 3A" {{auth()->user()->section == 'BSCS 3A' ? 'selected' : '' }}>BSCS 3A</option>
                                                    <option value="BSCS 3B" {{auth()->user()->section == 'BSCS 3B' ? 'selected' : '' }}>BSCS 3B</option>
                                                    <option value="BSCS 3C" {{auth()->user()->section == 'BSCS 3C' ? 'selected' : '' }}>BSCS 3C</option>

                                                    <option value="BSCS 4A" {{auth()->user()->section == 'BSCS 4A' ? 'selected' : '' }}>BSCS 4A</option>
                                                    <option value="BSCS 4B" {{auth()->user()->section == 'BSCS 4B' ? 'selected' : '' }}>BSCS 4B</option>
                                                    <option value="BSCS 4C" {{auth()->user()->section == 'BSCS 4C' ? 'selected' : '' }}>BSCS 4C</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center mt-5">
                                            <input type="hidden" value="{{auth()->user()->id}}" name="user_id" id="user_id" readonly>
                                        
                                            <button type="submit" id="action_button" class="btn btn-primary text-center text-uppercase">
                                                        Update Account
                                            </button>
                                            
                                            <hr>
                                        </div>
                                </div>
                            </form>       
                        </div>
                   </div>
                </div>
                
                
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
<script>
$(document).ready(function(){
    $('#myForm').on('submit', function(event){
        event.preventDefault();
        $('.form-control').removeClass('is-invalid')
        
        var action_url = '{{ route("admin.student.update_account", ":user_id") }}';
                action_url = action_url.replace(':user_id', $('#user_id').val());
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