<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NewsCategoryTrans extends Model {

    public $timestamps = false;
    protected $table = 'newscategorytrans';
    protected $primaryKey = 'newsCatTransId';

}