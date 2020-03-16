@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="panel">
                    @component('components.who')
                    @endcomponent
                </div>
                <iframe src="https://nepalicalendar.rat32.com/vegetable/embed.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100%; height:3000px; border-radius:5px;padding:0px;margin:0px;" allowtransparency="true"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
