@extends('admin.layouts.app')
@section('content')
    <section>
        <div class="section-header ">
            <ol class="breadcrumb">
                <li class="active">SEO Manage</li>
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
                            </div>
                            <div class="card-body tab-content">
                                <div class="tab-pane active" id="first1">
                                    <div class="form-group">
                                        <h4>Tiêu Đề</h4>
                                        {!! Form::text('seo[vn][title]',$seoVN->title,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <h4>Từ Khóa</h4>
                                        {!! Form::textarea('seo[vn][metakeyword]',$seoVN->metakeyword,['class'=>'form-control','rows'=>3]) !!}
                                    </div>
                                    <div class="form-group">
                                        <h4>Nội Dung</h4>
                                        {!! Form::textarea('seo[vn][description]',$seoVN->description,['class'=>'form-control','rows'=>3]) !!}
                                    </div>
                                </div>
                                <div class="tab-pane" id="second1">
                                    <div class="form-group">
                                        <h4>Title</h4>
                                        {!! Form::text('seo[en][title]',$seoEN->title,['class'=>'form-control']) !!}
                                    </div>
                                    <div class="form-group">
                                        <h4>Keywords</h4>
                                        {!! Form::textarea('seo[en][metakeyword]',$seoEN->metakeyword,['class'=>'form-control','rows'=>3]) !!}
                                    </div>
                                    <div class="form-group">
                                        <h4>Description</h4>
                                        {!! Form::textarea('seo[en][description]',$seoEN->description,['class'=>'form-control','rows'=>3]) !!}
                                    </div>
                                </div>
                            </div><!--end .card-body -->
                        </div>
                    </div>
                    <div class="card-actionbar">
                        <div class="card-actionbar-row text-center">
                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update SEO Info</button>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
                </div>
            </div>
    </section>
@stop
