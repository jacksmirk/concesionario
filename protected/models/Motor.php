<?php

/**
 * This is the model class for table "tbl_motores".
 *
 * The followings are the available columns in table 'tbl_motores':
 * @property string $id
 * @property string $tipomotorid
 * @property integer $cilindrada
 * @property integer $potencia
 * @property integer $consumo
 * @property integer $emisiones
 * @property string $fecha_alta
 * @property string $fecha_mod
 *
 * The followings are the available model relations:
 * @property TiposMotores $tipomotor
 * @property Vehiculos[] $vehiculoses
 */
class Motor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_motores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipomotorid, fecha_alta', 'required'),
			array('cilindrada, potencia, consumo, emisiones', 'numerical', 'integerOnly'=>true),
			array('tipomotorid', 'length', 'max'=>11),
			array('fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tipomotorid, cilindrada, potencia, consumo, emisiones, fecha_alta, fecha_mod', 'safe', 'on'=>'search'),
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
			'tipomotor' => array(self::BELONGS_TO, 'TiposMotores', 'tipomotorid'),
			'vehiculoses' => array(self::HAS_MANY, 'Vehiculos', 'motorid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tipomotorid' => 'Id de Tipo de Motor',
			'cilindrada' => 'Cilindrada',
			'potencia' => 'Potencia',
			'consumo' => 'Consumo',
			'emisiones' => 'Emisiones',
			'fecha_alta' => 'Fecha de Alta',
			'fecha_mod' => 'Fecha de Modificación',
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
		$criteria->compare('tipomotorid',$this->tipomotorid,true);
		$criteria->compare('cilindrada',$this->cilindrada);
		$criteria->compare('potencia',$this->potencia);
		$criteria->compare('consumo',$this->consumo);
		$criteria->compare('emisiones',$this->emisiones);
		$criteria->compare('fecha_alta',$this->fecha_alta,true);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Motor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
