<?php
namespace App\Http\Controllers\Admin;

use App\Business\NewsBusiness;
use App\Http\Controllers\Controller;
use App\Model\News;
use App\Model\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class NewsController extends Controller {

    private $newsBusiness;
    private $newsCategory;
    private $news;
    public function __construct(NewsBusiness $newsBusiness, NewsCategory $newsCategory, News $news)
    {
        $this->middleware('auth');
        $this->newsCategory = $newsCategory;
        $this->news         = $news;
        $this->newsBusiness = $newsBusiness;
    }

//    public function categoryIndex(){
//        $newsCategory = $this->newsCategory->paginate(5);
//        $currentIndex = ($newsCategory->currentPage() - 1) * $newsCategory->perpage();
//        return view('admin.news-category.index',compact('newsCategory','currentIndex'));
//    }
//
//    public function addCategory(Request $request){
//
//        if($request->isMethod('post')) {
//            $newsCategoryData = $request->except('_token');
//            $this->newsBusiness->addNewsCategory($newsCategoryData);
//            Session::flash('message','Add News Category Successful');
//            return redirect()->back();
//        }
//        return view('admin.news-category.edit');
//    }
//
//    public function updateCategory($categoryId, Request $request){
//        if($request->isMethod('post')) {
//            $newsCategoryData = $request->except('_token');
//            $this->newsBusiness->updateNewsCategory($categoryId, $newsCategoryData);
//            Session::flash('message','Update News Category Successful');
//            return redirect()->back();
//        }
//        $newsCategory = $this->newsCategory->find($categoryId);
//        $newsCategoryTrans = $newsCategory->newsCategoryTrans;
//        return view('admin.news-category.update',compact('newsCategory','newsCategoryTrans'));
//    }

    public function newsIndex(){
        $news = $this->news->paginate(10);
        $currentIndex = ($news->currentPage() - 1) * $news->perpage();
        return view('admin.news.index',compact('news','currentIndex'));
    }

    public function addNews(Request $request) {
        if($request->isMethod('post')) {
            $newsData = $request->except('_token');
            $validate = $this->news->isValid($newsData);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->newsBusiness->addNewsData($newsData);
            Session::flash('message','Add News Successful');
            return redirect()->back();
        }
        return view('admin.news.edit',compact('newsCategoryList'));
    }

    public function updateNews($newsId, Request $request) {
        if($request->isMethod('post')) {
            $newsData = $request->except('_token');
            $validate = $this->news->isValid($newsData, true);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->newsBusiness->updateNewsData($newsId, $newsData);
            Session::flash('message','Update News Successful');
            return redirect()->back();
        }
        $news = $this->news->find($newsId);
        $newsTrans = $news->newsTrans;
        return view('admin.news.update',compact('newsCategoryList','news','newsTrans'));
    }

//    public function deleteCategory(Request $request) {
//        $categoryId = $request->get('categoryId');
//        $this->newsCategory->destroy($categoryId);
//        Session::flash('message','Delete news category successful');
//    }

    public function deleteNews(Request $request) {
        $newsId = $request->get('newsId');
        $news = $this->news->find($newsId);
        if($news->Resources) {
            File::delete(public_path($news->Resources->path));
        }
        $this->news->destroy($newsId);
        Session::flash('message','Delete news successful');
    }
}