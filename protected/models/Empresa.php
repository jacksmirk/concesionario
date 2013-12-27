<?php

/**
 * This is the model class for table "tbl_empresas".
 *
 * The followings are the available columns in table 'tbl_empresas':
 * @property string $clientid
 * @property string $cif
 * @property string $nombre_contacto
 *
 * The followings are the available model relations:
 * @property Clientes $client
 */
class Empresa extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_empresas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clientid', 'required'),
			array('clientid', 'length', 'max'=>11),
			array('cif, nombre_contacto', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('clientid, cif, nombre_contacto', 'safe', 'on'=>'search'),
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
			'client' => array(self::BELONGS_TO, 'Clientes', 'clientid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'clientid' => 'Id de Cliente',
			'cif' => 'CIF',
			'nombre_contacto' => 'Persona de Contacto',
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

		$criteria->compare('clientid',$this->clientid,true);
		$criteria->compare('cif',$this->cif,true);
		$criteria->compare('nombre_contacto',$this->nombre_contacto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Empresa the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
