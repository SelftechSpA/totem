<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'user-test-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'test_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'date_taken',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'score',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'gender',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'height',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'weight',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'age',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'marital_status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'occupation',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'occupation_area',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'activity_level',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'working_days_sleep_hours',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'working_days_sleep_hours_desired',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'working_days_sleep_quality',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'weekend_sleep_hours',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'weekend_sleep_hours_desired',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'weekend_sleep_quality',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'working_hours',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'exercise_hours',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'recreation_hours',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'travel_hours',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'icon'=>'white ok',
			'label'=>$model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Save'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
