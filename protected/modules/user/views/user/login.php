<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<div class="row span12 center">
<!--<div class="pull-left span5">
    <p>Complete el formulario de registro para comenzar a utilizar el sitio.</p>
    <br>
    <?php $this->widget('bootstrap.widgets.TbButton', array( 
        'buttonType'=>'link', 
        'type'=>'primary', 
        #'label'=>'Crear cuenta', 
        'label'=>'CREAR USUARIO NUEVO', 
        'icon'=>'white plus',
        'url'=>array('/user/registration'),
    )); ?> 
    <br><br>
</div>-->
<div class="center span6">
    
    <h2><span style="color:silver;">TIENES UNA CUENTA? </span> INICIA SESION AHORA </h2>
    
    <?php if(Yii::app()->user->hasFlash('loginMessage')): ?>
    
    <div class="success">
    	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
    </div>
    
    <?php endif; ?>
    
    <!--<p><?php echo UserModule::t("Please fill out the following form with your login credentials:"); ?></p>-->
    
    <div class="form">
    <?php echo CHtml::beginForm(); ?>
    
    	<H5 class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></H5>
    	
    	<?php echo CHtml::errorSummary($model); ?>
    	
    	<div class="span4">
        	<div class="row">
        		<?php echo CHtml::activeLabelEx($model,'username'); ?>
        		<?php echo CHtml::activeTextField($model,'username',array(
                    'style'=>'padding: 10px;
                              font-size: 20px;
                              width: 100%;
                            '
                )) ?>
        	</div>
        	
        	<div class="row">
        		<?php echo CHtml::activeLabelEx($model,'password'); ?>
        		<?php echo CHtml::activePasswordField($model,'password',array(
                    'style'=>'padding: 10px;
                              font-size: 20px;
                              width: 100%;
                            '
                )) ?>
        	</div>
        	
        	<div class="row">
        		<p class="hint">
        		<?php /*echo CHtml::link(UserModule::t("Register"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php */ echo CHtml::link(UserModule::t("Lost Password?"),Yii::app()->getModule('user')->recoveryUrl); ?>
        		</p>
        	</div>
        	
        	<div class="row rememberMe">
        		<?php echo CHtml::activeCheckBox($model,'rememberMe',array('class'=>'pull-left')); ?>
        		<?php echo CHtml::activeLabelEx($model,'rememberMe',array('class'=>'pull-left', 'style'=>'margin-left:5px;')); ?>
        	</div>
            <br>
        	<div class="row submit">
                <?php $this->widget('bootstrap.widgets.TbButton', array( 
                    'buttonType'=>'submit', 
                    'type'=>'primary', 
                    'label'=>UserModule::t('Login'), 
                    'icon'=>'white ok',
                    'htmlOptions' => array(
                        'style'=>'padding:20px; width:100%;font-size:25px;'
                    )

                )); ?>   
            </div>
            <br>
            <div class="row submit">
                <?php $this->widget('bootstrap.widgets.TbButton', array( 
                    'buttonType'=>'link', 
                    'type'=>'primary', 
                    #'label'=>'Crear cuenta', 
                    'label'=>'Crea una cuenta!!', 
                    'icon'=>'white plus',
                    'url'=>array('/user/registration'),
                    'htmlOptions' => array(
                        'style'=>'padding:20px; width:100%;font-size:25px;'
                    )
                )); ?> 
        	</div>
    	</div>
    	
    <?php echo CHtml::endForm(); ?>
    </div><!-- form -->
    
    
    <?php
    $form = new CForm(array(
        'elements'=>array(
            'username'=>array(
                'type'=>'text',
                'maxlength'=>32,
            ),
            'password'=>array(
                'type'=>'password',
                'maxlength'=>32,
            ),
            'rememberMe'=>array(
                'type'=>'checkbox',
            )
        ),
    
        'buttons'=>array(
            'login'=>array(
                'type'=>'submit',
                'label'=>'Login',
            ),
        ),
    ), $model);
?>
</div>
</div>