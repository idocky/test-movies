<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieUpdateRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title_uk' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'description_uk' => 'required|string',
            'description_en' => 'required|string',
            'youtube_trailer_id' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'screenshots.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'released_at' => 'required|date_format:Y',
            'start_rental' => 'required|date',
            'end_rental' => 'required|date|after:start_rental',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:tags,id',
            'cast' => 'nullable|array',
            'cast.*' => 'exists:cast,id',
        ];
    }
}
