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

                                            if($active > $reflective){
                                                $result_part1 = $active - $reflective;
                                                $result_part1Text = "A";
                                            }else{
                                                $result_part1 = $reflective - $active;
                                                $result_part1Text = "B";
                                            }

                                        @endphp
                                        <div>
                                            {{$active}} and {{$reflective}}
                                            {{$result_part1}}{{$result_part1Text}}
                                           

                                            <div class="card" id="container" style="height: 200px;">

                                            </div>
                                        </div>
                                        
                                        <br>
                                        
                                        <div class="card">
                                            <div class="card-body">
                                                <p class="m-3">
                                                    What do my results mean?<br><br>
                                                    According to the model on which the ILS is based, there are four dimensions of learning style, with each dimension having two opposite categories (such as active and reflective). The reported score for a dimension indicates your preference for one category or the other.
                                                    <br>
                                                    If your score for a dimension is 1 or 3, you are fairly well balanced on the two categories of that dimension, with only a mild preference for one or the other.
                                                    <br>
                                                    If your score for a dimension is 5 or 7, you have a moderate preference for one category of that dimension. You may learn less easily in an environment that fails to address that preference at least some of the time than you would in a more balanced environment.
                                                    <br>
                                                    If your score for a dimension is 9 or 11, you have a strong preference for one category of that dimension. You may have difficulty learning in an environment that fails to address that preference at least some of the time.
                                                    <br>
                                                    <br>
                                                    We suggest that you print this page, so that when you look at the explanations of the different dimensions you will have a record of your preferences. When you close the page the information cannot be retrieved.
                                                    <br>
                                                    <br>
                                                    For explanations of the dimensions and implications of your preferences, <a target="_blank" class="text-primary" href="https://www.engr.ncsu.edu/wp-content/uploads/drive/1WPAfj3j5o5OuJMiHorJ-lv6fON1C8kCN/styles.pdf">Click here</a>.
                                                    <br>
                                                    For more information about learning styles and the Index of Learning Styles, <a target="_blank" class="text-primary" href="https://educationdesignsinc.com/index-of-learning-styles/">Click here</a>.
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
<script src="https://cdn.anychart.com/releases/8.9.0/js/anychart-base.min.js" type="text/javascript"></script>
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


        anychart.onDocumentReady(function () {
  
        // create a bar chart
        var chart = anychart.bar();

        // data
        var winlossData = [
            [9, 1, "ACTIVE / RELECTIVE"],
            [0, 9, "SENSING / INTUTIVE"],
            [0, 7, "VISUAL / VERBAL"],
            [0, 8, "SEQUENTIAL / GLOBAL"]
        ];

        // configure a function to create series
        var createSeries = function (columnNumber, name) {
            var data = [];
            for (var i = 0; i < winlossData.length; i++) {
            var value = winlossData[i][columnNumber];
            var center = 0;
            if (name === "Wins") {
                data.push({
                x: winlossData[i][2],
                low: center,
                high: center + value,
                value: value
                });
            } else {
                data.push({
                x: winlossData[i][2],
                low: -center,
                high: -center - value,
                value: value
                });
            }
            }
            
            var series = chart.rangeBar(data);
            series.name(name);
        };

        // create series
        createSeries(0, "Active");
        createSeries(1, "Reflective");

        // set the chart title
        chart
            .title()
            .enabled(true)
            .text("LEARNING STYLE");

       
        
        // create a stacked bar chart from the multi-series bar chart
        chart.yScale().stackMode("value");

        // set a container id for the chart
        chart.container("container");
        
        // initiate chart drawing
        chart.draw();

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
                    });
                    $('#bot').empty().append(bot);
                }
            })
}
</script>

@endsection