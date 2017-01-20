<?php
namespace App\Http\Controllers\Site;

use App\Business\PageBusiness;
use App\Model\Page;
use App\Model\PageTrans;
use Illuminate\Support\Facades\Session;

class SitePageController extends BaseSiteController {

    function __construct()
    {
        parent::__construct();
    }

    public function getPageIndex($pageId, $pageSlug) {
        $introduce = PageTrans::where('pageSlug',$pageSlug)->where('locale',$this->locale)->first();
        if(!$introduce){
            $introduce = PageTrans::where('pageId',$pageId)->where('locale',$this->locale)->first();
            return redirect()->route("site.introduce",["pageId"=>$pageId,"pageSlug"=>$introduce->pageSlug]);
        }

        $pages = Page::orderBy('page_order','desc')->get();
        $pageTrans = [];
        foreach ($pages as $page) {
            $trans = PageBusiness::getPageTransByLocale($page->pageId, $this->locale);
            $pageTrans[] = $trans;
        }

        $active   = "page";
        $title    = trans('attribute.content.introduce');
        $selected = $pageId;
        return view('renovation.page.detail',compact('title','introduce','active','pages','pageTrans','selected'));
    }

    public function getAllPage() {
        $pages = Page::orderBy('page_order','desc')->get();
        $pageTrans = [];
        foreach ($pages as $page) {
            $trans = PageBusiness::getPageTransByLocale($page->pageId, $this->locale);
            $pageTrans[] = $trans;
        }
        $active = "page";
        $title   = trans('attribute.content.introduce');
        return view('renovation.page.index',compact('pageTrans','active','title'));
    }
}