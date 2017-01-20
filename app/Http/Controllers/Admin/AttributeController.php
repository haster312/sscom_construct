<?php
namespace App\Http\Controllers\Admin;

use App\Business\AttributeBusiness;
use App\Model\AttributeOption;
use App\Model\ProjectAttribute;
use App\Model\ProjectOption;
use Illuminate\Http\Request;
use App\Business\PageBusiness;
use App\Http\Controllers\Controller;
use App\Model\Page;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class AttributeController extends Controller
{

    private $projectAttribute;
    private $attributeOption;
    private $attributeBusiness;

    public function __construct(ProjectAttribute $projectAttribute, AttributeOption $attributeOption, AttributeBusiness $attributeBusiness)
    {
        $this->middleware('auth');
        $this->projectAttribute = $projectAttribute;
        $this->attributeOption = $attributeOption;
        $this->attributeBusiness = $attributeBusiness;
    }

    public function getProjectAttribute(Request $request)
    {
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'attribute_name_vn' => 'required|max:255',
                'attribute_name_en' => 'required|max:255',
            ]);
            $data = $request->except('_token');
            $projectAttribute = new ProjectAttribute();
            $projectAttribute->create($data);
            if ($projectAttribute)
                Session::flash('message', 'Add new project attribute successful');
            return redirect()->back();
        }
        $projectAttributes = ProjectAttribute::paginate(10);
        return view('admin.attribute.attribute', compact('projectAttributes'));
    }

    public function getAttributeDetail(Request $request)
    {
        $attributeId = $request->get('attributeId');
        $attributes = ProjectAttribute::find($attributeId);
        if ($attributes)
            $attributes = $attributes->toArray();
        return json_encode($attributes);
    }

    public function updateAttributeDetail(Request $request, $attributeId)
    {
        $data = $request->except('_token');
        $projectAttribute = ProjectAttribute::find($attributeId);
        $projectAttribute->update($data);
        if ($projectAttribute)
            Session::flash('message', "Update project attribute $attributeId successful");
        return redirect()->back();
    }

    public function deleteProjectAttribute(Request $request)
    {
        $attributeId = $request->get('attributeId');
        ProjectAttribute::destroy($attributeId);
        ProjectOption::where('attribute_id',$attributeId)->delete();
        Session::flash('message', 'Delete project attribute successful');
    }

    public function getAttributeOption(Request $request)
    {

        if ($request->isMethod('post')) {
            $this->validate($request, [
                'option_name_vn' => 'required|max:255',
                'option_name_en' => 'required|max:255',
            ]);
            $data = $request->except('_token');
            $attributeOption = new AttributeOption();
            $attributeOption->create($data);
            if ($attributeOption)
                Session::flash('message', 'Add new attribute option successful');
            return redirect()->back();
        }
        $attributeOptions = AttributeOption::orderBy('attribute_id','asc')->paginate(10);
        $attributeSelect = $this->attributeBusiness->getAttributeSelect();

        return view('admin.attribute.option', compact('attributeSelect', 'attributeOptions'));
    }

    public function attributeOptionDetail(Request $request)
    {
        $optionId = $request->get('optionId');
        $option = AttributeOption::find($optionId);
        if ($option)
            $option = $option->toArray();
        return json_encode($option);
    }

    public function updateAttributeOption(Request $request, $optionId) {

        $data = $request->except('_token');
        $option = AttributeOption::find($optionId);
        $option->update($data);
        if($option)
            Session::flash('message', "Update attribute option $optionId successful");
        return redirect()->back();
    }

    public function deleteAttributeOption(Request $request) {
        $optionId = $request->get('optionId');
        AttributeOption::destroy($optionId);
        ProjectOption::where('option_id',$optionId)->delete();
        Session::flash('message', 'Delete attribute option successful');
    }
}
