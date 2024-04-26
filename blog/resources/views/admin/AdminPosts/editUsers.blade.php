@extends('admin.layouts.app')
@section('title')
    <title>edit</title>
@endsection

@section('content')

<div>
@if(session()->has('message'))
<div class="alert alert-success" role="alert" style="    border-radius: 3%;
    border-radius: 3%;
    margin-top: 12px;
    width: 420px;
    margin-left: 38%;
    margin-bottom: 46px;
    text-align: center;
    box-shadow: 8px 10px 18px -7px;
    font-size: 16px;
    padding: 10px;">
    {{session()->get('message')}}
</div>
  @endif

</div>




    



<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Address</th>
        <th scope="col">Created_At</th>
        <th scope="col">Actions</th>

      </tr>
    </thead>
    <tbody>
     
        @foreach( $users as $user )
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->created_at->format("y-m-d")}}</td>
            <td>
             
                {{-- <a href={{route('admin.posts.show',$user->id)}} class="btn btn-info">View</a>
                <a href="{{route('admin.posts.edit',$post->id)}}" class="btn btn-primary">Edit</a> --}}
                <form style="display: inline;" method="POST" action="{{route('admin.destroy', $user->id)}}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Delete</button>
              </form>
              </td>
             

          </tr>
        @endforeach
    
   
    
    </tbody>
  </table>




@endsection