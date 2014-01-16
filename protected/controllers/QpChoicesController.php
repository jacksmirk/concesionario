<?php

class QpChoicesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
	public function actionCreate($question_id)
	{
		$model=new QpChoices;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QpChoices']))
		{
			$model->attributes=$_POST['QpChoices'];

            //Check and change Order
            $sameOrder=QpChoices::model()->findByAttributes(array('order_number'=>$model->order_number));
            if($sameOrder!=null){
                $this->changeOrderFrom($model->order);
            }
            if(!is_numeric($model->destination_page_id))
                $model->destination_page_id=null;
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
        if($question_id!=null){
            $question=QpQuestions::model()->findByPk($question_id);
            //$model->page_id=$page->id;
            //$model->page_number=$page->page_number;
            $pages=QpPages::model()->findAllByAttributes(array('quickpoll_id'=>$question->page->quickpoll_id));
            $model->pages_array=CHtml::listData($pages,'id','page_number');

            $count_choices=$model->countByAttributes(array('question_id'=>$question_id));
            for($i=0; $i<=$count_choices;$i++){
                $model->order_array[$i]=$i + 1;
            }
            $model->order_number=$count_choices;
        }
        if($question_id!=null)
            $model->question_id=$question_id;

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
        $currentOrder=$model->order_number;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QpChoices']))
		{
			$model->attributes=$_POST['QpChoices'];
            if($currentOrder!=$model->order_number)
                $this->changeOrderOnUpdate($currentOrder,$model->order_number);

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

        $count_choices=$model->countByAttributes(array('question_id'=>$model->question_id));
        for($i=0; $i<$count_choices;$i++){
            $model->order_array[$i]=$i + 1;
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
	public function actionIndex($question_id)
	{
        //$question=QpPages::model()->findByPk($question_id);

        $criteria = new CDbCriteria();
        $criteria->condition = 'question_id=:question_id';
        $criteria->params = array(':question_id'=>$question_id);

        $dataProvider=new CActiveDataProvider('QpChoices', array(
            'criteria'=>$criteria,
            'sort'=>array('defaultOrder'=>'order_number',),
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
		$model=new QpChoices('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['QpChoices']))
			$model->attributes=$_GET['QpChoices'];

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
		$model=QpChoices::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
        $model->orden=$model->order_number+1;

        return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='qp-choices-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function changeOrderOnCreate($newOrder){
        $correct=true;
        $choices=QpChoices::model()->findAll();
        foreach($choices as $choice){
            if($choice->order_number>=$newOrder){
                $choice->order_number++;
                if(!$choice->save())
                    !$correct;
            }
        }
        return $correct;
    }

    public function changeOrderOnUpdate($currentOrder, $newOrder){
        $correct=true;
        if($currentOrder>$newOrder){
            $choices=QpChoices::model()->findAll();
            foreach($choices as $choice){
                if($choice->order_number>=$newOrder and $choice->order_number<$currentOrder){
                    $choice->order_number++;
                    if(!$choice->save())
                        !$correct;
                }
            }
        }elseif($currentOrder<$newOrder){
            $choices=QpChoices::model()->findAll();
            foreach($choices as $choice){
                if($choice->order_number<=$newOrder and $choice->order_number>$currentOrder){
                    $question->order_number--;
                    if(!$choice->save())
                        !$correct;
                }
            }
        }
        return $correct;
    }
}
