<?php
namespace App\Business;
use App\Model\Project;
use App\Model\ProjectAttribute;

class AttributeBusiness {

    public function getAttributeSelect(){
        $attributes = ProjectAttribute::all();
        $attributeSelect = [];
        foreach ($attributes as $attribute) {
            $attributeSelect[$attribute->attribute_id] = $attribute->attribute_name_vn . " (".$attribute->attribute_name_en.")";
        }
        return $attributeSelect;
    }

    public function getOptionSelectByAttributeId($attributeId) {
        $attribute = ProjectAttribute::find($attributeId);
        $optionList = [];
        if($attribute) {
            $options = $attribute->AttributeOption;
            if($options) {
                foreach ($options as $option) {
                    $optionList[$option->option_id] = $option->option_name_vn." (".$option->option_name_en.")";
                }
            }
            return $optionList;
        } else {
            return [];
        }
    }

    public function getProjectOption($projectId) {
        $project = Project::find($projectId);
        $projectOptions = $project->projectOption;
        $attribute = [];
        foreach ($projectOptions as $option) {
            $attribute[$option->attribute_id] = $option->option_id;
        }
        return $attribute;
    }
}