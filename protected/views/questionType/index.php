<?php

$this->breadcrumbs = array(
	QuestionType::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . QuestionType::label(), 'url' => array('create')),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . QuestionType::label(2), 'url'=>array('admin')) : array(),
);
?>

<h1><?php echo GxHtml::encode(QuestionType::label(2)); ?></h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
