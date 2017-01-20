<?php
namespace App\Http\Controllers\Site;


use App\Business\NewsBusiness;
use App\Model\News;
use App\Model\NewsCategory;
use App\Model\NewsCategoryTrans;
use App\Model\NewsTrans;
use Illuminate\Support\Facades\Session;

class SiteNewsController extends BaseSiteController {

    private $newsBusiness;
    function __construct(NewsBusiness $newsBusiness) {
        parent::__construct();
        $this->newsBusiness = $newsBusiness;
    }

    public function getSiteNews() {
        $news = News::where('status',1)->paginate(9);
        $newsTransList = $this->newsBusiness->getNewsTransList($news, $this->locale);
        $active = "news";
        $title = trans('attribute.content.news');
        return view('renovation.news.index',compact('title','newsCategory','newsCatTrans','news','newsTransList','active'));
    }

    public function getNewsDetail($newsId) {
        $news = News::find($newsId);
        $newsTrans = NewsTrans::where('newsId',$newsId)->where('locale',$this->locale)->first();
        if(!$news)
            return redirect()->back();

        $newsCount = $news->count + 1;
        $news->count = $newsCount;
        $news->save();
        $active = "news";
        $title = trans('attribute.content.news');
        return view('renovation.news.detail',compact('title','news','newsTrans','active'));
    }
}