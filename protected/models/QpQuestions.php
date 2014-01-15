<?php

/**
 * This is the model class for table "tbl_qp_questions".
 *
 * The followings are the available columns in table 'tbl_qp_questions':
 * @property string $id
 * @property string $page_id
 * @property string $answer_type_id
 * @property string $label
 * @property integer $order
 * @property integer $required
 *
 * The followings are the available model relations:
 * @property QpChoices[] $qpChoices
 * @property QpOpinions[] $qpOpinions
 * @property QpAnswerType $answerType
 * @property QpPages $page
 */
class QpQuestions extends CActiveRecord
{
    public $page_number;
    public $order_array;
    public $answer_type_name;
    public $answer_type_description;
    public $orden;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_qp_questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_id, answer_type_id', 'required'),
			array('order, required', 'numerical', 'integerOnly'=>true),
			array('page_id, answer_type_id', 'length', 'max'=>11),
			array('label', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, page_id, answer_type_id, label, order, page_number, required', 'safe', 'on'=>'search'),
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
			'qpChoices' => array(self::HAS_MANY, 'QpChoices', 'question_id'),
			'qpOpinions' => array(self::HAS_MANY, 'QpOpinions', 'question_id'),
			'answerType' => array(self::BELONGS_TO, 'QpAnswerType', 'answer_type_id'),
			'page' => array(self::BELONGS_TO, 'QpPages', 'page_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'page_id' => 'Page',
            'page_number' => 'Número de Página',
			'answer_type_id' => 'Tipo de Respuesta',
            'answer_type_name' => 'Tipo de Respuesta',
			'label' => 'Título',
			'order' => 'Orden',
            'required' => 'Obligatoria',
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
		$criteria->compare('page_id',$this->page_id,true);
		$criteria->compare('answer_type_id',$this->answer_type_id,true);
		$criteria->compare('label',$this->label,true);
		$criteria->compare('order',$this->order);
        $criteria->compare('required',$this->required);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QpQuestions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getTiposRespuesta() {
        $tipos = QpAnswerType::model()->findAll();
        $listaTipos = CHtml::listData($tipos,'id','name');
        return $listaTipos;
    }
}
