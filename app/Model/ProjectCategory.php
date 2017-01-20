<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;
class ProjectCategory extends Model {

    public $timestamps = false;
    protected $table = 'projectcategory';
    protected $primaryKey = 'projectCatId';

    public function projectCategoryTrans(){
        return $this->hasMany('App\Model\ProjectCategoryTrans','projectCatId','projectCatId');
    }

    public function project() {
        return $this->hasMany('App\Model\Project','projectCatId','projectCatId');
    }

    public function Resources() {
        return $this->hasOne('App\Model\Resources','resourceId','resourceId');
    }

    public $rules = [
        'projectCategory.*.name' => 'required',
        'projectCategory.*.description' => 'required'
    ];

    public function isValid($request) {
        $validate = Validator::make($request, $this->rules);
        return $validate;
    }
}