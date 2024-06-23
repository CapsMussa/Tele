<?php

namespace App\Http\Requests\Product;

use App\Models\Type;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
        $type = Type::all();

        return [

            'type_id'=> 'exists:types,id',
            'name'=>'string',
            'serial_number'=>'max:10|max:10',
            'desc' => ''
        ];
    }
}
