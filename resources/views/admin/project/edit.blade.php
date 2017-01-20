@extends('admin.layouts.app')
@section('content')
    <section>
        <div class="section-header ">
            <ol class="breadcrumb">
                <li class="active">Create Project</li>
            </ol>
        </div>
        <div class="section-body contain-lg">
            <div class="col-md-12">
                @include('admin.layouts.message')
                {!! Form::open(['files'=> true]) !!}
                    <div class="card">
                        <div class="card-head style-primary">
                            <header></header>
                        </div>
                        <div class="card-body">
                            <div class="card">
                                <div class="card-head">
                                    <ul class="nav nav-tabs" data-toggle="tabs">
                                        <li class="active">
                                            <a href="#first1">Vietnamese</a></li>
                                        <li>
                                            <a href="#second1">English</a>
                                        </li>
                                    </ul>
                                </div><!--end .card-head -->
                                <div class="card-body tab-content">
                                    <div class="tab-pane active" id="first1">
                                        <div class="form-group">
                                            <h4>Tên Dự Án</h4>
                                            {!! Form::text('project[vn][name]',null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Tóm Tắt</h4>
                                            {!! Form::textarea('project[vn][summary]',null,['class'=>'form-control','rows'=>2]) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Nội Dung</h4>
                                            {!! Form::textarea('project[vn][description]',null,['class'=>'form-control ckeditor']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Từ Khóa</h4>
                                            {!! Form::textarea('project[vn][keyword]',null,['class'=>'form-control','rows'=>2]) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Nội Dung Ngắn</h4>
                                            {!! Form::textarea('project[vn][shortDescription]',null,['class'=>'form-control','rows'=>2]) !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="second1">
                                        <div class="form-group">
                                            <h4>Project Name</h4>
                                            {!! Form::text('project[en][name]',null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Summary</h4>
                                            {!! Form::textarea('project[en][summary]',null,['class'=>'form-control','rows'=>2]) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Content</h4>
                                            {!! Form::textarea('project[en][description]',null,['class'=>'form-control ckeditor']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Keywords</h4>
                                            {!! Form::textarea('project[en][keyword]',null,['class'=>'form-control','rows'=>2]) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Short Description</h4>
                                            {!! Form::textarea('project[en][shortDescription]',null,['class'=>'form-control','rows'=>2]) !!}
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4>Danh Mục Dự Án (Project Category)</h4>
                                        {!! Form::select('projectCategory',$projectCategorySelect,null,['class'=>'form-control']) !!}
                                    </div>
                                    @if($projectAttribute)
                                        <?php $attributeBusiness = new \App\Business\AttributeBusiness(); ?>
                                        @foreach($projectAttribute as $attribute)
                                            @if(count($attribute->AttributeOption) >0)
                                            <div class="form-group">
                                                <h4>{{ $attribute->attribute_name_vn }} ({{ $attribute->attribute_name_en }})</h4>
                                                <?php $optionList = $attributeBusiness->getOptionSelectByAttributeId($attribute->attribute_id)?>
                                                {!! Form::select("option[$attribute->attribute_id]",$optionList,null,['class'=>'form-control']) !!}
                                            </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4>Ảnh Đại Diện (Main Images)</h4>
                                        {!!  Form::file('projectImage')  !!}
                                    </div>
                                    <div class="form-group">
                                        <h4>Ảnh Đại Diện Phụ (Sub Main Images)</h4>
                                        {!!  Form::file('projectSubImage')  !!}
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-4"><h4>Hình Ảnh Dự Án (Another Images)</h4></div>
                                        <div class="col-md-6"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#selectImage">Select Images</button></div>
                                        {!!  Form::textarea('projectImageList', null, array('class'=>'form-control', 'rows'=>4))  !!}
                                    </div>
                                </div>
                            </div>
                        </div><!--end .card-body -->
                        <div class="card-actionbar">
                            <div class="card-actionbar-row text-center">
                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Project</button>
                            </div>
                        </div>
                    </div><!--end .card -->
                {!! Form::close() !!}
            </div>
        </div>
    </section>
    <div class="modal fade bd-example-modal-lg" id="selectImage" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Select Image List</h4>
                </div>
                <div class="modal-body" id="imageList">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="updateImages()">Update</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var url = "{{ route('admin.upload.list') }}";
        $.ajax({
            type: "POST",
            url: url,
            success: function (imageList) {
                var images = JSON.parse(imageList);
                var list = '<table class="table table-responsive">';
                images.forEach(function (value) {
                    list += '<tr>'
                    list += '<td class="text-center"><input type="checkbox" name="image" value="'+value.path+'"></td><td class="text-center"><img src="'+value.path+'" class="sliderThumbnail"></td>';
                    list += '</tr>'
                });
                list += '</table>';
                $('#imageList').html(list);
            }
        });
        function updateImages() {
            var ImageList = $('[name=image]');
            var imageString = '';
            for(var k =0; k < ImageList.length; k++) {
                var thisImage = ImageList[k];
                if($(thisImage).is(':checked')) {
                    imageString += $(thisImage).val() + '\n';
                }
            }
            imageString = imageString.slice('\n', -1);
            $('[name=projectImageList]').val(imageString);
            $("#selectImage").modal('hide')
        }
    </script>
@stop