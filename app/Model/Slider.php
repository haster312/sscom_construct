<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;
class Slider extends Model {

    public $timestamps = false;
    protected $table = 'slider';
    protected $primaryKey = 'sliderId';

    public function Resources() {
        return $this->hasOne('App\Model\Resources','resourceId','resourceId');
    }

    private $rules = [
        'sliderImage' => 'required|mimes:jpeg,jpg,png,gif',
    ];

    public function isValid($request, $update = false) {
        if($update) {
            $this->rules['sliderImage'] = '';
        }
        $validate = Validator::make($request, $this->rules);
        return $validate;
    }
}