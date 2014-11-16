<?php

/**
 * This is the model class for table "ad_place".
 *
 * The followings are the available columns in table 'ad_place':
 * @property string $id
 * @property string $user_id
 * @property string $title
 * @property string $text
 * @property double $lon
 * @property double $lat
 * @property string $added
 */
class AdPlace extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ad_place';
	}

    public function afterConstruct()
    {
        $this->added = date("Y-m-d H:i:s");
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, title, text, lon, lat, added', 'required'),
			array('lon, lat', 'numerical'),
			array('user_id', 'length', 'max'=>11),
			array('title, text', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, title, text, lon, lat, added', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'title' => 'Title',
			'text' => 'Text',
			'lon' => 'Lon',
			'lat' => 'Lat',
			'added' => 'Added',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('user_id',$this->user_id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('lon',$this->lon);
		$criteria->compare('lat',$this->lat);
		$criteria->compare('added',$this->added,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AdPlace the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
