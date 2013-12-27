<?php

/**
 * This is the model class for table "tbl_clientes".
 *
 * The followings are the available columns in table 'tbl_clientes':
 * @property string $userid
 * @property string $nombre
 * @property integer $telefono
 * @property string $fecha_alta
 * @property string $fecha_mod
 *
 * The followings are the available model relations:
 * @property Usuarios $user
 * @property Cuentas[] $cuentases
 * @property Empresas $empresas
 * @property Particulares $particulares
 */
class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, fecha_alta', 'required'),
			array('telefono', 'numerical', 'integerOnly'=>true),
			array('userid', 'length', 'max'=>11),
			array('nombre', 'length', 'max'=>45),
			array('fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('userid, nombre, telefono, fecha_alta, fecha_mod', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Usuarios', 'userid'),
			'cuentases' => array(self::HAS_MANY, 'Cuentas', 'clienteid'),
			'empresas' => array(self::HAS_ONE, 'Empresas', 'clientid'),
			'particulares' => array(self::HAS_ONE, 'Particulares', 'clientid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userid' => 'Id de Usuario',
			'nombre' => 'Nombre',
			'telefono' => 'Teléfono',
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

		$criteria->compare('userid',$this->userid,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('telefono',$this->telefono);
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
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
