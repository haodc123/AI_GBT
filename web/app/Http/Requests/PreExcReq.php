<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PreExcReq extends FormRequest
{

    public function rules()
    {
        return [
            'exc_req_content' => 'required',
            'exc_img_path' => 'required'
        ];
    }

    public function messages()
    {
        return [
            
        ];
    }

}

?>