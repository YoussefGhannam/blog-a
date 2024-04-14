<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(User $user): bool
    {
        return $user->can('edit articles');
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
            "body" => "alpha:ascii|required|nullable|min:255",
            "image" => "required|file|image|extensions:jpg,png|size:2000|nullable",
            // 'user_id' => "required|integer|nullable",
            // 'category_id' => "required|integer|nullable"
        ];
    }
}

