<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('question_type_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->questionType)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('value')); ?>:
	<?php echo GxHtml::encode($data->value); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('text')); ?>:
	<?php echo GxHtml::encode($data->text); ?>
	<br />

</div>