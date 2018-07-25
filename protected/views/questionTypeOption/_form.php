<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'question-type-option-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $this->generateActiveRow($this->modelClass, "question_type_id"); ?>
	<?php echo $this->generateActiveRow($this->modelClass, "value"); ?>
	<?php echo $this->generateActiveRow($this->modelClass, "text"); ?>
	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'white ok',
			'label'=>$model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
