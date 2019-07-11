@extends('admin.layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card uper">
                <div class="card-header">Edit Category</div>
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
      
                    <form action="{{ route('categories.update',$category->id) }}" method="POST">
                        @csrf
                        @method('PUT') 
                        <div class="form-group">
                            <strong>Category Name:</strong>
                            <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" placeholder="Name">
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection