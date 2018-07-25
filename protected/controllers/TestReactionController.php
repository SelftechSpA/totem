<?php

class TestReactionController extends Controller
{

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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create'),
				'users'=>array('@'),
			),
			/*array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array(),
				'users'=>Yii::app()->getModule('user')->getAdmins(),
			),*/
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
		$user_reaction_test=new UserReactionTest;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReactionTest']))
		{
			$user_reaction_test->attributes=$_POST['ReactionTest'];
            
            // filtrar mediciones y calcular estadisticas
            $missedCount = 0;
            $crashCount = 0;
            $measurements = $_POST['ReactionTest']['userReactionTestMeasurements'];
            $valid_measurements = array();
            foreach($measurements as $m){
                $value = (int)$m;
                
                if ($value == -1) {
                    $missedCount++;
                    continue;
                }
                if ($value >= 500) {
                    $crashCount++;
                }
                array_push($valid_measurements, $value);
            }
            
            $average = (array_sum($valid_measurements) + 600 * $missedCount) / (count($valid_measurements) + $missedCount);
            
            // agregar a la db
            $transaction = Yii::app()->db->beginTransaction();
            try{
                $user_test = new UserTest();
                $user_test->user_id = Yii::app()->user->id;
                $user_test->test_id = 4;
                $user_test->date_taken = new CDbExpression('NOW()');
                $user_test->score = round($average, 4);
                if (!$user_test->save()){
                    throw new CDbException('No se pudo guardar el resultado del test!');
                }
                
                $user_reaction_test->user_test_id = $user_test->id;
                $user_reaction_test->missed_count = $missedCount;
                $user_reaction_test->crash_count = $crashCount;   
                $user_reaction_test->time_now = round($user_reaction_test->time_now, 4);             
                
                if (!$user_reaction_test->save()){
                    throw new CDbException('No se pudo guardar el resultado del test!');
                }
                
                foreach($valid_measurements as $m){
                    $answer = new UserReactionTestMeasurement;
                    $answer->user_reaction_test_id = $user_reaction_test->id;
                    $answer->value = (int)$m;
    
                    if (!$answer->save())
                        throw new CDbException('No se pudo guardar el resultado del test!');
                }
                $transaction->commit();
            }catch(Exception $e){
                $transaction->rollBack();
                throw $e;
                return false;
            }
            
            /*print_r($user_reaction_test->attributes);
            die();*/
			if($user_reaction_test->save()){
				//$this->redirect(array('view','id'=>$user_reaction_test->id));
				echo $user_test->id;
                die();
            }
		}

		$this->render('create',array(
			'model'=>$user_reaction_test,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	/*public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReactionTest']))
		{
			$model->attributes=$_POST['ReactionTest'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}*/

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	/*public function actionDelete($id)
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
	}*/

	/**
	 * Lists all models.
	 */
	/*public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ReactionTest');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}*/

	/**
	 * Manages all models.
	 */
	/*public function actionAdmin()
	{
		$model=new ReactionTest('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReactionTest']))
			$model->attributes=$_GET['ReactionTest'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}*/
    
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=UserTest::model()->findByPk($id);
		if($model===null || count($model->userReactionTests) == 0)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model->userReactionTests[0];
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	/*protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='scene-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}*/
}
