<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n
\$this->breadcrumbs = array(
	{$this->modelClass}::label(2),
	Yii::t('app', 'Index'),
);\n";
?>

$this->menu = array(
	array('label'=>Yii::t('app', 'Create') . ' ' . <?php echo $this->modelClass; ?>::label(), 'url' => array('create')),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . <?php echo "{$this->modelClass}::label(2)"; ?>, 'url'=>array('admin')) : array(),
);
?>

<h1><?php echo '<?php'; ?> echo GxHtml::encode(<?php echo $this->modelClass; ?>::label(2)); ?></h1>

<?php echo "<?php"; ?> $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
