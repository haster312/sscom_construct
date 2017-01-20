@extends('admin.layouts.app')
@section('content')
    <main>
        <div class="col-md-3">
            <h3>Add New Project Attribute Group</h3>
            @include('admin.layouts.message')
            {!! Form::open(['id'=>'option-form']) !!}
            <div class="form-group">
                <h4>Attribute Option(VN)</h4>
                {!! Form::text('option_name_vn',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <h4>Attribute Option(EN)</h4>
                {!! Form::text('option_name_en',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                <h4>Main Attribute</h4>
                {!! Form::select('attribute_id',$attributeSelect, null,['class'=>'form-control']) !!}
            </div>
            <div class="card-actionbar-row text-center">
                <button type="submit" name="update_option" class="btn btn-primary ink-reaction" style="display: none">Update Option</button>
                <button type="submit" name="create_option" class="btn btn-primary ink-reaction">Create Option</button>
            </div>
            {!! Form::close() !!}
        </div>
        <div class="col-md-8">
            <h3>Project Attribute List</h3>
            <table class="table table table-striped table-hover no-footer" id="category-table">
                <thead>
                <tr>
                    <th class="text-center">Option ID</th>
                    <th class="text-center">Option (vn)</th>
                    <th class="text-center">Option (en)</th>
                    <th class="text-center">Attribute</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>@if(count($attributeOptions) >0)
                    <tbody>
                    @foreach($attributeOptions as $index => $option)
                        <tr>
                            <td class="text-center">
                                {{ $option->option_id }}
                            </td>
                            <td class="text-center">
                                {{ $option->option_name_vn }}
                            </td>
                            <td class="text-center">
                                {{ $option->option_name_en }}
                            </td>
                            <td class="text-center">
                                {{ $option->Attribute->attribute_name_vn }} <br>
                                {{ $option->Attribute->attribute_name_en }} <br>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-success" onclick="return editOption({{$option->option_id}})">Edit</button>
                                <button class="btn btn-danger" onclick="return confirmDelete({{$option->option_id}})">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endif
            </table>
            <div class="section-body contain-lg">
                <div class="col-md-12 text-center">
                    {{ $attributeOptions->links() }}
                </div>
            </div>
        </div>
    </main>
    <script>
        function editOption(optionId) {
            var url = "{{ route('admin.attribute.option.detail') }}";
            var updateUrl = baseUrl + "/attribute-option/update/"+optionId;
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    optionId: optionId
                },success: function (optionDetail) {
                    if(optionDetail) {
                        optionDetail = JSON.parse(optionDetail);
                        console.log(optionDetail);
                        $('[name=option_name_vn]').val(optionDetail.option_name_vn);
                        $('[name=option_name_en]').val(optionDetail.option_name_en);
                        $('[name=attribute]').val(optionDetail.attribute_id);
                        $('#option-form').attr('action',updateUrl);
                        $('[name=update_option]').show();
                        $('[name=create_option]').hide();
                    }
                }
            })
        }
        function confirmDelete(optionId) {
            var url = "{{ route('admin.attribute.option.delete') }}"
            bootbox.dialog({
                message: "Do you want to delete this option",
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
                                    optionId: optionId
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