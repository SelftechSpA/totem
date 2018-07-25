<?php

class ResultsController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    //public $layout='//layouts/column2';

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
            array('allow',
                'actions'=>array('index','excel', 'deleteAll'),
                'users'=>Yii::app()->getModule('user')->getAdmins(),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
        
	public function actionExcel()
	{
	    $model=new UserTest('search');
		$this->widget('application.extensions.EExcelView.EExcelView', 
            array(
                'dataProvider'=>new CActiveDataProvider($model, array('pagination'=>false)), 
                'grid_mode'=>'export',
                'title'=>'Title',
                'filename'=>'resultados',
                'stream'=>TRUE,
                'libPath'=>'application.extensions.EExcelView.Classes.PHPExcel',
                'exportType'=>'Excel5', // para usar Excel2007 hay que habilitar la extension php_zip o usar PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP); 
                'autoWidth'=>TRUE,
                'columns'=>array(
                    //'id',
                    'date_taken',
                    array(
                            'header'=>Yii::t('app', 'Test'),
                            'name'=>'test_id',
                            'value'=>'$data->test->name',
                            'filter'=>CHtml::listData(Test::model()->findAll(), 'id', 'name'),
                            ),
                    array(
                        'header'=>'Empresa',
                        //'name'=>'user.profile.company_id',
                        'value'=>'($data->user->profile->company) ? $data->user->profile->company->name : null',
                        'filter'=>CHtml::listData(Company::model()->findAll(), 'id', 'name'),
                    ),
                    array(
                            'header'=>'Usuario',
                            'name'=>'user_id',
                            'value'=>'$data->user->profile->name',
                            'filter'=>CHtml::listData(User::model()->findAll(), 'id', 'profile.name'),
                            ),
                    array(  
                            'name'=>'score',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),
                    array(
                            'header'=>Yii::t('app', 'Age'),
                            'name'=>'age',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),
                    array(
                            'header'=>Yii::t('app', 'Gender'),
                            'name'=>'gender',
                            'value'=>'$data->getGenderText()',
                            'filter'=>CHtml::listData(UserTest::model()->getGendersArray(), 'id', 'name'),
                            ),
                    array(
                            'header'=>'Altura',
                            'name'=>'height',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                
                    array(
                            'header'=>'Peso',
                            'name'=>'weight',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                
                    array(
                            'header'=>'Estado civil',
                            'name'=>'marital_status',
                            'value'=>'$data->getMaritalStatusText()',
                            'filter'=>CHtml::listData(UserTest::model()->getMaritalStatusesArray(), 'id', 'name'),
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                
                    array(
                            'header'=>'Profesión',
                            'name'=>'occupation',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                
                    array(
                            'header'=>'Área laboral',
                            'name'=>'occupation_area',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                
                    array(
                            'header'=>'Nivel de actividad',
                            'name'=>'activity_level',
                            'value'=>'$data->getActivityLevelText()',
                            'filter'=>CHtml::listData(UserTest::model()->getActivityLevelsArray(), 'id', 'name'),
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),
                    array(
                            'header'=>'Hs. sueño días laborales',
                            'name'=>'working_days_sleep_hours',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                
                    array(
                            'header'=>'Hs. sueño deseadas días laborales',
                            'name'=>'working_days_sleep_hours_desired',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                
                    array(
                            'header'=>'Calidad sueño días laborales',
                            'name'=>'working_days_sleep_quality',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                
                    array(
                            'header'=>'Hs. sueño fin de semana',
                            'name'=>'weekend_sleep_hours',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                
                    array(
                            'header'=>'Hs. sueño deseadas fin de semana',
                            'name'=>'weekend_sleep_hours_desired',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                
                    array(
                            'header'=>'Calidad sueño fin de semana',
                            'name'=>'weekend_sleep_quality',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),
                    array(
                            'header'=>'Hs. laborales',
                            'name'=>'working_hours',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ), 
                    array(
                            'header'=>'Hs. ejercicio',
                            'name'=>'exercise_hours',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ), 
                    array(
                            'header'=>'Hs. ocio',
                            'name'=>'recreation_hours',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ), 
                    array(
                            'header'=>'Hs. viaje',
                            'name'=>'travel_hours',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),      
                    array(
                            'header'=>'Desvío estándar (ms)',
                            'value'=>'$data->isReactionTest()?$data->userReactionTests[0]->standardDeviation:""',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),           
                    array(
                            'header'=>'Media 10% más rápido (ms)',
                            'value'=>'$data->isReactionTest()?$data->userReactionTests[0]->meanTopTenPercent:""',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),           
                    array(
                            'header'=>'Media 10% más lento (ms)',
                            'value'=>'$data->isReactionTest()?$data->userReactionTests[0]->meanBottomTenPercent:""',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),   
                    array(
                            'header'=>'Lapsus',
                            'value'=>'$data->isReactionTest()?$data->userReactionTests[0]->crashCount:""',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                         
                    array(
                            'header'=>'Super lapsus',
                            'value'=>'$data->isReactionTest()?$data->userReactionTests[0]->superLapsusCount:""',
                            'htmlOptions'=>array('style'=>'text-align: right;'),
                            ),                                                                 
                )
            ));
	}

	public function actionIndex()
	{
        /*//$this->layout = 'column2'; 
        $criteria = new CDbCriteria;
        $criteria->select = 't.id, t.date_taken, test.name, t.score';
        $criteria->join = 'LEFT JOIN test ON t.test_id = test.id';
        //$criteria->condition = 't.user_id = '.Yii::app()->getModule('user')->user()->id;
        //$criteria->group = 't.id';
        $criteria->order = '2 DESC';
        
        $model = new CActiveDataProvider('UserTest', array(
            'criteria' => $criteria,
            ///'sort'=> false,
            'pagination' => array(
               'pagesize' => PHP_INT_MAX,
            ),
        ));

        $this->render('index', array(
            'model' => $model,
        ));*/
        $model=new UserTest('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['UserTest']))
            $model->attributes=$_GET['UserTest'];

        $this->render('index',array(
            'model'=>$model,
        ));
	}

    public function actionDeleteAll($ok)
    {
        if($ok == 1 && $_SERVER['SERVER_NAME'] == 'http://hss.selfishness.cl'){
            $userTestAnswer = new UserTestAnswer();
            $userTestAnswer->deleteAll();

            $userReactionTestMeasurement = new UserReactionTestMeasurement();
            $userReactionTestMeasurement->deleteAll();

            $userReactionTest = new UserReactionTest();
            $userReactionTest->deleteAll();

            $userTest = new UserTest();
            $userTest->deleteAll();

            $profile = new Profile();
            $profile->deleteAll('user_id <> 1');

            $user = new User();
            $user->deleteAll('id <> 1');

            $this->redirect(array('/results'));
        }
    }

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}