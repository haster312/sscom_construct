<?php
namespace App\Business;

use App\Model\News;
use App\Model\NewsCategory;
use App\Model\NewsCategoryTrans;
use App\Model\NewsTrans;
use App\Model\Resources;

class NewsBusiness {

    public function getNewsCategorySelect() {
        $newsCategory = NewsCategory::all();
        $categorySelect = [];
        foreach ($newsCategory as $category) {
            $catNameVN = NewsCategoryTrans::where('newsCatId',$category->newsCatId)->where('locale','vn')->first();
            $catNameEN = NewsCategoryTrans::where('newsCatId',$category->newsCatId)->where('locale','en')->first();
            $categorySelect[$category->newsCatId] = $catNameVN->newsCatName." (".$catNameEN->newsCatName.")";
        }
        return $categorySelect;
    }

    public function addNewsCategory($newsCategoryData) {
        $category = new NewsCategory();
        if(array_key_exists('newsCategoryImage',$newsCategoryData)) {
            $resourceData = UploadBusiness::uploadFile($newsCategoryData['newsCategoryImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $category->resourceId = $resources->resourceId;
        }
        if(array_key_exists('status',$newsCategoryData)) {
            $category->status = $newsCategoryData['status'];
        } else {
            $category->status = 0;
        }
        $category->save();
        $newsCategory = $newsCategoryData['newsCategory'];
        foreach ($newsCategory as $index => $data) {
            $newsCategoryTrans = new NewsCategoryTrans();
            $this->dataCategoryProcess($newsCategoryTrans, $newsCategory[$index], $category->newsCatId, $index);
        }
    }

    public function updateNewsCategory($categoryId, $newsCategoryData) {
        $category = NewsCategory::find($categoryId);
        if(array_key_exists('newsCategoryImage',$newsCategoryData)) {
            $resourceData = UploadBusiness::uploadFile($newsCategoryData['newsCategoryImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $category->resourceId = $resources->resourceId;
        }
        if(array_key_exists('status',$newsCategoryData)) {
            $category->status = $newsCategoryData['status'];
        } else {
            $category->status = 0;
        }
        $category->save();
        $newsCategory = $newsCategoryData['newsCategory'];
        foreach ($newsCategory as $index => $data) {
            $newsCategoryTrans = NewsCategoryTrans::where('newsCatId',$categoryId)->where('locale',$index)->first();
            $this->dataCategoryProcess($newsCategoryTrans, $newsCategory[$index], $category->newsCatId, $index);
        }
    }

    public function dataCategoryProcess($newsCategoryTrans, $category, $categoryId, $locale) {
        $newsCategoryTrans->newsCatName = $category['name'];
        $newsCategoryTrans->newsCatSlug = str_slug($category['name']);
        $newsCategoryTrans->newsCatId   = $categoryId;
        $newsCategoryTrans->locale      = $locale;
        $newsCategoryTrans->save();
    }

    public function addNewsData($newsData) {
        $news = new News();
        if(array_key_exists('newsImage',$newsData)) {
            $resourceData = UploadBusiness::uploadFile($newsData['newsImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $news->resourceId = $resources->resourceId;
        }
        if(array_key_exists('status',$newsData)) {
            $news->status = $newsData['status'];
        } else {
            $news->status = 0;
        }
        $news->created_date = date("d/m/y");
        $news->save();
        $contents = $newsData['news'];
        foreach ($contents as $index => $content) {
            $newsTrans = new NewsTrans();
            $this->dataNewsProcess($newsTrans, $contents[$index], $news->newsId, $index);
        }
    }

    public function updateNewsData($newsId, $newsData) {
        $news = News::find($newsId);
        if(array_key_exists('newsImage',$newsData)) {
            $resourceData = UploadBusiness::uploadFile($newsData['newsImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $news->resourceId = $resources->resourceId;
        }
        if(array_key_exists('status',$newsData)) {
            $news->status = $newsData['status'];
        } else {
            $news->status = 0;
        }
        $news->save();
        $contents = $newsData['news'];
        foreach ($contents as $index => $content) {
            $newsTrans = NewsTrans::where('newsId',$newsId)->where('locale',$index)->first();
            $this->dataNewsProcess($newsTrans, $contents[$index], $news->newsId, $index);
        }
    }

    public function dataNewsProcess($newsTrans, $news, $newsId, $locale) {
        $newsTrans->newsTitle   = $news['title'];
        $newsTrans->newsSlug    = str_slug($news['title']);
        $newsTrans->newsContent = $news['content'];
        $newsTrans->newsSummary = $news['summary'];
        $newsTrans->keyword     = $news['keyword'];
        $newsTrans->newsId      = $newsId;
        $newsTrans->locale      = $locale;
        $newsTrans->save();
    }

    public static function getNewsCategoryTransByLocale($newsCatId,$locale){
        $newsCatTrans = NewsCategoryTrans::where('newsCatId',$newsCatId)->where('locale',$locale)->first();
        return $newsCatTrans;
    }

    public function getNewsTransList($news,$locale){
        $newsTransList = [];
        foreach ($news as $new){
            $newsTrans = NewsTrans::where('newsId',$new->newsId)->where('locale',$locale)->first();
            $newsTransList[] = $newsTrans;
        }
        return $newsTransList;
    }
}