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
            <h3 class="block-title">New Social</h3>
        </div>
        <div class="block-content">
            <form action="{{route('social.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group row">
                    <label class="col-12">Icon</label>
                    <div class="col-md-9">
                        <input type="text" value="{{old('icon')}}" class="form-control" name="icon" placeholder="Text..">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12">Link</label>
                    <div class="col-md-9">
                        <input type="text" value="{{old('link')}}" class="form-control" name="link" placeholder="Text..">
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
