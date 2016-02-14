<?php

/**
 * This is the model class for table "news".
 *
 * The followings are the available columns in table 'news':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property integer $created_at
 * @property string $image
 */
class News extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'news';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_ru,title_ua,title_en, content_ru,content_ua,content_en', 'required'),
			array('created_at', 'numerical', 'integerOnly'=>true),
			array('title_ru,title_ua,title_en', 'length', 'max'=>100),
            array('image', 'file', 'types'=>'jpg, gif, png','allowEmpty'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title_ru,title_ua,title_en, created_at, created_at, image', 'safe', 'on'=>'search'),
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
			'title_ru' => 'Title RU',
            'title_ua' => 'Title UA',
            'title_en' => 'Title EN',
			'content_ru' => 'Content RU',
            'content_ua' => 'Content UA',
            'content_en' => 'Content EN',
			'created_at' => 'Created At',
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
		$criteria->compare('title_ru',$this->title_ua,true);
        $criteria->compare('title_ua',$this->title_ua,true);
        $criteria->compare('title_en',$this->title_en,true);
		$criteria->compare('content_ru',$this->content_ru,true);
        $criteria->compare('content_ua',$this->content_ua,true);
        $criteria->compare('content_en',$this->content_en,true);
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
	 * @return News the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getLastTwoNews()
    {
        $latestNews = $this->findAllBySql('select * from news order by id DESC limit 2');
        return $latestNews;
    }

    protected function beforeSave()
    {
        if(parent::beforeSave()) {
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
            $email->subject = 'Добавлена новая новость';
            $email->message = Yii::app()->request->getBaseUrl() . 'news/' . $this->id;
            $email->send();
        }

    }
}
