<?php
namespace App\Http\Controllers\Admin;

use App\Business\MemberBusiness;
use App\Http\Controllers\Controller;
use App\Model\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class MemberController extends Controller {

    private $member;
    private $memberBusiness;
    function __construct(Member $member, MemberBusiness $memberBusiness)
    {
        $this->member = $member;
        $this->memberBusiness = $memberBusiness;
    }

    public function memberIndex(){
        $members = $this->member->paginate(10);
        $currentIndex = ($members->currentPage() - 1) * $members->perpage();
        return view('admin.member.index', compact('members','currentIndex'));
    }

    public function addMember(Request $request) {
        if($request->isMethod('post')) {
            $memberData = $request->except('_token');
            $validate = $this->member->isValid($memberData);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->memberBusiness->addNewMember($memberData);
            Session::flash('message','Add member successful');
            return redirect()->back();
        }
        $member = $this->member;
        return view('admin.member.edit', compact('member'));
    }

    public function updateMember(Request $request, $memberId) {
        if($request->isMethod('post')) {
            $memberData = $request->except('_token');
            $validate = $this->member->isValid($memberData, true);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->memberBusiness->updateMemberDate($memberData, $memberId);
            Session::flash('message','Update member successful');
            return redirect()->back();
        }
        $member = $this->member->find($memberId);
        return view('admin.member.edit', compact('member'));
    }

    public function deleteMember(Request $request) {
        $memberId = $request->get('memberId');
        $member = $this->member->find($memberId);
        if($member->Resources) {
            File::delete(public_path($member->Resources->path));
        }
        $this->member->destroy($memberId);
        Session::flash('message','Delete a member successful');
    }
}