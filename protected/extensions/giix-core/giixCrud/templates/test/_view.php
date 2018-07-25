<div class="view">

	<?php echo GxHtml::encode($data->getAttributeLabel('name')); ?>:
	<?php echo GxHtml::link(GxHtml::encode($data->name), array('view', 'id' => $data->id)); ?>
	<br />

</div>