@extends('layouts.app')
@section('content')
    <div class="container mb-5">
        <h1>Create Posts</h1>
        <form method="post"  action="{{ route('posts.store') }} " enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product name"/>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity in Kilogram</label>
                <input type="number" class="form-group" name="quantity" id="quantity" />
            </div>
            <div class="form-group">
                <label for="price_per_kg">Price per Kilogram</label>
                <input type="number" class="form-group" name="price_per_kg" id="price_per_kg" />
            </div>
            <div class="form-group">
                <label for="date_of_harvest">Date of harvest</label>
                <input type="datetime-local" class="form-group" name="date_of_harvest" id="date_of_harvest"/>
            </div>
            <div class="form-group">
                <label for="post_category">Post Category</label>
                <select class="form-control" name="post_category" id="post_category">
                    <option value="0" hidden="">Select category...</option>
                    @foreach( $categories as $category )
                        <option value="{{ $category->id }}"> {{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="address">Your full address</label>
                <input type="text" class="form-control" name="current_address" id="current_address" placeholder="Address"/>
            </div>
            <div class="form-group">
                <label for="district">Districts</label>
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
            <!--
                <div class="form-group">
                    <label for="post_images">Product images</label>
                    <input id="post_images" name="post_images[]" type="file" multiple>
                </div>
            -->
            <div class="form-group">
                <label for="quantity">Product description</label>
                <textarea class="form-control" name="product_description" cols="20" rows="10" placeholder="Body Text"></textarea>
            </div>
            <div class="form-group">
                <input type="file" name="cover_image">
            </div>
            <div class="row">
                <div class="d-flex justify-content-start col-md-6">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="d-flex justify-content-end col-md-6">
                    <a class="btn btn-danger " href="/dashboard">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection