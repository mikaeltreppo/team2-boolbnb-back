<?php

namespace App\Http\Controllers\Api;
use App\Mail\NewContact;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

class MessageController extends Controller
{
   
    public function index()
    {
        $user = auth()->user();
        $apartments = $user->apartments()->pluck('id');
        $messages = Message::whereIn('apartment_id', $apartments)->get();

        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make(
            $data,
            [
                'name' => 'required',
                'email' => 'required|email',
                'message' => 'required',
            ]
        );

        if($validator->fails()) {
            return response()->json(
                [
                    'success' => false,
                    'erros' => $validator->erros()
                ]
            );
        }

        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();

        Mail::to('info@owner.it')->send(new NewContact($newMessage));

        return response()->json(
            [
                'success' => true
            ]
        );
    }

   
    public function show($id)
    {
        $message = Message::findOrFail($id); //trova il messaggio tramite id
        $apartment_id = $message->apartment_id; //salvo l'id dell'appartamento legato al messaggio
        $user = auth()->user(); //creo il riferimento all'utente loggato
        $user_apartments = $user->apartments()->pluck('id')->toArray(); //creo l'array di tutti gli id degli appartamenti dell'utente loggato
        if (in_array($apartment_id, $user_apartments)) {
            return view('admin.messages.show', compact('message'));
        } else {
            return view('errors.403');
        }
        /*confronto che nella lista degli id degli appartamenti dell'utente registrato ovvero $user_apartments
         * sia presente apartment_id relativo al messaggio quinid non posso vedere messaggi relativi ad appartamenti non miei 
         */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { {
            $message = message::findOrFail($id);
            $message->delete();
            return redirect()->route('admin.messages.index');
        }
    }
}