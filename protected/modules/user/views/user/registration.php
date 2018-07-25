
<script>
    var currentScreen = 1;

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
        var fields = [
                      ['Profile_gender', 'Profile_height', 'Profile_weigth', 'Profile_age', 'Profile_marital_status', 'Profile_occupation', 'Profile_occupation_area'],
                      ['Profile_activity_level', 'Profile_working_days_sleep_hours', 'Profile_working_days_sleep_hours_desired', 'Profile_working_days_sleep_quality', 'Profile_weekend_sleep_hours', 'Profile_weekend_sleep_hours_desired'],
                      ['RegistrationForm_username', 'RegistrationForm_password', 'RegistrationForm_verifyPassword', 'RegistrationForm_email'],
                      []];
        if (hasError){
            //console.log(data);

            for (var s=1; s<currentScreen+1; s++){
                var errors = $('#screen'+s).find('.errorMessage:visible');
                if (errors.length > 0){
                    showScreen(s);
                    console.log(errors);
                    return;
                }
            }

            //for (var f=0; f<data.length; f++){
            /*    for (var s=0; s<fields.length && s<screen; s++){
                    for (var f=0; f<fields[s].length; f++){
                        if (data[fields[s][f]]){
                        //if ($.inArray(data[f], fields[s])){
                            return;
                        }
                    }
                }*/
            //}
        }
        currentScreen++;
        if (currentScreen < 4){
            $('.screen').find('.errorMessage').hide();
            showScreen(currentScreen);
        }else{
            document.getElementById('registration-form').submit();
        }
    }
</script>
<?php $this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Registration");
$this->breadcrumbs=array(
	UserModule::t("Registration"),
);
?>

<div class="form-centered">
<div class="header">
<h1>
<?php echo CHtml::image(Yii::app()->baseUrl . '/images/ico_registration.png'); ?><br>

<?php echo UserModule::t("Registration"); ?></h1>
</div>
<div class="content">

<?php if(Yii::app()->user->hasFlash('registration')): ?>
<div class="success">
<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>
<?php else: ?>

