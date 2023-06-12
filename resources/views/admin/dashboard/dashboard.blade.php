@extends('layouts.admin')
@section('sub-title','DASHBOARD')

@section('content')
<div class="container-fluid">
    <!-- Content Row -->
    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-2">
                    <h1>Dashboard</h1>
                </div>
                <div class="col-xl-3 col-md-6 mb-2 ml-auto">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Filter By</div>
                    <select id="filter" class="form-control">
                        <option value="ITE">ITE</option>
                        <option value="IT">IT</option>
                        <option value="CS">CS</option>
                    </select>
                </div>
            </div>
           
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$users}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Category</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$categories}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Questions</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$questions}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-trophy fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Gender</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            
                                <i class="fa-solid fa-person text-info"></i> 
                                   <span class="genderAll">{{$usersm}}</span> 
                                   <span class="genderBsit">{{$usersmbsit}} </span> 
                                   <span class="genderBscs">{{$usersmbscs}} </span> 

                                   <i class="fa-solid fa-person-dress text-danger"></i> 
                                    <span class="genderAll">{{$usersf}}</span> 
                                    <span class="genderBsit">{{$usersfbsit}} </span> 
                                    <span class="genderBscs">{{$usersfbscs}} </span> 
                                  </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa-solid fa-venus-mars fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">
        <div class="col-xl-6 col-md-6 mb-4 mx-auto bsit">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Total Respondents for IT Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$r_bsit}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-trophy fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4 mx-auto bscs">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Total Respondents for CS Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$r_bscs}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-trophy fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7 bsit" >
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">IT Expertise Report</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChartIT"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5 bsit">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">IT student who</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChartIT"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Passed
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Failed
                        </span>
                    
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-8 col-lg-7 bscs"> 
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">CS Expertise Report</h6>
                    
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChartCS"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5 bscs">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">CS student who</h6>
                
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChartCS"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Passed
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-danger"></i> Failed
                        </span>
                    
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4 mx-auto bsit">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Total Learning style Respondents for IT Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ls_bsit}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-trophy fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-md-6 mb-4 mx-auto bscs">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                Total Learning style Respondents  for CS Students</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ls_bscs}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-trophy fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">LEARNING STYLE</h6>
                
                </div>
                  <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChartLS"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</div>
@endsection

@section('scripts')
<script>
    $(function(){
        $('.genderBscs').hide();
        $('.genderBsit').hide();
        var data_it = JSON.parse(`<?php echo $data_results_bsit; ?>`);
        var chart_it = $("#myAreaChartIT");
        

        var data_cs = JSON.parse(`<?php echo $data_results_bscs; ?>`);
        var chart_cs = $("#myAreaChartCS");
        
        var data_lsresult = JSON.parse(`<?php echo $data_results_ls; ?>`);
        var chart_ls = $("#myAreaChartLS");
        console.log(data_ls)
        
    

        var data_it = {
            labels: data_it.label,
            datasets: [
            {
                label: "Score:",
                data: data_it.data,

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

        var data_cs = {
            labels: data_cs.label,
            datasets: [
            {
                label: "Score:",
                data: data_cs.data,

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

        var data_ls = {
            labels: [
                "ACTIVE","REFLECTIVE","SENSING","INTUITIVE",
                "VISUAL","VERBAL","SEQUENTIAL","GLOBAL",
            ],
            datasets: [
            {
                label: "TOTAL:",
                data: data_lsresult,

                lineTension: 0.3,
                backgroundColor: "rgba(78, 115, 223, 1)",

                borderColor: "#111",
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

        var chart_bsit = new Chart(chart_it, {
            type: "line",
            data: data_it,
            options: options
        });

        var chart_bscs = new Chart(chart_cs, {
            type: "line",
            data: data_cs,
            options: options
        });

        var chart_ls = new Chart(chart_ls, {
            type: "bar",
            data: data_ls,
            options: options
        });

        // IT PIE
        var failed_bsit = JSON.parse(`<?php echo $failed_bsit; ?>`);
        var passed_bsit = JSON.parse(`<?php echo $passed_bsit; ?>`);
      
        var ctx_bsit = document.getElementById("myPieChartIT");
        var myPieChartIT = new Chart(ctx_bsit, {
            type: 'doughnut',
            data: {
                
                datasets: [{
                data: [failed_bsit, passed_bsit],
                backgroundColor: ['#e74a3b','#1cc88a'],
                hoverBackgroundColor: ['#e74a3b','#1cc88a'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
                labels: ["Failed by %" , "Passed by %"],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                },
                legend: {
                display: false
                },
                cutoutPercentage: 80,
            },
        });


        
        // CS PIE
        var failed_bscs = JSON.parse(`<?php echo $failed_bscs; ?>`);
        var passed_bscs = JSON.parse(`<?php echo $passed_bscs; ?>`);

        var ctx_bscs = document.getElementById("myPieChartCS");
        var myPieChartCS = new Chart(ctx_bscs, {
            type: 'doughnut',
            data: {
                
                datasets: [{
                data: [failed_bscs, passed_bscs],
                backgroundColor: ['#e74a3b','#1cc88a'],
                hoverBackgroundColor: ['#e74a3b','#1cc88a'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
                }],
                labels: ["Failed by %" , "Passed by %"],
            },
            options: {
                maintainAspectRatio: false,
                tooltips: {
                backgroundColor: "rgb(255,255,255)",
                bodyFontColor: "#858796",
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                caretPadding: 10,
                },
                legend: {
                display: false
                },
                cutoutPercentage: 80,
            },
        });

        $('#filter').on('change', function() {
            var filter = this.value;
            if(filter == 'ITE'){
                location.reload();
            }
            else if(filter == 'IT'){
                $('.bsit').show();
                $('.bscs').hide();
                $('.genderBscs').hide();
                $('.genderAll').hide();
                $('.genderBsit').show();
            }
            else if(filter == 'CS'){
                $('.bsit').hide();
                $('.bscs').show();
                $('.genderBscs').show();
                $('.genderAll').hide();
                $('.genderBsit').hide();
            }
        });
    });

</script>
@endsection
