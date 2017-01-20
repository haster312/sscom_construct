<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProjectTrans extends Model {

    public $timestamps = false;
    protected $table = 'projecttrans';
    protected $primaryKey = 'projectTransId';

}