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
                                @if(count($newsCategoryTrans) > 0)
                                    @foreach($newsCategoryTrans as $index => $trans)
                                        <div class="tab-pane {{ $index == 0 ? "active" : "" }}" id="{{ $trans->locale }}">
                                            <div class="form-group">
                                                <h4>{{ $trans->locale == "vn" ? "Tên Danh Mục" : "Category Name"  }}</h4>
                                                {!! Form::text('newsCategory['.$trans->locale.'][name]',$trans->newsCatName,['class'=>'form-control']) !!}
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
                                    <input id="status" name="status" type="checkbox" {{$newsCategory->status == 1 ? "checked" : ""}} class="tgl tgl-skewed" value="1"/>
                                    <label data-tg-off="OFF" data-tg-on="ON" for="status" class="tgl-btn"></label>
                                </div>
                            </div>
                        </div>
                        {!!  Form::file('newsCategoryImage')  !!}
                        @if($newsCategory->resourceId)
                            <img src="{{ asset($newsCategory->Resources->path) }}" class="categoryThumbnail">
                        @endif
                    </div><!--end .card-body -->
                    <div class="card-actionbar">
                        <div class="card-actionbar-row text-center">
                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">Update Category</button>
                        </div>
                    </div>
                </div><!--end .card -->
                {!! Form::close() !!}
            </div>
        </div>
    </section>
@endsection