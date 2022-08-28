<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() && Auth::user()->is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'           => ['required', 'string'],
            'is_public'      => ['required', 'boolean'],
            'image'          => ['file', 'image', 'mimes:jpg,jpeg,png'],
            'available_days' => ['required', 'integer'],
            'provider'       => ['required', 'string'],
        ];
    }
}
