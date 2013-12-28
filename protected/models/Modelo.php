<?php

/**
 * This is the model class for table "tbl_modelos".
 *
 * The followings are the available columns in table 'tbl_modelos':
 * @property string $id
 * @property string $fabricanteid
 * @property string $nombre
 * @property string $fecha_alta
 * @property string $fecha_mod
 *
 * The followings are the available model relations:
 * @property Fabricantes $fabricante
 * @property Vehiculos[] $vehiculoses
 */
class Modelo extends CActiveRecord
{
    public $fabricante_nombre;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_modelos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fabricanteid, fecha_alta', 'required'),
			array('fabricanteid', 'length', 'max'=>11),
			array('nombre', 'length', 'max'=>45),
			array('fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, fabricanteid, fabricante_nombre, nombre, fecha_alta, fecha_mod', 'safe', 'on'=>'search'),
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
			'fabricante' => array(self::BELONGS_TO, 'Fabricante', 'fabricanteid'),
			'vehiculos' => array(self::HAS_MANY, 'Vehiculo', 'modeloid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'fabricanteid' => 'Id de Fabricante',
            'fabricante_nombre' => 'Fabricante',
			'nombre' => 'Nombre',
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
        $criteria->alias='Modelo';
        $criteria->together=true;
        $criteria->with=array('fabricante');
		$criteria->compare('Modelo.id',$this->id,true);
		$criteria->compare('Modelo.fabricanteid',$this->fabricanteid,true);
        $criteria->compare('fabricante.nombre', $this->fabricante_nombre,true);
		$criteria->compare('Modelo.nombre',$this->nombre,true);
		$criteria->compare('Modelo.fecha_alta',$this->fecha_alta,true);
		$criteria->compare('Modelo.fecha_mod',$this->fecha_mod,true);

        // Create a custom sort
        $sort=new CSort;
        $sort->attributes=array(
            'fabricanteid',
            // For each relational attribute, create a 'virtual attribute' using the public variable name
            'fabricante_nombre' => array(
                'asc' => 'fabricante.nombre',
                'desc' => 'fabricante.nombre DESC',
                'label' => 'Fabricante',
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
	 * @return Modelo the static model class
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

    public function getFabricanteModelo(){
        $fabricante = Fabricante::model()->findByPk($this->fabricanteid);
        return $fabricante->nombre . ' ' . $this->nombre;
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
