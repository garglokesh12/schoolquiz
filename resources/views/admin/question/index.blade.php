@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="uper">
              @if(session()->get('success'))
                <div class="alert alert-success">
                  {{ session()->get('success') }}  
                </div><br />
              @endif
              <table class="table table-striped">
                <thead>
                    <tr>
                      <td>ID</td>
                      <td>Question</td>
                      <td>Answer</td>
                      <td colspan="2" align="center">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($questions as $question)
                    <tr>
                        <td>{{$question->id}}</td>
                        <td>{{$question->question}}</td>
                        <td>{{$question->answer}}</td>
                        <td><a href="{{ route('questions.edit',$question->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('questions.destroy', $question->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              {!! $questions->links() !!}
            <div>
        </div>
    </div>
</div>
@endsection