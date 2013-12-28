<?php

/**
 * This is the model class for table "tbl_vehiculos".
 *
 * The followings are the available columns in table 'tbl_vehiculos':
 * @property string $id
 * @property string $fabricanteid
 * @property string $modeloid
 * @property string $motorid
 * @property string $transmision
 * @property string $color
 * @property string $fecha_fabricacion
 * @property string $fecha_alta
 * @property string $fecha_mod
 * @property integer $disponible
 *
 * The followings are the available model relations:
 * @property Coches $coches
 * @property Compras[] $comprases
 * @property Motocicletas $motocicletas
 * @property Fabricantes $fabricante
 * @property Modelos $modelo
 * @property Motores $motor
 */
class Vehiculo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_vehiculos';
	}

    public $fabricante_nombre;
    public $modelo_nombre;
    public $motor_tipo;
    public $motor_fuente;
    public $motor_cilindrada;
    public $motor_potencia;
    public $motor_consumo;
    public $motor_emision;

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fabricanteid, modeloid, motorid, fecha_alta', 'required'),
			array('disponible', 'numerical', 'integerOnly'=>true),
			array('fabricanteid, modeloid, motorid', 'length', 'max'=>11),
			array('transmision, color', 'length', 'max'=>45),
			array('fecha_fabricacion, fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fabricanteid, fabricante_nombre, modeloid, modelo_nombre, motorid, motor_tipo, motor_fuente,
			    motor_cilindrada, motor_potencia, motor_consumo, motor_emision, transmision, color, fecha_fabricacion,
			    fecha_alta, fecha_mod, disponible', 'safe', 'on'=>'search'),
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
			'coche' => array(self::HAS_ONE, 'Coche', 'vehiculoid'),
			'compra' => array(self::HAS_MANY, 'Compra', 'vehiculoid'),
			'motocicleta' => array(self::HAS_ONE, 'Motocicleta', 'vehiculoid'),
			'fabricante' => array(self::BELONGS_TO, 'Fabricante', 'fabricanteid'),
			'modelo' => array(self::BELONGS_TO, 'Modelo', 'modeloid'),

			'motor' => array(self::BELONGS_TO, 'Motor', 'motorid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fabricanteid' => 'Fabricante',
            'fabricante_nombre' => 'Fabricante',
			'modeloid' => 'Modelo',
            'modelo_nombre' => 'Modelo',
			'motorid' => 'Motor',
            'motor_tipo' => 'Tipo de Motor',
            'motor_fuente' => 'Fuente de Energía',
            'motor_cilindrada' => 'Cilindrada',
            'motor_potencia' => 'Potencia',
            'motor_consumo' => 'Consumo',
            'motor_emision' => 'Emisión CO2',
			'transmision' => 'Transmisión',
			'color' => 'Color',
			'fecha_fabricacion' => 'Fecha de Fabricación',
			'fecha_alta' => 'Fecha de Alta',
			'fecha_mod' => 'Fecha de Modificación',
			'disponible' => 'Disponible',
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
		$criteria->compare('fabricanteid',$this->fabricanteid,true);
		$criteria->compare('modeloid',$this->modeloid,true);
		$criteria->compare('motorid',$this->motorid,true);
		$criteria->compare('transmision',$this->transmision,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('fecha_fabricacion',$this->fecha_fabricacion,true);
		$criteria->compare('fecha_alta',$this->fecha_alta,true);
		$criteria->compare('fecha_mod',$this->fecha_mod,true);
		$criteria->compare('disponible',$this->disponible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vehiculo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getListaFabricantes() {
        $fabricantes = Fabricante::model()->findAll();
        $listaFabricantes = CHtml::listData($fabricantes,'id','nombre');
        return $listaFabricantes;
    }

    public function getListaModelos() {
        $modelos = Modelo::model()->findAll();
        $data = CHtml::listData($modelos,'id','fabricanteModelo');
        asort($data);
        return $data;

    }

    public function getListaMotores() {
        $motores = Motor::model()->findAll();
        $data = CHtml::listData($motores,'id','motorCompleto');
        asort($data);
        return $data;

    }
}
