<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'nama_barang' => 'required',
            'stok' => 'required',
            'id_satuanbarang' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama_barang.required' => 'Nama barang wajib diisi',
            'stok.required' => 'Stok wajib diisi',
            'id_satuanbarang.required' => 'Mohon pilih satuan barang',
        ];
    }
}
