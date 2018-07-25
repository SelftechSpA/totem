<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'table-form',
	'enableAjaxValidation' => true,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<div class="row">
		<?php /*echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model, 'user_id'); ?>
		<?php echo $form->error($model,'user_id');*/ ?>
		</div><!-- row -->

		<label><?php /*echo GxHtml::encode($model->getRelationLabel('guests')); ?></label>
		<?php echo $form->checkBoxList($model, 'guests', GxHtml::encodeEx(GxHtml::listDataEx(Guest::model()->findAllAttributes(null, true)), false, true));*/ ?>

<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->