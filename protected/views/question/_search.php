<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $this->generateActiveRow($this->modelClass, "id"); ?>
	<?php echo $this->generateActiveRow($this->modelClass, "test_id"); ?>
	<?php echo $this->generateActiveRow($this->modelClass, "number"); ?>
	<?php echo $this->generateActiveRow($this->modelClass, "text"); ?>
	<?php echo $this->generateActiveRow($this->modelClass, "question_type"); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>Yii::t('app', 'Search'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
