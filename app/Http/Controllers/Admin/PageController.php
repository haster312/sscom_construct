<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Business\PageBusiness;
use App\Http\Controllers\Controller;
use App\Model\Page;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class PageController extends Controller {

    private $pageBusiness;
    private $page;
    public function __construct(PageBusiness $pageBusiness, Page $page)
    {
        $this->middleware('auth');
        $this->pageBusiness = $pageBusiness;
        $this->page         = $page;
    }

    public function getAdminIndex() {
        return view('admin.welcome');
    }
    public function getIndex(){
        $pages = Page::paginate(10);
        $currentIndex = ($pages->currentPage() - 1) * $pages->perpage();
        return view('admin.page.index',compact('pages','currentIndex'));
    }

    public function addPage(Request $request) {

        if($request->isMethod('post')) {
            $pageData = $request->except('_token');
            $validate = $this->page->isValid($pageData);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->pageBusiness->addPage($pageData);
            Session::flash('message','Add new page successful');
            return redirect()->back();
        }
        return view('admin.page.edit');
    }

    public function updatePage($pageId, Request $request) {
        if($request->isMethod('post')) {
            $pageData = $request->except('_token');
            $validate = $this->page->isValid($pageData);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->pageBusiness->updatePage($pageId, $pageData);
            Session::flash('message','update page successful');
            return redirect()->back();
        }
        $page      = $this->page->find($pageId);
        $pageTrans = $page->pageTrans;
        return view('admin.page.update',compact('page','pageTrans'));
    }

    public function deletePage(Request $request) {
        $pageId = $request->get('pageId');
        $this->page->destroy($pageId);
        Session::flash('message','Delete news page successful');
    }
}