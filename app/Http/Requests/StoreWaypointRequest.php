<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWaypointRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'short_description' => 'required|string|max:255',
            'long_description' => 'required|string|max:255',
            'latitude' => 'required|integer',
            'longitude' => 'required|integer',
            'index_of_route' => 'required|integer',
            'visited' =>'required|boolean',
        ];
    }
}
