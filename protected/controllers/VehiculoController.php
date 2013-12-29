<?php

class VehiculoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('index','view'),
                'users'=>array('*'),
            ),
            /*array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('create'),
                'users'=>array('@'),
            ),*/
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions'=>array('update','create','dynamicmodelos'),
                'users'=>array('encargado'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions'=>array('admin','delete', 'update','create','dynamicmodelos'),
                'users'=>array('admin'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Vehiculo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vehiculo']))
		{
			$model->attributes=$_POST['Vehiculo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Vehiculo']))
		{
			$model->attributes=$_POST['Vehiculo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria = new CDbCriteria();
        $criteria->with=array(
            'fabricante',
            'modelo',
            'motor',
            'tipomotor',
        );
        $sort=new CSort;
        $sort->attributes=array(
            'motorid',
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


        $dataProvider=new CActiveDataProvider('Vehiculo', array(
            'criteria'=>$criteria,
            'sort'=>$sort,
        ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Vehiculo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Vehiculo']))
			$model->attributes=$_GET['Vehiculo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Vehiculo::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='vehiculo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function actionDynamicmodelos()
    {
        $data=Modelo::model()->findAll('fabricanteid=:fabricanteid',
            array(':fabricanteid'=>(int) $_POST['Vehiculo']['fabricanteid']));

        $data=CHtml::listData($data,'id','nombre');
        foreach($data as $value=>$name)
        {
            echo CHtml::tag('option',
                array('value'=>$value),CHtml::encode($name),true);
        }
    }
}
