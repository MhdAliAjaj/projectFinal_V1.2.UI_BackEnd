<?php
namespace App\http\Trait;
trait ApiResponseTrait
{
    public function customApi($data,$message,$stutus){

        $array=[
            'message'=>$message,
            'data'=>$data,
            'stutus'=>$stutus,
        ];
    return response()->json($array,$stutus);
    }
}

