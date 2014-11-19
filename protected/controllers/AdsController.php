<?php

class AdsController extends Controller
{
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'users' => array('@'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionMy()
	{
        /** @var $user User */
        $model = new Ad('search');
        foreach ($model->attributes as $key => $val) {
            $model->$key = null;
        }
        //$model->user_id = Yii::app()->user->id;
		$this->render('my', ['model' => $model]);
	}
}