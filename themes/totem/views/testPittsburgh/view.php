<?php
$this->breadcrumbs=array(
	'TestPittsburghs'=>array('index'),
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
        
        <?php if ($model->score < 5) { ?>
        <div class="alert alert-block alert-success">
            <span class="aviso-puntaje">Su puntaje es <strong><?php echo round($model->score, 1); ?></strong></span>
            <strong><?php echo $model->getResultText(); ?></strong>
            <p></p>
        </div>
        <?php } ?>
       
        <?php if ($model->score >= 5 && $model->score <= 7) { ?>
        <div class="alert alert-block alert-error">
            <span class="aviso-puntaje">Su puntaje es <strong><?php echo round($model->score, 1); ?></strong></span>
            <strong><?php echo $model->getResultText(); ?></strong>
            <p></p>
        </div>
        <?php } ?>
        
        <?php if ($model->score >= 8 && $model->score < 14) { ?>
        <div class="alert alert-block alert-error">
            <span class="aviso-puntaje">Su puntaje es <strong><?php echo round($model->score, 1); ?></strong></span>
            <strong><?php echo $model->getResultText(); ?></strong>
            <p>Consulte a su médico a la brevedad.</p>
            <p>Evite actividades que puedan implicar un peligro en virtud de la necesidad de atención sostenida, como manejar un vehículo u operar una maquinaria compleja.</p>
        </div>
        <?php } ?>
        
        <?php if ($model->score >= 14 && $model->score <= 21) { ?>
        <div class="alert alert-block alert-error">
            <span class="aviso-puntaje">Su puntaje es <strong><?php echo round($model->score, 1); ?></strong></span>
            <strong><?php echo $model->getResultText(); ?></strong>
            <p>Merece consulta y probable tratamiento médico.</p>
            <p>Consulte a su médico a la brevedad.</p>
            <p>Evite actividades que puedan implicar un peligro en virtud de la necesidad de atención sostenida, como manejar un vehículo u operar una maquinaria compleja.</p>
        </div>
        <?php } ?>

    </div>
    <br>
    <div class="row actions span6 center back-to-test">
        <?php $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Continuar',
            'type' => 'green',
            'size' => 'large',
            'icon' => 'chevron-right white ',
            'url'=>array('/totem/test'),
        )); ?>
        <br>
    </div>
    <br>
    
    <div class="row span6 center">
         <div class="importante">
            <strong>Importante</strong>
             <p>Si el valor es mayor o igual 5, evite actividades que requieran atención sostenida, como manejar un vehículo, pues puede ser peligroso.<br>
               Si bien estos cuestionarios cuantifican la probabilidad de padecer un trastorno de sueño, no deben ser interpretados en forma aislada.
               Es decir, en ningún caso reemplazan una consulta médica.  
               <br>Ante cualquier duda consulte a su médico de confianza.</p>
         </div>
     </div>
</div>

</div>