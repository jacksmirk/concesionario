<?php

/**
 * This is the model class for table "tbl_qp_pages".
 *
 * The followings are the available columns in table 'tbl_qp_pages':
 * @property string $id
 * @property string $quickpoll_id
 * @property integer $page_number
 *
 * The followings are the available model relations:
 * @property QpChoices[] $qpChoices
 * @property Quickpolls $quickpoll
 * @property QpQuestions[] $qpQuestions
 */
class QpPages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_qp_pages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('quickpoll_id', 'required'),
			array('page_number', 'numerical', 'integerOnly'=>true),
			array('quickpoll_id', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, quickpoll_id, page_number', 'safe', 'on'=>'search'),
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
			'qpChoices' => array(self::HAS_MANY, 'QpChoices', 'destination_page_id'),
			'quickpoll' => array(self::BELONGS_TO, 'Quickpolls', 'quickpoll_id'),
			'qpQuestions' => array(self::HAS_MANY, 'QpQuestions', 'page_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'quickpoll_id' => 'Quickpoll',
			'page_number' => 'Número de página',
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
		$criteria->compare('quickpoll_id',$this->quickpoll_id,true);
		$criteria->compare('page_number',$this->page_number);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QpPages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getRelatedQuestions ()
    {
        $out=CHtml::listData($this->qpQuestions,'id','label');
        $related = '<ul>';
        foreach($out as $key=>$value) {
            $related .= sprintf('<li>%s</li>', CHtml::link($value, array('qpQuestions/view', 'id' => $key)));

        }
        $related .= '</ul>';
        return $related;
    }
}
