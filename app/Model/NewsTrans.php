<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsTrans extends Model {

    public $timestamps = false;
    protected $table = 'newstrans';
    protected $primaryKey = 'newsTransId';

}