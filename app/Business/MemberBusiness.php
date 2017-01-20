<?php
namespace App\Business;

use App\Model\Member;
use App\Model\Resources;

class MemberBusiness {

    public function addNewMember($memberData) {
        $member = new Member();
        if(array_key_exists('memberImage',$memberData)){
            $resourceData = UploadBusiness::uploadFile($memberData['memberImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $memberData['resourceId'] = $resources->resourceId;
        }
        $memberData['birth'] = date('Y-m-d',strtotime($memberData['birth']));
        $member->create($memberData);
    }

    public function updateMemberDate($memberData, $memberId) {
        $member = Member::find($memberId);
        if(array_key_exists('memberImage',$memberData)){
            $resourceData = UploadBusiness::uploadFile($memberData['memberImage']);
            $resources = new Resources();
            $resources->path = $resourceData['path'];
            $resources->name = $resourceData['name'];
            $resources->save();
            $memberData['resourceId'] = $resources->resourceId;
        }
        $memberData['birth'] = date('Y-m-d',strtotime($memberData['birth']));
        $member->update($memberData);
    }
}