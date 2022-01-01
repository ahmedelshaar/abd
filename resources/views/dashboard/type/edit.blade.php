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
            <h3 class="block-title">Edit {{$type->title}}</h3>
        </div>
        <div class="block-content">
            <form action="{{route('type.update', $id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}
                <div class="form-group row">
                    <label class="col-12">Title</label>
                    <div class="col-md-6">
                        <input type="text" value="{{$type->name}}" class="form-control" name="title" placeholder="Text..">
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
