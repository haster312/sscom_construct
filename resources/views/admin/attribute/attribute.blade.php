@extends('admin.layouts.app')
@section('content')
    <main>
        <div class="col-md-3">
            <h3>Add New Project Attribute Group</h3>
            @include('admin.layouts.message')
            {!! Form::open(['id'=>'attribute-form']) !!}
                <div class="form-group">
                    <h4>Project Attribute Name(VN)</h4>
                    {!! Form::text('attribute_name_vn',null,['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <h4>Project Attribute Name(EN)</h4>
                    {!! Form::text('attribute_name_en',null,['class'=>'form-control']) !!}
                </div>
                <div class="card-actionbar-row text-center">
                    <button type="submit" name="update_attribute" class="btn btn-primary ink-reaction" style="display: none">Update Attribute</button>
                    <button type="submit" name="create_attribute" class="btn btn-primary ink-reaction">Create Attribute</button>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-8">
            <h3>Project Attribute List</h3>
            <table class="table table table-striped table-hover no-footer" id="category-table">
                <thead>
                <tr>
                    <th class="text-center">Attribute ID</th>
                    <th class="text-center">Attribute Name (vn)</th>
                    <th class="text-center">Attribute Name (en)</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>@if(count($projectAttributes) >0)
                    <tbody>
                    @foreach($projectAttributes as $index => $attribute)
                        <tr>
                            <td class="text-center">
                                {{ $attribute->attribute_id }}
                            </td>
                            <td class="text-center">
                                {{ $attribute->attribute_name_vn }}
                            </td>
                            <td class="text-center">
                                {{ $attribute->attribute_name_en }}
                            </td>
                            <td class="text-center">
                                <button class="btn btn-success" onclick="return editAttribute({{$attribute->attribute_id}})">Edit</button>
                                <button class="btn btn-danger" onclick="return confirmDelete({{$attribute->attribute_id}})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endif
            </table>
            <div class="section-body contain-lg">
                <div class="col-md-12 text-center">
                    {{ $projectAttributes->links() }}
                </div>
            </div>
        </div>
    </main>
    <script>
        function editAttribute(attributeId) {
            var url = "{{ route('admin.project.attribute.detail') }}";
            var updateUrl = baseUrl + "/project-attribute/update/"+attributeId;
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    attributeId: attributeId
                },success: function (attributeDetail) {
                    if(attributeDetail) {
                        attributeDetail = JSON.parse(attributeDetail);
                        $('[name=attribute_name_vn]').val(attributeDetail.attribute_name_vn);
                        $('[name=attribute_name_en]').val(attributeDetail.attribute_name_en);
                        $('#attribute-form').attr('action',updateUrl);
                        $('[name=update_attribute]').show();
                        $('[name=create_attribute]').hide();
                    }
                }
            })
        }
        function confirmDelete(attributeId) {
            var url = "{{ route('admin.project.attribute.delete') }}"
            bootbox.dialog({
                message: "Do you want to delete this attribute",
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
                                    attributeId: attributeId
                                },
                                success: function (status) {
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
@endsection