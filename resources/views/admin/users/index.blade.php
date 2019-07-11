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
                      <td>Name</td>
                      <td>Email</td>
                      <td>Created At</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              {!! $users->links() !!}
            <div>
        </div>
    </div>
</div>
@endsection