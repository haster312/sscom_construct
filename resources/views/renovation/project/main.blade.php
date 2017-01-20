@extends('renovation.layouts.main')
@section('title')
    {{ $title }}
@endsection
@section('content')
    @include('renovation.layouts.bread')
    <div class="clearfix">
        <div class="row margin-top-70 padding-bottom-66">
            @if(count($projectCatTrans) > 0)
                <div class="column column-1-1">
                    <ul class="vertical-menu">
                        @foreach($projectCatTrans as $index => $projectCat)
                            <li id="item-menu-{{$index}}" class="item-menu selected">
                                <a href="{{ route($locale.".site.project",["categoryId"=>$projectCat->projectCatId,'categorySlug' => $projectCat->projectCatSlug]) }}" title="{{ $projectCat->projectCatName }}">
                                    {{ $projectCat->projectCatName }}
                                    <span class="template-arrow-menu"></span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="column column-1-1 margin-left-non margin-top-20">
                    @foreach($projectCatTrans as $index => $projectCat)
                        <div id="item-content-{{$index}}" class="item-content row">
                                <h3 class="box-header">
                                    <a href="{{ route($locale.".site.project",["categoryId"=>$projectCat->projectCatId,'categorySlug' => $projectCat->projectCatSlug]) }}" title="{{ $projectCat->projectCatName }}">
                                        {{ $projectCat->projectCatName }}
                                    </a>
                                </h3>
                                <ul class="services-list clearfix padding-top-54">
                                    <?php $projectBusiness = new \App\Business\ProjectBusiness(); ?>
                                    <?php $projects = $projectBusiness->getProjectByCategoryId($projectCat->projectCatId,3); ?>
                                    @if(count($projects) > 0)
                                        <?php $projectTransList = $projectBusiness->getProjectTransList($projects, $locale); ?>
                                        @foreach($projects as $index => $project)
                                            <li class="padding-10">
                                                <a href="{{ route($locale.'.site.project.detail',["categoryId"=>$projectCat->projectCatId, 'projectId'=>$project->projectId, 'projectSlug' => $projectTransList[$index]->projectSlug]) }}">
                                                    <img src="{{ $project->Resources ? asset($project->Resources->path) : asset('assets/renovation/images/samples/390x260/image_01.jpg') }}" alt="{{ $projectTransList[$index]->projectName }}" class="project-image">
                                                </a>
                                                <h4 class="box-header"><a href="{{ route($locale.'.site.project.detail',["categoryId"=>$projectCat->projectCatId, 'projectId'=>$project->projectId, 'projectSlug' => $projectTransList[$index]->projectSlug]) }}">{{ $projectTransList[$index]->projectName }}</a></h4>
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
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