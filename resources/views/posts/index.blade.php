@extends ( 'layouts.app' )

@section('title', "VFM.com - Nepal's Online farmers Market")

@section( 'content' )
    <div class="container gedf-wrapper">
        <div class="row">
            <div class="col-md-4 mb-5">
                <div class="container border border-green">
                    <h2>Advance search</h2>
                    <form method="post" action="{{route('advance-search')}}">
                        @csrf
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Search</label>
                            <div class="col-sm-9">
                                <input type="search" name="title" class="form-control"  placeholder="Search...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <select class="form-control" name="post_category" id="post_category">
                                    <option value="0" hidden="">Select category...</option>
                                    @foreach( $categories as $category )
                                        <option value="{{ $category->id }}"> {{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label">District</label>
                            <div class="col-sm-9">
                                <select name="district" id="district" class="form-control">
                                    <option value="0" hidden="">Select District...</option>
                                    <option value="achham">
                                        Achham  </option><option value="arghakhanchi">
                                        Arghakhanchi </option><option value="baglung">
                                        Baglung </option><option value="baitadi">
                                        Baitadi </option><option value="bajhang">
                                        Bajhang </option><option value="bajura">
                                        Bajura </option><option value="banke">
                                        Banke </option><option value="bara">
                                        Bara </option><option value="bardiya">
                                        Bardiya </option><option value="bhaktapur">
                                        Bhaktapur </option><option value="bhojpur">
                                        Bhojpur </option><option value="chitwan">
                                        Chitwan </option><option value="dadeldhura">
                                        Dadeldhura </option><option value="dailekh">
                                        Dailekh </option><option value="dang deukhuri">
                                        Dang deukhuri </option><option value="darchula">
                                        Darchula </option><option value="dhading">
                                        Dhading </option><option value="dhankuta">
                                        Dhankuta </option><option value="dhanusa">
                                        Dhanusa </option><option value="dholkha">
                                        Dholkha </option><option value="dolpa">
                                        Dolpa </option><option value="doti">
                                        Doti </option><option value="gorkha">
                                        Gorkha </option><option value="gulmi">
                                        Gulmi </option><option value="humla">
                                        Humla </option><option value="ilam">
                                        Ilam </option><option value="jajarkot">
                                        Jajarkot </option><option value="jhapa">
                                        Jhapa </option><option value="jumla">
                                        Jumla </option><option value="kailali">
                                        Kailali </option><option value="kalikot">
                                        Kalikot </option><option value="kanchanpur">
                                        Kanchanpur </option><option value="kapilvastu">
                                        Kapilvastu </option><option value="kaski">
                                        Kaski </option><option value="kathmandu">
                                        Kathmandu </option><option value="kavrepalanchok">
                                        Kavrepalanchok </option><option value="khotang">
                                        Khotang </option><option value="lalitpur">
                                        Lalitpur </option><option value="lamjung">
                                        Lamjung </option><option value="mahottari">
                                        Mahottari </option><option value="makwanpur">
                                        Makwanpur </option><option value="manang">
                                        Manang </option><option value="morang">
                                        Morang </option><option value="mugu">
                                        Mugu </option><option value="mustang">
                                        Mustang </option><option value="myagdi">
                                        Myagdi </option><option value="nawalparasi">
                                        Nawalparasi </option><option value="nuwakot">
                                        Nuwakot </option><option value="okhaldhunga">
                                        Okhaldhunga </option><option value="palpa">
                                        Palpa </option><option value="panchthar">
                                        Panchthar </option><option value="parbat">
                                        Parbat </option><option value="parsa">
                                        Parsa </option><option value="pyuthan">
                                        Pyuthan </option><option value="ramechhap">
                                        Ramechhap </option><option value="rasuwa">
                                        Rasuwa </option><option value="rautahat">
                                        Rautahat </option><option value="rolpa">
                                        Rolpa </option><option value="rukum">
                                        Rukum </option><option value="rupandehi">
                                        Rupandehi </option><option value="salyan">
                                        Salyan </option><option value="sankhuwasabha">
                                        Sankhuwasabha </option><option value="saptari">
                                        Saptari </option><option value="sarlahi">
                                        Sarlahi </option><option value="sindhuli">
                                        Sindhuli </option><option value="sindhupalchok">
                                        Sindhupalchok </option><option value="siraha">
                                        Siraha </option><option value="solukhumbu">
                                        Solukhumbu </option><option value="sunsari">
                                        Sunsari </option><option value="surkhet">
                                        Surkhet </option><option value="syangja">
                                        Syangja </option><option value="tanahu">
                                        Tanahu </option><option value="taplejung">
                                        Taplejung </option><option value="terhathum">
                                        Terhathum </option><option value="udayapur">
                                        Udayapur </option> </select>
                            </div>
                        </div>
                        <button class="btn btn-primary" type="submit" ><i class="fa fa-search"></i>Search</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6 gedf-main">
                @foreach( $posts as $post)
                    <div class="card gedf-card">
                        <div class="card-horizontal">
                            <div class="img-square-wrapper">
                                <img style="width: 100%" src="/storage/cover_images/{{$post->cover_image}}">
                            </div>
                            <div class="card-body">
                                <h3><a class="card-link" href="/posts/{{$post->id}}">{{$post->product_name}}</a></h3>
                                <div class="card-text">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo recusandae nulla rem eos ipsa praesentium esse magnam nemo dolor
                                    sequi fuga quia quaerat cum, obcaecati hic, molestias minima iste voluptates.
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="/posts/{{$post->id}}" class="btn btn-primary">View Details</a></h3>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <div class="col-md-12">
        {{ $posts->links() }}
    </div>

@endsection