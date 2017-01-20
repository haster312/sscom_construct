<?php
namespace App\Http\Controllers\Site;

use App\Business\ProjectBusiness;
use Illuminate\Http\Request;
use App\Model\Menu;
use App\Model\ProjectAttribute;
use App\Model\ProjectCategoryTrans;
use App\Model\ProjectTrans;
use App\Model\Project;
use App\Model\ProjectCategory;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SiteProjectController extends BaseSiteController {

    private $projectBusiness;
    function __construct(ProjectBusiness $projectBusiness) {
        parent::__construct();
        $this->projectBusiness = $projectBusiness;
    }

    public function getProjectIndex($categoryId, $categorySlug) {
        $projectCategory = ProjectCategory::find($categoryId);
        if(!$projectCategory)
            return redirect()->back();
        if( $projectCategory->parent == 1) {
            $parentTrans = ProjectCategoryTrans::where('projectCatId',$projectCategory->projectCatId)->where('locale',$this->locale)->first();
            $listCats = Menu::where('parent',$projectCategory->projectCatId)->get();
            $projectCatTrans = [];

            foreach ($listCats as $cat) {
                $category = ProjectCategoryTrans::where('projectCatId',$cat->child)->where('locale',$this->locale)->first();
                $projectCatTrans[] = $category;
            }
            $active = $parentTrans->projectCatSlug;
            $title  = $parentTrans->projectCatName;
            $locale = $this->locale;
            return view('renovation.project.main',compact('active','title','parentTrans','projectCatTrans','locale'));
        } else {
            $parent   = Menu::where('child', $projectCategory->projectCatId)->first();
            $listCats = Menu::where('parent', $parent->parent)->get();
            $listCatTrans = [];
            foreach ($listCats as $cat) {
                $category = ProjectCategoryTrans::where('projectCatId',$cat->child)->where('locale',$this->locale)->first();
                $listCatTrans[] = $category;
            }
            $projectCatTrans = ProjectCategoryTrans::where('projectCatId', $projectCategory->projectCatId)->where('locale',$this->locale)->first();
            list($projects, $total) = $this->projectBusiness->getProjectFilter(1,6, $projectCategory->projectCatId,[]);
            $projectTransList = $this->projectBusiness->getProjectTransList($projects, $this->locale);
            $parent = Menu::where('child',$categoryId)->first();
            $parentTrans = ProjectCategoryTrans::where('projectCatId',$parent->parent)->where('locale',$this->locale)->first();
            $active   = $parentTrans->projectCatSlug;
            $title    = $parentTrans->projectCatName;
            $selected = $projectCategory->projectCatId;
            $locale    = $this->locale;
            $attributes = ProjectAttribute::all();
            return view('renovation.project.index',compact('active',
                'title',
                'selected',
                'listCatTrans',
                'projectCatTrans',
                'projectCategory',
                'projects',
                'total',
                'projectTransList',
                'locale',
                'attributes'
            ));
        }
    }

    public function projectFilter(Request $request) {
        $data = $request->all();
        $currentPage  = $data['currentPage'];
        $rowsPerPage  = $data['rowsPerPage'];
        $projectCatId = $data['projectCatId'];
        $locale       = $data['locale'];
        if(array_key_exists('options',$data)) {
            $options  = $data['options'];
            unset($options[0]);
        } else {
            $options = [];
        }
        $projectCategory = ProjectCategory::find($projectCatId);
        list($projects, $total) = $this->projectBusiness->getProjectFilter($currentPage,$rowsPerPage, $projectCategory->projectCatId,$options);
        $projectTransList = $this->projectBusiness->getProjectTransList($projects, $locale);
        $view = view('renovation.project.project_paginate', compact('projects','projectTransList','projectCategory','total','locale'));
        $contents['html'] = (string) $view;
        $contents['total'] = $total;
        return $contents;
    }

    public function getProjectDetail($categoryId, $projectId, $projectSlug) {
        $projectCategory = ProjectCategory::find($categoryId);
        $projectCatTrans = ProjectCategoryTrans::where('projectCatId',$projectCategory->projectCatId)->where('locale',$this->locale)->first();
        if(!$projectCategory)
            return redirect()->back();
        $project = Project::find($projectId);
        $projectTrans = ProjectTrans::where('projectId',$project->projectId)->where('locale',$this->locale)->first();
        if(!$project)
            return redirect()->back();
        $parent = Menu::where('child',$categoryId)->first();
        $parentTrans = ProjectCategoryTrans::where('projectCatId',$parent->parent)->where('locale',$this->locale)->first();
        $active = $parentTrans->projectCatSlug;
        $title  = $parentTrans->projectCatName;
        return view('renovation.project.detail',compact('title','projectCatTrans','projectCategory','project','projectTrans','active'));
    }
}