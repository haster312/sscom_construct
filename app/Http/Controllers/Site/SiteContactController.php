<?php
namespace App\Http\Controllers\Site;
use App\Business\ContactBusiness;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SiteContactController extends BaseSiteController {

    private $contactBusiness;
    function __construct(ContactBusiness $contactBusiness) {
        parent::__construct();
        $this->contactBusiness = $contactBusiness;
    }

    public function getContactIndex() {
        $active = "contact";
        $title  = trans('attribute.content.contact');
        return view('renovation.contact.index',compact('title','active'));
    }

    public function sendContact(Request $request) {
        $this->validate($request,[
            'name'    => 'required',
            'phone'   => 'required',
            'email'   => 'required|email',
            'content' => 'required',
        ]);
        $contact = $request->except('_token');
        $status = $this->contactBusiness->sendContact($contact);
        if ($status)
            Session::flash('message',trans('attribute.contact.message'));
        else
            Session::flash('fails',trans('attribute.contact.fail'));
        return redirect()->back();
    }
}