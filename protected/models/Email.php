<?php

/**
 * This is the model class for table "{{email}}".
 *
 * The followings are the available columns in table '{{email}}':
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $subject
 * @property string $body
 * @property integer $created
 * @property integer $isread
 * @property integer $isreply
 * @property integer $reply
 */
class Email extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{email}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, subject, body, created', 'required'),
			array('created, isread, isreply, reply', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>32),
			array('email', 'length', 'max'=>128),
			array('subject', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, email, subject, body, created, isread, isreply, reply', 'safe', 'on'=>'search'),
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
			'name' => Yii::t('basic', 'Name'),
			'email' => Yii::t('basic', 'Email'),
			'subject' => Yii::t('basic', 'Subject'),
			'body' => Yii::t('basic', 'Body'),
			'created' => Yii::t('basic', 'Created'),
			'isread' => Yii::t('basic', 'Isread'),
			'isreply' => Yii::t('basic', 'Isreply'),
			'reply' => Yii::t('basic', 'Reply'),
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('created',$this->created);
		$criteria->compare('isread',$this->isread);
		$criteria->compare('isreply',$this->isreply);
		$criteria->compare('reply',$this->reply);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Email the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
