@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card uper">
                <div class="card-header">Edit Question</div>
                <div class="card-body">
                  @if ($errors->any())
                    <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                    </div><br />
                  @endif
      
                    <form action="{{ route('questions.update',$question->id) }}" method="POST">
                        @csrf
                        @method('PUT') 
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select id= "category_id" name ="category_id">
                              <option value="" >--Select--</option>
                              @if(!$categories->isEmpty())
                                @foreach($categories as $category)
                                  <option value="{{ $category->id }}" {{ $category->id == $question->category_id  ? 'selected' : ''}} >{{ $category->category_name }}</option>
                                @endforeach
                              @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="question">Question:</label>
                            <input type="text" name="question" value="{{ $question->question }}" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Answer:</label>
                            <input type="text" name="answer" value="{{ $question->answer }}" class="form-control" placeholder="Name">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Question</button>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection