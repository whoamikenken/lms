@extends('../layouts.app')
@section('sub-title','REGISTER')

@section('content')
<style>
    body{
        height: 100vh;
    }
    .admin-logo{
        width: 150px;
        max-width: 100%;
    }
    .bg-gradient-primary {
        background-image: linear-gradient(180deg, #2c2f7c 10%, #224abe 100%);
    }
    h1 {
        font-size: 24px;
        font-weight: 700;
        color: #2c2f7c;
    }
</style>
<div class="row h-100 justify-content-center align-items-center">
    <div class="col-xl-10 col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="m-3">
                                    {{ trans('panel.site_title') }}
                                </h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" >Name: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-user @error('name') is-invalid @enderror" placeholder="Your Name" id="name" name="name" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" >Student No.: <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-user @error('student_no') is-invalid @enderror" placeholder="Student No." id="student_no" name="student_no" >
                                            @error('student_no')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" >Email: <span class="text-danger">*</span></label>
                                            <input type="email" class="form-control form-control-user @error('email') is-invalid @enderror" placeholder="Email Address" id="email" name="email" >
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" >Contact Number: <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control form-control-user @error('contact_number') is-invalid @enderror" placeholder="Contact Number" id="contact_number" name="contact_number" >
                                            @error('contact_number')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" >Gender: <span class="text-danger">*</span></label>
                                            <select name="gender" id="gender" class="form-control">
                                                <option value="MALE">MALE</option>
                                                <option value="FEMALE">FEMALE</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" >Course: <span class="text-danger">*</span></label>
                                            <select name="course" id="course" class="form-control">
                                                <option value="BSIT">BSIT</option>
                                                <option value="BSCS">BSCS</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" >Year: <span class="text-danger">*</span></label>
                                            <select name="year" id="year" class="form-control">
                                                <option value="1st Year">1st Year</option>
                                                <option value="2nd Year">2nd Year</option>
                                                <option value="3rd Year">3rd Year</option>
                                                <option value="4th Year">4th Year</option>                                                
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" >Section: <span class="text-danger">*</span></label>
                                            <select name="section" id="section" class="form-control">
                                                <option value="A" >A</option>
                                                <option value="B" >B</option>
                                                <option value="C" >C</option>
                                                <option value="D" >D</option>
                                                <option value="Irregular" >Irregular</option>
                                            </select>
                                        </div>
                                    </div>
                                    

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" >Password: <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror" placeholder="Password" id="password" name="password">
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label" >Repeat Password: <span class="text-danger">*</span></label>
                                            <input type="password" class="form-control form-control-user" placeholder="Repeat Password" id="password-confirm" name="password_confirmation">
                                        </div>
                                    </div>

                                </div>
                                
                               
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                                <hr>
                             
                            </form>
                            <hr>
                          
                            <div class="text-center">
                                <a class="small" href="{{ url('/login') }}">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('script')
<script> 

</script>
@endsection