<div class="form">
<?php $form=$this->beginWidget('UActiveForm', array(
	'id'=>'registration-form',
	'enableAjaxValidation'=>true,
	'disableAjaxValidationAttributes'=>array('RegistrationForm_verifyCode'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
        'afterValidate'=>'js:onFormValidate',
        'validateOnChange'=>false,
	),
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php //echo $form->errorSummary(array($model,$profile)); ?>

	<div class="wizard">
	    <div id="screen1" class="screen active">
            <h1>Datos personales </h1>

            <!--<input type="hidden" name="Profile[company_id]" value="<?php echo isset($_COOKIE['hss_company'])?$_COOKIE['hss_company']:""; ?>">-->
            <?php echo $form->hiddenField($profile, 'company_id', array('value'=>isset($_COOKIE['hss_company'])?$_COOKIE['hss_company']:"")); ?>

            <div class="row">
            <?php
                echo $form->labelEx($profile, 'name');
                echo $form->textField($profile, 'name');
                echo $form->error($profile, 'name');
            ?>
            </div>

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
            </div>
            <!--<dir class="row">
                <?php
                    //echo $form->labelEx($profile, 'height');
                    //echo $form->textField($profile, 'height',array('class'=>'prof_height'));
                    //echo $form->error($profile, 'height');
                ?>
            </dir>-->
            <div class="row">
            	<?php echo $form->labelEx($profile, '',array('id'=>'Prof_val_height')); ?>
                <?php echo $form->labelEx($profile, 'height'); ?>
                <div id="Profile_height_cont" style="max-width: 460px;position: relative;margin: 0 auto;width: 280px;min-width: 30px;"></div>
                <?php echo $form->textField($profile, 'height',array('class'=>'prof_height hidden'));?>
            </div>
            <div class="row">
            	<?php echo $form->labelEx($profile, '',array('id'=>'Prof_val_weight')); ?>
                <?php echo $form->labelEx($profile, 'weight'); ?>
                <div id="Profile_weight_cont" style="max-width: 460px;position: relative;margin: 0 auto;width: 280px;min-width: 30px;"></div>
                <?php echo $form->textField($profile, 'weight',array('class'=>'prof_weight hidden'));?>
            </div>
            <div class="row">
            	<?php echo $form->labelEx($profile, '',array('id'=>'Prof_val_age')); ?>
                <?php echo $form->labelEx($profile, 'age'); ?>
                <div id="Profile_age_cont" style="max-width: 460px;position: relative;margin: 0 auto;width: 280px;min-width: 30px;"></div>
                <?php echo $form->textField($profile, 'age',array('class'=>'prof_age hidden'));?>
            </div>

          <div class="row">
            <?php
                echo $form->labelEx($profile, 'marital_status');
                echo '<div class="form-inline">';
                echo $form->radioButtonList($profile, 'marital_status', array('1'=>'Soltero', '2'=>'Casado', '3'=>'Divorciado', '4'=>'Viudo'), array('separator'=>'|'));
                echo '</div>';
                echo $form->error($profile, 'marital_status');
            ?>
            </div>

            <div class="row">
            <?php echo $form->labelEx($profile, 'occupation_id');
              $this->widget('ext.select2.ESelect2',array(
              'model'=>$profile,
              'attribute'=>'occupation_id',
              'data'=>CHtml::listData(Occupation::model()->findAll(), 'id', 'name'),
              'options' => [
                'placeholder' => 'Busque su Carrera Correspondiente',

                ],
            ));
          ?>
            </div>
            <div class="row rememberMe" id="CHECKBOX">
            <?php echo $form->checkBox($model,'agree'); ?>
            <?php echo $form->label($model,'Acepto'); ?>
            <?php echo CHtml::link("Terminos y Condiciones",array('/site/terminos'), array('target'=>'_blank'));?>
            <?php echo $form->error($model,'agree'); ?>
            </div>


            <div class="row">
            <?php
                echo $form->labelEx($profile, 'occupation_area_id');
                echo $form->dropDownList($profile, 'occupation_area_id', CHtml::listData(OccupationArea::model()->findAll(), 'id', 'name'), array('prompt'=>'Seleccione una opción'));
                echo $form->error($profile, 'occupation_area_id');
            ?>
            </div>
            <button type="button" class="btn btn-large btn-green" onclick="next();">Continuar&nbsp;<i class="icon-chevron-right icon-white"></i></button>
	    </div>
        <div id="screen2" class="screen">
            <h1>Hábitos diarios</h1>

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

            <div class="row form-inline-wide">
            <?php
                echo $form->labelEx($profile, 'working_days_sleep_hours');
                echo '&nbsp;&nbsp;&nbsp;';
                $this->widget('bootstrap.widgets.TbTimePicker',
                        array(
                                'model'=>$profile,
                                'attribute'=>'working_days_sleep_hours',
                                'options' => array(
                                    'defaultTime' => '0:00',
                                    'noAppend' => true, // mandatory
                                    'disableFocus' => true, // mandatory
                                    'showMeridian' => false // irrelevant
                                ),
                                'htmlOptions'=>array('style'=>'width: 40px;'),
                            )
                        );
                echo $form->error($profile, 'working_days_sleep_hours');
            ?>
            </div>

            <div class="row form-inline-wide">
            <?php
                echo $form->labelEx($profile, 'working_days_sleep_hours_desired');
                echo '&nbsp;&nbsp;&nbsp;';
                $this->widget('bootstrap.widgets.TbTimePicker',
                        array(
                                'model'=>$profile,
                                'attribute'=>'working_days_sleep_hours_desired',
                                'options' => array(
                                    'defaultTime' => '0:00',
                                    'noAppend' => true, // mandatory
                                    'disableFocus' => true, // mandatory
                                    'showMeridian' => false // irrelevant
                                ),
                                'htmlOptions'=>array('style'=>'width: 40px;'),
                            )
                        );
                echo $form->error($profile, 'working_days_sleep_hours_desired');
            ?>
            </div>

            <div class="row form-inline-wide">
            <?php
                echo $form->labelEx($profile, 'working_hours');
                echo '&nbsp;&nbsp;&nbsp;';
                $this->widget('bootstrap.widgets.TbTimePicker',
                        array(
                                'model'=>$profile,
                                'attribute'=>'working_hours',
                                'options' => array(
                                    'defaultTime' => '0:00',
                                    'noAppend' => true, // mandatory
                                    'disableFocus' => true, // mandatory
                                    'showMeridian' => false // irrelevant
                                ),
                                'htmlOptions'=>array('style'=>'width: 40px;'),
                            )
                        );
                echo $form->error($profile, 'working_hours');
            ?>
            </div>




            <div class="row">
            <?php
                echo $form->labelEx($profile, 'working_days_sleep_quality');
                echo '<div class="form-inline">';
                echo $form->radioButtonList($profile, 'working_days_sleep_quality', array('1'=>'Muy mala', '2'=>'Mala', '3'=>'Buena', '4'=>'Muy buena'), array('separator'=>'|'));
                echo '</div>';
                echo $form->error($profile, 'working_days_sleep_quality');
            ?>
            </div>

            <div class="row form-inline-wide">
            <?php
                echo $form->labelEx($profile, 'weekend_sleep_hours');
                echo '&nbsp;&nbsp;&nbsp;';
                $this->widget('bootstrap.widgets.TbTimePicker',
                        array(
                                'model'=>$profile,
                                'attribute'=>'weekend_sleep_hours',
                                'options' => array(
                                    'defaultTime' => '0:00',
                                    'noAppend' => true, // mandatory
                                    'disableFocus' => true, // mandatory
                                    'showMeridian' => false // irrelevant
                                ),
                                'htmlOptions'=>array('style'=>'width: 40px;'),
                            )
                        );
                echo $form->error($profile, 'weekend_sleep_hours');
            ?>
            </div>

            <div class="row form-inline-wide">
            <?php
                echo $form->labelEx($profile, 'weekend_sleep_hours_desired');
                echo '&nbsp;&nbsp;&nbsp;';
                $this->widget('bootstrap.widgets.TbTimePicker',
                        array(
                                'model'=>$profile,
                                'attribute'=>'weekend_sleep_hours_desired',
                                'options' => array(
                                    'defaultTime' => '0:00',
                                    'noAppend' => true, // mandatory
                                    'disableFocus' => true, // mandatory
                                    'showMeridian' => false // irrelevant
                                ),
                                'htmlOptions'=>array('style'=>'width: 40px;'),
                            )
                        );
                echo $form->error($profile, 'weekend_sleep_hours_desired');
            ?>
            </div>



            <button type="button" class="btn btn-large btn-green" onclick="next();">Continuar&nbsp;<i class="icon-chevron-right icon-white"></i></button>
            <br>
            <br>
            <button type="button" class="btn btn-small" onclick="previous();"><i class="icon-chevron-left"></i>&nbsp;Volver</button>
        </div>
        <div id="screen3" class="screen">

            <h1>Datos de acceso</h1>

	        <div class="row">
	        <?php echo $form->labelEx($model,'username'); ?>
	        <?php echo $form->textField($model,'username'); ?>
	        <?php echo $form->error($model,'username'); ?>
	        </div>

	        <div class="row">
	        <?php echo $form->labelEx($model,'password'); ?>
	        <?php echo $form->passwordField($model,'password'); ?>
	        <?php echo $form->error($model,'password'); ?>
	        <p class="hint">
	        <?php echo UserModule::t("Minimal password length 4 symbols."); ?>
	        </p>
	        </div>

	        <div class="row">
	        <?php echo $form->labelEx($model,'verifyPassword'); ?>
	        <?php echo $form->passwordField($model,'verifyPassword'); ?>
	        <?php echo $form->error($model,'verifyPassword'); ?>
	        </div>

	        <div class="row">
	        <?php echo $form->labelEx($model,'email'); ?>
	        <?php echo $form->textField($model,'email'); ?>
	        <?php echo $form->error($model,'email'); ?>
	        </div>

    <!--<?php
		$profileFields=Profile::getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
	?>
	<div class="row">
		<?php echo $form->labelEx($profile,$field->varname); ?>
		<?php
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo$form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		?>
		<?php echo $form->error($profile,$field->varname); ?>
	</div>
	<?php
			}
		}
    ?>-->


	<?php if (UserModule::doCaptcha('registration')): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>

		<?php $this->widget('CCaptcha'); ?>
        <br>
		<?php echo $form->textField($model,'verifyCode'); ?>
		<?php echo $form->error($model,'verifyCode'); ?>

		<p class="hint"><?php echo UserModule::t("Please enter the letters as they are shown in the image above."); ?>
		<br/><?php echo UserModule::t("Letters are not case-sensitive."); ?></p>
	</div>
	<?php endif; ?>

	<div class="row submit">
        <?php /*$this->widget('bootstrap.widgets.TbButton', array(
            'buttonType'=>'submit',
            'type'=>'primary',
            'size'=>'large',
            'label'=>UserModule::t('Register'),
            'icon'=>'white ok',
        ));*/ ?>
        <button type="button" class="btn btn-green btn-large" onclick="next();"><i class="icon-white icon-ok"></i>&nbsp;Finalizar</button>
        <button id="Registration_submit" type="submit" class="btn btn-green btn-large hidden"><i class="icon-white icon-ok"></i>&nbsp;Finalizar</button>
        <br>
        <br>
        <button type="button" class="btn btn-small" onclick="previous();"><i class="icon-chevron-left"></i>&nbsp;Volver</button>
	</div>


        </div>
	</div>


