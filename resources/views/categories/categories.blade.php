@extends('layouts.app')

@section('content')
    <div class="card">
        <form action="{{ route('save-category') }}" method="post" >
            @csrf
            <div class="form-group row mt-4 ml-5">
                <label for="category_title" class="col-md-2 col-form-label">Category Title</label>
                <div class="col-md-3 mr-5">
                    <input type="text"  class="form-control" id="category_title" placeholder="Category title" name="category_title" required>
                </div>
            </div>
            <div class="form-group row mt-4 ml-5">
                <label for="category_title" class="col-md-2 col-form-label">Category Level</label>
                <div class="col-md-5">
                    <select name="parent_id" id="parent_id">
                        <option value="0">Main Category</option>
                        @foreach($levels as $val)
                            <option value="{{ $val->id }}">{{ $val->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row ml-5">
                <label for="" class="col-md-2 col-form-label"></label>
                <div class="col-md-10">
                    <button type="submit" class="btn btn-primary">Save New Category</button>
                </div>
            </div>
        </form>
    </div>

    <div class="row">
        <table class="table table-bordered dataTable">
            <thead>
            <tr>
                <th>Category Id</th>
                <th>Category Name</th>
                <th>Category Level</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->title }}</td>
                        <td>{{ $category->parent_id }}</td>
                        <td><form action="{{ url('/categories', ['id' => $category->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger float-right">Delete</button>
                            </form></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endsection