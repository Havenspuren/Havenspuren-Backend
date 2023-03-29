<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTrophyRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'waypoint_id' => 'required|string|max:255',
            'x' => 'required|integer',
            'y' => 'required|integer',
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'path_to_image' => 'required|string|max:255'

        ];
    }
}
