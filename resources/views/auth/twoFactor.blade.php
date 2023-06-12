@extends('../layouts.app')
@section('sub-title','OTP')

@section('content')
<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Two Factor Verification</h1>
                                @if(session()->has('message'))
                                    <p class="alert alert-info">
                                        {{ session()->get('message') }}
                                    </p>
                                @endif
                                <p class="text-muted">
                                    You have received an email which contains two factor login code.
                                    If you haven't received it, press <a href="{{ route('verify.resend') }}">here</a>.
                                </p>
                            </div>
                            <form method="POST" action="{{ route('verify.store') }}">
                                @csrf
                                <div class="form-group">
                                    <input name="two_factor_code" type="text" class="form-control form-control-user {{ $errors->has('two_factor_code') ? ' is-invalid' : '' }}" required autofocus placeholder="Two Factor Code">
                                    @if($errors->has('two_factor_code'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('two_factor_code') }}
                                        </div>
                                    @endif
                                </div>
                              
                               <div class="row">
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                        Verify
                                    </button>
                                </div>
                                <div class="col-md-6 text-right">
                                    <a class="btn btn-danger px-4" href="#" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                                        Logout
                                    </a>
                                </div>
                               </div>
                                <hr>
                            </form>
                            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            <hr>
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
