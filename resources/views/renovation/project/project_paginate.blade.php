@if(count($projects) > 0)
    <ul class="services-list clearfix padding-top-bottom-30">
        @foreach($projects as $index => $project)
            <?php $count = $index+1; ?>
            <li class="padding-10">
                <a href="{{ route($locale.'.site.project.detail',["categoryId"=>$projectCategory->projectCatId,'projectId'=>$project->projectId, 'projectSlug' => $projectTransList[$index]->projectSlug]) }}" title="Interior Renovation">
                    <img src="{{ $project->Resources ? asset($project->Resources->path) : asset('assets/renovation/images/samples/390x260/image_01.jpg') }}" alt="" style="display: block;">
                </a>
                <h4 class="box-header"><a href="{{ route($locale.'.site.project.detail',["categoryId"=>$projectCategory->projectCatId,'projectId'=>$project->projectId, 'projectSlug' => $projectTransList[$index]->projectSlug]) }}" title="Interior Renovation">{{ $projectTransList[$index]->projectName }}</a></h4>
            </li>
            @if($count % 3 == 0) <div class="clearfix"></div>@endif
        @endforeach
    </ul>
@endif