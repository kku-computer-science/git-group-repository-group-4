@extends('dashboards.users.layouts.user-dash-layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title">Edit Book Details</h4>
                <p class="card-description">Fill in the book details</p>
                <form class="forms-sample" action="{{ route('books.update',$book->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <label for="exampleInputac_name" class="col-sm-3 col-form-label">Book Title</label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_name" value="{{ $book->ac_name }}" class="form-control" placeholder="Title">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_sourcetitle" class="col-sm-3 col-form-label">Publication Location</label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_sourcetitle" value="{{ $book->ac_sourcetitle }}" class="form-control" placeholder="Publication Location">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_year" class="col-sm-3 col-form-label">Publication Year (B.E.)</label>
                        <div class="col-sm-9">
                            <input type="date" name="ac_year" value="{{ $book->ac_year }}" class="form-control" placeholder="Publication Year (B.E.)">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputac_page" class="col-sm-3 col-form-label">Number of Pages</label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_page" value="{{ $book->ac_page }}" class="form-control" placeholder="Number of Pages">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <a class="btn btn-light" href="{{ route('books.index') }}" >Cancel</a>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
<!-- <form action="{{ route('papers.update',$book->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $book->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail">{{ $book->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
   
    </form> --> 
