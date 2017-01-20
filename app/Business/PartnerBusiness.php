<?php
namespace App\Business;

use App\Model\Partner;
use App\Model\Resources;

class PartnerBusiness {

    public function addPartnerData($partnerData) {
        $partner = new Partner();
        if(array_key_exists('partnerImage',$partnerData)) {
            $resourceData = UploadBusiness::uploadFile($partnerData['partnerImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $partner->resourceId = $resources->resourceId;
        }
        $this->dataProcess($partner, $partnerData);
    }

    public function updatePartnerData($partnerId, $partnerData) {
        $partner = Partner::find($partnerId);
        if(array_key_exists('partnerImage',$partnerData)) {
            $resourceData = UploadBusiness::uploadFile($partnerData['partnerImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $partner->resourceId = $resources->resourceId;
        }
        $this->dataProcess($partner, $partnerData);
    }

    public function dataProcess($partner, $partnerData) {
        $partner->partnerName    = $partnerData['partnerName'];
        $partner->partnerSite    = $partnerData['partnerSite'];
        $partner->partnerEmail   = $partnerData['partnerEmail'];
        $partner->partnerPhone   = $partnerData['partnerPhone'];
        $partner->partnerAddress = $partnerData['partnerAddress'];
        $partner->save();
    }
}