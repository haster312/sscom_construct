<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\SEO;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SEOController extends Controller {

    public $SEO;
    function __construct(SEO $SEO){
        $this->SEO          = $SEO;
    }

    public function getSEOIndex(Request $request) {
        $seoVN = SEO::where('locale','vn')->first();
        $seoEN = SEO::where('locale','en')->first();
        
        if($request->isMethod('post')) {
            $seoInfo = $request->except('_token');
            if($seoInfo) {
                $seoData = $seoInfo['seo'];

                foreach($seoData as $index => $data) {
                    $seo = SEO::where('locale',$index)->first();
                    $seo->title       = $data['title'];
                    $seo->metakeyword = $data['metakeyword'];
                    $seo->description = $data['description'];
                    $seo->save();
                }
                Session::flash('message','Update SEO Information successful!');
                return redirect()->back();
            }
        }
        return view('admin.SEO.index',compact('seoVN','seoEN'));
    }
}