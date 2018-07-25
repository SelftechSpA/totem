<?php
$this->breadcrumbs=array(
	'Companies'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2),'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(),'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(),'url'=>array('update','id'=>$model->id)),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')) : array(),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2),'url'=>array('admin')) : array(),
);
?>

<h1>Ver <?php echo GxHtml::encode($model->label(1)); ?> #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
        array('type'=>'image', 'label'=>Yii::t('app', 'Logo'), 'value'=>$model->getFileURL("thumb")),
	),
)); ?>

<?php $this->widget('bootstrap.widgets.TbAlert', array(
        'block'=>true, // display a larger alert block?
        'fade'=>true, // use transitions?
        'closeText'=>'&times;', // close link text - if set to false, no close link is displayed
        'alerts'=>array( // configurations per alert type
            'success'=>array('block'=>true, 'fade'=>true, 'closeText'=>'&times;'), // success, info, warning, error or danger
        ),
    )); ?>      

<h3>Establecer como predeterminada en este equipo</h3>

Dirección para página de inicio:
<pre>
<?php echo $this->createAbsoluteUrl('/company/setDefault',array('id'=>$model->id)); ?>
</pre>

<?php $this->widget('bootstrap.widgets.TbButton', array(
    'label'=>'Establecer',
    'type'=>null, // null, 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
    'size'=>null, // null, 'large', 'small' or 'mini'
    'buttonType' => 'link',
    'url'=>array('company/setDefault', 'id'=>$model->id, 'returnUrl'=>$this->createUrl('/company/view',array('id'=>$model->id))),
)); ?>