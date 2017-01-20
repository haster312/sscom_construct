<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;
class AttributeOption extends Model
{
    public $timestamps = false;

    protected $table = 'attributeoption';

    protected $primaryKey = 'option_id';
    protected $fillable = [
        'option_name_vn', 'option_name_en','attribute_id'
    ];

    public function Attribute() {
        return $this->belongsTo('App\Model\ProjectAttribute','attribute_id','attribute_id');
    }
}