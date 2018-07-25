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
</script>
<script type="text/javascript" src="js/spinedit/bootstrap-spinedit.js"></script>
<link rel="stylesheet" type="text/css" href="js/spinedit/bootstrap-spinedit.css" />


<div class="cuestionario form-centered">
    
    <div class="iconoTest span1 center"><img src="images/ico_test_pittsburgh.png" alt=""></div>
    <h1>Cuestionario Pittsburgh de calidad de sueño</h1>

    <div class="content">
        <div class="row span11 center">
            <div class="intro">
                <h2>La importancia de la calidad de tu sueño</h2>
                <p>
                   Un sueño escaso o de mala calidad puede tener repercusiones negativas en tu vida diaria. Si esta situación se prolonga en el tiempo, puede afectar tu salud y tu estado de ánimo e interferir en el trabajo
                   y en la vida social.
                </p>
                <p>No olvides que la calidad de tu sueño determina la calidad de tu día.</p>
                <p>El Índice de Calidad de Sueño de Pittsburgh (ICSP) cuantifica la calidad de sueño</p>
                <p>El mismo consta de 18 preguntas que conforman una escala de 21 puntos. A mayor puntaje peor calidad de sueño.</p>
            </div>
            <div class="row" id="instrucciones">
                <p>Las siguientes preguntas se refieren a su forma habitual de dormir únicamente durante el último mes, en promedio. 
                    Intente que sus respuestas se ajusten de la manera mas exacta a lo ocurrido durante la mayoría de los días y noches del último mes.
                    Por favor, intente responder a todas las preguntas.</p>
            </div>
            
            <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                'id'=>'TestPittsburghs-form',
                'enableAjaxValidation'=>false,
                'htmlOptions' => array(
                    //'enctype' => 'multipart/form-data',
                )
            )); 
            
            $profile = 'TestPittsburghForm';
            ?>
            
            <div class="row nomargin">
                <?php echo $form->errorSummary($model); ?>
            </div>

            <?php echo $this->renderPartial('_question1',array('model'=>$model, 'question'=>'question_1')); ?>
            <?php echo $this->renderPartial('_question1',array('model'=>$model, 'question'=>'question_2')); ?>
            <?php echo $this->renderPartial('_question1',array('model'=>$model, 'question'=>'question_3')); ?>
            <?php echo $this->renderPartial('_question1',array('model'=>$model, 'question'=>'question_4')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_5')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_6')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_7')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_8')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_9')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_10')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_11')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_12')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_13')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_14')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_15')); ?>
            <?php echo $this->renderPartial('_question2',array('model'=>$model, 'question'=>'question_16')); ?>
            <?php echo $this->renderPartial('_question3',array('model'=>$model, 'question'=>'question_17')); ?>
            <?php echo $this->renderPartial('_question4',array('model'=>$model, 'question'=>'question_18')); ?>
            
            <div class="row actions">
                <button type="submit" class="btn btn-large btn-green" onclick="return updateHideFields();">Finalizar&nbsp;<i class="icon-ok icon-white"></i></button>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

<script>
jQuery(function($) {
  //$('div.btn-group[data-toggle-name=*]').each(function(){
  $('div.btn-group[data-toggle-name]').each(function(){
    var group   = $(this);
    var form    = group.parents('form').eq(0);
    var name    = group.attr('data-toggle-name');
    var hidden  = $('input[name="' + name + '"]', form);
    $('button', group).each(function(){
      var button = $(this);
      button.on('click', function(){
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