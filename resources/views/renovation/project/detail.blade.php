@extends('renovation.layouts.main')
@section('title')
    {{ trim($projectTrans->projectName) }}
@endsection
@section('keyword')
    {{ trim($projectTrans->projectKeyword) }}
@endsection
@section('description')
    {{ trim($projectTrans->projectShortDescription) }}
@endsection
@section('content')
    @include('renovation.layouts.bread')
    <div class="clearfix">
        <div class="row margin-top-70 padding-bottom-66">
            <div class="column column-1-2">
                <a href="{{ $project->Resources ? asset($project->Resources->path) : asset('assets/renovation/images/samples/750x500/image_01.jpg') }}" class="prettyPhoto re-preload margin-top-20" title="{{ $projectTrans->projectName }}">
                    <img src="{{ $project->Resources ? asset($project->Resources->path) : asset('assets/renovation/images/samples/750x500/image_01.jpg') }}" alt="{{ $projectTrans->projectName }}" style="display: block;">
                </a>
                <div class="row margin-top-30">
                    @if($project->image_list)
                        <?php $imageList = explode(PHP_EOL, $project->image_list) ?>
                        @if(count($imageList) > 0)
                            @foreach($imageList as $index => $image)
                                @if(strpos($image, 'http'))
                                <div class="column column-1-2 @if($index == 0 || $index % 2 == 0) margin-left-non @endif margin-bottom-20">
                                    <a href="{{ $image }}" class="prettyPhoto re-preload" title="{{ $projectTrans->projectName }}">
                                        <img src='{{ $image }}' alt='{{ $projectTrans->projectName }}' class="sub-image">
                                    </a>
                                </div>
                                @else
                                <div class="column column-1-2 @if($index == 0 || $index % 2 == 0) margin-left-non @endif margin-bottom-20">
                                    <a href="{{ asset($image) }}" class="prettyPhoto re-preload" title="{{ $projectTrans->projectName }}">
                                        <img src='{{ asset($image) }}' alt='{{ $projectTrans->projectName }}' class="sub-image">
                                    </a>
                                </div>
                                @endif
                                @if(($index + 1) % 2 == 0)
                                    <div class="clearfix"></div>
                                @endif
                            @endforeach
                        @endif
                    @endif
                </div>
                @if($project->subResources)
                <div class="row margin-top-20">
                    <a href="{{ $project->subResources ? asset($project->subResources->path) : '' }}" class="prettyPhoto re-preload" title="{{ $projectTrans->projectName }}">
                        <img src='{{ $project->subResources ? asset($project->subResources->path) : '' }}' alt='{{ $projectTrans->projectName }}' class="sub-image">
                    </a>
                </div>
                @endif
            </div>
            <div class="column column-1-2">
                <h1 class="box-header">{{ $projectTrans->projectName }}</h1>
                <div class="tabs small no-scroll align-left clearfix margin-top-20 ui-tabs ui-widget ui-widget-content ui-corner-all" id="project-detail">
                    {!! $projectTrans->projectDescription !!}
                </div>
            </div>
        </div>
    </div>
@endsection