<?php $this->endWidget(); ?>
</div><!-- form -->
<?php endif; ?>

</div>

<style type="text/css">
	#Profile_height_cont .noUi-connects {
		background: #fc6451;
	}
	#Profile_weight_cont .noUi-connects {
		background: #fc6451;
	}
	#Profile_age_cont .noUi-connects {
		background: #fc6451;
	}

</style>


<script type="text/javascript">
    ////////////////////////////////////// SLIDER RANGE

    var sliderAltura = document.getElementById('Profile_height_cont');
    var sliderPeso = document.getElementById('Profile_weight_cont');
    var sliderEdad = document.getElementById('Profile_age_cont');

    var inputAltura = document.getElementById('Profile_height');
    var inputPeso = document.getElementById('Profile_weight');
    var inputEdad = document.getElementById('Profile_age');

    var lblAltura = document.getElementById('Prof_val_height');
    var lblPeso = document.getElementById('Prof_val_weight');
    var lblEdad = document.getElementById('Prof_val_age');

    //SETUP SLIDER ALTURA

    noUiSlider.create(sliderAltura, {
        start: 1.6,
        behaviour: 'hover-snap',
        direction: 'ltr',
        step: 0.1,
        range: {
            'min':  0.5,
            'max':  2.2
        }
    });

	sliderAltura.noUiSlider.on('update', function( values, handle ) {

		var value = values[handle];
		inputAltura.value = value;
		lblAltura.value = value;
		$(lblAltura).text(value);
	});
	///////////////////
	//SETUP SLIDER PESO

	noUiSlider.create(sliderPeso, {
        start: 70,
        behaviour: 'hover-snap',
        direction: 'ltr',
        step: 1,
        range: {
            'min':  20,
            'max':  230
        }
    });

	sliderPeso.noUiSlider.on('update', function( values, handle ) {

		var value = Math.trunc(values[handle]);
		inputPeso.value = value;
		lblPeso.value = value;
		$(lblPeso).text(value);

	});

	///////////////////
	//SETUP SLIDER EDAD

	noUiSlider.create(sliderEdad, {
        start: 30,
        behaviour: 'hover-snap',
        direction: 'ltr',
        step: 1,
        range: {
            'min':  4,
            'max':  99
        }
    });

	sliderEdad.noUiSlider.on('update', function( values, handle ) {

		var value = Math.trunc(values[handle]);
		inputEdad.value = value;
		lblEdad.value = value;
		$(lblEdad).text(value);
	});

	///////////////////

</script>
