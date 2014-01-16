<?php

/**
 * This is the model class for table "tbl_qp_choices".
 *
 * The followings are the available columns in table 'tbl_qp_choices':
 * @property string $id
 * @property string $question_id
 * @property string $destination_page_id
 * @property string $label
 * @property integer $votes
 * @property integer $order_number
 *
 * The followings are the available model relations:
 * @property QpPages $destinationPage
 * @property QpQuestions $question
 */
class QpChoices extends CActiveRecord
{
    public $pages_array;
    public $order_array;
    public $orden;

    /**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_qp_choices';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_id', 'required'),
			array('votes, order_number', 'numerical', 'integerOnly'=>true),
			array('question_id, destination_page_id', 'length', 'max'=>11),
			array('label', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, question_id, destination_page_id, label, votes, order_number', 'safe', 'on'=>'search'),
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
			'destinationPage' => array(self::BELONGS_TO, 'QpPages', 'destination_page_id'),
			'question' => array(self::BELONGS_TO, 'QpQuestions', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'question_id' => 'Pregunta',
			'destination_page_id' => 'Página de destino',
			'label' => 'Texto',
			'votes' => 'Votos',
			'order_number' => 'Orden',
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
		$criteria->compare('question_id',$this->question_id,true);
		$criteria->compare('destination_page_id',$this->destination_page_id,true);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('votes',$this->votes);
		$criteria->compare('order_number',$this->order_number);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QpChoices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getOrden(){
        return $this->order_number+1;
    }
}
