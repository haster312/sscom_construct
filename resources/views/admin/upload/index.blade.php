@extends('admin.layouts.app')
@section('content')
    <main>
    <h3>Upload Image</h3>
    @include('admin.layouts.message')
    <div class="col-md-6">
        {!! Form::open(['url'=>route('admin.upload'),'files'=>true]) !!}
            <div class="form-group">
                <p>Max upload file size: 5MB</p>
                {!! Form::file('image',['class'=>'form-control']) !!}
            </div>
            <button class="btn btn-primary">Upload</button>
        {!! Form::close() !!}
    </div>
    <table class="table table table-striped table-hover no-footer" id="category-table">
        <thead>
        <tr>
            <th class="text-center" width="40%">Image</th>
            <th class="text-center" width="40%">URL</th>
            <th class="text-center">Action</th>
        </tr>
        </thead>
        @if(count($uploads) > 0)
            <tbody>
            @foreach($uploads as $upload)
                <tr>
                    <td class="text-center"><img src="{{ asset($upload->path) }}" class="sliderThumbnail"></td>
                    <td class="text-center">{{ $upload->path }}</td>
                    <td class="text-center">
                        <button class="btn btn-danger" onclick="return confirmDelete({{$upload->uploadId}})">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
    <div class="section-body contain-lg">
        <div class="col-md-12 text-center">
            {{ $uploads->links() }}
        </div>
    </div>
    </main>
@endsection
@section('js')
    <script>
        function confirmDelete(id){
            var url = "{{ route('admin.upload.delete') }}";
            bootbox.dialog({
                message: "Do you want to delete this image",
                title: "Confirm",
                buttons: {
                    success: {
                        label: "Confirm",
                        className: "btn-success",
                        callback: function () {
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data : {
                                    uploadId: id
                                },
                                success: function () {
                                    location.reload();
                                }
                            });
                        }
                    },
                    danger: {
                        label: "Cancel",
                        className: "btn-danger",
                        callback: function () {
                        }
                    }
                }
            });
        }
    </script>
@stop