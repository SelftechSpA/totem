<?php
$this->breadcrumbs=array(
	'TestReactions',
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . TestReaction::label(), 'url' => array('create')),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . TestReaction::label(2), 'url'=>array('admin')) : array(),
);
?>

<h1><?php echo GxHtml::encode(TestReaction::label(2)); ?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
