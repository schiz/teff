<?php

/**
 * This is the model class for table "fuels".
 *
 * The followings are the available columns in table 'fuels':
 * @property integer $id
 * @property string $fuel_name
 */
class Fuels extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fuels';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fuel_name_ru,fuel_name_ua,fuel_name_en', 'required'),
			array('fuel_name_ru,fuel_name_ua,fuel_name_en', 'length', 'max'=>80),
            array('net_calorific_value', 'numerical', 'integerOnly'=>true),
            // The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fuel_name_ru,fuel_name_ua,fuel_name_en', 'safe', 'on'=>'search'),
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
            'cost'=>array(self::HAS_ONE, 'FuelCost', 'fuel_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fuel_name_ru' => 'Имя топлива RU',
            'fuel_name_ua' => 'Имя топлива UA',
            'fuel_name_en' => 'Имя топлива EN',
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
		$criteria->compare('fuel_name_ru',$this->fuel_name_ru,true);
        $criteria->compare('fuel_name_ua',$this->fuel_name_ua,true);
        $criteria->compare('fuel_name_en',$this->fuel_name_en,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fuels the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
