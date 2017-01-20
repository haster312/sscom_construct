<?php
namespace App\Http\Controllers\Site;
use App\Business\NewsBusiness;
use App\Business\ProjectBusiness;
use App\Model\News;
use App\Model\NewsTrans;
use App\Model\Partner;
use App\Model\Project;
use App\Model\ProjectTrans;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;

class SiteController extends BaseSiteController  {

    private $newsBusiness;
    private $projectBusiness;
    private $minutes;
    function __construct(NewsBusiness $newsBusiness, ProjectBusiness $projectBusiness) {
        parent::__construct();
        $this->newsBusiness = $newsBusiness;
        $this->projectBusiness = $projectBusiness;
        $this->minutes = "15";
    }

    public function getSiteIndex() {

        if(Cache::has('projects')) {
            $projects = Cache::get('projects');
            $projectTransList = Cache::get('projectTransList');
        } else {
            $projects = Project::limit(8)->where('resourceId','<>',null)->orderBy('projectId','desc')->get();
            $projectTransList = $this->projectBusiness->getProjectTransList($projects, $this->locale);
            Cache::add('projects',$projects,$this->minutes);
            Cache::add('projectTransList',$projectTransList,$this->minutes);
        }

        if(Cache::has('news')) {
            $news = Cache::get('news');
            $newsTransList = Cache::get('newsTransList');
        } else {
            $news     = News::limit(9)->orderBy('newsId','desc')->get();
            $newsTransList = $this->newsBusiness->getNewsTransList($news,$this->locale);
            Cache::add('news',$news,$this->minutes);
            Cache::add('newsTransList',$newsTransList,$this->minutes);
        }
        if(Cache::get('partner')) {
            $partners = Cache::get('partner');
        } else {
            $partners = Partner::all();
            Cache::add('partner',$partners,$this->minutes);
        }

        $height = "600";
        $active = "home";
        return view('renovation.home.index',compact('height','projects','projectTransList','news','newsTransList','partners','active'));
    }
}