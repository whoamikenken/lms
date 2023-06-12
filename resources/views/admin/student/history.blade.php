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
                    <h1 class="m-0 text-center mb-2 text-uppercase">HISTORY OF YOUR Assessment</h1>
                  
                    <div class="row">
                        @foreach($results as $result)
                        
                        <div class="col-md-6 mx-auto mt-2">
                            <div class="card">
                                <div class="row card-body">
                                    <div class="col-12 col-sm-4 my-2">
                                        <div><p class="label">Assessment ID</p>{{$result->id}}</div>
                                    </div>
                                    <div class="col-12 col-sm-4 my-2">
                                        <div><p class="label">Name</p>{{$result->user->name}}</div>
                                    </div>
                                    <div class="col-12 col-sm-4 my-2">
                                        <div><p class="label">Year</p>{{$result->year}}</div>
                                    </div>
                                    <div class="col-12 col-sm-4 my-2">
                                        <div><p class="label">Course</p>{{$result->course}}</div>
                                    </div>
                                    <div class="col-12 col-sm-4 my-2">
                                        <div><p class="label">Section</p>{{$result->user->section}}</div>
                                    </div>
                                    <div class="col-12 col-sm-4 my-2">
                                        <div><p class="label">Total Points</p>{{ $result->total_points ?? '0' }}</div>
                                    </div>
                                    <div class="col-12 col-sm-4 my-2 mx-auto mt-2">
                                        <a href="/admin/student/results/{{$result->id}}" class="btn btn-primary btn-sm text-uppercase">
                                            View Result
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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