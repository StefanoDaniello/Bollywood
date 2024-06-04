<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'max:255',
                Rule::unique('halls')->ignore($this->hall->id),
            ],
            'color' => 'nullable|max:50',
            'seats_num' => 'required',
            'isense' => 'required',
            'availability' => 'required',
            'base_price' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Il titolo è obbligatorio!',
            'name.unique:halls' => 'Questo titolo esiste già!',
            'name.max' => 'Il titolo deve essere lungo massimo :max caratteri!',
            'color.max' => 'Il colore deve essere lungo massimo :max caratteri!',
            'seats_num.required' => 'Il numero di posti è obbligatorio!',
            'isense.required' => 'Il numero di posti è obbligatorio!',
            'availability.required' => 'L\'avanzamento è obbligatorio!',
            'base_price.required' => 'Il prezzo è obbligatorio!'
        ];
    }
}
