<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    public $timestamps = false;
    protected $table = 'resources';
    protected $primaryKey = 'resourceId';

}