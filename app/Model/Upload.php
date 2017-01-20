<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model {

    public $timestamps = false;
    protected $table = 'upload';
    protected $primaryKey = 'uploadId';
}