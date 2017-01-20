@extends('admin.layouts.app')
@section('content')
    <main>
        <h3>Slider List</h3>
        <p><a href="{{ route('admin.slider.create') }}" class="btn btn-primary">Create New Slider</a></p>
        @include('admin.layouts.message')
        <table class="table table table-striped table-hover no-footer" id="category-table">
            <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Image</th>
                <th class="text-center">Alt Text</th>
                <th class="text-center">Position</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            @if(count($sliders) > 0)
                <tbody>
                @foreach($sliders as $index => $slider)
                    <tr>
                        <td class="text-center">{{ $currentIndex + $index +1 }}</td>
                        <td class="text-center">
                            <img src="{{ asset($slider->Resources->path) }}" class="sliderThumbnail">
                        </td>
                        <td class="text-center">
                            {{ $slider->alt }}
                        </td>
                        <td class="text-center">
                            {{ $slider->type == 1 ? "Home Page" : "Another Pages" }}
                        </td>
                        <td class="text-center">
                            <a href="{{ route('admin.slider.update',$slider->sliderId) }}" class="btn btn-info">Edit</a>
                            <button class="btn btn-danger" onclick="return confirmDelete({{$slider->sliderId}})">Delete</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            @endif
        </table>
        <div class="section-body contain-lg">
            <div class="col-md-12 text-center">
                {{ $sliders->links() }}
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        function confirmDelete(id){
            var url = "{{ route('admin.slider.delete') }}"
            bootbox.dialog({
                message: "Do you want to delete this slider",
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
                                    sliderId: id
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