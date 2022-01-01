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
            <form action="{{route('slider.update', $id)}}" method="post" enctype="multipart/form-data">
                @csrf
                {{ method_field('PATCH') }}

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Title</label>
                            <div class="col-md-9">
                                <input type="text" value="{{$type->title}}" class="form-control" name="title" placeholder="Text..">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Sub Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$type->subtitle}}" name="subtitle" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Button title</label>
                            <div class="col-md-9">
                                <input type="text" value="{{$type->button_title}}" class="form-control" name="button_title" placeholder="Text..">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Button link</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{$type->button_link}}" name="button_link" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="description" placeholder="Text..">{{$type->description}}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Background</label>
                            <div class="col-12">
                                <input type="file" name="big_image">
                            </div>
                        </div>
                        <img src="{{asset($type->background)}}" class="w-75 mb-15"/>
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
