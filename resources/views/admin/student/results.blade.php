@extends('layouts.student')
@section('sub-title','RESULT ASSESSMENT')

@section('content')
@section('styles')
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

    .bar1{
        background-color: #77BDFD;
    }
    .bar2{
        background-color: #FFACC5;
    }
    .bar3{
        background-color: #BFA8FF;
    }
    .bar4{
        background-color: #CDC82E;
    }
    .bar5{
        background-color: #37950B;
    }

    
.progress_circle {
  width: 150px;
  height: 150px;
  background: none;
  position: relative;
}

.progress_circle::after {
  content: "";
  width: 100%;
  height: 100%;
  border-radius: 50%;
  border: 6px solid #eee;
  position: absolute;
  top: 0;
  left: 0;
}

.progress_circle>span {
  width: 50%;
  height: 100%;
  overflow: hidden;
  position: absolute;
  top: 0;
  z-index: 1;
}

.progress_circle .progress_circle-left {
  left: 0;
}

.progress_circle .progress_circle-bar {
  width: 100%;
  height: 100%;
  background: none;
  border-width: 6px;
  border-style: solid;
  position: absolute;
  top: 0;
}

.progress_circle .progress_circle-left .progress_circle-bar {
  left: 100%;
  border-top-right-radius: 80px;
  border-bottom-right-radius: 80px;
  border-left: 0;
  -webkit-transform-origin: center left;
  transform-origin: center left;
}

.progress_circle .progress_circle-right {
  right: 0;
}

.progress_circle .progress_circle-right .progress_circle-bar {
  left: -100%;
  border-top-left-radius: 80px;
  border-bottom-left-radius: 80px;
  border-right: 0;
  -webkit-transform-origin: center right;
  transform-origin: center right;
}

.progress_circle .progress_circle-value {
  position: absolute;
  top: 0;
  left: 0;
}

.ring-1 {
  width: 300px;
  height: 300px;
  margin: 0 auto;
  padding: 10px;
  border: 30px dashed #4b9cdb;
  border-radius: 100%;
}
.load-4 .ring-1 {
  animation: loadingD 1.5s 0.3s cubic-bezier(0.17, 0.37, 0.43, 0.67) infinite;
}

