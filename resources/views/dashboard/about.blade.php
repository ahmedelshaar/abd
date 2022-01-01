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
            <h3 class="block-title">Edit of About</h3>
        </div>
        <div class="block-content">
            <form action="{{route('about.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{asset($data->image)}}" class="w-100 mb-15" />
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12">Background</label>
                    <div class="col-12">
                        <input type="file" name="image">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Sub Title 1</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('subtitle1', $data->subtitle1)}}" class="form-control" name="subtitle1" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Title 1</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{old('title1', $data->title1)}}" name="title1" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12">Description 1</label>
                    <div class="col-12">
                        <textarea class="form-control" name="description1" rows="6" placeholder="Content..">{{old('description1', $data->description1)}}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Sub Title 2</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('subtitle2', $data->subtitle2)}}" class="form-control" name="subtitle2" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Title 2</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('title2', $data->title2)}}" class="form-control" name="title2" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12">Description 2</label>
                    <div class="col-12">
                        <textarea class="form-control" name="description2" rows="6" placeholder="Content..">{{old('description2', $data->description2)}}</textarea>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Sub Title 3</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('subtitle3', $data->subtitle3)}}" class="form-control" name="subtitle3" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Title 3</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('title3', $data->title3)}}" class="form-control" name="title3" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-12">Description 3</label>
                    <div class="col-12">
                        <textarea class="form-control" name="description3" rows="6" placeholder="Content..">{{old('description3', $data->description3)}}</textarea>
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
