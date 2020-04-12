@extends ( 'layouts.app' )

@section( 'content' )
    <div class="row" >
        <div class="col-md-4 ">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title">{{$bids->user->first_name}} {{$bids->user->last_name}}</h5>
                    <p class="card-text"><strong>Product Quantity:</strong> {{ $bids->product_quantity }} kg</p>
                    <p class="card-text"><strong>Bidding Price:</strong> Rs.{{ $bids->bidding_price }}/kg</p>
                    <a href="{{ $bids->post->link() }}" class="btn btn-primary">Go To Post</a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card card-primary">
                <div class="card-header">Message</div>
                <div class="card-body">
                    <div style="margin-bottom:50px;" v-if="user" >
                        <textarea class="form-control" rows="3" name="message" placeholder="Leave a message" v-model="commentBox"></textarea>
                        <button class="btn btn-success" style="margin-top:10px" @click.prevent="postComment">Save message</button>
                    </div>
                    <div v-else>
                        <h5>You must be loggeb in to submit a message</h5>
                        <a href="/login">Login Now</a>
                    </div>
                    <div class="media" style="margin-top:20px;" v-for="comment in comments">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="http://placeimg.com/80/80" alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading">@{{ comment.user.first_name }}</h4>
                            <p>
                                @{{ comment.message }}
                            </p>
                            <span style="color: #aaa;">on @{{ comment.created_at }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const app = new Vue({
            el: '#app',
            data: {
                comments: {},
                commentBox: '',
                bid: {!! $bids->tojson() !!},
                user: {!! Auth::check() ? Auth::user()->toJson() : 'null'!!}
            },
            mounted() {
                this.getComments();
            },
            methods: {
                getComments() {
                    axios.get('/api/bids/'+this.bid.id+'/comments')
                        .then((response) => {
                            this.comments = response.data
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                },
                postComment() {
                    axios.post('/api/bids/'+this.bid.id+'/comment', {
                        api_token: this.user.api_token,
                        message: this.commentBox
                    })
                        .then((response) => {
                            this.comments.unshift(response.data);
                            this.commentBox = '';
                        })
                        .catch((error) => {
                            console.log(error);
                        })
                },
            }
        });
    </script>
@endsection

