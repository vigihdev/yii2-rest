<?php

namespace app\controllers;

use Yii;
use yii\rest\Controller;

class WelcomeController extends Controller
{

    public function actionIndex()
    {
    	// return $this->onError();
    	$message = 'Mari, Bergabunglah Bersama Kami di Thrubus. Terlepas dari keadaan Anda, sejarah pribadi Anda, atau kekuatan kesaksian Anda, ada ruang bagi Anda di dalam Thrubus';
        return ['status' => true,'message' => $message,'data' => []];
    }

}
