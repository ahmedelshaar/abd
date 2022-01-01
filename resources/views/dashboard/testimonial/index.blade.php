@extends('layouts.backend')

@section('content')
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
<div class="modal fade" id="modal-fadein" tabindex="-1" aria-labelledby="modal-fadein" style="display: none;" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="delete-form" action="{{ route('testimonial.destroy', 1)}}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <div class="modal-content">
                <div class="block block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Delete Confirm</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <p>are you sure you want to delete: <strong></strong></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-alt-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-alt-danger" >
                        <i class="fa fa-check"></i> Delete
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="block">
    <div class="block-header block-header-default">
        <h3 class="block-title">Testimonial</h3>
    </div>
    <div class="block-content">
        @if(count($data) > 0)
            <table class="table table-bordered table-vcenter">
            <thead>
            <tr>
                <th class="text-center" style="width: 50px;">#</th>
                <th>Title</th>
                <th>Icon</th>
                <th class="text-center" style="width: 100px;">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $type)
                <tr>
                <th class="text-center" scope="row">{{$type->id}}</th>
                <td>{{$type->name}}</td>
                <td><img height="150px" src="{{asset($type->image)}}" /></td>
                <td class="text-center">
                    <div class="btn-group">
                        <a href="{{route('testimonial.edit', $type)}}" class="btn btn-sm btn-secondary js-tooltip-enabled">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a id="delete-{{$type->id}}" data-toggle="modal" data-target="#modal-fadein" class="btn btn-sm btn-secondary js-tooltip-enabled delete">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else
            <h4 class="text-center">No Data</h4>
        @endif
    </div>
</div>
@endsection
@section('js_after')
    <script>
        $('a.delete').click(function(){
            $('#modal-fadein .block-content strong').text($(this).parent().parent().parent().children('td:first').text());
            let x = $('#delete-form').attr('action').split('/');
            x[x.length - 1] = $(this).attr('id').split('-')[1];
            $('#delete-form').attr('action', x.join('/'))
        });
    </script>
@endsection
