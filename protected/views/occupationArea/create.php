<?php
$this->breadcrumbs=array(
	'Occupation Areas'=>array('index'),
	Yii::t('app', 'Create'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url' => array('index')),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')) : array(),
);
?>

<h1><?php echo Yii::t('app', 'Create') . ' ' . GxHtml::encode($model->label()); ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>