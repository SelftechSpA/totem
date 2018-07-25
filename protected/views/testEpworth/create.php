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
    
    <div class="iconoTest span1 center"><img src="images/ico_test_epworth.png" alt=""></div>
    <h1>Escala de somnolencia de Epworth</h1>

    <div class="content">
        <div class="row span9 center">
            <div class="intro">
                <h2>¿Qué es la somnolencia diurna?</h2>
                <p>La somnolencia puede definirse como la dificultad de permanecer despiertos y depende de la duración y la calidad de sueño que la persona haya tenido durante la noche.</p>
                <p>El cuestionario Epworth mide el nivel de somnolencia diurna y pregunta acerca de la probabilidad de quedarse dormidos en determinadas situaciones.</p>
                <p>Consta de 8 preguntas que conforman una escala de un maximo de 24 puntos.</p>
                <p>A mayor puntaje mayor somnolencia.</p>
            </div>
            <div class="row" id="instrucciones">
                <p>A lo largo del último mes. ¿Que posibilidad de dormitar tuvo durante el día en cada una de las siguientes situaciones?</p>
                <p>
                    - Aun cuando no realizase alguna de ellas trate de imaginar qué le ocurriría si la llevase a cabo.<br>
                    - Imagine todas las situaciones FUERA de su trabajo.<br>
                    - Seleccione la respuesta correcta para cada situacion.
                </p>
            </div>
            
            <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
                'id'=>'TestEpworths-form',
                'enableAjaxValidation'=>false,
                'htmlOptions' => array(
                    //'enctype' => 'multipart/form-data',
                )
            )); 
            
            $profile = 'TestEpworthForm';
            ?>
            
            <div class="row">
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
            
            <div class="row actions">
                <button type="submit" class="btn btn-large btn-green" onclick="next();">Finalizar&nbsp;<i class="icon-ok icon-white"></i></button>
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
</script>