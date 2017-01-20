<?php
namespace App\Http\Controllers\Site;
use App\Business\NewsBusiness;
use App\Business\PageBusiness;
use App\Business\ProjectBusiness;
use App\Http\Controllers\Controller;
use App\Model\Info;
use App\Model\NewsCategory;
use App\Model\Page;
use App\Model\PageTrans;
use App\Model\Project;
use App\Model\ProjectCategory;
use App\Model\SEO;
use App\Model\Slider;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
class BaseSiteController extends Controller {

    public $locale;
    public function __construct() {

        $locale = App::getLocale();
        $pages   = Page::orderBy('page_order','desc')->get();
        $pageTransList = [];
        foreach ($pages as $page) {
            $pagesTrans = PageBusiness::getPageTransByLocale($page->pageId,$locale);
            $pageTransList[] = $pagesTrans;
        }
        $projectCategories = ProjectCategory::all();
        $projectCatTransList = [];
        foreach ($projectCategories as $category) {
            $projectCatTrans = ProjectBusiness::getProjectCategoryTransByLocale($category->projectCatId, $locale);
            $projectCatTransList[] = $projectCatTrans;
        }
        $parentCategory = ProjectCategory::where('parent',1)->get();
        $parentCatTransList = [];
        foreach ($parentCategory as $category) {
            $parentCatTrans = ProjectBusiness::getProjectCategoryTransByLocale($category->projectCatId, $locale);
            $parentCatTransList[] = $parentCatTrans;
        }
        $this->locale = $locale;
        $projectBusiness = new ProjectBusiness();
        $height = "350";
        $route = \Request::route()->getName();
        if($route == "$locale.site.index") {
            $sliders = Slider::where('type',1)->get();
        } else {
            $sliders = Slider::where('type',2)->get();
        }
        $info = Info::first();
        $seo = SEO::where('locale',$locale)->first();
        View::share('pageTransList',$pageTransList);
        View::share('height',$height);
        View::share('projectCatTransList',$projectCatTransList);
        View::share('parentCatTransList',$parentCatTransList);
        View::share('sliders',$sliders);
        View::share('projectBusiness',$projectBusiness);
        View::share('locale',$locale);
        View::share('info',$info);
        View::share('seo',$seo);
    }
}