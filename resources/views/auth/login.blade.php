@extends('../layouts.app')
@section('sub-title','LOGIN')

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
    body{
        background-image: url('{{ asset('assets/img/bg.jpg') }}') !important;
        background-position: center !important;
        background-size: cover !important;
        background-attachment: fixed !important;
    }
</style>

<div class="row h-100 justify-content-center align-items-center">
    <div class="col-xl-6 col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                  
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                            <h1 class="m-3">
                                    <img src="assets/img/logo.jpg" alt="Girl in a jacket" width="150" height="150">
                                   
                                </h1>
                                <h1 class="m-3">
                                    
                                    {{ trans('panel.site_title') }}
                                </h1>
                            </div>
                            <form method="POST" action="{{ route('login') }}" class="user">
                            @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" placeholder="Email Address" autofocus>
                                        @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                        @endif
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user {{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" name="password" placeholder="Password">
                                    @if($errors->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember
                                            Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <hr>
                            </form>
                            <hr>
                            <!-- <div class="text-center">
                                <a class="small" href="{{ url('/register') }}">Create an Account!</a>
                            </div> -->
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