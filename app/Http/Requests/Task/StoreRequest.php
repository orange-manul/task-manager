<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'description' => 'required|string|max:255',
            'status' => 'boolean',
            'due_date' => 'date|nullable',
        ];
    }
}
