@extends('admin.layouts.app')
@section('content')
<main>
    <h3>Page List</h3>
    <p><a href="{{ route('admin.news-category.create') }}" class="btn btn-primary">Create News Category</a></p>
    @include('admin.layouts.message')
    <table class="table table table-striped table-hover no-footer" id="category-table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Category Name</th>
                <th class="text-center">Category Slug</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        @if(count($newsCategory) >0)
            <tbody>
                @foreach($newsCategory as $index => $category)
                <tr>
                    <td class="text-center">{{ $currentIndex + $index + 1 }}</td>
                    <td class="text-center">
                        @foreach($category->newsCategoryTrans as $categoryTrans)
                            {{ $categoryTrans->newsCatName }} <br>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach($category->newsCategoryTrans as $categoryTrans)
                            {{ $categoryTrans->newsCatSlug }} <br>
                        @endforeach
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.news-category.update',$category->newsCatId) }}" class="btn btn-info">Edit</a>
                        <button class="btn btn-danger" onclick="return confirmDelete({{$category->newsCatId}})">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        @endif
    </table>
    <div class="section-body contain-lg">
        <div class="col-md-12 text-center">
            {{ $newsCategory->links() }}
        </div>
    </div>
</main>
@endsection
@section('js')
    <script>
        function confirmDelete(id){
            var url = "{{ route('admin.news-category.delete') }}"
            bootbox.dialog({
                message: "Do you want to delete this category",
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
                                    categoryId: id
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

