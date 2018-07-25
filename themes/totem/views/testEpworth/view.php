<?php
$this->breadcrumbs=array(
	'TestEpworths'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(),'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app', 'Configure') . ' ' . $model->label(),'url'=>array('configure','id'=>$model->id)),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')) : array(),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2),'url'=>array('admin')) : array(),
);
?>

<div class="cuestionario form-centered">
<h1>Resultados del test</h1>

<div class="">
    <br>
    <div class="row span6 center">
        <?php $this->widget('bootstrap.widgets.TbDetailView',array(
        	'data'=>$model,
        	'attributes'=>array(
        	    'test',
                'date_taken',
                /*array('name'=>'score', 'value'=>round($model->score, 1)),*/
        	),
        )); ?>
        <?php if ($model->score == 0) { ?>
        <div class="alert alert-block alert-success">
            <span class="aviso-puntaje">Su puntaje es <strong><?php echo round($model->score, 1); ?></strong></span>
            <strong>Sin somnolencia diurna</strong>
        </div>
        <?php } else if ($model->score <= 5) { ?>
        <div class="alert alert-block alert-error">
            <span class="aviso-puntaje">Su puntaje es <strong><?php echo round($model->score, 1); ?></strong></span>
            <strong>Ligera somnolencia diurna</strong>
        </div>
        <?php } else if ($model->score <= 10) { ?>
        <div class="alert alert-block alert-error">
            <span class="aviso-puntaje">Su puntaje es <strong><?php echo round($model->score, 1); ?></strong></span>
            <strong>Moderada somnolencia diurna</strong>
            <p>Evite actividades que puedan implicar un peligro en virtud de la necesidad de atención sostenida, como manejar un vehículo u operar una maquina compleja. Consulte a su médico.</p>
        </div>
        <?php } else { ?>
        <div class="alert alert-block alert-error">
            <span class="aviso-puntaje">Su puntaje es <strong><?php echo round($model->score, 1); ?></strong></span>
            <strong>Excesiva somnolencia diurna</strong>
            <p>Evite actividades que puedan implicar un peligro en virtud de la necesidad de atención sostenida, como manejar un vehículo u operar una maquina compleja. Consulte a su médico.</p>
        </div>
        <?php } ?>
    </div>
    <br>
    <div class="row actions span6 center back-to-test">
        <?php $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Continuar',
            'type' => 'green',
            'size' => 'large',
            'icon' => 'chevron-right white',
            'url'=>array('/totem/test'),
        )); ?>
        <br>
    </div>
    <br>
    <div class="row span6 center">
         <div class="importante">
            <strong>Importante</strong>
            <p>Estos cuestionarios cuantifican la probabilidad de padecer un trastorno de sueño, 
                pero no deben ser interpretados en forma aislada. <br>Es decir, en ningún caso reemplazan una consulta médica. 
                <br>Ante cualquier duda consulte a su médico de confianza.</p>
         </div>
     </div>    
</div>
</div>