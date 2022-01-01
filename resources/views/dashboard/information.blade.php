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
            <h3 class="block-title">Edit of Information</h3>
        </div>
        <div class="block-content">
            <form action="{{route('info.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Site Title</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('site_title', $data->site_title)}}" class="form-control" name="site_title" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Site Description</label>
                            <div class="col-12">
                                <textarea class="form-control" name="site_description" rows="6" placeholder="Content..">{{old('site_description', $data->site_description)}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-12">Site Logo</label>
                        <div class="col-12">
                            <input type="file" name="site_logo">
                        </div>
                        <div class="col-12">
                            <img src="{{asset($data->site_logo)}}" class="w-50 mt-15" />
                        </div>
                    </div>
                </div>

                <div class="block-header block-header-default mb-10">
                    <h3 class="block-title">About</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">About Name</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('info_title', $data->info_title)}}" class="form-control" name="info_title" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">About Description</label>
                            <div class="col-12">
                                <textarea class="form-control" name="info_description" rows="6" placeholder="Content..">{{old('info_description', $data->info_description)}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">About image</label>
                            <div class="col-12">
                                <input type="file" name="info_image">
                            </div>
                            <div class="col-12">
                                <img src="{{asset($data->info_image)}}" class="w-50 mt-15" />
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Resume File</label>
                            <div class="col-12">
                                <input type="file" name="info_resume">
                            </div>
                            <div class="col-12">
                                <a class="btn btn-alt-success d-block mt-15 mx-auto w-50" href="{{asset($data->info_resume)}}">Download</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Years of Experience</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('info_experience', $data->info_experience)}}" class="form-control" name="info_experience" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Number of Clients</label>
                            <div class="col-12">
                                <input type="text" value="{{old('info_client', $data->info_client)}}" class="form-control" name="info_client" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block-header block-header-default mb-10">
                    <h3 class="block-title">Service</h3>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Title</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('service_title', $data->service_title)}}" class="form-control" name="service_title" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Description</label>
                            <div class="col-12">
                                <input type="text" value="{{old('service_description', $data->service_description)}}" class="form-control" name="service_description" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Background</label>
                            <div class="col-12">
                                <input type="file" name="service_background">
                            </div>
                            <div class="col-12">
                                <img src="{{asset($data->service_background)}}" class="w-50 mt-15"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Button text</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('service_button_text', $data->service_button_text)}}" class="form-control" name="service_button_text" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Button Link</label>
                            <div class="col-12">
                                <input type="text" value="{{old('service_button_link', $data->service_button_link)}}" class="form-control" name="service_button_link" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block-header block-header-default mb-10">
                    <h3 class="block-title">Contact</h3>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Description</label>
                            <div class="col-md-9">
                                <textarea class="form-control" name="contact_description" placeholder="Content..">{{old('contact_description', $data->contact_description)}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Map</label>
                            <div class="col-md-9">
                                <input type="text" value="{{old('contact_map', $data->contact_map)}}" class="form-control" name="contact_map" placeholder="Text..">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-12">Image</label>
                            <div class="col-12">
                                <input type="file" name="contact_image">
                            </div>
                            <div class="col-12">
                                <img src="{{asset($data->contact_image)}}" class="w-50 mt-15" />
                            </div>
                        </div>
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
