<?php

/**
 * This is the model class for table "tbl_particulares".
 *
 * The followings are the available columns in table 'tbl_particulares':
 * @property string $clientid
 * @property integer $nif
 * @property string $fecha_nacimiento
 *
 * The followings are the available model relations:
 * @property Clientes $client
 */
class Particular extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_particulares';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clientid', 'required'),
			array('nif', 'numerical', 'integerOnly'=>true),
			array('clientid', 'length', 'max'=>11),
			array('fecha_nacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('clientid, nif, fecha_nacimiento', 'safe', 'on'=>'search'),
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
			'client' => array(self::BELONGS_TO, 'Clientes', 'clientid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'clientid' => 'Id de Cliente',
			'nif' => 'NIF',
			'fecha_nacimiento' => 'Fecha de Nacimiento',
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

		$criteria->compare('clientid',$this->clientid,true);
		$criteria->compare('nif',$this->nif);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Particular the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
