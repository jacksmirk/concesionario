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
    public $cliente_nombre;
    public $fabricante_nombre;
    public $modelo_nombre;

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
			array('id, clienteid, vehiculoid, modelo_nombre, fabricante_nombre, cliente_nombre, precio, fecha_compra', 'safe', 'on'=>'search'),
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
			'cliente' => array(self::BELONGS_TO, 'Cliente', 'clienteid'),
			'vehiculo' => array(self::BELONGS_TO, 'Vehiculo', 'vehiculoid'),
            'modelo' => array('BelongsToThrough', 'Modelo', array('modeloid'=>'id'), 'through' => 'vehiculo'),
            'fabricante' => array('BelongsToThrough', 'Fabricante', array('fabricanteid'=>'id'), 'through' => 'modelo'),

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
            'cliente_nombre' => 'Cliente',
            'fabricante_nombre' => 'Fabricante',
            'modelo_nombre' => 'Modelo',
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
        $criteria = new CDbCriteria();
        $criteria->with=array(
            'modelo',
            'fabricante',
            'cliente',
        );

		$criteria->compare('id',$this->id,true);
		$criteria->compare('clienteid',$this->clienteid,true);
        $criteria->compare('cliente.nombre',$this->cliente_nombre,true);
        $criteria->compare('fabricante.nombre',$this->fabricante_nombre,true);
        $criteria->compare('modelo.nombre',$this->modelo_nombre,true);
        $criteria->compare('vehiculoid',$this->vehiculoid,true);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('fecha_compra',$this->fecha_compra,true);

        $sort=new CSort;
        $sort->attributes=array(
            // For each relational attribute, create a 'virtual attribute' using the public variable name
            'cliente_nombre' => array(
                'asc' => 'cliente.nombre',
                'desc' => 'cliente.nombre DESC',
                'label' => 'Cliente',
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
	 * @return Compra the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
