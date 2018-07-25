<?php
$this->breadcrumbs=array(
	'TestReactions'=>array('index'),
	Yii::t('app', 'Manage'),
);

$this->menu = array(
		array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('testReaction-grid', {
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
	'id'=>'testReaction-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array('name'=>'id',
              'htmlOptions'=>array('width'=>40),
              ),
        array(
            'name'=>'category_id',
            'value'=>'GxHtml::valueEx($data->category)',
            'filter'=>GxHtml::listDataEx(Category::model()->findAllAttributes(null, true)),
            'htmlOptions'=>array('width'=>80),
        ),
        array('name'=>'order',
              'htmlOptions'=>array('width'=>40),
              ),
        array(
			'name'=>'picture',
            'type'=>'html',
			'value'=>'GxHtml::image($data->getFileURL("thumb"), "", array("class"=>"thumb"))',
            'htmlOptions'=>array('width'=>240),
		),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view} {update} {configure} {delete}',
            'buttons'=>array(
                'configure' => array(
                    'label'=>'Configurar',     // text label of the button
                    'url'=>'array("testReaction/configure", "id"=>$data->id)',       // the PHP expression for generating the URL of the button
                    'icon'=>'wrench',
                ),                
            ),
            'htmlOptions'=>array('width'=>80),
		),
	),
)); ?>
