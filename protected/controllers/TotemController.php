<?php

class TotemController extends Controller
{
    //public $layout='//layouts/totem';
    
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			/*'page'=>array(
				'class'=>'CViewAction',
			),*/
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact',Yii::t('app', 'Thank you for contacting us. We will respond to you as soon as possible.'));
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
    
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
    {
        $this->render('index');
    }
    
    public function actionBegin()
    {
        //throw new CHttpException(403, Rights::t('core', 'You are not authorized to perform this action.'));
        
        Profile::$regMode = true;
        $model = new RegistrationForm;
        $profile=new Profile;

        // ajax validator
        if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form')
        {
            echo UActiveForm::validate(array($model,$profile));
            Yii::app()->end();
        }

        Yii::log("after ajax", CLogger::LEVEL_WARNING, __METHOD__);

        if(isset($_POST['Profile'])) {
            Yii::log("registration is set", CLogger::LEVEL_WARNING, __METHOD__);
            //$model->attributes=$_POST['RegistrationForm'];
            $profile->attributes=((isset($_POST['Profile'])?$_POST['Profile']:array()));
            
            $profile->name = uniqid('totem_');
            $profile->marital_status = 1;
            $profile->activity_level = 2;
            
            $model->username = $profile->name;
            $model->password = 'totem';
            $model->verifyPassword = 'totem';
            $model->email = $profile->name.'@totemhss.com';
            //$model->fixedVerifyCode = '1234';
            //$model->verifyCode = '1234';
            
            if($model->validate() && $profile->validate())
            {
                $soucePassword = $model->password;
                $model->activkey=UserModule::encrypting(microtime().$model->password);
                $model->password=UserModule::encrypting($model->password);
                $model->verifyPassword=UserModule::encrypting($model->verifyPassword);
                $model->superuser=0;
                $model->status=User::STATUS_ACTIVE;

                if ($model->save()) {
                    $profile->user_id=$model->id;
                    $profile->save();
                    
                    $identity=new UserIdentity($model->username,$soucePassword);
                    $identity->authenticate();
                    Yii::app()->user->login($identity,0);
                    $this->redirect(array('totem/test'));
                }
            } else {
                $profile->validate();
            }
        }
        $this->render('begin',array('model'=>$model,'profile'=>$profile));
    }

    public function actionVideo($code)
    {
        $this->render('video', array('code'=>$code));
    }
    
	public function actionAbout()
	{
		$this->render('about');
	}    
    
    
    public function testTaken($test_id){
        $last_tests = UserTest::model()->findAllByAttributes(array('user_id'=>Yii::app()->getUser()->id, 'test_id'=>$test_id));
        return !empty($last_tests);
    }
    
    public function someTestTaken(){
        $last_tests = UserTest::model()->findAllByAttributes(array('user_id'=>Yii::app()->getUser()->id));
        return !empty($last_tests);
    }

    public function allTestsTaken(){
        return $this->testTaken(1) && $this->testTaken(2) && $this->testTaken(3) && $this->testTaken(4);
    }
    
	public function actionTest()
	{
        if (Yii::app()->user->isGuest){
            $this->redirect(array('/totem/index'));
            return;
        }
        if ($this->allTestsTaken()){
            $this->redirect(array('/totem/results'));
            return;
        }
        $searchModel = UserTest::model();
        $searchModel->user_id = Yii::app()->getUser()->id;
        $this->render('test', array('results'=>$searchModel));
	}
    
    function ensureTestExists($t){
        if (empty($t)){
            $t = new UserTest();
            $t->date_taken = '';
        } else {
            $t->score = round($t->score, 1);
        }
        return $t;
    }

    public function actionResults(){
        if (Yii::app()->user->isGuest){
            $this->redirect(array('/totem/index'));
        } else {            
            $lastPittsburghTest = $this->ensureTestExists(PittsburghTest::model()->findByAttributes(array('user_id'=>Yii::app()->getUser()->id, 'test_id'=>1), array('limit'=>1, 'order'=>'date_taken DESC')));
            $lastMapTest        = $this->ensureTestExists(MAPTest::model()->findByAttributes(array('user_id'=>Yii::app()->getUser()->id, 'test_id'=>2), array('limit'=>1, 'order'=>'date_taken DESC')));
            $lastEpworthTest    = $this->ensureTestExists(EpworthTest::model()->findByAttributes(array('user_id'=>Yii::app()->getUser()->id, 'test_id'=>3), array('limit'=>1, 'order'=>'date_taken DESC')));
            $lastReactionTest   = $this->ensureTestExists(UserTest::model()->findByAttributes(array('user_id'=>Yii::app()->getUser()->id, 'test_id'=>4), array('limit'=>1, 'order'=>'date_taken DESC')));

            $this->render('resultsSheet', array(
                'lastPittsburghTest'=>$lastPittsburghTest,
                'lastMapTest'=>$lastMapTest,
                'lastEpworthTest'=>$lastEpworthTest,
                'lastReactionTest'=>$lastReactionTest,
            ));
        }
    }
}