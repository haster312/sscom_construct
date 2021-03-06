@extends('admin.layouts.app')
@section('content')
    <section>
        <div class="section-header ">
            <ol class="breadcrumb">
                <li class="active">Create Project Category</li>
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
                                            <h4>Tên Danh Mục Dự Án</h4>
                                            {!! Form::text('projectCategory[vn][name]',null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Nội Dung</h4>
                                            {!! Form::textarea('projectCategory[vn][description]',null,['class'=>'form-control ckeditor']) !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="second1">
                                        <div class="form-group">
                                            <h4>Project Category Name</h4>
                                            {!! Form::text('projectCategory[en][name]',null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Description</h4>
                                            {!! Form::textarea('projectCategory[en][description]',null,['class'=>'form-control ckeditor']) !!}
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <h4>Status</h4>
                                        <input id="status" name="status" type="checkbox" class="tgl tgl-skewed" value="1"/>
                                        <label data-tg-off="OFF" data-tg-on="ON" for="status" class="tgl-btn"></label>
                                    </div>
                                    <div class="form-group">
                                        <h4>Loại Danh Mục (Category Type)</h4>
                                        {!! Form::select('categoryType',[ 0 =>'Danh Mục Con (Child Category)', 1 => 'Danh Mục Cha (Parent Category)'], 0 ,['class'=>'form-control']) !!}
                                    </div>
                                </div>
                            </div>
                        </div><!--end .card-body -->
                        <div class="card-actionbar">
                            <div class="card-actionbar-row text-center">
                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create Project Category</button>
                            </div>
                        </div>
                    </div><!--end .card -->
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection