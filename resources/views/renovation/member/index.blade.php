@extends('renovation.layouts.main')
@section('title')
    {{ trans('attribute.content.member') }}
@endsection
@section('content')
    @include('renovation.layouts.bread')
    <div class="clearfix">
        <div class="row">
            <ul class="team-list padding-top-70 clearfix padding-bottom-50">
                @if(count($members) > 0)
                    @foreach($members as $member)
                <li class="team-box">
                    <a href="{{ route("$locale.site.member.detail",$member->memberId) }}" title="{{ $member->name }}">
                        <img alt="Mark Whilberg" src="{{ $member->Resources ? $member->Resources->path : asset('assets/renovation/images/samples/390x260/team_01.png') }}" style="display: block;">
                    </a>
                    <div class="team-content">
                        <h4 class="box-header">
                            <a href="{{ route("$locale.site.member.detail",$member->memberId) }}" title="{{ $member->name }}">{{ $member->name }}</a>
                            <span>{{ $member->position }}</span>
                        </h4>
                        <p>{!! mb_substr($member->profile,0,100) !!}</p>
                    </div>
                </li>
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
@stop