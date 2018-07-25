<?php

$this->breadcrumbs = array(
	Table::label(2),
	Yii::t('app', 'Index'),
);

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . Table::label(), 'url' => array('create')),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . Table::label(2), 'url' => array('admin')) : array(),
);
?>

<h1><?php echo GxHtml::encode(Table::label(2)); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 