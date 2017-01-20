<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsCategory extends Model {

    public $timestamps = false;
    protected $table = 'newscategory';
    protected $primaryKey = 'newsCatId';

    public function newsCategoryTrans(){
        return $this->hasMany('App\Model\NewsCategoryTrans','newsCatId','newsCatId');
    }

    public function News() {
        return $this->hasMany('App\Model\News','newsCatId','newsCatId');
    }

    public function Resources() {
        return $this->hasOne('App\Model\Resources','resourceId','resourceId');
    }
}