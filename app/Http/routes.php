<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/



Route::auth();
$arrayLocale = Config::get('app.locales');
Route::group(['prefix'=>'admin','namespace' => 'Admin'], function(){
    App::setLocale('en');
    Route::get('/',['as'=>'index','uses'=>"PageController@getAdminIndex"]);
    //Page
    Route::get('page', ['as'=>'admin.page','uses'=>"PageController@getIndex"]);
    Route::match(['get', 'post'],'page/create', ['as'=>'admin.page.create','uses'=>"PageController@addPage"]);
    Route::match(['get', 'post'],'page/update/{pageId}', ['as'=>'admin.page.update','uses'=>"PageController@updatePage"]);
    Route::post('page/delete',['as'=>'admin.page.delete','uses' => 'PageController@deletePage']);
    //News Category
//    Route::get('news-category',['as'=>'admin.news-category','uses' => 'NewsController@categoryIndex']);
//    Route::match(['get', 'post'],'news-category/create',['as'=>'admin.news-category.create','uses' => 'NewsController@addCategory']);
//    Route::match(['get', 'post'],'news-category/update/{categoryId}',['as'=>'admin.news-category.update','uses' => 'NewsController@updateCategory']);
//    Route::post('news-category/delete',['as'=>'admin.news-category.delete','uses' => 'NewsController@deleteCategory']);
    //News
    Route::get('news',['as'=>'admin.news','uses' => 'NewsController@newsIndex']);
    Route::match(['get', 'post'],'news/create',['as'=>'admin.news.create','uses' => 'NewsController@addNews']);
    Route::match(['get', 'post'],'news/update/{newsId}',['as'=>'admin.news.update','uses' => 'NewsController@updateNews']);
    Route::post('news/delete',['as'=>'admin.news.delete','uses' => 'NewsController@deleteNews']);
    //Partner
    Route::get('partner',['as'=>'admin.partner','uses' => 'PartnerController@partnerIndex']);
    Route::match(['get', 'post'],'partner/create',['as'=>'admin.partner.create','uses' => 'PartnerController@addPartner']);
    Route::match(['get', 'post'],'partner/update/{partnerId}',['as'=>'admin.partner.update','uses' => 'PartnerController@updatePartner']);
    Route::post('partner/delete',['as'=>'admin.partner.delete','uses' => 'PartnerController@deletePartner']);
    //Slider
    Route::get('slider',['as'=>'admin.slider','uses' => 'SliderController@sliderIndex']);
    Route::match(['get', 'post'],'slider/create',['as'=>'admin.slider.create','uses' => 'SliderController@addSlider']);
    Route::match(['get', 'post'],'slider/update/{sliderId}',['as'=>'admin.slider.update','uses' => 'SliderController@updateSlider']);
    Route::post('slider/delete',['as'=>'admin.slider.delete','uses' => 'SliderController@deleteSlider']);
    Route::get('upload',['as'=>'admin.upload','uses'=>'UploadController@uploadIndex']);
    Route::post('upload',['as'=>'admin.upload','uses'=>'UploadController@newUpload']);
    Route::post('upload/delete',['as'=>'admin.upload.delete','uses'=>'UploadController@deleteUpload']);
    Route::post('upload/list',['as'=>'admin.upload.list','uses'=>'UploadController@uploadList']);
    //Project Category
    Route::get('project-category',['as'=>'admin.project-category','uses' => 'ProjectController@categoryIndex']);
    Route::match(['get', 'post'],'project-category/create',['as'=>'admin.project-category.create','uses' => 'ProjectController@addCategory']);
    Route::match(['get', 'post'],'project-category/update/{projectId}',['as'=>'admin.project-category.update','uses' => 'ProjectController@updateCategory']);
    Route::match(['get','post'],'project-category/menu',['as'=>'admin.project-menu','uses' => 'ProjectController@categoryMenu']);
    Route::post('project-category/menu/delete',['as'=>'admin.project-menu.delete','uses'=> 'ProjectController@deleteMenu']);
    Route::post('project-category/delete',['as'=>'admin.project-category.delete','uses' => 'ProjectController@deleteCategory']);
    //Project
    Route::get('project',['as'=>'admin.project','uses' => 'ProjectController@projectIndex']);
    Route::match(['get', 'post'],'project/create',['as'=>'admin.project.create','uses' => 'ProjectController@addProject']);
    Route::match(['get', 'post'],'project/update/{projectId}',['as'=>'admin.project.update','uses' => 'ProjectController@updateProject']);
    Route::post('project/delete',['as'=>'admin.project.delete','uses' => 'ProjectController@deleteProject']);
    //Member
    Route::get('member',['as'=>'admin.member','uses' => 'MemberController@memberIndex']);
    Route::match(['get', 'post'],'member/create',['as'=>'admin.member.create','uses' => 'MemberController@addMember']);
    Route::match(['get', 'post'],'member/update/{memberId}',['as'=>'admin.member.update','uses' => 'MemberController@updateMember']);
    Route::post('member/delete',['as'=>'admin.member.delete','uses' => 'MemberController@deleteMember']);

    //Information
    Route::match(['get', 'post'],'info',['as'=>'admin.info','uses' => 'InfoController@updateInfo']);
    //Information
    Route::match(['get', 'post'],'seo',['as'=>'admin.seo','uses' => 'SEOController@getSEOIndex']);
    //Project Attribute
    Route::match(['get', 'post'],'project-attribute',['as'=>'admin.project.attribute','uses' => 'AttributeController@getProjectAttribute']);
    Route::post('project-attribute/detail',['as'=>'admin.project.attribute.detail','uses'=>'AttributeController@getAttributeDetail']);
    Route::post('project-attribute/update/{attributeId}',['as'=>'admin.project.attribute.update','uses'=>'AttributeController@updateAttributeDetail']);
    Route::post('project-attribute/delete',['as'=>'admin.project.attribute.delete','uses' => 'AttributeController@deleteProjectAttribute']);

    //Attribute Option
    Route::match(['get', 'post'],'attribute-option',['as'=>'admin.attribute.option','uses' => 'AttributeController@getAttributeOption']);
    Route::post('attribute-option/detail',['as'=>'admin.attribute.option.detail','uses'=>'AttributeController@attributeOptionDetail']);
    Route::post('attribute-option/update/{optionId}',['as'=>'admin.attribute.option.update','uses'=>'AttributeController@updateAttributeOption']);
    Route::post('attribute-option/delete',['as'=>'admin.attribute.option.delete','uses' => 'AttributeController@deleteAttributeOption']);
});

