<?php

/**
 * This is the model class for table "tbl_fabricantes".
 *
 * The followings are the available columns in table 'tbl_fabricantes':
 * @property string $id
 * @property string $nombre
 * @property integer $telefono
 * @property string $email
 * @property string $fecha_alta
 * @property string $fecha_mod
 *
 * The followings are the available model relations:
 * @property Modelos[] $modeloses
 * @property Vehiculos[] $vehiculoses
 */
class Fabricante extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_fabricantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_alta', 'required'),
			array('telefono', 'numerical', 'integerOnly'=>true),
			array('nombre, email', 'length', 'max'=>45),
			array('fecha_mod', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nombre, telefono, email, fecha_alta, fecha_mod', 'safe', 'on'=>'search'),
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
			'modelos' => array(self::HAS_MANY, 'Modelo', 'fabricanteid'),
			'vehiculos' => array(self::HAS_MANY, 'Vehiculo', 'fabricanteid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'telefono' => 'Teléfono',
			'email' => 'Email',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('telefono',$this->telefono);
		$criteria->compare('email',$this->email,true);
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
	 * @return Fabricante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
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
