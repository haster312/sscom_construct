@extends('renovation.layouts.main')
@section('title')
    {{ trim($introduce->pageTitle) }}
@endsection
@section('keyword')
    {{ trim($introduce->keyword) }}
@endsection
@section('description')
    {{ trim($introduce->description) }}
@endsection
@section('content')
    @include('renovation.layouts.bread')
    <div class="clearfix">
        <div class="row margin-top-70 padding-bottom-66">
            <div class="column column-1-1">
                <ul class="vertical-menu">
                    @foreach($pageTrans as $index => $page)
                        <li id="item-menu-{{$index}}" class="item-menu {{ $page->pageId == $selected ? "selected" : ""}}">
                            <a href="{{ route($locale.".site.introduce",["pageId"=>$page->pageId,"pageSlug"=>$page->pageSlug]) }}" title="{{ $page->pageTitle }}">
                                {{ $page->pageTitle }}
                                <span class="template-arrow-menu"></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="column column-1-1 margin-top-20">
                <div class="description">
                    <h3 class="box-header align-left">{{ $introduce->pageTitle }}</h3>
                    {!! $introduce->pageContent !!}
                </div>
            </div>
        </div>
    </div>
@endsection