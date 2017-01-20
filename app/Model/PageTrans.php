<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PageTrans extends Model
{
    public $timestamps = false;

    protected $table = 'pagetrans';

    protected $primaryKey = 'pageTransId';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pageTitle', 'pageSlug', 'pageContent','locale'
    ];


}