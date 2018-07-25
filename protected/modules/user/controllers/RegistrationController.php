<?php

class RegistrationController extends Controller
{
	public $defaultAction = 'registration';
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xECF0F1,//0xFFFFFF,
			),
		);
	}
	/**
	 * Registration user
	 */
	public function actionRegistration() {
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

        if (Yii::app()->user->id) {
            $this->redirect(Yii::app()->controller->module->profileUrl);
        } else {
            if(isset($_POST['RegistrationForm'])) {
                $model->attributes=$_POST['RegistrationForm'];
                $profile->attributes=((isset($_POST['Profile'])?$_POST['Profile']:array()));
                if($model->validate()&&$profile->validate())
                {
                    $soucePassword = $model->password;
                    $model->activkey=UserModule::encrypting(microtime().$model->password);
                    $model->password=UserModule::encrypting($model->password);
                    $model->verifyPassword=UserModule::encrypting($model->verifyPassword);
                    $model->superuser=0;
                    $model->status=((Yii::app()->controller->module->activeAfterRegister)?User::STATUS_ACTIVE:User::STATUS_NOACTIVE);

                    if ($model->save()) {
                        $profile->user_id=$model->id;
                        $profile->save();
                        if (Yii::app()->controller->module->sendActivationMail) {
                            $activation_url = $this->createAbsoluteUrl('/user/activation/activation',array("activkey" => $model->activkey, "email" => $model->email));
                            UserModule::sendMail($model->email,UserModule::t("You registered from {site_name}",array('{site_name}'=>Yii::app()->name)),UserModule::t("Please activate you account go to {activation_url}",array('{activation_url}'=>$activation_url)));
                        }else{
                            UserModule::sendMail($model->email, "Bienvenido a ".Yii::app()->name, 
                                "Te damos la bienvenida a la <strong>Primera Estación Interactiva de Sueño Saludable</strong>, que permitirá evaluar cómo descansás y te enseñará a manejar y equilibrar tus ritmos biológicos.<br><br>"
                                ."Te recordamos tus datos de acceso, guárdalos en un lugar seguro:<br>- Usuario: ".$model->username."<br>- Contraseña: ".$soucePassword."<br><br>"
                                ."<strong>La falta de sueño adecuado es un factor de riesgo en las sociedades modernas</strong>, y al igual que la inactividad física, la nutrición inadecuada, el tabaquismo y el consumo excesivo de alcohol, atenta contra nuestra salud, rendimiento y seguridad.<br>
<strong>Recordá que la duración y la calidad de nuestro descanso resultan vitales</strong> para obtener la mejor versión de nosotros mismos, mejorar nuestras capacidades adaptativas y generativas y maximizar nuestro potencial, tanto en la vida personal como en la laboral.<br>
<br>
Diseño y desarrollo: Drom Cronobiología.<br>
Conocenos en <a href=\"http://www.dromcronobiologia.com.ar\">www.dromcronobiologia.com.ar</a>, donde podrás acceder a más información, videos, notas, publicaciones científicas  y conocer las soluciones que llevamos a las empresas para mejorar la gestión de las personas desde el conocimiento científico.
");
                        }

                        if ((Yii::app()->controller->module->loginNotActiv||(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false))&&Yii::app()->controller->module->autoLogin) {
                                $identity=new UserIdentity($model->username,$soucePassword);
                                $identity->authenticate();
                                Yii::app()->user->login($identity,0);
                                $this->redirect(Yii::app()->controller->module->returnUrl);
                        } else {
                            if (!Yii::app()->controller->module->activeAfterRegister&&!Yii::app()->controller->module->sendActivationMail) {
                                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Contact Admin to activate your account."));
                            } elseif(Yii::app()->controller->module->activeAfterRegister&&Yii::app()->controller->module->sendActivationMail==false) {
                                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please {{login}}.",array('{{login}}'=>CHtml::link(UserModule::t('Login'),Yii::app()->controller->module->loginUrl))));
                            } elseif(Yii::app()->controller->module->loginNotActiv) {
                                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email or login."));
                            } else {
                                Yii::app()->user->setFlash('registration',UserModule::t("Thank you for your registration. Please check your email."));
                            }
                            $this->refresh();
                        }
                    }
                } else $profile->validate();
            }
            $this->render('/user/registration',array('model'=>$model,'profile'=>$profile));
        }
	}
}