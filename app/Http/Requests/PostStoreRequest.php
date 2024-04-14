<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $user = User::findOrFail(Auth::user()->id);
        return $user->can('publish articles');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "alpha:ascii|bail|required|max:30|nullable",
            "body" => "alpha:ascii|required|nullable",
            "image" => "required|nullable",
            // 'user_id' => "required|integer|nullable",
            // 'category_id' => "required|integer|nullable"
        ];
    }
}

