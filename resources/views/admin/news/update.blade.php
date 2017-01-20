@extends('admin.layouts.app')
@section('content')
    <section>
        <div class="section-header ">
            <ol class="breadcrumb">
                <li class="active">Update News</li>
            </ol>
        </div>
        <div class="section-body contain-lg">
            <div class="col-md-12">
                @include('admin.layouts.message')
                {!! Form::open(['files'=>true]) !!}
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
                                @if(count($newsTrans) > 0)
                                    @foreach($newsTrans as $index => $trans)
                                        <div class="tab-pane {{ $index == 0 ? "active" : "" }}" id="{{ $trans->locale }}">
                                            <div class="form-group">
                                                <h4>{{ $trans->locale == "vn" ? "Tên Bản Tin" : "News Name"  }}</h4>
                                                {!! Form::text('news['.$trans->locale.'][title]',$trans->newsTitle,['class'=>'form-control']) !!}
                                            </div>
                                            <div class="form-group">
                                                <h4>{{ $trans->locale == "vn" ? "Nội Dung" : "Content"  }}</h4>
                                                {!! Form::textarea('news['.$trans->locale.'][content]',$trans->newsContent,['class'=>'form-control ckeditor']) !!}
                                            </div>
                                            <div class="form-group">
                                                <h4>{{ $trans->locale == "vn" ? "Từ Khóa" : "Keyword"  }}</h4>
                                                {!! Form::textarea('news['.$trans->locale.'][keyword]',$trans->keyword,['class'=>'form-control','rows'=>'2']) !!}
                                            </div>
                                            <div class="form-group">
                                                <h4>{{ $trans->locale == "vn" ? "Mô Tả" : "Description"  }}</h4>
                                                {!! Form::textarea('news['.$trans->locale.'][summary]',$trans->newsSummary,['class'=>'form-control','rows'=>3]) !!}
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
                                    <input id="status" name="status" type="checkbox" {{$news->status == 1 ? "checked" : ""}} class="tgl tgl-skewed" value="1"/>
                                    <label data-tg-off="OFF" data-tg-on="ON" for="status" class="tgl-btn"></label>
                                </div>
                            </div>
                        </div>
                        {!!  Form::file('newsImage')  !!}
                        @if($news->resourceId)
                            <img src="{{ asset($news->Resources->path) }}" class="categoryThumbnail">
                        @endif
                    </div><!--end .card-body -->
                    <div class="card-actionbar">
                        <div class="card-actionbar-row text-center">
                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update News</button>
                        </div>
                    </div>
                </div><!--end .card -->
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection