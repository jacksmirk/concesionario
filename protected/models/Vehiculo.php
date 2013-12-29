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
    public $tipomotor_tipo;
    public $tipomotor_fuente;
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
			array('id, fabricanteid, fabricante_nombre, modeloid, modelo_nombre, motorid, tipomotor_tipo, tipomotor_fuente,
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
            'tipomotor' => array('BelongsToThrough', 'TipoMotor', array('tipomotorid'=>'id'), 'through' => 'motor'),
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
            'tipomotor_tipo' => 'Tipo de Motor',
            'tipomotor_fuente' => 'Fuente de Energía',
            'motor_cilindrada' => 'Cilindrada',
            'motor_potencia' => 'CV',
            'motor_consumo' => 'l/100km',
            'motor_emision' => 'CO2',
			'transmision' => 'Transmisión Automática',
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
        $criteria->alias='vehiculo';
        $criteria->with=array(
            'fabricante',
            'modelo',
            'motor',
            'tipomotor',
        );
		$criteria->compare('vehiculo.id',$this->id,true);
		$criteria->compare('vehiculo.fabricanteid',$this->fabricanteid,true);
        $criteria->compare('fabricante.nombre',$this->fabricante_nombre,true);
        $criteria->compare('modelo.nombre',$this->modelo_nombre,true);
        $criteria->compare('tipomotor.tipo',$this->tipomotor_tipo,true);
        $criteria->compare('tipomotor.fuente',$this->tipomotor_fuente,true);
        $criteria->compare('motor.cilindrada',$this->motor_cilindrada,true);
        $criteria->compare('motor.potencia',$this->motor_potencia,true);
        $criteria->compare('motor.consumo',$this->motor_consumo,true);
        $criteria->compare('motor.emisiones',$this->motor_emision,true);
        $criteria->compare('vehiculo.modeloid',$this->modeloid,true);
		$criteria->compare('vehiculo.motorid',$this->motorid,true);
		$criteria->compare('vehiculo.transmision',$this->transmision,true);
		$criteria->compare('vehiculo.color',$this->color,true);
		$criteria->compare('vehiculo.fecha_fabricacion',$this->fecha_fabricacion,true);
		$criteria->compare('vehiculo.fecha_alta',$this->fecha_alta,true);
		$criteria->compare('vehiculo.fecha_mod',$this->fecha_mod,true);
		$criteria->compare('vehiculo.disponible',$this->disponible);

        //Custom Sort
        $sort=new CSort;
        $sort->attributes=array(
            //'tipomotorid',
            // For each relational attribute, create a 'virtual attribute' using the public variable name
            'tipomotor_tipo' => array(
                'asc' => 'tipomotor.tipo',
                'desc' => 'tipomotor.tipo DESC',
                'label' => 'Tipo de Motor',
            ),
            'tipomotor_fuente' => array(
                'asc' => 'tipomotor.fuente',
                'desc' => 'tipomotor.fuente DESC',
                'label' => 'Fuente de Energía',
            ),
            'fabricante_nombre' => array(
                'asc' => 'fabricante.nombre',
                'desc' => 'fabricante.nombre DESC',
                'label' => 'Fabricante',
            ),
            'modelo_nombre' => array(
                'asc' => 'modelo.nombre',
                'desc' => 'modelo.nombre DESC',
                'label' => 'Modelo',
            ),
            'motor_cilindrada' => array(
                'asc' => 'motor.cilindrada',
                'desc' => 'motor.cilindrada DESC',
                'label' => 'Cilindrada',
            ),
            'motor_potencia' => array(
                'asc' => 'motor.potencia',
                'desc' => 'motor.potencia DESC',
                'label' => 'CV',
            ),
            'motor_consumo' => array(
                'asc' => 'motor.consumo',
                'desc' => 'motor.consumo DESC',
                'label' => 'l/100km',
            ),
            'motor_emision' => array(
                'asc' => 'motor.emisiones',
                'desc' => 'motor.emisiones DESC',
                'label' => 'CO2',
            ),
            '*',
        );

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'sort'=>$sort,
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

    public function getDisponible(){
        return ($this->disponible==1)?'Sí':'No';
    }

    public function getTransmisionAutomatica(){
        return ($this->transmision==1)?'Sí':'No';
    }

    protected function beforeValidate()
    {
        if($this->isNewRecord)
        {
            //set the create date, last updated date and the user doing the creating
            $this->fecha_alta=$this->fecha_mod=new CDbExpression('NOW()');
            //$this->create_user_id=$this->update_user_id=Yii::app()->user->id;
        }
        else {
            //not a new record, so just set the last updated time and last updated user id
            $this->fecha_mod=new CDbExpression('NOW()');
            //$this->update_user_id=Yii::app()->user->id;
        }
        if($this->modeloid){
            $modelo = Modelo::model()->findByPk($this->modeloid);
            $this->fabricanteid=$modelo->fabricanteid;
        }
        if(!$this->color){
            $this->color='#ffffff';
        }
        if(!$this->fecha_fabricacion){
            $this->fecha_fabricacion=new CDbExpression('NOW()');
        }
        return parent::beforeValidate();
    }
}
