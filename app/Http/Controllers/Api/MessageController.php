<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;




class MessageController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'apartment_id'=> 'required',
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]
        );

        if($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'errors' => $validator->errors()
                ]
            );
        }

        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();

        ///Mail::to('info@owner.it')->send(new Newcontact($newMessage));

        return response()->json(
            [
                'success' => true
            ]
        );
    }
}
