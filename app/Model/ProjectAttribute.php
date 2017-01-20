<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Validator;
class ProjectAttribute extends Model
{
    public $timestamps = false;

    protected $table = 'projectattribute';

    protected $primaryKey = 'attribute_id';
    protected $fillable = [
        'attribute_name_vn', 'attribute_name_en'
    ];

    public function AttributeOption() {
        return $this->hasMany('App\Model\AttributeOption','attribute_id','attribute_id');
    }
}
