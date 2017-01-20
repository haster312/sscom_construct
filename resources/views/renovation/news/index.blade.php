@extends('renovation.layouts.main')
@section('title')
    {{ trans('attribute.content.news') }}
@endsection
@section('content')
    @include('renovation.layouts.bread')
    <div class="clearfix">
        <div class="row margin-top-70 padding-bottom-50">
            <div class="column column-4-4">
                <ul class="blog clearfix">
                    @if(count($news) > 0)
                        @foreach($news as $index => $new)
                            <?php $time = $new->created_date; ?>
                            <li>
                                <ul class="post-details">
                                    <li class="date template-calendar">{{ date('m',strtotime($time)) }}<h2>{{ date('d',strtotime($time)) }}</h2>{{ date('Y',strtotime($time)) }}</li>
                                    <li class="template-eye">{{ $new->count }}</li>
                                </ul>
                                <div class="post-content">
                                    <a href="{{ route($locale.".site.news.detail",array('newsId'=>$new->newsId,'slug'=>$newsTransList[$index]->newsSlug)) }}" title="What a Difference a Few Months Make" class="post-image">
                                        <img src="{{ $new->Resources ? asset($new->Resources->path) : asset("assets/renovation/images/samples/750x500/image_10.jpg") }}" alt="{{ $newsTransList[$index]->newsName }}" style="display: block;">
                                    </a>
                                    <h2 class="box-header align-left"><a href="{{ route($locale.".site.news.detail",array('newsId'=>$new->newsId,'slug'=>$newsTransList[$index]->newsSlug)) }}" title="{{ trans('attribute.news.more') }}">{{$newsTransList[$index]->newsTitle }}</a></h2>
                                    <p class="description t1">{!! mb_substr($newsTransList[$index]->newsSummary,0,200) !!}</p>
                                    <div class="row padding-top-54 padding-bottom-17">
                                        <a class="more" href="{{ route($locale.".site.news.detail",array('newsId'=>$new->newsId,'slug'=>$newsTransList[$index]->newsSlug)) }}" title="{{ trans('attribute.news.more') }}">{{ trans('attribute.news.more') }}</a>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endif
                </ul>
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection