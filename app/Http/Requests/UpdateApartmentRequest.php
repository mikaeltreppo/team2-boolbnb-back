<?php

namespace App\Http\Requests;

use App\Models\Apartment;
use Illuminate\Foundation\Http\FormRequest;

class UpdateApartmentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required|max:5000',
            'cover_image' => 'nullable|max:1024|image',
            'price' => 'required|numeric|min:0',
            'address' => 'required',
            'beds' => 'required|integer',
            'bathrooms' => 'required|integer',
            'bedrooms' => 'required|integer',
            'size_m2' => 'required|integer'
        ];
    }
    public function messages()
    {
        return [

            'title.required' => 'Il titolo è richiesto.',
            'title.max' => 'Puoi inserire massimo 255 caratteri per il titolo.',
            'description.required' => 'La descrizione è richiesta.',
            'description.max' => 'Puoi inserire massimo 5000 caratteri per la descrizione.',
            'cover_image.max' => "Puoi inserire massimo 1024 kilobyte per l'immagine.",
            'cover_image.image' => "Il file inserito deve essere di tipo Immagine.",
            'price.required' => "Il prezzo dell'appartamento è richiesto.",
            'price.numeric' => 'Il valore inserito deve essere di tipo numerico.',
            'price.min' => 'Inserisci un prezzo dal valore positivo.',
            'address.required' => "L'indirizzo dell'appartamento è richiesto.",
            'beds.required' => 'Il numero di letti è richiesto.',
            'beds.integer' => 'Il dato inserito deve essere di tipo numero intero.',
            'bathrooms.required' => 'Il numero di bagni è richiesto.',
            'bathrooms.integer' => 'Il dato inserito deve essere di tipo numero intero.',
            'bedrooms.required' => 'Il numero di stanze da letto è richiesto.',
            'bedrooms.integer' => 'Il dato inserito deve essere di tipo numero intero.',
            'size_m2.required' => 'Il numero di metri quadri è richiesto.',
            'size_m2.integer' => 'Il dato inserito deve essere di tipo numero intero.'

        ];
    }
}
