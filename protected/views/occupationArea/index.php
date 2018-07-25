<?php
$this->breadcrumbs=array(
	'Occupation Areas',
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . OccupationArea::label(), 'url' => array('create')),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . OccupationArea::label(2), 'url'=>array('admin')) : array(),
);
?>

<h1><?php echo GxHtml::encode(OccupationArea::label(2)); ?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
