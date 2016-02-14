<?php

/**
 * This is the model class for table "menus".
 *
 * The followings are the available columns in table 'menus':
 * @property integer $id
 * @property string $name
 * @property integer $parent_id
 * @property integer $position
 * @property string $url
 * @property string $icon
 */
class Menus extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'menus';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name_ru, name_ua, name_en', 'required'),
			array('parent_id, position', 'numerical', 'integerOnly'=>true),
			array('name_ru, name_ua, name_en', 'length', 'max'=>50),
			array('icon', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, parent_id, position, icon', 'safe', 'on'=>'search'),
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
            'articles'=>array(self::HAS_MANY, 'Articles', 'menu_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name_ru' => 'Name RU',
            'name_ua' => 'Name UA',
            'name_en' => 'Name EN',
			'parent_id' => 'Parent',
			'position' => 'Position',
			'icon' => 'Icon',
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

        $criteria->condition = 'parent_id > 0';

		$criteria->compare('id',$this->id);
		$criteria->compare('name_ru',$this->name_ru,true);
        $criteria->compare('name_ua',$this->name_ua,true);
        $criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('position',$this->position);
		$criteria->compare('icon',$this->icon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Menus the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
