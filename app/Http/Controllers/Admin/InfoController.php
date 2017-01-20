<?php
namespace App\Http\Controllers\Admin;

use App\Business\UploadBusiness;
use App\Http\Controllers\Controller;
use App\Model\Info;
use App\Model\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InfoController extends Controller {

    private $info;
    function __construct(Info $info)
    {
        $this->info = $info;
    }

    public function updateInfo(Request $request) {
        if($request->isMethod('post')) {
            $infoData = $request->except("_token");
            $info = $this->info->first();
            if(array_key_exists('logo',$infoData)) {
                $resourceData = UploadBusiness::uploadFile($infoData['logo']);
                $resources = new Resources();
                $resources->path = $resourceData['path'];
                $resources->name = $resourceData['name'];
                $resources->save();
                $info->logo = $resources->resourceId;
            }
            $info->update($infoData);
            Session::flash('message','Update Company Information Succesful');
            return redirect()->back();
        }
        $info = $this->info->first();
        return view('admin.info.index',compact('info'));
    }
}