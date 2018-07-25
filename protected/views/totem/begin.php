<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>

<script type="text/javascript" src="js/spinedit/bootstrap-spinedit.js"></script>
<link rel="stylesheet" type="text/css" href="js/spinedit/bootstrap-spinedit.css" />

<script>    
    var currentScreen = 1;
    var num_screens = 2;
    
    function heightFormatter(value){
        return value.toFixed(2) + ' m';
    }
    function weightFormatter(value){
        return value.toFixed(0) + ' kg';
    }
    function ageFormatter(value){
        return value.toFixed(0) + ' años';
    }
    function heightChange(value){
        $('input[name="Profile[height]"]').val($("#Profile_height").data("slider").getValue().toFixed(2));
    }
    function previous(){
        currentScreen--;
        showScreen(currentScreen);
    }
    function next(){
        $('#Registration_submit').click();
    }
    function showScreen(id){
        $('.screen').removeClass('active');
        $('#screen'+id).addClass('active');
    }
    
    function onFormValidate(form, data, hasError){
        console.log(hasError);
        if (hasError){
            for(var s=1; s<currentScreen+1; s++){
                var errors = $('#screen'+s).find('.errorMessage:visible');

                console.log(errors);
                if (errors.length > 0){
                    showScreen(s);
                    return;
                }
            }
        }

        currentScreen++;
        if (currentScreen < num_screens+1){
            $('.screen').find('.errorMessage').hide();
            showScreen(currentScreen);
            return false;
        }else{
            document.getElementById('registration-form').submit();
        }    
    }
</script>

