<?php
namespace App\Business;

use App\Model\Info;
use Illuminate\Support\Facades\Mail;
use League\Flysystem\Exception;

class MailBusiness {

    public function sendMail($contactData) {

        try {
            Mail::send('email.contact', $contactData, function($message)
            {
                $info = Info::first();
                $email = $info->email;
                $message->to($email)->subject('Contact Form Information');
            });
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}