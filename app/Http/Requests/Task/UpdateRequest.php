<?php

namespace App\Http\Requests\Task;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'string|max:255',
            'description' => 'string|max:255',
            'status' => 'boolean',
            'due_date' => 'date|nullable',
        ];
    }
}