@keyframes loadingD {
  0 {
    transform: rotate(0deg);
  }
  50% {
    transform: rotate(180deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

#recoDiv h1 {
    color: black;
}
</style>
@endsection

<section class="search-header py-5 mt-3">
    <div class="container py-5">
        <div class="row">
            <div class="col-12">
                <div class="text-center mb-4">
                    <h1 class="m-0">Results of your assessment</h1>
                </div>
                <div class="row g-1">
                    <div class="col-12 col-md-6">
                        <div class="card h-100">
                            <div class="card-body shadow h-100">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-weight-bold">Results</h5>
                                        <p class="text-success ml-3">{{ $result->total_points ?? '0' }} points</p>
                                        <input type="hidden" readonly id="result_id" value="{{$result->id}}">
                                    </div>
                                    <div class="col-6">
                                            <!-- Progress_circle bar 1 -->
                                            <div class="progress_circle mx-auto" data-value='{{$percent}}'>
                                                <span class="progress_circle-left">
                                                                <span class="progress_circle-bar border-success"></span>
                                                </span>
                                                <span class="progress_circle-right">
                                                                <span class="progress_circle-bar border-success"></span>
                                                </span>
                                                <div class="progress_circle-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
                                                    <div class="h2 font-weight-bold">{{$percent ?? '0'}}<sup class="small">%</sup></div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card h-100">
                            <div class="card-body shadow h-100">
                                <div class="row">
                                    <div class="col-6">
                                        <h5 class="font-weight-bold">Timer</h5>
                                        <h6>Time Duration</h6>
                                        
                                        <p class="text-success ml-3">{{$diff ?? ''}} Mins</p>
                                    </div>
                                    <div class="col-6">
                                        <h6>Start Time</h6>
                                        <p class="text-success ml-3">{{ $result->start_time->format('h:i A') }}</p>
                                        <h6>End Time</h6>
                                        <p class="text-success ml-3">{{ $result->end_time->format('h:i A') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12">
                        <div class="card h-100">
                            <div class="card-body shadow h-100">
                                <div class="row">
                                    <div class="col-10 mx-auto">
                                        <h5 class="font-weight-bold">Top 3</h5>
                                        <div id="top">

                                        </div>

                                        <h5 class="font-weight-bold">Bottom 3</h5>
                                        <div id="bot">

                                        </div>
                                        
                                       
                                        <h5 class="font-weight-bold mt-2">Your score by category</h5>
                                        <div class="card shadow mt-2">
                                            <div class="card-body">
                                                <div class="chart-area" style="height: 300px;">
                                                    <canvas id="myAreaChart"></canvas>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <h5 class="font-weight-bold mt-2">LEARNING STYLE</h5>
                                        @php
                                            $learning_style_results = App\Models\LearningStyleResult::where('user_id', auth()->user()->id)->get();
                                            $active = $learning_style_results->where('answer', 'Active')->count();
                                            $reflective = $learning_style_results->where('answer', 'Reflective')->count();

                                            $resultCompile = "";

                                            if($active > $reflective){
                                                $result_part1 = $active - $reflective;
                                                $result_part1Text = "A";
                                            }else{
                                                $result_part1 = $reflective - $active;
                                                $result_part1Text = "B";
                                            }

                                            $intuitive = $learning_style_results->where('answer', 'Intuitive')->count();
                                            $sensing = $learning_style_results->where('answer', 'Sensing')->count();

                                            if($sensing > $intuitive){
                                                $result_part2 = $sensing - $intuitive;
                                                $result_part2Text = "A";
                                            }else{
                                                $result_part2 = $intuitive - $sensing;
                                                $result_part2Text = "B";
                                            }

                                            
                                            $visual = $learning_style_results->where('answer', 'Visual')->count();
                                            $verbal = $learning_style_results->where('answer', 'Verbal')->count();

                                            if($visual > $verbal){
                                                $result_part3 = $visual - $verbal;
                                                $result_part3Text = "A";
                                            }else{
                                                $result_part3 = $verbal - $visual;
                                                $result_part3Text = "B";
                                            }

                                            $sequential = $learning_style_results->where('answer', 'Sequential')->count();
                                            $global = $learning_style_results->where('answer', 'Global')->count();

                                            if($sequential > $global){
                                                $result_part4 = $sequential - $global;
                                                $result_part4Text = "A";
                                            }else{
                                                $result_part4 = $global - $sequential;
                                                $result_part4Text = "B";
                                            }

                                            $total_active_reflective = $active + $reflective;
                                            $percent_active = $active / $total_active_reflective * 100;
                                            $percent_reflective = $reflective / $total_active_reflective * 100;

                                            $total_intuitive_sensing = $intuitive + $sensing;
                                            $percent_intuitive = $intuitive / $total_intuitive_sensing * 100;
                                            $percent_sensing = $sensing / $total_intuitive_sensing * 100;

                                            $total_verbal_visual = $verbal + $visual;
                                            $percent_verbal = $verbal / $total_verbal_visual * 100;
                                            $percent_visual = $visual / $total_verbal_visual * 100;

                                            $total_sequential_global = $sequential + $global;
                                            $percent_sequential = $sequential / $total_sequential_global * 100;
                                            $percent_global = $global / $total_sequential_global * 100;

                                            if($result_part1Text == 'A'){
                                                $resultCompile .= "ACTIVE,";
                                            }else{
                                                $resultCompile .= "REFLECTIVE,";
                                            }

                                            if($result_part2Text == 'A'){
                                                $resultCompile .= "SENSING,";
                                            }else{
                                                $resultCompile .= "INTUITIVE,";
                                            }

                                            if($result_part3Text == 'A'){
                                                $resultCompile .= "VISUAL,";
                                            }else{
                                                $resultCompile .= "VERBAL,";
                                            }

                                            if($result_part4Text == 'A'){
                                                $resultCompile .= "SEQUENTIAL,";
                                            }else{
                                                $resultCompile .= "GLOBAL,";
                                            }

                                        @endphp
                                         
                                        {{$result_part1}} {{$result_part1Text == 'A' ? 'ACTIVE':'REFLECTIVE'}} > {{$result_part2}} {{$result_part2Text == 'A' ? 'SENSING':'INTUITIVE'}} >
                                        {{$result_part3}} {{$result_part3Text == 'A' ? 'VISUAL':'VERBAL'}} > {{$result_part4}} {{$result_part4Text == 'A' ? 'SEQUENTIAL':'GLOBAL'}}
                                        <div class="progress" style="height: 40px;">
                                            <div class="progress-bar" role="progressbar" style="width: {{$percent_active}}%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                                <h6 class="justify-content-center ">{{$result_part1Text == 'A' ? $result_part1:''}} ACTIVE</h6>
                                            </div>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{$percent_reflective}}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                <h6 class="justify-content-center ">{{$result_part1Text == 'B' ? $result_part1:''}} REFLECTIVE</h6>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="progress" style="height: 40px;">
                                            <div class="progress-bar " role="progressbar" style="width: {{$percent_sensing}}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                <h6 class="justify-content-center text-uppercase">{{$result_part2Text == 'A' ? $result_part2:''}} Sensing</h6>
                                            </div>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{$percent_intuitive}}%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                                <h6 class="justify-content-center text-uppercase">{{$result_part2Text == 'B' ? $result_part2:''}} Intuitive</h6>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="progress" style="height: 40px;">
                                            <div class="progress-bar" role="progressbar" style="width: {{$percent_visual}}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                <h6 class="justify-content-center text-uppercase">{{$result_part3Text == 'A' ? $result_part3:''}} Visual</h6>
                                            </div>
                                            <div class="progress-bar  bg-success" role="progressbar" style="width: {{$percent_verbal}}%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                                <h6 class="justify-content-center text-uppercase">{{$result_part3Text == 'B' ? $result_part3:''}} Verbal</h6>
                                            </div>
                                           
                                        </div>

                                        <br>
                                        <div class="progress" style="height: 40px;">
                                            <div class="progress-bar" role="progressbar" style="width: {{$percent_sequential}}%;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                                <h6 class="justify-content-center text-uppercase">{{$result_part4Text == 'A' ? $result_part4:''}} Sequential</h6>
                                            </div>
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{$percent_global}}%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">
                                                <h6 class="justify-content-center text-uppercase">{{$result_part4Text == 'B' ? $result_part4:''}} Global</h6>
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <div class="card" style="border: solid 1px #111;">
                                            <div class="card-body">
                                                <h5>Explanation of scores</h5>
                                                <p>
                                                    If your score on a scale is 1-3, you have a mild preference for one or the other dimension but you are essentially well balanced. 
                                                    <br>
                                                    If your score on a scale is 5-7, you have a moderate preference for one dimension of the scale and will learn more easily in a teaching environment which favours that dimension.
                                                    <br>
                                                    If your score on a scale is 9-11, you have a strong preference for one dimension of the scale. You may have real difficulty learning in an environment which does not support that preference.
                                                </p>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="card" style="border: solid 1px #111;">
                                            <div class="card-body">
                                                <p class="m-3">
                                                    <input type="hidden" id="recLearningStyle" value="{{$resultCompile}}">
                                                    <h5>Recommendation</h5>
                                                    <div id="recoDiv">
                                                        <h2 style="color:black; margin-bottom:5%;">Generating Recommendation...  this might take a minute</h2>
                                                        <div class="load-4">
                                                            <div class="ring-1"></div>
                                                        </div>
                                                    </div>
                                                    {{-- @php
                                                        $results = array(
                                                                "ACTIVEREFLECTIVE" => $result_part1,
                                                                "SENSINGINTUITIVE" => $result_part2,
                                                                "VISUALVERBAL" => $result_part3,
                                                                "SEQUENTIALGLOBAL" => $result_part4,
                                                            );
                                                            asort($results);
                                                    @endphp
                                                    @foreach($results as $key => $value)
                                                                @if($key == "ACTIVEREFLECTIVE")
                                                                    @if($result_part1Text == 'A')
                                                                        <h6>How can active learners help themselves? </h6>
                                                                        <p>If you are an active learner in a class that allows little or no class time for discussion or problem-solving activities, you should try to compensate for these deficits when you study. Study in a group where members take turns explaining different topics to one another. Collaborate with others to predict what questions will be asked on the next test and how you will respond. You will always remember information better if you put it to use.</p>
                                                                        @php
                                                                            App\Models\User::where('id', auth()->user()->id)->update([
                                                                                "ls_result" => "ACTIVE",    
                                                                            ]);
                                                                        @endphp
                                                                    @else
                                                                        <h6>How can reflective learners help themselves? </h6>
                                                                        <p>If you are a reflective learner in a class that allows little or no class time for thinking about new information, you should try to compensate for this lack when you study. Don't just read or memorize the material; take breaks to review what you've read and consider potential questions or applications. You might find it useful to write short summaries of readings or class notes in your own words. This may take more time, but it will help you retain the information more effectively.</p>
                                                                        @php
                                                                            App\Models\User::where('id', auth()->user()->id)->update([
                                                                                "ls_result" => "REFLECTIVE",    
                                                                            ]);
                                                                        @endphp
                                                                    @endif
                                                                @endif
                                                                @if($key == "SENSINGINTUITIVE")
                                                                    <br>
                                                                        @if($result_part2Text == 'A')
                                                                            <h6>How can sensing learners help themselves? </h6>
                                                                            <p>Sensors remember and comprehend information better when they can see how it relates to the real world. You may struggle if you are in a class where the majority of the material is abstract and theoretical. Inquire with your instructor about specific examples of concepts and procedures, and how the concepts apply in practice. If the teacher does not provide enough details, look for them in your course text or other references, or brainstorm with friends or classmates.</p>
                                                                            @php
                                                                                App\Models\User::where('id', auth()->user()->id)->update([
                                                                                    "ls_result" => "SENSING",    
                                                                                ]);
                                                                            @endphp
                                                                        @else
                                                                            <h6>How can intuitive learners help themselves? </h6>
                                                                            <p>Many college lecture classes are designed for intuitive students. However, if you are an intuitor and are in a class that focuses primarily on memorization and rote substitution in formulas, you may experience boredom. Request interpretations or theories from your instructor, or try to find the connections yourself. Because you are impatient with details and dislike repetition, you may be prone to making careless mistakes on tests (as in checking your completed solutions). Before you begin answering, read the entire question and double-check your answers.</p>
                                                                            @php
                                                                                App\Models\User::where('id', auth()->user()->id)->update([
                                                                                    "ls_result" => "INTUITIVE",    
                                                                                ]);
                                                                            @endphp
                                                                        @endif
                                                                @endif
                                                                @if($key == "VISUALVERBAL")
                                                                    <br>
                                                                        @if($result_part3Text == 'A')
                                                                            <h6>How can visual learners help themselves?</h6>
                                                                            <p>If you are a visual learner, look for diagrams, sketches, schematics, photographs, flow charts, or any other visual representation of verbal course material. Inquire with your instructor, consult reference books, and see if there are any videotapes or CD-ROM displays of the course material. Create a concept map by listing key points, enclosing them in boxes or circles, and connecting them with lines and arrows. Use a highlighter to colorcode your notes so that everything related to one topic is the same color.</p>
                                                                            @php
                                                                                App\Models\User::where('id', auth()->user()->id)->update([
                                                                                    "ls_result" => "VISUAL",    
                                                                                ]);
                                                                            @endphp
                                                                        @else
                                                                            <h6>How can verbal learners help themselves? </h6>
                                                                            <p>Make your own summaries or outlines of course material. Working in groups can be especially beneficial: you gain understanding of material by hearing classmates explain it, and you learn even more when you explain it yourself.</p>
                                                                            @php
                                                                                App\Models\User::where('id', auth()->user()->id)->update([
                                                                                    "ls_result" => "VERBAL",    
                                                                                ]);
                                                                            @endphp
                                                                        @endif  
                                                                @endif
                                                                @if($key == "SEQUENTIALGLOBAL")
                                                                    <br>
                                                                        @if($result_part4Text == 'A')
                                                                            <h6>How can sequential learners help themselves? </h6>
                                                                            <p>The majority of college courses are taught in a sequential order. However, if you are a sequential learner and your instructor jumps from topic to topic or skips steps, you may struggle to follow and remember. Ask the instructor to fill in the gaps, or do it yourself by consulting references. When studying, make an outline of the lecture material for yourself in logical order. This will save you time in the long run. You could also try to improve your global thinking skills by connecting each new topic you learn to something you already know. The more you can do this, the better your understanding of the subject will be.</p>
                                                                            @php
                                                                                App\Models\User::where('id', auth()->user()->id)->update([
                                                                                    "ls_result" => "SEQUENTIAL",    
                                                                                ]);
                                                                            @endphp
                                                                        @else
                                                                            <h6>How can global learners help themselves? </h6>
                                                                            <p>If you are a global learner, simply acknowledging that you are not slow or stupid but simply function differently than the majority of your classmates can help a lot.4 However, there are some steps you can take that may help you get the big picture more quickly. Before you begin studying the first section of a chapter in a text, skim through the entire chapter to get an overview. This may take some time at first, but it will save you from going over individual parts later. Instead of spending a short amount of time on each subject every night, you may find it more productive to immerse yourself in individual subjects for extended periods of time. Try to connect the subject to what you already know, either by asking the instructor for assistance or by consulting references. Above all, don't lose faith in yourself; you'll eventually grasp the new material, and once you do, your understanding of how it relates to other topics and disciplines may allow you to apply it in ways that most sequential thinkers would never consider.</p>
                                                                            @php
                                                                                App\Models\User::where('id', auth()->user()->id)->update([
                                                                                    "ls_result" => "GLOBAL",    
                                                                                ]);
                                                                            @endphp
                                                                        @endif
                                                                @endif
                                                    @endforeach --}}
                                                    
                                                </p>
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
    </div>
</section>

@endsection
@section('scripts')

 <script>
$(document).ready(function(){

        $(".progress_circle").each(function() {
            var value = $(this).attr('data-value');
            var left = $(this).find('.progress_circle-left .progress_circle-bar');
            var right = $(this).find('.progress_circle-right .progress_circle-bar');

            if (value > 0) {
                if (value <= 50) {
                right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
                } else {
                right.css('transform', 'rotate(180deg)')
                left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
                }
            }
        })

        function percentageToDegrees(percentage) {
            return percentage / 100 * 360
        }

        result_category();

        var data = JSON.parse(`<?php echo $data_results; ?>`);
        var chart = $("#myAreaChart");

        
        var data = {
            labels: data.label,
            datasets: [
            {
                label: "Score:",
                data: data.data,

                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 0.05)",
                borderColor: "rgba(78, 115, 223, 1)",
                pointRadius: 3,
                pointBackgroundColor: "rgba(78, 115, 223, 1)",
                pointBorderColor: "rgba(78, 115, 223, 1)",
                pointHoverRadius: 3,
                pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
                pointHoverBorderColor: "rgba(78, 115, 223, 1)",
                pointHitRadius: 10,
                pointBorderWidth: 2,
                
            }
            ]
        };

        var options = {
            maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                legend: {
                    display: false
                },
                tooltips: {
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    displayColors: false,
                    intersect: false,
                    mode: 'index',
                    caretPadding: 10,
                },
        };

        var chart = new Chart(chart, {
            type: "line",
            data: data,
            options: options
        });


});

