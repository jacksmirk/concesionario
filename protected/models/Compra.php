<?php

/**
 * This is the model class for table "tbl_compras".
 *
 * The followings are the available columns in table 'tbl_compras':
 * @property string $id
 * @property string $clienteid
 * @property string $vehiculoid
 * @property integer $precio
 * @property string $fecha_compra
 *
 * The followings are the available model relations:
 * @property Clientes $cliente
 * @property Vehiculos $vehiculo
 */
class Compra extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_compras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clienteid, vehiculoid, fecha_compra', 'required'),
			array('precio', 'numerical', 'integerOnly'=>true),
			array('clienteid, vehiculoid', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, clienteid, vehiculoid, precio, fecha_compra', 'safe', 'on'=>'search'),
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
			'cliente' => array(self::BELONGS_TO, 'Clientes', 'clienteid'),
			'vehiculo' => array(self::BELONGS_TO, 'Vehiculos', 'vehiculoid'),
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
			'vehiculoid' => 'Id de Vehículo',
			'precio' => 'Precio',
			'fecha_compra' => 'Fecha de Compra',
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
		$criteria->compare('vehiculoid',$this->vehiculoid,true);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('fecha_compra',$this->fecha_compra,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Compra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
