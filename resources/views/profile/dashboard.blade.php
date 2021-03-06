@extends('layouts.app')

@section('title', e(Auth::user()->first_name.' '.Auth::user()->last_name.' '. '/ VFM'))

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-md-3">
                <h4>Hello, {{Auth::user()->first_name.' '.Auth::user()->last_name}}</h4>
                <hr>
                <ul>
                    <li>
                        <a href="/dashboard" class="btn btn-link text-dark"><span>My Account</span></a>
                    </li>
                    <li>
                        <a href="/posts/create" class="btn btn-link text-dark"><span>Add Post </span></a>
                    </li>
                    <li>
                        <a href="/dashboard" class="btn btn-link text-primary"><strong>My Posts<i class="fas fa-angle-double-right"></i></strong></a>
                    </li>
                    <li>
                        <a href="/my-bids" class="btn btn-link text-dark"><span>My Bids </span></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if($posts->count()<=1)
                        <h4>You have <span class="text-primary">{{ $posts->count() }}</span> post</h4>
                    @else
                        <h4>You have <span class="text-primary">{{ $posts->count() }}</span> posts</h4>
                    @endif
                    <hr size="30">
                @if(count($posts) > 0)
                    <div class="container">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">Post Name</th>
                                    <th scope="col">Bibbers</th>
                                    <th scope="col">Add Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($posts as $post)
                                    <tr>
                                        <td class="w-25">
                                            <img style="width: 80%;  padding-right: 5px" src="/storage/{{$post->images->first()->image_url}}">
                                        </td>
                                        <td>
                                            <a href="{{route('posts.show', $post->id)}}" ><strong>{{$post->product_name}}</strong></a>
                                            <br>
                                            {{$post ->created_at->diffForHumans()}}
                                            <br>
                                            Date: {{$post ->created_at->format('d/m/Y')}}

                                        </td>
                                        <td>
                                            <a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-info"><strong>{{ $post->bids()->count() }}</strong>  Bids</a>
                                        </td>
                                        <td>
                                            <a href="{{route('posts.image', $post->id)}}" class="btn btn-sm btn-secondary">Add Images</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <!-- edit button -->
                                                <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                <!-- delete button -->
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
{{--                            <table class="table table-bordered table-striped">--}}
{{--                                <thead class="thead-dark">--}}
{{--                                    <tr>--}}
{{--                                        <th>Title</th>--}}
{{--                                        <th>Images</th>--}}
{{--                                        <th>View</th>--}}
{{--                                        <th>Bidders</th>--}}
{{--                                        <th></th>--}}
{{--                                    </tr>--}}
{{--                                </thead>--}}
{{--                                @foreach($posts as $post)--}}
{{--                                    <tr>--}}
{{--                                        <td class="w-25">--}}
{{--                                            <img style="width: 30%;  padding-right: 5px" src="/storage/{{$post->images->first()->image_url}}">--}}
{{--                                            <strong>{{$post->product_name}}</strong>--}}
{{--                                            <br>--}}
{{--                                            Date: {{$post ->created_at->format('d/m/Y')}}--}}
{{--                                            {{$post ->created_at->diffForHumans()}}--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <a href="{{route('posts.image', $post->id)}}" class="btn btn-sm btn-secondary">Add Images</a>--}}
{{--                                        </td>--}}
{{--                                        <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-info">View</a></td>--}}
{{--                                        <td>--}}
{{--                                            <a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>--}}
{{--                                            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">--}}
{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <!-- edit button -->--}}
{{--                                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-warning">Edit</a>--}}
{{--                                                <!-- delete button -->--}}
{{--                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>--}}
{{--                                            </form>--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
{{--                            </table>--}}
                        </div>

                    </div>
                @else
                    <p>You have no posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection
