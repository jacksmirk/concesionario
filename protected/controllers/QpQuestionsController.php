<?php

class QpQuestionsController extends Controller
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
        $model=$this->loadModel($id);

		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($page_id)
	{
		$model=new QpQuestions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QpQuestions']))
		{
			$model->attributes=$_POST['QpQuestions'];

            //Check and change Order
            $sameOrder=QpQuestions::model()->findByAttributes(array('order_number'=>$model->order_number));
            if($sameOrder!=null){
                $this->changeOrderFrom($model->order);
            }
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
        if($page_id!=null){
            $page=QpPages::model()->findByPk($page_id);
            $model->page_id=$page->id;
            $model->page_number=$page->page_number;
            $count_questions=$model->countByAttributes(array('page_id'=>$page_id));
            for($i=0; $i<=$count_questions;$i++){
                $model->order_array[$i]=$i + 1;
            }
            $model->order_number=$count_questions;
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
        $currentOrder=$model->order_number;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QpQuestions']))
		{
			$model->attributes=$_POST['QpQuestions'];
            //Order change
            if($currentOrder!=$model->order_number)
                $this->changeOrderOnUpdate($currentOrder,$model->order_number);

			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

        $count_questions=$model->countByAttributes(array('page_id'=>$model->page_id));
        for($i=0; $i<$count_questions;$i++){
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
	public function actionIndex($page_id)
	{
        $page=QpPages::model()->findByPk($page_id);

        $criteria = new CDbCriteria();
        $criteria->condition = 'page_id=:page_id';
        $criteria->params = array(':page_id'=>$page_id);

        $dataProvider=new CActiveDataProvider('QpQuestions', array(
            'criteria'=>$criteria,
            'sort'=>array('defaultOrder'=>'order_number',),
        ));


		$this->render('index',array(
			'dataProvider'=>$dataProvider,
            'page_id'=>$page_id,
            'page_number'=>$page->page_number,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new QpQuestions('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['QpQuestions']))
			$model->attributes=$_GET['QpQuestions'];

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
		$model=QpQuestions::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
        $answer=QpAnswerType::model()->findByPk($model->answer_type_id);
        if($answer!=null){
            $model->answer_type_name= $answer->name;
            $model->answer_type_description= $answer->description;
        }
        $page=QpPages::model()->findByPk($model->page_id);
        if($page!=null){
            $model->page_number=$page->page_number;
        }
        $model->orden=$model->order_number+1;
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='qp-questions-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    public function changeOrderOnCreate($newOrder){
        $correct=true;
        $questions=QpQuestions::model()->findAll();
        foreach($questions as $question){
            if($question->order_number>=$newOrder){
                $question->order_number++;
                if(!$question->save())
                    !$correct;
            }
        }
        return $correct;
    }

    public function changeOrderOnUpdate($currentOrder, $newOrder){
        $correct=true;
        if($currentOrder>$newOrder){
            $questions=QpQuestions::model()->findAll();
            foreach($questions as $question){
                if($question->order_number>=$newOrder and $question->order_number<$currentOrder){
                    $question->order_number++;
                    if(!$question->save())
                        !$correct;
                }
            }
        }elseif($currentOrder<$newOrder){
            $questions=QpQuestions::model()->findAll();
            foreach($questions as $question){
                if($question->order_number<=$newOrder and $question->order_number>$currentOrder){
                    $question->order_number--;
                    if(!$question->save())
                        !$correct;
                }
            }
        }
        return $correct;
    }
}
