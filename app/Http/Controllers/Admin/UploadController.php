<?php
namespace App\Http\Controllers\Admin;

use App\Business\UploadBusiness;
use App\Http\Controllers\Controller;
use App\Model\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class UploadController extends Controller {

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function uploadIndex(){
        $uploads = Upload::paginate(10);
        return view('admin.upload.index',compact('uploads'));
    }

    public function newUpload(Request $request){
        $this->validate($request,[
            'image' => 'required'
        ]);
        $image = $request->except('_token');
        $info  = UploadBusiness::uploadFile($image['image']);
        $upload = new Upload();
        $upload->alt  = $info['name'];
        $upload->path = $info['path'];
        $upload->save();
        Session::flash('message','Add new image successful');
        return redirect()->back();
    }

    public function deleteUpload(Request $request){
        $uploadId = $request->get('uploadId');
        $upload = Upload::find($uploadId);
        $status = File::delete(public_path($upload->path));
        if($status){
            Upload::destroy($uploadId);
            Session::flash('message','delete image successful');
        } else {
            Session::flash('message','delete image unsuccessful');
        }
    }

    public function uploadList() {
        $upload = Upload::all();
        return json_encode($upload);
    }
}