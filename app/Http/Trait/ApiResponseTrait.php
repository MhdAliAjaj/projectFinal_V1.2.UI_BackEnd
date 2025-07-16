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
<<<<<<< HEAD
    return response()->json($array,$stutus);
=======
     return response()->json($array,$stutus);
>>>>>>> 303e8c2 (تحضير التعديلات قبل الـ pull)
    }
}

