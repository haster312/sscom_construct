@extends('admin.layouts.app')
@section('content')
<main>
    <h3>Project List</h3>
    <p><a href="{{ route('admin.project.create') }}" class="btn btn-primary">Create Project</a></p>
    @include('admin.layouts.message')
    <div class="col-md-8">
        <div class="col-md-6">
            {!! Form::select('projectCategory',$projectCategory,$categoryId,['class'=>'form-control']) !!}
        </div>
        <div class="col-md-2">
            <a id="filter_project" href="{{ route('admin.project') }}?category={{$categoryId}}&page=1" class="btn btn-success">Filter</a>
        </div>
    </div>
    <table class="table table table-striped table-hover no-footer" id="category-table">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Project Category</th>
                <th class="text-center">Project Name</th>
                <th class="text-center">Project Image</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        @if(count($projects) >0)
            <tbody>
            @foreach($projects as $index => $project)
                <tr>
                    <td class="text-center">{{ $currentIndex + $index + 1 }}</td>
                    <td class="text-center">
                        @foreach($project->projectCategory->projectCategoryTrans as $catTrans)
                            {{ $catTrans->projectCatName }} <br>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @foreach($project->projectTrans as $projectTrans)
                            {{ $projectTrans->projectName }} <br>
                        @endforeach
                    </td>
                    <td class="text-center">
                        @if($project->Resources)
                            <img src="{{ asset($project->Resources->path) }}" class="sliderThumbnail">
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.project.update',$project->projectId) }}" class="btn btn-info">Edit</a>
                        <button class="btn btn-danger" onclick="return confirmDelete({{$project->projectId}})">Delete</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
    <div class="section-body contain-lg">
        <div class="col-md-12 text-center">
            {{ $projects->appends(['category' => $categoryId])->links() }}
        </div>
    </div>
</main>
@endsection
@section('js')
    <script>
        $('[name=projectCategory]').on('change',function () {
            var categoryId = $(this).val();
            var url = "{{ route('admin.project') }}";
            var paginate = url+'?category='+categoryId+"&page=1";
            $('#filter_project').attr('href',paginate);
        });
        function confirmDelete(id){
            var url = "{{ route('admin.project.delete') }}"
            bootbox.dialog({
                message: "Do you want to delete this project",
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
                                    projectId: id
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

