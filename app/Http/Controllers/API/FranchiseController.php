<?php
// namespace App\Http\Controllers\Api;

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Mail\Mailable;

use Illuminate\Support\Facades\Mail;
use App\Mail\Sendfranchise;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\franchise;


class FranchiseController extends Controller
{
    public function sendfranchiseContact(Request $request)
    {
        try {

            $name = $request->input('name');
            // $email = $request->input('email');
            $state = $request->input('state');
            $phone = $request->input('phone');
            $city = $request->input('city');
            

            //  $request->validate([
            //     'name' => 'required',
            //     'email' => 'required|email',
            //     'message' => 'required',
            // ]);

            Mail::to('aishwacleantech@gmail.com')->send(new Sendfranchise($name, $state, $phone,$city,));

            $mail = new franchise;
            $mail->name = $name;
            $mail->state = $state;
            $mail->phone = $phone;
            $mail->city = $city;



            $mail->save();
            return response()->json(['message' => 'Email sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
