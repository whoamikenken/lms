@extends('layouts.student')
@section('sub-title','WELCOME')

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
    .dti_logo{
        position: absolute;
        width: 50px !important;
        height: 50px !important;
        object-fit: scale-down !important;
    }
</style>
<section class="search-header py-5 mt-5">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-4">
                    <h1 class="m-0">WELCOME IT STUDENTS!</h1>
                    <h6 class="text-white mt-5">
                    The ITE Program aims to substantially equip students with theoretical and conceptual knowledge in computer science; develop and strengthen skills in software development and project management in preparation for their work in the field of computing and/or Information technology.
                    </h6>
                    @php
                        $already_take = App\Models\Result::where('user_id', auth()->user()->id)
                                                    ->where('year', auth()->user()->year)
                                                    ->first();
                    @endphp
                    @if($already_take == null)
                        @if(auth()->user()->isTakeLearningStyle == false)
                            <a href="/admin/student/learning_style" class="btn btn-success btn-lg m-5 text-white">Take Learning Style</a>
                       @else 
                            <a href="/admin/student/assessment" class="btn btn-primary m-5 btn-lg">Take Assessment</a>
                        @endif

                        
                    @elseif($already_take->end_time == null)
                        @if(auth()->user()->isTakeLearningStyle == false)
                            <a href="/admin/student/learning_style" class="btn btn-success btn-lg m-5 text-white">Take Learning Style</a>
                        @else 
                            <a href="/admin/student/assessment" class="btn btn-primary m-5 btn-lg">Take Assessment</a>
                        @endif
                    @else
                        <a href="/admin/student/results/{{$already_take->id}}" class="btn btn-secondary m-5 text-white">Already Completed Assessment</a>
                    @endif
                </div>
                
                
            </div>
        </div>
    </div>
</section>

@endsection
@section('scripts')
 <script>
      
</script>

@endsection