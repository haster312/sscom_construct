<?php
namespace App\Http\Controllers\Site;

use App\Model\Member;

class SiteMemberController extends BaseSiteController {

    public function getMemberIndex(){
        $members = Member::all();
        $active  = "member";
        $title   = trans('attribute.content.member');
        return view('renovation.member.index',compact('members','active','title'));
    }

    public function getMemberDetail($memberId){
        $member = Member::find($memberId);
        $active  = "member";
        $title   = trans('attribute.content.member');
        return view('renovation.member.detail',compact('member','active','title'));
    }
}