<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FormatTrait {

    /**
     * @param Request $request
     * @return $this|false|string
     */
    public function ApiFormate($data,$message,$status)
    {
        return $array = ['data' => $data,'message' => $message,'status' => $status];
    }

}
