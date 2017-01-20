@extends('renovation.layouts.main')
@section('title')
    {{ trans('attribute.content.member') }}
@endsection
@section('content')
    @include('renovation.layouts.bread')
    <div class="clearfix padding-bottom-50">
        <div class="row page-margin-top-section">
            <div class="column column-1-3">
                <div class="team-box single">
                    <a href="{{ route("$locale.site.member.detail",$member->memberId) }}" title="{{ $member->name }}">
                        <img alt="{{ $member->name }}" src="{{ $member->Resources ? $member->Resources->path : asset('assets/renovation/images/samples/480x320/team_04.png') }}" style="display: block;">
                    </a>
                    <div class="team-content">
                        <h4>
                            <a href="{{ route("$locale.site.member.detail",$member->memberId) }}" title="{{ $member->name }}">{{ $member->name }}</a>
                            <span>{{ $member->position }}</span>
                        </h4>
                    </div>
                </div>
            </div>
            <div class="column column-1-3">
                <h3 class="box-header">{{ trans('attribute.member.resume') }}</h3>
                <table class="margin-top-40 align-left">
                    <tbody>
                    <tr>
                        <td>{{ trans('attribute.member.name') }}: {{ $member->name }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('attribute.member.birth') }}: {{ $member->birth }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('attribute.member.address') }}: {{ $member->address }}</td>
                    </tr>
                    <tr>
                        <td>{{ trans('attribute.member.email') }}: <a href="{{ $member->email }}">{{ $member->email }}</a></td>
                    </tr>
                    <tr>
                        <td>{{ trans('attribute.member.phone') }}: {{ $member->phone }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="column column-1-3">
                <h3 class="box-header">{{ trans('attribute.member.profile') }}</h3>
                {!!  $member->profile !!}
            </div>
        </div>
    </div>
@stop