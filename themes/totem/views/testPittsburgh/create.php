<?php
$this->breadcrumbs=array(
	'TestPittsburgh'=>array('index'),
	Yii::t('app', 'Create'),
);

$this->menu = array(
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')) : array(),
);
?>

<script>
    /*function tooltipFormatter(value){
        var msj = new Array(
            '0. Ninguna vez en el último mes',
            '1. Menos de una vez a la semana',
            '2. Una o dos veces a la semana',
            '3. Tres o más veces a la semana'
            );
        return msj[value];
    }*/
    
    var currentScreen = 1;
    var num_screens = 5;
    
    function previous(){
        currentScreen--;
        showScreen(currentScreen);
    }
    /*function next(){
        $('#Registration_submit').click();
    }*/
    function showScreen(id){
        $('.screen').removeClass('active');
        $('#screen'+id).addClass('active');
        updatePreviousVisible();
    }
    function updatePreviousVisible(){
        if (currentScreen == 1)
            $('.previous').hide();
        else
            $('.previous').show();        
    }
    
    function onFormValidate(form, data, hasError){
        //alert('hasError: ' + hasError);
        
        if (hasError){
            console.log(data);
            
            for (var s=1; s<currentScreen+1; s++){
                var errors = $('#screen'+s).find('.error:visible');
                if (errors.length > 0){
                    showScreen(s);
                    console.log(errors);
                    return;
                }
            }
        }
        currentScreen++;
        if (currentScreen < num_screens+1){
            $('.screen').find('.error').hide();
            showScreen(currentScreen);
        }else{
            document.getElementById('TestPittsburghs-form').submit();
        }        
    }
</script>
<script type="text/javascript" src="js/spinedit/bootstrap-spinedit.js"></script>
<link rel="stylesheet" type="text/css" href="js/spinedit/bootstrap-spinedit.css" />


<div class="cuestionario row form-centered">

    <div class="span5 offset1" style="margin-top: 20px;">
        <div class="iconoTest span1 center"><img src="images/ico_test_pittsburgh.png" alt=""></div>
        <h1>Cuestionario Pittsburgh</h1>

        <div class="intro">
            <h2>Instrucciones</h2>
            <p>Las siguientes preguntas se refieren a su forma habitual de dormir únicamente durante el último mes, en promedio.
                Intente que sus respuestas se ajusten de la manera mas exacta a lo ocurrido durante la mayoría de los días y noches del último mes.
                Por favor, intente responder a todas las preguntas.</p>
        </div>
        <br>
        <?php echo CHtml::link('Abandonar test', array('totem/test'), array('class'=>'btn btn-normal bt-abandon-test')); ?>
    </div>

    <div class="span12" style="margin-top: 20px;">
        <div class="center">           
            
            <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                'id'=>'TestPittsburghs-form',
                'enableAjaxValidation'=>true,
                'clientOptions'=>array(
                    'validateOnSubmit'=>true,
                    'afterValidate'=>'js:onFormValidate',
                    'validateOnChange'=>false,
                ),    
                'htmlOptions' => array(
                    //'enctype' => 'multipart/form-data',
                )
            )); 
            
            $profile = 'TestPittsburghForm';
            ?>
            
            <div class="row nomargin">
                <?php //echo $form->errorSummary($model); ?>
            </div>
                        
            <div class="wizard">
                <div id="screen1" class="screen active">
                    <?php echo $this->renderPartial('_question1',array('model'=>$model, 'form'=>$form, 'question'=>'question_1')); ?>
                    <?php echo $this->renderPartial('_question1',array('model'=>$model, 'form'=>$form, 'question'=>'question_2')); ?>
                    <?php echo $this->renderPartial('_question1',array('model'=>$model, 'form'=>$form, 'question'=>'question_3')); ?>
                    <?php echo $this->renderPartial('_question1',array('model'=>$model, 'form'=>$form, 'question'=>'question_4')); ?>
                </div>
                <div id="screen2" class="screen">
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_5')); ?>
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_6')); ?>
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_7')); ?>
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_8')); ?>
                </div>
                <div id="screen3" class="screen">
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_9')); ?>
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_10')); ?>
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_11')); ?>
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_12')); ?>
                </div>
                <div id="screen4" class="screen">
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_13')); ?>
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_14')); ?>
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_15')); ?>
                    <?php echo $this->renderPartial('_question2',array('model'=>$model, 'form'=>$form, 'question'=>'question_16')); ?>
                </div>
                <div id="screen5" class="screen">
                    <?php echo $this->renderPartial('_question3',array('model'=>$model, 'form'=>$form, 'question'=>'question_17')); ?>
                    <?php echo $this->renderPartial('_question4',array('model'=>$model, 'form'=>$form, 'question'=>'question_18')); ?>
                </div>
            </div>
                    
            <div class="row actions">
                <br>
                <span class="previous">
                    <button type="button" class="btn btn-normal" onclick="previous();"><i class="icon-chevron-left"></i>&nbsp;Volver</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;
                </span>
                <button type="submit" class="btn btn-large btn-green" onclick="return updateHideFields();">Continuar</button>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>

</div>

<script>
jQuery(function($) {
  $('div.btn-group[data-toggle-name=*]').each(function(){
    var group   = $(this);
    var form    = group.parents('form').eq(0);
    var name    = group.attr('data-toggle-name');
    var hidden  = $('input[name="' + name + '"]', form);
    $('button', group).each(function(){
      var button = $(this);
      button.live('click', function(){
          hidden.val($(this).val());
      });
      if(button.val() == hidden.val()) {
        button.addClass('active');
      }
    });
  });
});

$(document).ready(function(){
    $('.spinEditHoras').spinedit({
        minimum: 0,
        maximum: 23,
        step: 1,
        value: 0,
        numberOfDecimals: 0
    });
    $('.spinEditMinutos').spinedit({
        minimum: 0,
        maximum: 59,
        step: 1,
        value: 0,
        numberOfDecimals: 0
    });
    $('.spinEditHoras, .spinEditMinutos').attr('disabled', 'disabled');
});

$(function(){
    updatePreviousVisible();
});

function updateHideFields(){
    $('.spinEditHoras').each( function(index, value) {
       var hora = $(this).val();
       var minutos = (parseInt($(this).siblings('.spinEditMinutos').val()) / 60);
       var finalValue = parseInt(hora) + parseFloat(minutos); 
       var hiddenField = $(this).siblings('.hiddenField');
       if(hora > 0 || minutos > 0) {
           hiddenField.attr('value',finalValue.toFixed(2));
       }
    });
    
    return true;
}
</script>