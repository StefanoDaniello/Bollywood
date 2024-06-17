<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMovieRequest extends FormRequest
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
            'title' => [
                'required',
                'max:255',
                Rule::unique('movies')->ignore($this->movie->id)
            ],
            'original_title' => 'nullable|max:255',
            'overview' => 'nullable|max:1000',
            'cover_image' => 'nullable|image|max:2048',
            'release_date' => 'required',
            'trailer' => 'nullable|max:255',
            'language' => 'required|max:100',
            'duration' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio!',
            'title.unique:movies' => 'Questo titolo esiste più!',
            'title.max' => 'Il titolo deve essere lungo massimo :max caratteri!',
            'original_title.max' => 'Il titolo originale deve essere lungo massimo :max caratteri!',
            'overview.max' => 'L\'overview deve essere lungo massimo :max caratteri!',
            'cover_image.max' => 'L\'immagine di copertina deve essere lungo massimo :max caratteri!',
            'release_date.required' => 'La data di rilascio è obbligatoria!',
            'trailer.max' => 'Il trailer deve essere lungo massimo :max caratteri!',
            'language.max' => 'Il linguaggio è obbligatorio!',
            'duration.required' => 'La durata è obbligatoria!',
        ];
    }
}
