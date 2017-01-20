@extends('admin.layouts.app')
@section('content')
    <section>
        <div class="section-header ">
            <ol class="breadcrumb">
                <li class="active">{{ $partner ? "Update" : "Create" }} Partner</li>
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
                            <h4>Name <span class="required">*</span></h4>
                            {!! Form::text('partnerName',$partner->partnerName,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Email <span class="required">*</span></h4>
                            {!! Form::email('partnerEmail',$partner->partnerEmail,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Phone <span class="required">*</span></h4>
                            {!! Form::text('partnerPhone',$partner->partnerPhone,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Address</h4>
                            {!! Form::text('partnerAddress',$partner->partnerAddress,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Site</h4>
                            {!! Form::text('partnerSite',$partner->partnerSite,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Images</h4>
                            {!! Form::file('partnerImage',['class'=>'form-control']) !!}
                            @if($partner->Resources)
                                <img src="{{ asset($partner->Resources->path) }}" class="sliderThumbnail">
                            @endif
                        </div>
                    </div>
                    <div class="card-actionbar">
                        <div class="card-actionbar-row text-center">
                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">{{ $partner ? "Update" : "Create" }} Partner</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection