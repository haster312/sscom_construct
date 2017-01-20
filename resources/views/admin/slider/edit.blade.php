@extends('admin.layouts.app')
@section('content')
    <section>
        <div class="section-header ">
            <ol class="breadcrumb">
                <li class="active">{{ $slider->sliderId ? "Update" : "Create" }} Slider</li>
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
                        <div class="form-group">
                            <h4>Images <span class="required">*</span></h4>
                            {!! Form::file('sliderImage',['class'=>'form-control']) !!}
                            @if($slider->Resources)
                                <img src="{{ asset($slider->Resources->path) }}" class="sliderThumbnail">
                            @endif
                        </div>
                        <div class="form-group">
                            <h4>Alt Images <span class="required">*</span></h4>
                            {!! Form::text('sliderAlt',$slider->alt,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Slider Position</h4>
                            {!! Form::select('type',$type,$slider->type,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Status</h4>
                            <input id="status" name="status" {{ $slider->status == 1 ? "checked" : "" }} type="checkbox" class="tgl tgl-skewed" value="1"/>
                            <label data-tg-off="OFF" data-tg-on="ON" for="status" class="tgl-btn"></label>
                        </div>
                    </div>
                    <div class="card-actionbar">
                        <div class="card-actionbar-row text-center">
                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">{{ $slider->sliderId ? "Update" : "Create" }} Slider</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('page-js')
@stop