<div class="row-fluid span12 center">
    <span class="span12" style="margin-top: 0px; text-align: center;">
        <?php if(Yii::app()->user->hasFlash('registration')): ?>
        <div class="success">
        <?php echo Yii::app()->user->getFlash('registration'); ?>
        </div>
        <?php else: ?>
        
        <div class="form">
        <?php $form=$this->beginWidget('UActiveForm', array(
            'id'=>'registration-form',
            'enableAjaxValidation'=>true,
            //'enableClientValidation'=>true,
            'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
            //'disableClientValidationAttributes'=>array('RegistrationForm_verifyCode'),
            'clientOptions'=>array(
                'validateOnSubmit'=>true,
                'afterValidate'=>'js:onFormValidate',
                'validateOnChange'=>false,
            ),    
            'htmlOptions' => array('enctype'=>'multipart/form-data'),
        )); ?>
            
            <?php //echo $form->errorSummary(array($model,$profile)); ?>
            
            <div class="wizard">
                <div id="screen1" class="screen active" style="margin-top: 0px;">
                    <!--<input type="hidden" name="Profile[company_id]" value="<?php echo isset($_COOKIE['hss_company'])?$_COOKIE['hss_company']:""; ?>">-->
                    <?php echo $form->hiddenField($profile, 'company_id', array('value'=>isset($_COOKIE['hss_company'])?$_COOKIE['hss_company']:"")); ?>
                    <input type="hidden" name="totem" id="totem" value="1" />

                    <div class="row-fluid">
                        <div class="span4">
                            <div class="row">
                                <?php
                                echo $form->labelEx($profile, 'gender');
                                echo '<div class="form-inline form-inline-radios">';
                                echo $form->radioButtonList($profile, 'gender', array(
                                    '1'=>CHtml::image(Yii::app()->baseUrl . '/images/ico_male.png'),
                                    '2'=>CHtml::image(Yii::app()->baseUrl . '/images/ico_female.png'),
                                ), array('separator'=>''));
                                echo '</div>';
                                echo $form->error($profile, 'gender');
                                ?>
                                <div class="touch-hint"></div>
                            </div>

                            <div class="row">
                                <?php
                                echo $form->labelEx($profile, 'marital_status').'<br>';
                                echo $form->dropDownList($profile, 'marital_status', array('1'=>'Soltero', '2'=>'Casado', '3'=>'Divorciado', '4'=>'Viudo'), array('prompt'=>'Seleccione una opción'));
                                echo $form->error($profile, 'marital_status');
                                ?>
                            </div>

                            <div class="row">
                                <?php
                                echo $form->labelEx($profile, 'working_days_sleep_quality').'<br>';
                                echo $form->dropDownList($profile, 'working_days_sleep_quality', array('1'=>'Muy mala', '2'=>'Mala', '3'=>'Buena', '4'=>'Muy buena'), array('prompt'=>'Seleccione una opción'));
                                echo $form->error($profile, 'working_days_sleep_quality');
                                ?>
                            </div>
                        </div>

                        <div class="span4">
                            <div style="/*position: absolute; top: 50px; left: 800px;*/ text-align: center;">
                                <?php echo CHtml::image(Yii::app()->baseUrl . '/images/ico_registration.png'); ?>
                                <h1>Datos personales</h1>
                                <h4>Complete el formulario</h4>
                            </div>
                        </div>

                        <div class="span4">
                            <div class="row">
                                <?php echo $form->labelEx($profile, 'height'); ?>
                                <input type="text" class="spinEditHeight" name="Profile[height]" id="Profile_height" value="" readonly>
                                <?php  echo $form->error($profile, 'height'); ?>
                            </div>

                            <div class="row">
                                <?php echo $form->labelEx($profile, 'weight'); ?>
                                <input type="text" class="spinEditWeight" name="Profile[weight]" id="Profile_weight" value="" readonly>
                                <?php echo $form->error($profile, 'weight'); ?>
                            </div>
                            <div class="row">
                                <?php echo $form->labelEx($profile, 'age'); ?>
                                <input type="text" class="spinEditAge" name="Profile[age]" id="Profile_age" value="" readonly>
                                <?php echo $form->error($profile, 'age'); ?>
                            </div>

                            <button type="button" class="btn btn-large btn-green" onclick="next();">Continuar&nbsp;<i class="icon-chevron-right icon-white"></i></button>
                        </div>
                    </div>
                    

                </div>
                <div id="screen2" class="screen" style="margin-top: 60px;">
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="row">
                                <?php
                                echo $form->labelEx($profile, 'occupation_id');
                                echo $form->dropDownList($profile, 'occupation_id', CHtml::listData(Occupation::model()->findAll(), 'id', 'name'), array('prompt'=>'Seleccione una opción'));
                                echo $form->error($profile, 'occupation_id');
                                ?>
                            </div>

                            <div class="row">
                                <?php
                                echo $form->labelEx($profile, 'activity_level');
                                echo '<div class="form-inline form-inline-radios">';
                                echo $form->radioButtonList($profile, 'activity_level', array(
                                    '1'=>CHtml::image(Yii::app()->baseUrl . '/images/ico_activity_low.png', 'Sedentario', array('title'=>'Sedentario')),
                                    '2'=>CHtml::image(Yii::app()->baseUrl . '/images/ico_activity_medium.png', 'Normal', array('title'=>'Normal')),
                                    '3'=>CHtml::image(Yii::app()->baseUrl . '/images/ico_activity_high.png', 'Muy activo', array('title'=>'Muy activo')),
                                ), array('separator'=>''));
                                echo '</div>';
                                echo $form->error($profile, 'activity_level');
                                ?>
                            </div>
                        </div>
                        <div class="span4">
                            <div style="/*position: absolute; top: 50px; left: 800px;*/ text-align: center;">
                                <?php echo CHtml::image(Yii::app()->baseUrl . '/images/ico_registration.png'); ?>
                                <h1>Datos personales</h1>
                                <h4>Complete el formulario</h4>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="row">
                                <?php
                                echo $form->labelEx($profile, 'working_days_sleep_hours').'<br>';
                                //echo '&nbsp;&nbsp;&nbsp;';
                                $this->widget('bootstrap.widgets.TbTimePicker',
                                    array(
                                        'model'=>$profile,
                                        'attribute'=>'working_days_sleep_hours',
                                        'options' => array(
                                            'defaultTime' => '0:00',
                                            'noAppend' => true, // mandatory
                                            'disableFocus' => true, // mandatory
                                            'showMeridian' => false, // irrelevant
                                            'showInputs' => false,
                                            'disableFocus' => true
                                        ),
                                        'htmlOptions'=>array('style'=>'width: 40px;'),
                                    )
                                );
                                echo $form->error($profile, 'working_days_sleep_hours');
                                ?>
                            </div>

                            <div class="row">
                                <?php
                                echo $form->labelEx($profile, 'working_days_sleep_hours_desired').'<br>';
                                //echo '&nbsp;&nbsp;&nbsp;';
                                $this->widget('bootstrap.widgets.TbTimePicker',
                                    array(
                                        'model'=>$profile,
                                        'attribute'=>'working_days_sleep_hours_desired',
                                        'options' => array(
                                            'defaultTime' => '0:00',
                                            'noAppend' => true, // mandatory
                                            'disableFocus' => true, // mandatory
                                            'showMeridian' => false, // irrelevant
                                            'showInputs' => false,
                                            'disableFocus' => true
                                        ),
                                        'htmlOptions'=>array('style'=>'width: 40px;'),
                                    )
                                );
                                echo $form->error($profile, 'working_days_sleep_hours_desired');
                                ?>
                            </div>
                            <button type="button" class="btn btn-large btn-green" onclick="next();">Continuar&nbsp;<i class="icon-chevron-right icon-white"></i></button>
                        </div>
                    </div>

                </div>
            </div>
            
            
        <?php /*$this->widget('bootstrap.widgets.TbButton', array( 
            'buttonType'=>'submit', 
            'type'=>'primary', 
            'size'=>'large',
            'label'=>UserModule::t('Register'), 
            'icon'=>'white ok',
        ));*/ ?>
        <button id="Registration_submit" type="submit" class="btn btn-green btn-large hidden">Siguiente</button>
        <?php //echo CHtml::link('Continuar', array("totem/begin"), array("class"=>"btn btn-green btn-large")); ?>            
        
        <?php $this->endWidget(); ?>
        </div><!-- form -->
        <?php endif; ?>
        
        
    </span>

</div>

<script>
    $(document).ready(function(){
        $('.spinEditHeight').spinedit({
            minimum: 0,
            maximum: 3,
            step: 0.01,
            value: 1.5,
            numberOfDecimals: 2
        });
        $('.spinEditWeight').spinedit({
            minimum: 0,
            maximum: 600,
            step: 0.50,
            value: 60,
            numberOfDecimals: 2
        });
        $('.spinEditAge').spinedit({
            minimum: 0,
            maximum: 120,
            step: 1,
            value: 30,
            numberOfDecimals: 0
        });
    });
</script>