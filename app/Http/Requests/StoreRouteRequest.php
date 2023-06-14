<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRouteRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'description' => 'required',
            'path_to_route_image' => 'required',
            'expected_time' => 'required',
            'path_to_map_image' => 'required',
            'path_to_character_image' => 'required'
        ];
    }
}
