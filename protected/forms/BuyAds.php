<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class BuyAds extends CFormModel
{
    public $userId;
    public $count;
    public $string;
    public $startDate;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules()
    {
        return array(
            array('userId, count, string, startDate', 'required'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'userId'=>'User Id',
            'count'=>'количество показов',
            'string'=>'Рекламная строка',
            'startDate'=>'дата начала показов',
        );
    }
}
