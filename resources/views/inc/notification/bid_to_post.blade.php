<a href="{{route('posts.show',$notification->data['post']['id'])}}">
    {{$notification->data['user']['name']}} placed a bid on <strong>{{$notification->data['post']['product_name']}}</strong>
</a>