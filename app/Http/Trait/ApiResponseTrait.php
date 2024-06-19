<?php
namespace App\https\Trait;
trait ApiResponseTrait
{
    public function customApi($data,$message,$stutus){

        $array=[
            'data'=>$data,
            'message'=>$message,
        ];
     return response()->json($array,$stutus);
    }
}
