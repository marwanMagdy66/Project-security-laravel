<div>
  @yield('title')
<title>index</title>
</div>
      @extends('layouts.app')
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
      
      <div class="mt-5">
        <div class="text-center">
            <a type="button" class="btn btn-success" href={{route("posts.create")}} >Create Post</a>

        </div>
      </div>

      <div class="mt-4 ">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>

          </tr>
        </thead>
        <tbody>
         
            @foreach( $posts as $post )
            <tr>
                <th scope="row">{{$post->id}}</th>
                <td>{{$post->title}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->created_at->format("y-m-d")}}</td>
                @if($user->id==$post->user_id)
                <td>
                 
                    <a href={{route('posts.show',$post->id)}} class="btn btn-info">View</a>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-primary">Edit</a>
                    <form style="display: inline;" method="POST" action="{{route('posts.destroy', $post->id)}}">
                      @csrf
                      {{-- @method('DELETE') --}}
                      <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                  </td>
                  @endif
    
              </tr>
            @endforeach
        
       
        
        </tbody>
      </table>
    </div>
    @endsection
