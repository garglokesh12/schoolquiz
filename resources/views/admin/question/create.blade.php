@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card uper">
            <div class="card-header">
              Add Category
            </div>
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
                <form method="post" action="{{ route('questions.store') }}">

                    <div class="form-group">
                        @csrf
                        <label for="category_id">Category</label>
                        <select id= "category_id" name ="category_id">
                          <option value="" >--Select--</option>
                          @if(!$categories->isEmpty())
                            @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                          @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="question">Question:</label>
                        <input type="text" class="form-control" name="question"/>
                    </div>
                    
                    <div class="form-group">
                        <label for="question">Answer:</label>
                        <input type="text" class="form-control" name="answer"/>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </form>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection