<?php
namespace App\Business;

use App\Model\Page;
use App\Model\PageTrans;

class PageBusiness {

    public function addPage($pageData) {
        $page = new Page();
        if(array_key_exists('status',$pageData)) {
            $page->status = $pageData['status'];
        } else {
            $page->status = 0;
        }
        $page->page_order = $pageData['page_order'];
        $page->save();
        $pages = $pageData['page'];
        foreach ($pages as $index => $data) {
            $pageTrans = new PageTrans();
            $this->dataProcess($pageTrans, $pages[$index],$page->pageId, $index);
        }
    }

    public function updatePage($pageId, $pageData) {
        $page = Page::find($pageId);
        if(array_key_exists('status',$pageData)) {
            $page->status = $pageData['status'];
        } else {
            $page->status = 0;
        }
        $page->page_order = $pageData['page_order'];
        $page->save();
        $pages = $pageData['page'];
        foreach ($pages as $index => $data) {
            $pageTrans = PageTrans::where('pageId',$pageId)->where('locale',$index)->first();
            $this->dataProcess($pageTrans, $pages[$index],$pageId, $index);
        }
    }

    public function dataProcess($pageTrans,$page, $pageId, $locale) {
        $pageTrans->pageTitle   = $page['title'];
        $pageTrans->pageSlug    = str_slug($page['title']);
        $pageTrans->pageContent = $page['content'];
        $pageTrans->keyword     = $page['keyword'];
        $pageTrans->description     = $page['description'];
        $pageTrans->pageId      = $pageId;
        $pageTrans->locale      = $locale;
        $pageTrans->save();
    }

    public static function getPageTransByLocale($pageId, $locale){
        $pageTrans = PageTrans::where('pageId',$pageId)->where('locale',$locale)->first();
        return $pageTrans;
    }
}