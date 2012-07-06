<?php

/**
 * This is the model class for table "dlf_twitter".
 *
 * The followings are the available columns in table 'dlf_twitter':
 * @property string $id
 * @property string $content
 * @property integer $author
 * @property string $created
 * @property integer $replynum
 */
class Twitter extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Twitter the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'dlf_twitter';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, created', 'required'),
			array('author, replynum', 'numerical', 'integerOnly'=>true),
			array('created', 'length', 'max'=>11),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, content, author, created, replynum', 'safe', 'on'=>'search'),
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
			'author' => 'Author',
			'created' => 'Created',
			'replynum' => 'Replynum',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('author',$this->author);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('replynum',$this->replynum);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}