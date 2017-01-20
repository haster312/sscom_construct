<?php
namespace App\Business;

use App\Model\Resources;
use App\Model\Slider;

class SliderBusiness {

    public function sliderType(){
        $sliders = [
            '1' => 'Home Page',
            '2' => 'Another Pages',
        ];
        return $sliders;
    }
    public function addSliderData($sliderData) {
        $slider = new Slider();
        $resourceData = UploadBusiness::uploadFile($sliderData['sliderImage']);
        $resources = new Resources();
        $resources->path = $resourceData['path'];
        $resources->name = $resourceData['name'];
        $resources->save();
        $slider->resourceId = $resources->resourceId;
        $slider->type       = $sliderData['type'];
        $this->dataProcess($slider, $sliderData);
    }

    public function updateSliderData($sliderId, $sliderData) {
        $slider = Slider::find($sliderId);
        if(array_key_exists('sliderImage',$sliderData)) {
            $resourceData = UploadBusiness::uploadFile($sliderData['sliderImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $slider->resourceId = $resources->resourceId;
        }
        $slider->type       = $sliderData['type'];
        $this->dataProcess($slider, $sliderData);
    }
    public function dataProcess($slider,$sliderData) {
        $slider->alt        = $sliderData['sliderAlt'];
        if(array_key_exists('status',$sliderData)) {
            $slider->status = $sliderData['status'];
        } else {
            $slider->status = 0;
        }
        $slider->save();
    }
}