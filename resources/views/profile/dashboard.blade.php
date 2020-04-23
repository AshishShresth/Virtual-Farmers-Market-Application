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
                        <a href="/dashboard" class="btn btn-link text-dark"><span> Manage My Account</span></a>
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
                    <div class="container bg-gradient-light">
                        <table class="table">
                            <tr>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>View</th>
                                <th>Delete</th>
                            </tr>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->product_name}}
                                        {{$post ->created_at->diffForHumans()}}
                                        {{$post ->created_at->format('d.m.Y')}}</td>

                                    <td><a href="/posts/{{$post->id}}/edit" class="btn btn-info">Edit</a>
                                        <a href="/posts/{{$post->id}}/add-image" class="btn btn-info">Add Images</a></td>
                                    <td><a href="{{route('posts.show', $post->id)}}" class="btn btn-info">view</a></td>
                                    <td>
                                        <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <!-- edit button -->
                                        <!--<a href="{{route('posts.edit', $post->id)}}" class="btn btn-info">Edit</a> -->
                                            <!-- delete button -->
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                @else
                    <p>You have no posts</p>
                @endif
            </div>
        </div>
    </div>
@endsection
