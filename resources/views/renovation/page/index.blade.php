@extends('renovation.layouts.main')
@section('title')
    {{ trans('attribute.introduce.menu') }}
@endsection
@section('content')
    @include('renovation.layouts.bread')
    <div class="clearfix">
        <div class="row margin-top-70 padding-bottom-66">
            @if(count($pageTrans) > 0)
            <div class="column column-1-1">
                <ul class="vertical-menu">
                    @foreach($pageTrans as $index => $page)
                        <li id="item-menu-{{$index}}" class="item-menu selected">
                            <a href="{{ route($locale.".site.introduce",["pageId"=>$page->pageId,"pageSlug"=>$page->pageSlug]) }}" title="{{ $page->pageTitle }}">
                                {{ $page->pageTitle }}
                                <span class="template-arrow-menu"></span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="column column-1-1 margin-top-20">
                @foreach($pageTrans as $index => $page)
                    <div id="item-content-{{$index}}" class="item-content row">
                        <div class="column-1-1 description">
                            <h3 class="box-header">{{ $page->pageTitle }}</h3>
                            {!! $page->pageContent !!}
                        </div>
                    </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
@endsection
@section('js')
    {{--<script src="{{ asset('assets/renovation/js/list-page.js') }}"></script>--}}
@stop