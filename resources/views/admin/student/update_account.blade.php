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
                                                    <option value="A" {{auth()->user()->section == 'A' ? 'selected' : '' }}>A</option>
                                                    <option value="B" {{auth()->user()->section == 'B' ? 'selected' : '' }}>B</option>
                                                    <option value="C" {{auth()->user()->section == 'C' ? 'selected' : '' }}>C</option>
                                                    <option value="D" {{auth()->user()->section == 'D' ? 'selected' : '' }}>D</option>
                                                    <option value="Irregular" {{auth()->user()->section == 'Irregular' ? 'selected' : '' }}>Irregular</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center mt-5">
                                            <input type="hidden" value="{{auth()->user()->id}}" name="user_id" id="user_id" readonly>
                                            <button type="button" id="changepassword" class="btn btn-warning text-center text-uppercase">
                                                        Change Password?
                                            </button>
                                            <br>
                                            <br>
                                            <button type="submit" id="action_button" class="btn btn-info text-center text-uppercase">
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

<form method="post" id="cpForm" class="contact-form">
    @csrf
    <div class="modal fade" id="cpModal" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="cp-modal-title">Modal title</h5>
         
          </div>
          <div class="modal-body">
        
            <div class="col-sm-12">
                  <div class="form-group">
                      <label class="control-label text-uppercase" >Current Password: </label>
                      <input type="password" name="current_password" id="current_password" class="form-control" />
                        <span class="invalid-feedback" role="alert">
                          <strong id="error-current_password"></strong>
                      </span>
                  </div>
              </div>

              <div class="col-sm-12">
                  <div class="form-group">
                      <label class="control-label text-uppercase" >New Password: </label>
                      <input type="password" name="new_password" id="new_password" class="form-control" />
                        <span class="invalid-feedback" role="alert">
                          <strong id="error-new_password"></strong>
                      </span>
                  </div>
              </div>
              
              <div class="col-sm-12">
                  <div class="form-group">
                      <label class="control-label text-uppercase" >Confirm New Password: </label>
                      <input type="password" name="confirm_password" id="confirm_password" class="form-control" />
                      <span class="invalid-feedback" role="alert">
                          <strong id="error-confirm_password"></strong>
                      </span>
                  </div>
              </div>
              
          </div>
          <div class="modal-footer">
            <input type="submit" name="cp_action_button" id="cp_action_button" class="btn btn-info text-white" value="SUBMMIT" />
          </div>
        </div>
      </div>
    </div>
</form>

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

    $(document).on('click', '#changepassword', function(){
        $('#cpModal').modal('show');
        $('#cpForm')[0].reset();
        $('.form-control').removeClass('is-invalid')
        $('.cp-modal-title').text('Change Password');
        $('#cp_button').val('Submit');
    });

    $('#cpForm').on('submit', function(event){
    event.preventDefault();
    $('.form-control').removeClass('is-invalid')
    var id = $('#user_id').val();
    var action_url = "/admin/student/changepassword/" + id;
    var type = "PUT";

    $.ajax({
        url: action_url,
        method:type,
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function(){
            $("#cp_action_button").attr("disabled", true);
            $("#cp_action_button").attr("value", "Loading..");
        },
        success:function(data){
          $("#cp_action_button").attr("disabled", false);
          $("#cp_action_button").attr("value", "Submit");
            if(data.errors){
                $.each(data.errors, function(key,value){
                if(key == $('#'+key).attr('id')){
                      $('#'+key).addClass('is-invalid')
                      $('#error-'+key).text(value)
                  }
                })
            }
            if(data.success){
                $('.form-control').removeClass('is-invalid');
                $.confirm({
                    title: 'Confirmation',
                    content: data.success,
                    type: 'green',
                    buttons: {
                            confirm: {
                                text: 'confirm',
                                btnClass: 'btn-blue',
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