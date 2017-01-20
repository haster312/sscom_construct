<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
class ProjectOption extends Model
{
    public $timestamps = false;

    protected $table = 'projectoption';

    protected $primaryKey = 'project_option_id';

    public function Project() {
        return $this->belongsTo('App\Model\Project','project_id','projectId');
    }
}