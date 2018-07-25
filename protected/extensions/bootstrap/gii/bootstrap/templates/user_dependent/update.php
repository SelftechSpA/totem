<?php
/**
 * The following variables are available in this template:
 * - $this: the BootCrudCode object
 */
?>
<?php
echo "<?php\n
\$this->breadcrumbs = array(
	\$model->label(2) => array('index'),
	GxHtml::valueEx(\$model) => array('view', 'id' => GxActiveRecord::extractPkValue(\$model, true)),
	Yii::t('app', 'Update'),
);\n";
?>

$this->menu = array(
	array('label' => Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
	array('label' => Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
	array('label' => Yii::t('app', 'View') . ' ' . $model->label(), 'url'=>array('view', 'id' => GxActiveRecord::extractPkValue($model, true))),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')) : array(),
);
?>

<h1><?php echo '<?php'; ?> echo Yii::t('app', 'Update') . ' ' . GxHtml::encode($model->label()) . ' ' . GxHtml::encode(GxHtml::valueEx($model)); ?></h1>

<?php echo "<?php echo \$this->renderPartial('_form',array('model'=>\$model)); ?>"; ?>