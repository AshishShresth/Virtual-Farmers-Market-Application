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
                <div class="card">
                    <div class="card-header">
                        <h3>Picture Upload</h3>
                    </div>
                    <div class="card-body">
                        Select and upload picture for your ad - {{$post->product_name}}
                        <form method="post"  action="{{ route('posts.addImage', $post->id) }} " enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="post_images">Product images</label>
                                <input class="input-group" id="post_images" name="post_images[]" type="file"  multiple>
                                <p class="font-weight-lighter font-italic">Choose image files to upload</p>
                                <input type="submit" class="btn btn-primary" id="submit" value="Upload" disabled="disabled"/>
                            </div>
                        </form>
                        <div class="container mt-5">
                            <div class="row">
                                @foreach($images as $image)
                                    <div class="col-sm-6" style="max-width: 20%">
                                        <img style="width: 100%" src="/storage/post_images/{{$image->image_url}}" class="img-thumbnail">
                                        <button type="submit">Delete</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#post_images').change(function () {
                $('#submit').removeAttr('disabled');
            })
        })
    </script>
@endsection
