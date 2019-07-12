@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Admin's</strong> Dashboard</div>

                <div class="card-body">
                    
                    <div class="container">
                        <div class="row">
                            <strong> Total No of Users in System : </strong> {{ $totaluser }} 
                        </div>
                    </div>

                    <div class="container">
                        <div class="row">
                            <strong> Total No of Quiz given by Users :</strong> {{ $quizs->count() }} 
                        </div>
                    </div>
                    
                    <div class="container">
                       
                        <strong> Top 10 users score list:</strong>
                            
                        <div class="row">
                            <ol type="decimal">
                            @foreach($toptenusers as $toptenuser)

                                <li> {{$toptenuser->user->name}}  :  {{ $toptenuser->score}}</li>

                            @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection