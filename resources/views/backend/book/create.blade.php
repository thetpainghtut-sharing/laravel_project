@extends('backend.layout')

@section('content')
  <div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Book Create</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h6 class="m-0 font-weight-bold text-primary">Create New Book</h6>
            <a href="{{route('books.index')}}" class="btn btn-primary">Back</a>
        </div>
        <div class="card-body">
            <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row mb-3">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" name="bookName" class="form-control w-50 @error('bookName') is-invalid @enderror" value="{{old('bookName')}}" id="name" placeholder="...">
                  @error('bookName')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="author" class="col-sm-2 col-form-label">Author</label>
                <div class="col-sm-10">
                  <select name="bookAuthor" class="form-select form-control w-50 @error('bookAuthor') is-invalid @enderror" id="author">
                    <option selected disabled>Choose...</option>
                    @foreach ($authors as $author)
                      <option value="{{$author->id}}" 
                        {{old('bookAuthor') == $author->id ? 'selected' : ''}}>{{$author->name}}</option>
                    @endforeach
                  </select>
                  @error('bookAuthor')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="price" class="col-sm-2 col-form-label">Price</label>
                <div class="col-sm-10">
                  <input type="number" name="bookPrice" class="form-control w-50 @error('bookPrice') is-invalid @enderror" value="{{old('bookPrice')}}" id="price" placeholder="...">
                  @error('bookPrice')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="category" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-10">
                  <select name="bookCategory" class="form-select form-control w-50 @error('bookCategory') is-invalid @enderror" id="category">
                    <option selected disabled>Choose...</option>
                    @foreach ($categories as $category)
                      <option value="{{$category->id}}" 
                        {{old('bookCategory') == $category->id ? 'selected' : ''}}>{{$category->name}}</option>
                    @endforeach
                  </select>
                  @error('bookCategory')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                  <input type="file" name="bookImage" class="form-control-file w-50 @error('bookImage') is-invalid @enderror" id="image" placeholder="...">
                  @error('bookImage')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea name="bookDescription" rows="10" class="form-control w-50 @error('bookDescription') is-invalid @enderror" id="description">{{old('bookDescription')}}</textarea>
                  @error('bookDescription')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
              <div class="row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </div>
            </form>
        </div>
    </div>
  </div>
@endsection