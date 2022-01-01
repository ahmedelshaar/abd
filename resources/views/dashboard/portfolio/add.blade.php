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
            <h3 class="block-title">New Portfolio</h3>
        </div>
        <div class="block-content">
            <form action="{{route('portfolio.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Title</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('title')}}" class="form-control" name="title" placeholder="Text..">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Sub Title</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="{{old('subtitle')}}" name="subtitle" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Image</label>
                            <div class="col-12">
                                <input type="file" name="image">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Big Image</label>
                            <div class="col-12">
                                <input type="file" name="big_image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-12" >Type</label>
                    <div class="col-md-6">
                        <select class="form-control" name="type_id">
                            <option>Please select</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
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