function result_category() {
    var action_url = '{{ route("admin.student.result_category", ":result_id") }}';
                action_url = action_url.replace(':result_id', $('#result_id').val());
            $.ajax({
                url : action_url,
                dataType:"json",
                beforeSend:function(){
                
                },
                success:function(data){
                    var top = '';
                    var items = data.results_top.slice(0, 3);

                    var bot = '';
                    var items1 = data.results_bottom.slice(0, 3);

                    let botTopic = "";

                    $.each(items, function(key,value){
                        top +=  '<div class="progress  position-relative mt-2" style="height: 40px;">'
                        top +=     '<div class="progress-bar bar1" role="progressbar" style="width: '+value.percent+'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>'
                        top +=     '<h6 class="justify-content-center d-flex position-absolute w-100 mt-2">'+value.percent+' % ' + value.cat_title +'</h6>'
                        top +=  '</div>'
                    });
                    $('#top').empty().append(top);

                    $.each(items1, function(key,value){
                        bot +=  '<div class="progress  position-relative mt-2" style="height: 40px;">'
                        bot +=     '<div class="progress-bar bar4" role="progressbar" style="width: '+value.percent+'%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>'
                        bot +=     '<h6 class="justify-content-center d-flex position-absolute w-100 mt-2">'+value.percent+' % ' + value.cat_title +'</h6>'
                        bot +=  '</div>'
                        botTopic = botTopic.concat(value.cat_title, ",");
                    });

                    $('#bot').empty().append(bot);
                    
                    let str = $("#recLearningStyle").val();
                    str = str.slice(0, -1);
                    let exploded = str.split(',');
                    let learningResult = exploded[0]+ ","+exploded[1]+","+exploded[2]+" and "+ exploded[3];

                    botTopic = botTopic.slice(0, -1);
                    botTopic = botTopic.replace(/4th yr /g, "");
                    botTopic = botTopic.replace(/1st yr /g, "");
                    botTopic = botTopic.replace(/2nd yr /g, "");
                    botTopic = botTopic.replace(/3rd yr /g, "");
                    let explodedTopic = botTopic.split(',');
                    let topicResult = explodedTopic[0]+ ","+explodedTopic[1]+" and "+explodedTopic[2];
                     
                    $.ajax({
                        url : "{{ url('chat')}}",
                        type: "POST",
                        data : {
                            "message": "Can you give me a recommendation to about topics on "+ topicResult +" that utilize "+learningResult+" learning style on each topic 200 words in html format only not including the whole html markup"
                        },
                        dataType:"json",
                        success:function(data){
                            $("#recoDiv").html(data.message);
                        }
                    })
                }
            })
}
</script>

@endsection