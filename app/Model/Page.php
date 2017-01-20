<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Page extends Model
{
    public $timestamps = false;

    protected $table = 'page';

    protected $primaryKey = 'pageId';

    public function pageTrans() {
        return $this->hasMany('App\Model\PageTrans','pageId','pageId');
    }
    private $rules = [
        'page.*.title'  => 'required',
        'page.*.content'  => 'required'
    ];

    public function isValid($page){
        $validate = Validator::make($page, $this->rules);
        return $validate;
    }

}