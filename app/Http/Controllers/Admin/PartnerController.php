<?php
namespace App\Http\Controllers\Admin;

use App\Business\PartnerBusiness;
use App\Http\Controllers\Controller;
use App\Model\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PartnerController extends Controller {

    private $partner;
    private $partnerBusiness;
    function __construct(Partner $partner, PartnerBusiness $partnerBusiness) {
        $this->partner          = $partner;
        $this->partnerBusiness  = $partnerBusiness;
    }

    /**
     * Partner Index Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function partnerIndex(){
        $partners = $this->partner->paginate(10);
        $currentIndex = ($partners->currentPage() - 1) * $partners->perpage();
        return view('admin.partner.index',compact('partners','currentIndex'));
    }

    /**
     * Add New Partner
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function addPartner(Request $request) {
        if($request->isMethod('post')) {
            $partnerData = $request->except('_token');
            $validate = $this->partner->isValid($partnerData);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->partnerBusiness->addPartnerData($partnerData);
            Session::flash('message','Add new partner successful');
            return redirect()->back();
        }
        $partner = new Partner();
        return view('admin.partner.edit',compact('partner'));
    }

    /**
     * Update Partner
     * @param $partnerId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function updatePartner($partnerId, Request $request) {
        if($request->isMethod('post')) {
            $partnerData = $request->except('_token');
            $validate = $this->partner->isValid($partnerData, true);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->partnerBusiness->updatePartnerData($partnerId, $partnerData);
            Session::flash('message','Update partner successful');
            return redirect()->back();
        }
        $partner = $this->partner->find($partnerId);
        return view('admin.partner.edit',compact('partner'));
    }

    public function deletePartner(Request $request) {
        $partnerId = $request->get('partnerId');
        $partner = $this->partner->find($partnerId);
        if($partner->Resources) {
            File::delete(public_path($partner->Resources->path));
        }
        $this->partner->destroy($partnerId);
        Session::flash('message','Delete partner successful');
    }
}