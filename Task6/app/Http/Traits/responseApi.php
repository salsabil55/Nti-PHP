<?php

namespace App\Http\traits;

trait responseApi {
    public function returnSuccessMessage($message="",$status=200)
    {
        return response()->json([
            'message'=>$message,
            'errors'=>(object)[],
            'data'=>(object)[]
        ],$status);
    }
    public function returnErrorMessage($message="",$status=422)
    {
        return response()->json([
            'message'=>$message,
            'errors'=>(object)[],
            'data'=>(object)[]
        ],$status);
    }
    public function returnData(Array $data,$message="",$status=200)
    {
        return response()->json([
            'message'=>$message,
            'errors'=>(object)[],
            'data'=>$data
        ],$status);
    }
}
