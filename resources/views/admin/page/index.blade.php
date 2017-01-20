@extends('admin.layouts.app')
@section('content')
<main>
    <h3>Page List</h3>
    <p><a href="{{ route('admin.page.create') }}" class="btn btn-primary">Create New Page</a></p>
    @include('admin.layouts.message')
    <table class="table table table-striped table-hover no-footer" id="category-table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Name</th>
                <th class="text-center">Language</th>
                <th class="text-center">Page Order</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        @if(count($pages) > 0)
        <tbody>
            @foreach($pages as $index => $page)
                <tr>
                    <td class="text-center">{{ $currentIndex + $index + 1 }}</td>
                    <td class="text-center">
                        @if(count($page->pageTrans))
                            @foreach($page->pageTrans as $trans)
                                {{ $trans->pageTitle }} <br/>
                            @endforeach
                        @endif
                    </td>
                    <td class="text-center">
                        @if(count($page->pageTrans))
                            @foreach($page->pageTrans as $trans)
                                {{ $trans->locale }} <br/>
                            @endforeach
                        @endif
                    </td>
                    <th class="text-center">{{ $page->page_order }}</th>
                    <td class="text-center">
                        <a href="{{ route('admin.page.update',['pageId'=>$page->pageId]) }}" class="btn btn-info">Edit</a>
                        <button class="btn btn-danger" onclick="return confirmDelete({{$page->pageId}})">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
    <div class="section-body contain-lg">
        <div class="col-md-12 text-center">
            {{ $pages->links() }}
        </div>
    </div>
</main>
@endsection
@section('js')
    <script>
        function confirmDelete(id){
            var url = "{{ route('admin.page.delete') }}"
            bootbox.dialog({
                message: "Do you want to delete this page",
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
                                    pageId: id
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

