<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\MessageMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;




class MessageController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->all();

        // VALIDAZIONE
        $validator = Validator::make($data, [
            'email' => 'required | email',
            'message' => 'required ',
        ], [
            'email.required' => "L'email è obbligatoria",
            'email.email' => "Indirizzo mail non è valido",
            'message.required' => "il testo del messaggio è obbligatoria",
        ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $mail = new MessageMail($data);
        Mail::to(env('MAIL_ADMIN_ADDRESS'))->send($mail);
        return response('Mail Sent', 204);
    }
}
