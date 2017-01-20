@extends('admin.layouts.app')
@section('content')
<main>
    <h3>Page List</h3>
    <p><a href="{{ route('admin.news.create') }}" class="btn btn-primary">Create News</a></p>
    @include('admin.layouts.message')
    <table class="table table table-striped table-hover no-footer" id="category-table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Title</th>
                <th class="text-center">Slug</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>@if(count($news) >0)
            <tbody>
            @foreach($news as $index => $content)
                <tr>
                    <td class="text-center">{{ $currentIndex + $index + 1 }}</td>
                    <td class="text-center">
                        @foreach($content->newsTrans as $newsTrans)
                            {{ $newsTrans->newsTitle }} <br>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach($content->newsTrans as $newsTrans)
                            {{ $newsTrans->newsSlug }} <br>
                        @endforeach
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.news.update',$content->newsId) }}" class="btn btn-info">Edit</a>
                        <button class="btn btn-danger" onclick="return confirmDelete({{$content->newsId}})">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
    <div class="section-body contain-lg">
        <div class="col-md-12 text-center">
            {{ $news->links() }}
        </div>
    </div>
</main>
@endsection
@section('js')
    <script>
        function confirmDelete(id){
            var url = "{{ route('admin.news.delete') }}"
            bootbox.dialog({
                message: "Do you want to delete this news",
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
                                    newsId: id
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

