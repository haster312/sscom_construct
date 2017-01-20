<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Member extends Model {

    public $timestamps = false;
    protected $table = 'member';
    protected $primaryKey = 'memberId';

    protected $fillable = [
        'name', 'position', 'birth','address','email','phone','profile','resourceId'
    ];

    private $rules = [
        'name'        => 'required',
        'memberImage' => 'required|mimes:jpeg,jpg,png,gif'
    ];

    public function isValid($request, $update = false) {
        if($update) {
            $this->rules['memberImage'] = '';
        }
        $validate = Validator::make($request, $this->rules);
        return $validate;
    }

    public function Resources() {
        return $this->hasOne('App\Model\Resources','resourceId','resourceId');
    }
}