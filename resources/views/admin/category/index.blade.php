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
                      <td>Category Name</td>
                      <td colspan="2">Action</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->category_name}}</td>
                        <td><a href="{{ route('categories.edit',$category->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              {!! $categories->links() !!}
            <div>
        </div>
    </div>
</div>
@endsection