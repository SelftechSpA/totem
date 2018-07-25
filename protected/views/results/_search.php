<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->dropdownListRow($model,'user_id',CHtml::listData(User::model()->findAll(), 'id', 'profile.name'), array('empty'=>'Todos')); ?>

	<?php echo $form->dropdownListRow($model,'test_id',CHtml::listData(Test::model()->findAll(), 'id', 'name'), array('empty'=>'Todos')); ?>

	<?php echo $form->textFieldRow($model,'date_taken',array('class'=>'span5')); ?>
	
	

	<?php echo $form->textFieldRow($model,'score',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>Yii::t('app', 'Search'),
		)); ?>
	</div>

<?php $this->endWidget(); ?>
