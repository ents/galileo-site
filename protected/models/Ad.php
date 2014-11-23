<?php

/**
 * This is the model class for table "ad".
 *
 * The followings are the available columns in table 'ad':
 * @property integer $id
 * @property integer $ad_place_id
 * @property integer $user_id
 * @property string $string
 * @property integer $count_ordered
 * @property integer $count_showed
 * @property integer $added
 *
 * The followings are the available model relations:
 * @property AdPlace $adPlace
 * @property User $user
 */
class Ad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ad_place_id, string, user_id, count_ordered, count_showed', 'required'),
			array('ad_place_id, user_id, count_ordered, count_showed', 'numerical', 'integerOnly'=>true),
			array('string', 'length', 'max'=>50, 'min' => 5),
			array('string', 'match', 'pattern' => '~^[\w.,! -]+$~u', 'message' => 'Строка может содержать только буквы латинского и русского алфавитов и знаки препинания',),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, ad_place_id, user_id, string, count_ordered, count_showed, added', 'safe', 'on'=>'search'),
		);
	}

    public function afterConstruct()
    {
        $this->added = date("Y-m-d H:i:s");
        $this->count_showed = 0;
    }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'adPlace' => array(self::BELONGS_TO, 'AdPlace', 'ad_place_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'ad_place_id' => 'Ad Place',
			'user_id' => 'User',
			'string' => 'Текст строки',
			'count_ordered' => 'Количество показов',
			'count_showed' => 'Откручено показов',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('ad_place_id',$this->ad_place_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('string',$this->string,true);
		$criteria->compare('count_ordered',$this->count_ordered);
		$criteria->compare('count_showed',$this->count_showed);
		$criteria->compare('added',$this->added);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
