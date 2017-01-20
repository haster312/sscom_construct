<?php
namespace App\Business;

use App\Model\Menu;
use App\Model\Project;
use App\Model\ProjectCategory;
use App\Model\ProjectCategoryTrans;
use App\Model\ProjectTrans;
use App\Model\Resources;
use App\Model\ProjectOption;
class ProjectBusiness {

    public function getProjectCategorySelect() {
        $projectCategory = ProjectCategory::where('parent',0)->get();
        $categorySelect = [];
        foreach ($projectCategory as $category) {
            $catNameVN = ProjectCategoryTrans::where('projectCatId',$category->projectCatId)->where('locale','vn')->first();
            $catNameEN = ProjectCategoryTrans::where('projectCatId',$category->projectCatId)->where('locale','en')->first();
            $categorySelect[$category->projectCatId] = $catNameVN->projectCatName." (".$catNameEN->projectCatName.")";
        }
        return $categorySelect;
    }

    public function getParentCategorySelect(){
        $projectCategory = ProjectCategory::where('parent',1)->get();
        $categorySelect = [];
        foreach ($projectCategory as $category) {
            $catNameVN = ProjectCategoryTrans::where('projectCatId',$category->projectCatId)->where('locale','vn')->first();
            $catNameEN = ProjectCategoryTrans::where('projectCatId',$category->projectCatId)->where('locale','en')->first();
            $categorySelect[$category->projectCatId] = $catNameVN->projectCatName." (".$catNameEN->projectCatName.")";
        }
        return $categorySelect;
    }

    public function addProjectCategory($projectCategoryData) {
        $category = new ProjectCategory();
        if(array_key_exists('status',$projectCategoryData)) {
            $category->status = $projectCategoryData['status'];
        } else {
            $category->status = 0;
        }
        $category->parent = $projectCategoryData['categoryType'];
        $category->save();
        $projectCategory = $projectCategoryData['projectCategory'];
        foreach ($projectCategory as $index => $data) {
            $projectCategoryTrans = new ProjectCategoryTrans();
            $this->dataCategoryProcess($projectCategoryTrans, $projectCategory[$index], $category->projectCatId, $index);
        }
    }

    public function updateProjectCategory($projectCatId, $projectCategoryData) {
        $category = ProjectCategory::find($projectCatId);
        if(array_key_exists('status',$projectCategoryData)) {
            $category->status = $projectCategoryData['status'];
        } else {
            $category->status = 0;
        }
        $category->parent = $projectCategoryData['categoryType'];
        $category->save();
        $projectCategory = $projectCategoryData['projectCategory'];
        foreach ($projectCategory as $index => $data) {
            $projectCategoryTrans = ProjectCategoryTrans::where('projectCatId',$projectCatId)->where('locale',$index)->first();
            $this->dataCategoryProcess($projectCategoryTrans, $projectCategory[$index], $category->projectCatId, $index);
        }
    }

    public function dataCategoryProcess($projectCategoryTrans, $projectCategory, $projectCatId, $locale) {
        $projectCategoryTrans->projectCatName        = $projectCategory['name'];
        $projectCategoryTrans->projectCatSlug        = str_slug($projectCategory['name']);
        $projectCategoryTrans->projectCatDescription = $projectCategory['description'];
        $projectCategoryTrans->projectCatId          = $projectCatId;
        $projectCategoryTrans->locale                = $locale;
        $projectCategoryTrans->save();
    }

