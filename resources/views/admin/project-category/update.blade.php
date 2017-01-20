@extends('admin.layouts.app')
@section('content')
    <section>
        <div class="section-header ">
            <ol class="breadcrumb">
                <li class="active">Update Project Category</li>
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
                                        <a href="#vn">Vietnamese</a></li>
                                    <li>
                                        <a href="#en">English</a>
                                    </li>
                                </ul>
                            </div><!--end .card-head -->
                            <div class="card-body tab-content">
                                @if(count($projectCategoryTrans) > 0)
                                    @foreach($projectCategoryTrans as $index => $trans)
                                        <div class="tab-pane {{ $index == 0 ? "active" : "" }}" id="{{ $trans->locale }}">
                                            <div class="form-group">
                                                <h4>{{ $trans->locale == "vn" ? "Tên Danh Mục Dự Án" : "Project Category Name"  }}</h4>
                                                {!! Form::text('projectCategory['.$trans->locale.'][name]',$trans->projectCatName,['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group">
                                                <h4>{{ $trans->locale == "vn" ? "Nội Dung" : "Description"  }}</h4>
                                                {!! Form::textarea('projectCategory['.$trans->locale.'][description]',$trans->projectCatName,['class'=>'form-control ckeditor']) !!}
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div><!--end .card-body -->
                        </div><!--end .card -->
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4>Status</h4>
                                    <input id="status" name="status" type="checkbox" {{ $projectCategory->status == 1 ? "checked" : "" }} class="tgl tgl-skewed" value="1"/>
                                    <label data-tg-off="OFF" data-tg-on="ON" for="status" class="tgl-btn"></label>
                                </div>
                                <div class="form-group">
                                    <h4>Loại Danh Mục (Category Type)</h4>
                                    {!! Form::select('categoryType',[ 0 =>'Danh Mục Con (Child Category)', 1 => 'Danh Mục Cha (Parent Category)'], $projectCategory->parent,['class'=>'form-control']) !!}
                                </div>
                            </div>
                        </div>
                    </div><!--end .card-body -->
                    <div class="card-actionbar">
                        <div class="card-actionbar-row text-center">
                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update Project Category</button>
                        </div>
                    </div>
                </div><!--end .card -->
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection