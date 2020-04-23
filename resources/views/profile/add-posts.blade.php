@extends('layouts.app')

@section('title', e(Auth::user()->first_name.' '.Auth::user()->last_name.' '. '/ VFM'))

@section('content')
    <div class="container">
        <div class="col-12">
            Hello, {{Auth::user()->first_name.' '.Auth::user()->last_name}}
        </div>
        <div class="row">
            <div class="col-md-4">
                <ul>
                    <li>
                        <a href="/dashboard" class="btn btn-link text-dark"><span> Manage My Account</span></a>
                    </li>
                    <li>
                        <a href="/dashboard" class="btn btn-link text-primary"><strong>Add Post <i class="fas fa-angle-double-right"></i></strong></a>
                    </li>
                    <li>
                        <a href="/dashboard" class="btn btn-link text-dark"><span>My Posts</span></a>
                    </li>
                    <li>
                        <a href="/dashboard" class="btn btn-link text-dark"><span>My Bids </span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
