@extends('layouts.backend')

@section('content')
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">New Offer</h3>
        </div>
        <div class="block-content">
            <form action="{{route('offer.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label class="col-12">Icon</label>
                    <div class="col-12">
                        <input type="file" name="icon">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12">Title</label>
                    <div class="col-md-9">
                        <input type="text" value="{{old('title')}}" class="form-control" name="title" placeholder="Text..">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12">description</label>
                    <div class="col-md-9">
                        <input type="text" value="{{old('description')}}" class="form-control" name="description" placeholder="Text..">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-alt-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
