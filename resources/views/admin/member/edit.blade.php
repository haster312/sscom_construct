@extends('admin.layouts.app')
@section('content')
    <section>
        <div class="section-header ">
            <ol class="breadcrumb">
                <li class="active">{{ $member->memberId ? "Update" : "Create" }} Member</li>
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
                            {!! Form::text('name',$member->name,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Position</h4>
                            {!! Form::text('position',$member->position,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Birthdate</h4>
                            {!! Form::date('birth',$member->birth,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Address</h4>
                            {!! Form::text('address',$member->address,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Email</h4>
                            {!! Form::email('email',$member->email,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Phone</h4>
                            {!! Form::text('phone',$member->phone,['class'=>'form-control']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Profile</h4>
                            {!! Form::textarea('profile',$member->profile,['class'=>'form-control ckeditor']) !!}
                        </div>
                        <div class="form-group">
                            <h4>Image <span class="required">*</span></h4>
                            {!! Form::file('memberImage',['class'=>'form-control']) !!}
                            @if($member->Resources)
                                <img src="{{ asset($member->Resources->path) }}" class="sliderThumbnail">
                            @endif
                        </div>
                    </div>
                    <div class="card-actionbar">
                        <div class="card-actionbar-row text-center">
                            <button type="submit" class="btn btn-flat btn-primary ink-reaction">{{ $member->memberId ? "Update" : "Create" }} Member</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('page-js')
@stop