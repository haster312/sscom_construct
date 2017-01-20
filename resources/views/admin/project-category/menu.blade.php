@extends('admin.layouts.app')
@section('content')
    <main>
        <h3>Project Menu</h3>
        @include('admin.layouts.message');
        <div class="col-md-6">
            {!! Form::open() !!}
                <div class="form-group">
                    <label>Parent</label>
                    {!! Form::select('parent',$projectCatParent,$categoryId,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <label>Child</label>
                    {!! Form::select('child',$projectCatChild,null,['class'=>'form-control']) !!}
                </div>
                <button class="btn btn-primary">Add Menu</button> <a id="filter_category" href="{{ route('admin.project-menu') }}?category={{key($projectCatParent)}}&page=1" class="btn btn-success">Filter</a>
            {!! Form::close() !!}

        </div>
        <table class="table table table-striped table-hover no-footer" id="category-table">
            <thead>
            <tr>
                <th class="text-center">Parent</th>
                <th class="text-center">Child</th>
                <th class="text-center">Action</th>
            </tr>
            </thead>
            @if(count($menu) > 0)
                <tbody>
                    @foreach($menu as $item)
                        <tr>
                            <td class="text-center">
                                {{ $projectBusiness->getCategoryName($item->parent) }}
                            </td>
                            <td class="text-center">
                                {{ $projectBusiness->getCategoryName($item->child) }}
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger" onclick="return confirmDelete({{$item->menuId}})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            @endif
        </table>
        <div class="section-body contain-lg">
            <div class="col-md-12 text-center">
                {{ $menu->appends(['category' => $categoryId])->links() }}
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        $('[name=parent]').on('change',function(){
            var categoryId = $(this).val();
            var url = "{{ route('admin.project-menu') }}";
            var paginate = url+'?category='+categoryId+'&page=1';
            $('#filter_category').attr('href',paginate);
        });
        function confirmDelete(id){
            var url = "{{ route('admin.project-menu.delete') }}";
            bootbox.dialog({
                message: "Do you want to delete this menu",
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
                                    menuId: id
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