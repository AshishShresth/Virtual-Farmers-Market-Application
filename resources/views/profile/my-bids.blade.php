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
                        <a href="/dashboard" class="btn btn-link text-dark"><span>My Posts</span></a>
                    </li>
                    <li>
                        <a href="/my-bids" class="btn btn-link text-primary"><strong>My Bids<i class="fas fa-angle-double-right"></i></strong></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                @if($bids->count()<=1)
                        <h4>You have <span class="text-primary">{{ $bids->count() }}</span> Bid</h4>
                    @else
                        <h4>You have <span class="text-primary">{{ $bids->count() }}</span> Bids</h4>
                    @endif
                <hr size="30">
                <div class="container">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-dark">
                        <tr>
                            <th>Product Title</th>
                            <th>Product Quantity</th>
                            <th>Bidding Price</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($bids as $bid)
                            <tr>
                                <td><a href="{{ route('posts.show', $bid->post_id) }}">{{ $bid->product_name }}</a></td>
                                <td>{{ $bid->product_quantity }}</td>
                                <td>{{ $bid->bidding_price }}</td>
                                <td>{{ $bid->message }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <a href="/bids/{{$bid->id}}" class="btn btn-sm btn-primary">Chat<span class="glyphicon glyphicon-pencil"></span></a>
                                        </div>
                                        <div class="col-sm-6">
                                            <form action="{{ route('delete_bid',$bid->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <!-- delete button -->
                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
