@extends('renovation.layouts.main')
@section('title')
    {{ trim($newsTrans->newsTitle) }}
@endsection
@section('keyword')
    {{ trim($newsTrans->keyword) }}
@endsection
@section('description')
    {{ trim($newsTrans->newsSummary) }}
@endsection
@section('content')
    @include('renovation.layouts.bread')
    <div class="clearfix">
        <div class="row margin-top-70 padding-bottom-50">
            <div class="column column-4-4">
                <div class="blog clearfix">
                    <div class="post single">
                        <div class="post-content">
                            <h1 class="box-header align-left padding-bottom-17"><a href="#">{{ $newsTrans->newsTitle }}</a></h1>
                            <span class="date padding-bottom-17" style="display: block;font-style: italic;">{{ trans('attribute.date') }} {{ date("d-m-Y",strtotime($news->created_date)) }}</span>
                            <a href="#" title="What a Difference a Few Months Make" class="post-image">
                                <img src="{{ $news->Resources ? asset($news->Resources->path) : "" }}" alt="" style="display: block;">
                            </a>
                            {!! $newsTrans->newsContent !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection