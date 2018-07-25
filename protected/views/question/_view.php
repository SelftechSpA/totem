<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('id')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php echo GxHtml::encode($data->getAttributeLabel('test_id')); ?>:
		<?php echo GxHtml::encode(GxHtml::valueEx($data->test)); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('number')); ?>:
	<?php echo GxHtml::encode($data->number); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('text')); ?>:
	<?php echo GxHtml::encode($data->text); ?>
	<br />
	<?php echo GxHtml::encode($data->getAttributeLabel('question_type')); ?>:
	<?php echo GxHtml::encode($data->question_type); ?>
	<br />

</div>