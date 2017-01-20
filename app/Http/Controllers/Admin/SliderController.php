<?php
namespace App\Http\Controllers\Admin;

use App\Business\SliderBusiness;
use App\Http\Controllers\Controller;
use App\Model\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SliderController extends Controller {

    private $slider;
    private $sliderBusiness;
    function __construct(Slider $slider, SliderBusiness $sliderBusiness) {
        $this->slider         = $slider;
        $this->sliderBusiness = $sliderBusiness;
    }

    public function sliderIndex(){
        $sliders = $this->slider->paginate(10);
        $currentIndex = ($sliders->currentPage() - 1) * $sliders->perpage();
        return view('admin.slider.index',compact('sliders','currentIndex'));
    }

    public function addSlider(Request $request) {

        if($request->isMethod('post')) {
            $sliderData = $request->except('_token');
            $validate = $this->slider->isValid($sliderData);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->sliderBusiness->addSliderData($sliderData);
            Session::flash('message','Add new slider successful');
            return redirect()->back();
        }
        $slider = new Slider();
        $type   = $this->sliderBusiness->sliderType();
        return view('admin.slider.edit',compact('slider','type'));
    }

    public function updateSlider($sliderId, Request $request) {

        if($request->isMethod('post')) {
            $sliderData = $request->except('_token');
            $validate = $this->slider->isValid($sliderData,true);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->sliderBusiness->updateSliderData($sliderId, $sliderData);
            Session::flash('message','Update slider successful');
            return redirect()->back();
        }
        $slider = $this->slider->find($sliderId);
        $type   = $this->sliderBusiness->sliderType();
        return view('admin.slider.edit',compact('slider','type'));
    }

    public function deleteSlider(Request $request) {
        $sliderId = $request->get('sliderId');
        $slider = $this->slider->find($sliderId);
        if($slider->Resources) {
            File::delete(public_path($slider->Resources->path));
        }
        $this->slider->destroy($sliderId);
        Session::flash('message','Delete slider successful');
    }
}