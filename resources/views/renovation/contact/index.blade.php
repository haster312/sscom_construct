@extends('renovation.layouts.main')
@section('title')
    {{ trans('attribute.contact.menu') }}
@endsection
@section('content')
    @include('renovation.layouts.bread')
    <div class="clearfix">
        <div class="row full-width">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3833.742872245427!2d108.16452161429667!3d16.07882738887504!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314218dd5f890431%3A0x8a5f07708aaffb0f!2sC%C3%B4ng+ty+TNHH+ARECA!5e0!3m2!1sen!2s!4v1478276490379" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            {{--<div class="contact-map" id="map" data-scroll-wheel="0" data-draggable="0"></div>--}}
        </div>
        <div class="row page-margin-top">
            <div class="column column-1-3">
                <ul class="features-list">
                    <li class="sl-small-location">
                        <p>{{ $info->address }}</p>
                    </li>
                </ul>
            </div>
            <div class="column column-1-3">
                <ul class="features-list">
                    <li class="sl-small-phone">
                        <p>{{ trans('attribute.contact.phone') }}:<br>
                            {{ $info->phone }}9</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="row page-margin-top padding-bottom-50">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{!! $error !!} </p>
                    @endforeach
                </div>
            @endif
            @if(session()->has('fails'))
                <div class="alert alert-danger">
                    {{ session()->get('fails') }}
                </div>
            @endif
            {!! Form::open(['class'=>'contact-form']) !!}
                <div class="row">
                    <fieldset class="column column-1-2">
                        <input class="text-input hint" name="name" type="text" value="" placeholder="{{ trans('attribute.contact.name') }} *">
                        <input class="text-input hint" name="email" type="text" value="" placeholder="{{ trans('attribute.contact.email') }} *">
                        <input class="text-input hint" name="phone" type="text" value="" placeholder="{{ trans('attribute.contact.phone') }}">
                    </fieldset>
                    <fieldset class="column column-1-2">
                        <textarea name="content" placeholder="{{ trans('attribute.contact.content') }} *" class="hint"></textarea>
                    </fieldset>
                </div>
                <div class="row margin-top-30">
                    <div class="column column-1-2">
                         &nbsp;
                    </div>
                    <div class="column column-1-2 align-right">
                        <button class="more active">{{ trans('attribute.contact.send') }}</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection