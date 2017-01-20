@extends('admin.layouts.app')
@section('content')
    <section>
        <div class="section-header ">
            <ol class="breadcrumb">
                <li class="active">Create Page</li>
            </ol>
        </div>
        <div class="section-body contain-lg">
            <div class="col-md-12">
                @include('admin.layouts.message')
                {!! Form::open() !!}
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
                                            <h4>Tiêu Đề Trang</h4>
                                            {!! Form::text('page[vn][title]',null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Nội Dung</h4>
                                            {!! Form::textarea('page[vn][content]',null,['class'=>'form-control ckeditor']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Từ Khóa</h4>
                                            {!! Form::textarea('page[vn][keyword]',null,['class'=>'form-control','rows'=>'2']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Mô Tả</h4>
                                            {!! Form::textarea('page[vn][description]',null,['class'=>'form-control','rows'=>'3']) !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="second1">
                                        <div class="form-group">
                                            <h4>Page Title</h4>
                                            {!! Form::text('page[en][title]',null,['class'=>'form-control']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Page Content</h4>
                                            {!! Form::textarea('page[en][content]',null,['class'=>'form-control ckeditor']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Keyword</h4>
                                            {!! Form::textarea('page[en][keyword]',null,['class'=>'form-control','rows'=>'2']) !!}
                                        </div>
                                        <div class="form-group">
                                            <h4>Description</h4>
                                            {!! Form::textarea('page[en][description]',null,['class'=>'form-control','rows'=>'3']) !!}
                                        </div>
                                    </div>
                                </div><!--end .card-body -->
                            </div><!--end .card -->
                        </div><!--end .card-body -->
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <h4>Status</h4>
                                    <input id="status" name="status" type="checkbox" class="tgl tgl-skewed" value="1"/>
                                    <label data-tg-off="OFF" data-tg-on="ON" for="status" class="tgl-btn"></label>
                                </div>
                                <div class="form-group">
                                    <h4>Page Order</h4>
                                    {!! Form::number('page_order',0,['class'=>'form-control','min'=>0]) !!}
                                </div>
                            </div>
                        </div>
                        <div class="card-actionbar">
                            <div class="card-actionbar-row text-center">
                                <button type="submit" class="btn btn-flat btn-primary ink-reaction">Create page</button>
                            </div>
                        </div>
                    </div><!--end .card -->
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection