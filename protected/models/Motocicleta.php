<?php

/**
 * This is the model class for table "tbl_motocicletas".
 *
 * The followings are the available columns in table 'tbl_motocicletas':
 * @property string $vehiculoid
 * @property integer $num_ruedas
 *
 * The followings are the available model relations:
 * @property Vehiculos $vehiculo
 */
class Motocicleta extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_motocicletas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num_ruedas', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vehiculoid, num_ruedas', 'safe', 'on'=>'search'),
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
			'vehiculo' => array(self::BELONGS_TO, 'Vehiculos', 'vehiculoid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vehiculoid' => 'Id de Vehículo',
			'num_ruedas' => 'Número de Ruedas',
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

		$criteria->compare('vehiculoid',$this->vehiculoid,true);
		$criteria->compare('num_ruedas',$this->num_ruedas);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Motocicleta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
