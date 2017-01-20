<?php
namespace App\Http\Controllers\Admin;

use App\Business\ProjectBusiness;
use App\Http\Controllers\Controller;
use App\Model\AttributeOption;
use App\Model\Menu;
use App\Model\Project;
use App\Model\ProjectAttribute;
use App\Model\ProjectCategory;
use App\Model\ProjectCategoryTrans;
use App\Model\ProjectTrans;
use App\Model\Resources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;


class ProjectController extends Controller {

    private $projectCategory;
    private $project;
    private $projectBusiness;
    private $projectAttribute;
    private $attributeOption;
    function __construct(ProjectCategory $projectCategory, Project $project, ProjectBusiness $projectBusiness, ProjectAttribute $projectAttribute, AttributeOption $attributeOption){
        $this->project          = $project;
        $this->projectCategory  = $projectCategory;
        $this->projectBusiness  = $projectBusiness;
        $this->attributeOption  = $attributeOption;
        $this->projectAttribute = $projectAttribute;
    }

    public function categoryIndex(){
        $projectCategory = $this->projectCategory->orderBy('parent','desc')->paginate(10);
        $currentIndex = ($projectCategory->currentPage() - 1) * $projectCategory->perpage();
        return view('admin.project-category.index',compact('projectCategory','currentIndex'));
    }

    public function addCategory(Request $request) {
        if($request->isMethod('post')) {

            $projectCategory = $request->except('_token');
            $validate = $this->projectCategory->isValid($projectCategory);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->projectBusiness->addProjectCategory($projectCategory);
            Session::flash('message','Add project category successful');
            return redirect()->back();
        }
        return view('admin.project-category.edit');
    }

    public function updateCategory($projectCatId, Request $request) {
        if($request->isMethod('post')) {
            $projectCategory = $request->except('_token');
            $validate = $this->projectCategory->isValid($projectCategory);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->projectBusiness->updateProjectCategory($projectCatId, $projectCategory);
            Session::flash('message','Update project category successful');
            return redirect()->back();
        }
        $projectCategory = $this->projectCategory->find($projectCatId);
        $projectCategoryTrans = $projectCategory->projectCategoryTrans;
        return view('admin.project-category.update',compact('projectCategory','projectCategoryTrans'));
    }

    public function deleteCategory(Request $request) {
        $projectCatId = $request->get('projectCatId');
        $projectCat = $this->projectCategory->find($projectCatId);
        $parent = $projectCat->parent;
        $this->projectCategory->destroy($projectCatId);
        $this->project->where('projectCatId',$projectCatId)->update(['projectCatId' => null]);
        ProjectCategoryTrans::where('projectCatId',$projectCatId)->delete();
        if($parent == 1) {
            Menu::where('parent',$projectCatId)->delete();
        } else {
            Menu::where('child',$projectCatId)->delete();
        }
        Session::flash('message','Delete project category successful');
    }

    public function projectIndex(Request $request){
        $projectCategory = $this->projectBusiness->getProjectCategorySelect();
        $categoryId = $request->get('category');
        if($categoryId) {
            $projects = $this->project->where('projectCatId',$categoryId)->paginate(5);
            $currentIndex = ($projects->currentPage() - 1) * $projects->perpage();
        } else {
            $categoryId = key($projectCategory);
            $projects = $this->project->paginate(5);
            $currentIndex = ($projects->currentPage() - 1) * $projects->perpage();
        }
        return view('admin.project.index',compact('projects','currentIndex','projectCategory','categoryId'));
    }

    public function addProject(Request $request) {
        if($request->isMethod('post')) {
            $project = $request->except('_token');
            $validate = $this->project->isValid($project);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->projectBusiness->addProject($project);
            Session::flash('message','Add project successful');
            return redirect()->back();
        }
        $projectCategorySelect = $this->projectBusiness->getProjectCategorySelect();
        $projectAttribute = $this->projectAttribute->all();
        return view('admin.project.edit',compact('projectCategorySelect','projectAttribute'));
    }

    public function updateProject($projectId, Request $request) {
        if($request->isMethod('post')) {
            $project = $request->except('_token');
            $validate = $this->project->isValid($project,true);
            if($validate->fails()){
                return redirect()->back()->withInput()->withErrors($validate);
            }
            $this->projectBusiness->updateProject($projectId, $project);
            Session::flash('message','Update project successful');
            return redirect()->back();
        }
        $project = $this->project->find($projectId);
        $projectTrans = $project->projectTrans;
        $projectCategorySelect = $this->projectBusiness->getProjectCategorySelect();
        $projectAttribute = $this->projectAttribute->all();
        return view('admin.project.update',compact('project','projectTrans','projectCategorySelect','projectAttribute'));
    }

    public function deleteProject(Request $request) {
        $projectId = $request->get('projectId');
        $project = $this->project->find($projectId);
        if($project->Resources) {
            File::delete(public_path($project->Resources->path));
            Resources::destroy($project->Resources->resourceId);
        }
        if($project->subResources) {
            File::delete(public_path($project->subResources->path));
            Resources::destroy($project->subResources->resourceId);
        }
        $this->project->destroy($projectId);
        ProjectTrans::where('projectId',$projectId)->delete();
        Session::flash('message','Delete project successful');
    }

    /**
     * Create menu for category
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function categoryMenu(Request $request) {
        if($request->isMethod('post')){
            $menu = $request->except('_token');
            $status = $this->projectBusiness->addMenu($menu);
            if(!$status) {
                Session::flash('message','Can not add duplicate menu');
            } else {
                Session::flash('message','Add new menu item successful');
            }
            return redirect()->back();
        }
        $projectCatParent   = $this->projectBusiness->getParentCategorySelect();
        $projectCatChild    = $this->projectBusiness->getProjectCategorySelect();
        $categoryId = $request->get('category');
        if($categoryId)
            $menu = Menu::where('parent',$categoryId)->paginate(5);
        else {
            $menu = Menu::paginate(5);
            $categoryId = key($projectCatParent);
        }
        $projectBusiness = $this->projectBusiness;
        return view('admin.project-category.menu',compact('projectCatParent','projectCatChild','menu','projectBusiness','categoryId'));
    }

    public function deleteMenu(Request $request){
        $menuId = $request->get('menuId');
        Menu::destroy($menuId);
        Session::flash('message','Delete menu successful');
    }

}