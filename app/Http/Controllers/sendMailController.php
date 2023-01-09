<?php

namespace App\Http\Controllers;
use App\Mail\ContactanosMailable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class sendMailController extends Controller
{
    //


    public function sendMail(Request $request) 
    {

        $correo = new ContactanosMailable($request);

        //destinatario
        Mail::to($request->email)->cc('gegantoys@gegantoys.com')->send($correo);
        //Mail::to(DB::table('users')->select('email')->where('id','=', $request->user_id )->get())->send($correo);
    
        return response()->json([
            'message' => 'Mensaje enviado',
         ], status: 200);

    }
}
