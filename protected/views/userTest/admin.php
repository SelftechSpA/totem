<?php
$this->breadcrumbs=array(
	'User Tests'=>array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-test-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage') . ' ' . GxHtml::encode($model->label(2)); ?></h1>

<p>
<?php // echo Yii::t('app', 'You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.'); ?>
</p>

<?php //echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'user-test-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'user_id',
		'test_id',
		'date_taken',
		'score',
		'gender',
		/*
		'height',
		'weight',
		'age',
		'marital_status',
		'occupation',
		'occupation_area',
		'activity_level',
		'working_days_sleep_hours',
		'working_days_sleep_hours_desired',
		'working_days_sleep_quality',
		'weekend_sleep_hours',
		'weekend_sleep_hours_desired',
		'weekend_sleep_quality',
		'working_hours',
		'exercise_hours',
		'recreation_hours',
		'travel_hours',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