Route::get('/',function(){
    return redirect()->route('vn.site.index');
})->name('site');
Route::group(['namespace' => 'Site'], function () use ($arrayLocale) {

    foreach ($arrayLocale as $locale) {
        Route::get('/'.$locale,['as'=>$locale.'.site.index','uses'=>"SiteController@getSiteIndex"]);
        Route::get($locale.'/'.Lang::get('attribute.project.link',array(),$locale).'/{categoryId}/{categorySlug}',['as'=>$locale.'.site.project','uses'=>"SiteProjectController@getProjectIndex"]);
        Route::get($locale.'/'.Lang::get('attribute.project.link',array(),$locale).'/{categoryId}/{projectId}/{projectSlug}',['as'=>$locale.'.site.project.detail','uses'=>"SiteProjectController@getProjectDetail"]);
        Route::get($locale.'/'.Lang::get('attribute.introduce.link',array(),$locale).'/{pageId}/{pageSlug}',['as'=>$locale.'.site.introduce','uses'=>'SitePageController@getPageIndex']);
        Route::get($locale.'/'.Lang::get('attribute.partner.link',array(),$locale),['as'=>$locale.'.site.partner','uses'=>'SitePartnerController@getSitePartner']);
        Route::get($locale.'/'.Lang::get('attribute.news.link',array(),$locale),['as'=>$locale.'.site.news','uses'=>'SiteNewsController@getSiteNews']);
        Route::get($locale.'/'.Lang::get('attribute.news.link',array(),$locale).'/{newsId}/{slug}',['as'=>$locale.'.site.news.detail','uses'=>'SiteNewsController@getNewsDetail']);
        Route::get($locale.'/'.Lang::get('attribute.contact.link',array(),$locale),['as'=>$locale.'.site.contact','uses'=>"SiteContactController@getContactIndex"]);
        Route::get($locale.'/'.Lang::get('attribute.member.link',array(),$locale),['as'=>$locale.'.site.member','uses'=>"SiteMemberController@getMemberIndex"]);
        Route::get($locale.'/'.Lang::get('attribute.member.link',array(),$locale).'/{memberId}',['as'=>$locale.'.site.member.detail','uses'=>"SiteMemberController@getMemberDetail"]);
        Route::post($locale.'/'.Lang::get('attribute.contact.link',array(),$locale),['as'=>'site.contact','uses'=>"SiteContactController@sendContact"]);
        Route::get($locale.'/'.Lang::get('attribute.introduce.link',array(),$locale),['as'=>$locale.'.site.introduce.main','uses'=>'SitePageController@getAllPage']);
    }
    Route::post('/project/filter',['as'=>'project.filter','uses'=>'SiteProjectController@projectFilter']);
});

