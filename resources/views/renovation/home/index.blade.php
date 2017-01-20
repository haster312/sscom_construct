@extends('renovation.layouts.main')
@section('title')
    {{ trans('attribute.home') }}
@endsection
@section('content')
    <div class="theme-page">
        <div class="clearfix">
            <div class="row full-width ">
                <div class="announcement clearfix">
                    <ul class="columns no-width">
                        <li class="column column-3-4">
                            <div class="vertical-align">
                                <h1>{{ trans('attribute.title') }}</h1>
                            </div>
                        </li>
                        <li class="column-right column-1-4">
                            <div class="vertical-align">
                                <div class="vertical-align-cell">
                                    <a class="more" href="{{ route($locale.".site.contact") }}" title="{{ trans('attribute.contact_us') }}">{{ trans('attribute.contact_us') }}</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row full-width gray page-padding-top-section">
                <div class="row">
                    <h2 class="box-header">{{ trans('attribute.content.typical_project') }}</h2>
                </div>
                @if(count($projects) > 0)
                <ul class="projects-list clearfix page-margin-top">
                    @foreach($projects as $index => $project)
                    <li>
                        <a href="{{ route($locale.".site.project.detail",["categoryId"=>$project->projectCatId,'projectId'=>$project->projectId, 'projectSlug' => $projectTransList[$index]->projectSlug]) }}" title="Design and Build">
                            <img class="project-image" src="{{ $project->Resources ? asset($project->Resources->path) : asset("assets/renovation/images/samples/480x320/image_07.jpg") }}" alt="{{ $projectTransList[$index]->projectName }}">
                        </a>
                        <div class="view align-center">
                            <div class="vertical-align-table">
                                <div class="vertical-align-cell">
                                    <p class="description">{{ $projectTransList[$index]->projectName }}</p>
                                    <a class="more simple" href="{{ route($locale.".site.project.detail",["categoryId"=>$project->projectCatId, 'projectId'=>$project->projectId, 'projectSlug' => $projectTransList[$index]->projectSlug]) }}" title="VIEW PROJECT">{{ trans('attribute.project.view') }}</a>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="row page-margin-top-section padding-bottom-66">
                <div class="row">
                    <h2 class="box-header">{{ trans('attribute.content.news') }}</h2>
                </div>
                @if(count($news) > 0)
                <div class="carousel-container page-margin-top clearfix">
                    <ul class="blog horizontal-carousel three-columns autoplay-0 pause_on_hover-1">
                        @foreach($news as $index => $new)
                        <li class="column column-1-3">
                            <a href="{{ route($locale.".site.news.detail",array('newsId'=>$new->newsId,'slug'=>$newsTransList[$index]->newsSlug)) }}" title="What a Difference a Few Months Make" class="post-image">
                                <img class="news-image" src="{{ $new->Resources ? asset($new->Resources->path) : asset("assets/renovation/images/samples/750x500/image_10.jpg") }}" alt="{{ $newsTransList[$index]->newsTitle }}">
                            </a>
                            <h4><a href="{{ route($locale.".site.news.detail",array('newsId'=>$new->newsId,'slug'=>$newsTransList[$index]->newsSlug)) }}">{{mb_substr($newsTransList[$index]->newsTitle,0,50) }}</a></h4>
                            <p class="description t1">{!! mb_substr($newsTransList[$index]->newsSummary,0,150) !!}</p>
                        </li>
                        @endforeach
                    </ul>
                    <div class="re-carousel-pagination"></div>
                    <div class="align-center padding-top-54 padding-bottom-17">
                        <a class="more" href="{{ route($locale.".site.news") }}" title="VIEW ALL POSTS">{{ trans('attribute.view.all') }}</a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection