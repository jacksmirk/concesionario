<?php

/**
 * This is the model class for table "tbl_cuentas".
 *
 * The followings are the available columns in table 'tbl_cuentas':
 * @property string $id
 * @property string $clienteid
 * @property string $fecha_alta
 * @property string $fecha_mod
 * @property integer $activa
 *
 * The followings are the available model relations:
 * @property Compras[] $comprases
 * @property Clientes $cliente
 */
class Cuenta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_cuentas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clienteid', 'required'),
			array('activa', 'numerical', 'integerOnly'=>true),
			array('clienteid', 'length', 'max'=>11),
			array('fecha_alta, fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, clienteid, fecha_alta, fecha_mod, activa', 'safe', 'on'=>'search'),
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
			'comprases' => array(self::HAS_MANY, 'Compras', 'cuentaid'),
			'cliente' => array(self::BELONGS_TO, 'Clientes', 'clienteid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'clienteid' => 'Id de Cliente',
			'fecha_alta' => 'Fecha de Alta',
			'fecha_mod' => 'Fecha de Modificicación',
			'activa' => 'Activa',
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
		$criteria->compare('clienteid',$this->clienteid,true);
		$criteria->compare('fecha_alta',$this->fecha_alta,true);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('activa',$this->activa);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cuenta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
