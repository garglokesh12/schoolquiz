@extends('layouts.app')
<style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .customlist li{
                display: inline;
                float:left;
            }
            .customlist{
                border: 1px solid gray;
                border-radius: 8px;
                margin: 0 !important;
                padding: 0 !important;
            }
            .customlist h6{
                background: #1111;
                padding: 5%;
                border: 1px gray;
            }
            .customlist p{
                padding-left: 3%;
            }
        </style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                        <div class="container">
                        
                        <p><strong>Total quiz given:</strong> {{ $quizs->count()}}</p>
                        
                        <div class="row">
                            <?php $i =1; ?>
                            @foreach($quizs as $quiz)
                                <div class="col-md-3 customlist"><h6>Quiz:  {{$i}} </h6>
                                @foreach($categories as $category)
                                    <p>{{$category->category_name}} = {{ $quiz->userquizquestions->where('category_name', $category->category_name)->sum('score') }} </p>
                                @endforeach
                                </div>
                                <?php $i++; ?>
                            @endforeach
                            
                        </div>
                        </div>
                </div>  
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="title m-b-md">
        School Quiz
    </div>

    <div class="links">
        <a href="{{ route('takeaquiz') }}">Take a Quiz</a>
    </div>
</div>



@endsection
