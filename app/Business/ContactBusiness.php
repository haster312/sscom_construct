<?php
namespace App\Business;
class ContactBusiness {

    public function sendContact($contactData){
        $email  = new MailBusiness();
        $status = $email->sendMail($contactData);
        return $status;
    }
}