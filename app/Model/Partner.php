<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Partner extends Model {

    public $timestamps = false;
    protected $table = 'partner';
    protected $primaryKey = 'partnerId';

    public function Resources() {
        return $this->hasOne('App\Model\Resources','resourceId','resourceId');
    }

    private $rules = [
        'partnerName'  => 'required'
    ];

    public function isValid($request, $update = false) {
        $validate = Validator::make($request, $this->rules);
        return $validate;
    }
}