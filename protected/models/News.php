<?php

/**
 * This is the model class for table "{{news}}".
 *
 * The followings are the available columns in table '{{news}}':
 * @property integer $id
 * @property string $content
 * @property integer $page
 * @property integer $time
 * @property integer $channel
 * @property integer $uid
 */
class News extends CActiveRecord
{

	const CHANNEL_BLOG = 1;
	const CHANNEL_PREPARATION = 2;
	const CHANNEL_BOOK = 3;
	const CHANNEL_GAOKAO = 4;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{news}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, page, time, channel, uid', 'required'),
			array('page, time, channel, uid', 'numerical', 'integerOnly'=>true),
			array('content', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, content, page, time, channel, uid', 'safe', 'on'=>'search'),
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
			'content' => 'Content',
			'page' => 'Page',
			'time' => 'Time',
			'channel' => 'Channel',
			'uid' => 'Uid',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('page',$this->page);
		$criteria->compare('time',$this->time);
		$criteria->compare('channel',$this->channel);
		$criteria->compare('uid',$this->uid);

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

	public function getChannelName($type)
	{
		switch ($type) {
			case self::CHANNEL_GAOKAO:
				return '[高考]';
				break;
			case self::CHANNEL_BOOK:
				return '[书籍]';
				break;
			case self::CHANNEL_PREPARATION:
				return '[备课本]';
				break;
			case self::CHANNEL_BLOG:
				return '[博客]';
				break;			
			default:
				# code...
				break;
		}
	}

	public function saveNews($content, $channel, $page)
	{

		$model = self::model()->find(array(
			'condition'=>'channel = :channel AND page = :page',
			'param'=>array(
				':channel'=>$channel,
				':page'=>$page
			)
		));

		if(!$model)
		{
			$model = new News();
			$model->content = $content;
			$model->channel = $channel;
			$model->page = $page;
			$model->time = time();
			$model->uid = Yii::app()->user->id;

			if($model->save())
			{
				return $model->attributes;
			}
			else
			{
				return $model->errors;
			}	
		}






	}

	public function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->time = time();
				$this->uid = Yii::app()->user->id;
			}
			else
			{

			}
			return true;
		}
		else
			return false;
	}
}
