<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Project extends Model {

    protected $table = 'project';
    protected $primaryKey = 'projectId';

    public function projectTrans(){
        return $this->hasMany('App\Model\ProjectTrans','projectId','projectId');
    }

    public function projectCategory() {
        return $this->belongsTo('App\Model\ProjectCategory','projectCatId','projectCatId');
    }

    public function Resources() {
        return $this->hasOne('App\Model\Resources','resourceId','resourceId');
    }

    public function subResources() {
        return $this->hasOne('App\Model\Resources','resourceId','subResourceId');
    }

    public function projectOption() {
        return $this->hasMany('App\Model\ProjectOption','project_id','projectId');
    }
    public $rules = [
        'project.*.name'        => 'required',
        'project.*.description' => 'required',
        'projectCategory'       => 'required',
    ];

    public function isValid($request,$update = false) {
        if($update) {
            $this->rules['projectImage'] = "";
        }
        $validate = Validator::make($request, $this->rules);
        return $validate;
    }
}