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
 * @property TipoMotor $tipomotor
 * @property Vehiculos[] $vehiculos
 */

class Motor extends CActiveRecord
{
    public $tipomotor_tipo;
    public $tipomotor_fuente;

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
			array('id, tipomotorid, tipomotor_tipo, tipomotor_fuente, cilindrada, potencia, consumo, emisiones, fecha_alta, fecha_mod', 'safe', 'on'=>'search'),
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
			'tipomotor' => array(self::BELONGS_TO, 'TipoMotor', 'tipomotorid'),

			'vehiculos' => array(self::HAS_MANY, 'Vehiculo', 'motorid'),
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
            'tipomotor_tipo'=>'Tipo de Motor',
            'tipomotor_fuente'=>'Fuente de Energía',
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
        $criteria->alias='Motor';
        $criteria->together=true;
        $criteria->with=array('tipomotor');
		$criteria->compare('Motor.id',$this->id,true);
		$criteria->compare('Motor.tipomotorid',$this->tipomotorid,true);
        $criteria->compare('tipomotor.tipo',$this->tipomotor_tipo,true);
        $criteria->compare('tipomotor.fuente', $this->tipomotor_fuente);
		$criteria->compare('Motor.cilindrada',$this->cilindrada);
		$criteria->compare('Motor.potencia',$this->potencia);
		$criteria->compare('Motor.consumo',$this->consumo);
		$criteria->compare('Motor.emisiones',$this->emisiones);
		$criteria->compare('Motor.fecha_alta',$this->fecha_alta,true);
		$criteria->compare('Motor.fecha_mod',$this->fecha_mod,true);

        // Create a custom sort
        $sort=new CSort;
        $sort->attributes=array(
            'tipomotorid',
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
	 * @return Motor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public function getListaTipos() {
        $tipos = TipoMotor::model()->findAll();
        $listaTipos = CHtml::listData($tipos,'id','tipoCompleto');
        return $listaTipos;
    }

    public function getMotorCompleto(){
        $tipo = TipoMotor::model()->findByPk($this->tipomotorid);
        return $tipo->tipo . ' ' . $tipo->fuente . ' ' . $this->cilindrada . 'cc ' . $this->potencia . 'CV ' . $this->consumo . 'l/100km ' . $this->emisiones . 'g/km';
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

        return parent::beforeValidate();
    }
}
