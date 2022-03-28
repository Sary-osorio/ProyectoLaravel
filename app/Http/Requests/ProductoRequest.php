<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductoRequest extends FormRequest
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
            'titulo' => ['required', 'max:255'],
            'descripcion' => ['required', 'max:1000'],
            'precio' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'estado' => ['required', 'in:Disponible,No disponible'],
        ];
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->estado == 'Disponible' && $this->stock == 0) {
                $validator->errors()->add('stock', 'Si esta disponible el stock no puede ser cero');
            }
        });
    }
}
