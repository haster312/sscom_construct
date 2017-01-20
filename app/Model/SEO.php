<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SEO extends Model {

    protected $table = 'seo';
    public $timestamps = false;
    protected $primaryKey = 'seoId';
}