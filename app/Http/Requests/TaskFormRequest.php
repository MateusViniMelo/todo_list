<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskFormRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            "titulo" => "required",
            "descricao" => "nullable",
            "dataTarefa" => "date|required",
            "completa" => "boolean|required",
            "importante" => "boolean|required"
        ];
    }

    public function attributes(): array
    {
        return ["titulo" => "Título", "descricao" => "Descrição", "dataTarefa" => "Data", "completa" => "Completa", "importante" => "Importante"];
    }
}
