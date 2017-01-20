<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class News extends Model {

    public $timestamps = false;
    protected $table = 'news';
    protected $primaryKey = 'newsId';

    public function newsTrans(){
        return $this->hasMany('App\Model\NewsTrans','newsId','newsId');
    }

    public function Resources() {
        return $this->hasOne('App\Model\Resources','resourceId','resourceId');
    }

    public $rules = [
        'news.*.title'    => 'required',
        'news.*.summary'  => 'required',
        'news.*.content'  => 'required',
        'newsImage'       => 'required|mimes:jpeg,jpg,png,gif',
    ];

    public function isValid($request,$update = false) {
        if($update) {
            $this->rules['newsImage'] = "";
        }
        $validate = Validator::make($request, $this->rules);
        return $validate;
    }
}