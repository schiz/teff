<?php

/**
 * This is the model class for table "pages".
 *
 * The followings are the available columns in table 'pages':
 * @property integer $id
 * @property string $title
 * @property string $name
 * @property string $description
 * @property string $content
 * @property integer $created_at
 * @property integer $menu_id
 * @property string $meta_description
 * @property string $meta_keywords
 * @property string $image
 */
class Articles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'articles';
	}

 	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_ru,title_ua,title_en, description,name_ru,name_ua,name_en, content_ru,content_ua,content_en, menu_id', 'required'),
			array('id, created_at, menu_id', 'numerical', 'integerOnly'=>true),
			array('title_ru,title_ua,title_en, name_ru,name_ua,name_en, description', 'length', 'max'=>250),
            array('image', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name_ru,name_ua,name_en, description,  created_at', 'safe', 'on'=>'search'),
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
            'menu'=>array(self::BELONGS_TO, 'Menus', 'menu_id')
        );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title_ru' => 'Title RU',
            'title_ua' => 'Title UA',
            'title_en' => 'Title EN',
			'name_ru' => 'Name RU',
            'name_ua' => 'Name UA',
            'name_EN' => 'Name EN',
			'description' => 'Description',
			'content_ru' => 'Content RU',
            'content_ua' => 'Content UA',
            'content_en' => 'Content EN',
			'created_at' => 'Created At',
			'menu_id' => 'Menu',
			'image' => 'Image',
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
		$criteria->compare('name_ru',$this->name_ru,true);
        $criteria->compare('name_ua',$this->name_ua,true);
        $criteria->compare('name_en',$this->name_en,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_at',$this->created_at);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    protected function beforeSave()
    {
        if(parent::beforeSave())
        {
            $this->created_at = strtotime(date('j-m-Y G:i:s'));

            return true;
        }

        return false;
    }

    protected function afterSave()
    {
        $users = Users::model()->findAll();
        $email = Yii::app()->email;
        foreach ($users as $user) {
            $email->to = $user->email;
            $email->subject = 'Добавлена новая статья';
            $email->message = Yii::app()->request->getBaseUrl() . 'menus/' . $this->id;
            $email->send();
        }

    }
}
