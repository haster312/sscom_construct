<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Info extends Model {

    public $timestamps = false;
    protected $table = 'info';
    protected $primaryKey = 'infoId';
    protected $fillable = [
        'phone', 'address','email','facebook','twitter','google','youtube'
    ];

    public function Resources() {
        return $this->hasOne('App\Model\Resources','resourceId','logo');
    }
}