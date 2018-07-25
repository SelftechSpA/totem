<?php
$this->breadcrumbs=array(
	'TestEpworths'=>array('index'),
	Yii::t('app', 'Create'),
);

$this->menu = array(
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')) : array(),
);
?>

<script>
    function tooltipFormatter(value){
        var msj = new Array(
            '0. Ninguna vez en el último mes',
            '1. Menos de una vez a la semana',
            '2. Una o dos veces a la semana',
            '3. Tres o más veces a la semana'
            );
        return msj[value];
    }
</script>


<div class="cuestionario form-centered">
    
    <div class="iconoTest span1 center"><img src="images/ico_test_map.png" alt=""></div>
    <h1>Índice de predicción de apnea</h1>

    <div class="content">
        <div class="row span11 center">
             <div class="intro">
                <h2>Ronquidos y Apneas de Sueño</h2>
                <p>
                    En algunas personas el ronquido es un problema de todas las noches, de alto tono y de una característica irregular. Muchas veces interrumpen ese ronquido con una pausa en la respiración mientras duermen.
                    El sueño por consiguiente es fragmentado, por que cada pausa va a terminar cuando el cerebro se despierta. A estas pausas se las denomina Apneas de Sueño e inciden directamente en nuestro rendimiento diario y en nuestra salud.
                </p>
                <p>Mediante el cuestionario MAP (Multivariable Apnea Prediction Index) obtenemos una media del riesgo de padecer este trastorno del sueño.</p>
                <p>El puntaje va de 0 a 1. Se considera que valores de 0,5 o más denotan un riesgo elevado de padecer Apneas de Sueño.</p>
            </div>
            <div class="row" id="instrucciones">
                <p>En el transcurso del último mes, ¿cuántas noches o días por semana tuvo, o le dijeron que tuvo lo siguiente? Selecciones la respuesta correcta para cada pregunta.</p>
                <p>
                    Aclaración:<br>
                    Nunca: ninguna vez por semana<br>
                    Casi nunca: menos de una vez por semana<br>
                    A veces: 1-2 veces por semana<br>
                    Con frecuencia: 3-4 veces por semana<br>
                    Siempre: 5-7 veces por semana<br>
                    Si no está seguro, estime la respuesta.
                </p>
            </div>
            
            <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                'id'=>'TestMAPs-form',
                'enableAjaxValidation'=>false,
                'htmlOptions' => array(
                    //'enctype' => 'multipart/form-data',
                )
            )); 
            
            $profile = 'TestEpworthForm';
            ?>
            
            <div class="row nomargin">
                <?php echo $form->errorSummary($model); ?>
            </div>

            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_1')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_2')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_3')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_4')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_5')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_6')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_7')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_8')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_9')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_10')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_11')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_12')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_13')); ?>
            <?php echo $this->renderPartial('_question',array('model'=>$model, 'question'=>'question_14')); ?>
            
            <div class="row actions">
                <button type="submit" class="btn btn-large btn-green" onclick="next();">Finalizar&nbsp;<i class="icon-ok icon-white"></i></button>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

<script>
jQuery(function($) {
    console.log('inicio script');
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
        console.log('toggle');
      }
    });
  });
});
</script>