    public function addProject($projectData) {
        $project = new Project();
        if(array_key_exists('projectImage',$projectData)) {
            $resourceData = UploadBusiness::uploadFile($projectData['projectImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $project->resourceId = $resources->resourceId;
        }
        if(array_key_exists('projectSubImage',$projectData)) {
            $resourceData = UploadBusiness::uploadFile($projectData['projectSubImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $project->subResourceId = $resources->resourceId;
        }
        $project->projectCatId  = $projectData['projectCategory'];
        if($projectData['projectImageList']) {
            $project->image_list = $projectData['projectImageList'];
        }
        $project->save();
        ProjectOption::where('project_id',$project->projectId)->delete();
        foreach ($projectData['option'] as $attribute => $value) {
            $projectOption = new ProjectOption();
            $projectOption->option_id     = $value;
            $projectOption->project_id    = $project->projectId;
            $projectOption->attribute_id  = $attribute;
            $projectOption->save();
        }
        $contents = $projectData['project'];
        foreach ($contents as $index => $content) {
            $projectTrans = new ProjectTrans();
            $this->dataProjectProcess($projectTrans, $contents[$index], $project->projectId, $index);
        }
    }

    public function updateProject($projectId, $projectData) {
        $project = Project::find($projectId);
        if(array_key_exists('projectImage',$projectData)) {
            $resourceData = UploadBusiness::uploadFile($projectData['projectImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $project->resourceId = $resources->resourceId;
        }
        if(array_key_exists('projectSubImage',$projectData)) {
            $resourceData = UploadBusiness::uploadFile($projectData['projectSubImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $project->subResourceId = $resources->resourceId;
        }
        $project->projectCatId  = $projectData['projectCategory'];
        if($projectData['projectImageList']) {
            $project->image_list = $projectData['projectImageList'];
        }
        $project->save();
        ProjectOption::where('project_id',$project->projectId)->delete();
        foreach ($projectData['option'] as $attribute => $value) {
            $projectOption = new ProjectOption();
            $projectOption->option_id     = $value;
            $projectOption->project_id    = $project->projectId;
            $projectOption->attribute_id  = $attribute;
            $projectOption->save();
        }
        $contents = $projectData['project'];
        foreach ($contents as $index => $content) {
            $projectTrans = ProjectTrans::where('projectId',$projectId)->where('locale',$index)->first();
            $this->dataProjectProcess($projectTrans, $contents[$index], $projectId, $index);
        }
    }

    public function dataProjectProcess($projectTrans, $project, $projectId, $locale) {
        $projectTrans->projectName        = $project['name'];
        $projectTrans->projectSlug        = str_slug($project['name']);
        $projectTrans->projectSummary     = $project['summary'];
        $projectTrans->projectDescription = $project['description'];
        $projectTrans->projectKeyword     = $project['keyword'];
        $projectTrans->projectShortDescription = $project['shortDescription'];
        $projectTrans->projectId          = $projectId;
        $projectTrans->locale             = $locale;
        $projectTrans->save();
    }

    public static function getProjectCategoryTransByLocale($projectCatId, $locale){
        $projectCatTrans = ProjectCategoryTrans::where('projectCatId',$projectCatId)->where('locale',$locale)->first();
        return $projectCatTrans;
    }

    public function getProjectTransList($projects, $locale){
        $projectTransList = [];
        foreach($projects as $project) {
            $projectTrans = ProjectTrans::where('projectId',$project->projectId)->where('locale',$locale)->first();
            $projectTransList[] = $projectTrans;
        }
        return $projectTransList;
    }

    public function getCategoryName($catId) {
        $catNameVN = ProjectCategoryTrans::where('projectCatId',$catId)->where('locale','vn')->first();
        $catNameEN = ProjectCategoryTrans::where('projectCatId',$catId)->where('locale','en')->first();
        $name = $catNameVN->projectCatName." (".$catNameEN->projectCatName.")";
        return $name;
    }

    public function addMenu($menu){
        $status = Menu::where('parent',$menu['parent'])->where('child',$menu['child'])->first();
        if($status) {
            return false;
        }
        $item = new Menu();
        $item->parent = $menu['parent'];
        $item->child  = $menu['child'];
        $item->save();
        return true;
    }

    public function getChildCategory($parent,$locale) {
        $childId = Menu::select('child')->where('parent',$parent)->get();
        $childCatTransList = [];
        foreach ($childId as $Id){
            $childCatTrans = ProjectBusiness::getProjectCategoryTransByLocale($Id->child, $locale);
            $childCatTransList[] = $childCatTrans;
        }
        return $childCatTransList;
    }

    public function getProjectByCategoryId($categoryId, $limit = null) {
        $projects = Project::where('projectCatId',$categoryId)->orderBy('created_at','desc')->orderBy('projectId','desc');
        if($limit > 0) {
            $projects->limit($limit);
        }
        return $projects->get();
    }

    public function getProjectFilter($currentPage, $rowsPerPage, $projectCatId, $options) {

        if($options != null) {
            $query = Project::select('project.*');
            $countTable = 1;
            foreach ($options as $attribute => $option) {
                if($option != '') {
                    $query->join("projectoption as opt$countTable","opt$countTable.project_id",'=','project.projectId');
                    $countTable++;
                }
            }
            $countWhere = 1;
            foreach ($options as $attribute => $option) {
                if($option != '') {
                    $query->whereRaw("opt$countWhere.attribute_id = $attribute AND opt$countWhere.option_id = $option");
                    $countWhere++;
                }
            }
            $query->groupBy('project.projectId');
            $query->where('project.projectCatId',$projectCatId)->forPage($currentPage, $rowsPerPage);
            $projects = $query->get();
            $total = $query->count('*');
        } else {
            $query = Project::select('project.*');
            $query->where('projectCatId',$projectCatId)->forPage($currentPage, $rowsPerPage);
            $projects = $query->get();
            $total = $query->count('*');
        }
        return array($projects, $total);
    }
}