<?php
namespace App\Http\Controllers\Site;

use App\Model\Partner;

class SitePartnerController extends BaseSiteController {

    function __construct() {
        parent::__construct();
    }

    public function getSitePartner() {
        $partners = Partner::all();
        return view('site.partner.index',compact('partners'));
    }
}