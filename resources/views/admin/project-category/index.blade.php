@extends('admin.layouts.app')
@section('content')
<main>
    <h3>Project List</h3>
    <p><a href="{{ route('admin.project-category.create') }}" class="btn btn-primary">Create Project Category</a></p>
    @include('admin.layouts.message')
    <table class="table table table-striped table-hover no-footer" id="category-table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Project Name</th>
                <th class="text-center">Project Slug</th>
                <th class="text-center">Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>@if(count($projectCategory) >0)
            <tbody>
            @foreach($projectCategory as $index => $category)
                <tr>
                    <td class="text-center">{{ $currentIndex + $index + 1 }}</td>
                    <td class="text-center">
                        @foreach($category->projectCategoryTrans as $categoryTrans)
                            {{ $categoryTrans->projectCatName }} <br>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach($category->projectCategoryTrans as $categoryTrans)
                            {{ $categoryTrans->projectCatSlug }} <br>
                        @endforeach
                    </td>
                    <td class="text-center">
                        {{ $category->status == 1 ? "Enable" : "Disable" }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.project-category.update',$category->projectCatId) }}" class="btn btn-info">Edit</a>
                        <button class="btn btn-danger" onclick="return confirmDelete({{$category->projectCatId}})">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
    <div class="section-body contain-lg">
        <div class="col-md-12 text-center">
            {{ $projectCategory->links() }}
        </div>
    </div>
</main>
@endsection
@section('js')
    <script>
        function confirmDelete(id){
            var url = "{{ route('admin.project-category.delete') }}"
            bootbox.dialog({
                message: "Do you want to delete this project category",
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
                                    projectCatId: id
                                },
                                success: function () {
                                    //location.reload();
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

