@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Quiz</div>

                <div class="card-body">
                <h3>Total Number of questions are 12. Each of 1 Mark.</h3>
                <p><strong>Note:</strong> All answers you have to give only in number format.</p>
                <br>

					<form method="POST" action="">
					@csrf
					<input type="hidden" name="userid" value="{{ Auth::user()->id }}">
					
					<?php $i=1; ?>
						@foreach($questions as $question)
						<div id="question{{$i}}" class="question cont @if($i!=1) hide @endif">
							<div class="form-group">
								<p>Ques{{$i}}. {{$question->question}}</p>
								<input type="hidden" name="question[]" value="{{$question->id}}">
								<input type="text" name="answer[]" value="">
							</div>
							@if($i >=1 && $i < 12)
							
							<button type="button" data-id={{$i}} id="question{{$i}}" class="btn btn-primary next">Next</button>
							@endif
						</div>
					
						<?php $i++; ?>
						@endforeach
					
						
						<button id="submitbtn" type="submit" class="btn btn-primary hide">Submit Test</button>
						
					</form>                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
