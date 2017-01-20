<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model {

    public $timestamps = false;
    protected $table = 'menu';
    protected $primaryKey = 'menuId';
}