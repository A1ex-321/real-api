<?php
// namespace App\Http\Controllers\Api;

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Mailstores;


class MailController extends Controller
{
    public function sendUserContact(Request $request)
    {
        try {

            $name = $request->input('name');
            // $email = $request->input('email');
            $msg = $request->input('msg');
            $phone = $request->input('phone');
            if(!$msg){
                $msg=null;
            }

            //  $request->validate([
            //     'name' => 'required',
            //     'email' => 'required|email',
            //     'message' => 'required',
            // ]);

        
            $mail = new Mailstores;
            $mail->name = $name;
            $mail->msg = $msg;
            $mail->phone = $phone;


            $mail->save();
            return response()->json(['message' => 'Email sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
