<?php

$this->breadcrumbs=array(
    'User Tests'=>array('index'),
    Yii::t('app', 'Manage'),
);

$this->menu = array(
        array('label'=>Yii::t('app', 'List') . ' ' . $model->label(2), 'url'=>array('index')),
        array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(), 'url'=>array('create')),
    );

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('user-test-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<div class="span13 row center">
<h1><?php echo GxHtml::encode($model->label(2)); ?></h1>

<p>
<?php echo Yii::t('app', 'You may optionally enter a comparison operator (&lt;, &lt;=, &gt;, &gt;=, &lt;&gt; or =) at the beginning of each of your search values to specify how the comparison should be done.'); ?>
</p>

<?php //echo CHtml::link(Yii::t('app', 'Advanced Search'), '#', array('class' => 'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
    'model'=>$model,
));*/ ?>
</div><!-- search-form -->

    <?php $this->widget('bootstrap.widgets.TbButton', array(
        'type'=>'submit',
        'label'=>'Exportar a Excel',
        'url'=>array('results/excel'),
       )); ?>

    <?php
    if($_SERVER['SERVER_NAME'] == 'cato-totem.us-east-1.elasticbeanstalk.com'){
        $this->widget('bootstrap.widgets.TbButton', array(
            //'type'=>'link',
            'label'=>'Borrar resultados',
            'htmlOptions' => array(
                'name'=>'ActionButton',
                'confirm' => 'Se pederán todos los datos.¿Está seguro?',
            ),
            'url'=>array('results/deleteAll', 'ok'=>1),
        ));
    } ?>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
    'id'=>'user-test-grid',
    'type'=>'striped condensed',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        //'id',
        'date_taken',
        array(
                'header'=>Yii::t('app', 'Test'),
                'name'=>'test_id',
                'value'=>'$data->test->name',
                'filter'=>CHtml::listData(Test::model()->findAll(), 'id', 'name'),
                ),
        array(
            'header'=>'Empresa',
            //'name'=>'user.profile.company_id',
            'value'=>'($data->user->profile->company) ? $data->user->profile->company->name : null',
            'filter'=>CHtml::listData(Company::model()->findAll(), 'id', 'name'),
        ),
        array(
                'header'=>'Usuario',
                'name'=>'user_id',
                'value'=>'$data->user->profile->name',
                'filter'=>CHtml::listData(User::model()->findAll(), 'id', 'profile.name'),
                ),
        array(
                'name'=>'score',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>Yii::t('app', 'Age'),
                'name'=>'age',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>Yii::t('app', 'Gender'),
                'name'=>'gender',
                'value'=>'$data->getGenderText()',
                'filter'=>CHtml::listData(UserTest::model()->getGendersArray(), 'id', 'name'),
                ),
        array(
                'header'=>'Altura',
                'name'=>'height',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Peso',
                'name'=>'weight',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Estado civil',
                'name'=>'marital_status',
                'value'=>'$data->getMaritalStatusText()',
                'filter'=>CHtml::listData(UserTest::model()->getMaritalStatusesArray(), 'id', 'name'),
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Carrera',
                'name'=>'occupation',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Año de Universidad',
                'name'=>'occupation_area',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Nivel de actividad',
                'name'=>'activity_level',
                'value'=>'$data->getActivityLevelText()',
                'filter'=>CHtml::listData(UserTest::model()->getActivityLevelsArray(), 'id', 'name'),
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Hs. sueño días laborales',
                'name'=>'working_days_sleep_hours',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Hs. sueño deseadas días Universidad',
                'name'=>'working_days_sleep_hours_desired',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Calidad sueño días Universidad',
                'name'=>'working_days_sleep_quality',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Hs. sueño fin de semana',
                'name'=>'weekend_sleep_hours',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Hs. sueño deseadas fin de semana',
                'name'=>'weekend_sleep_hours_desired',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Calidad sueño fin de semana',
                'name'=>'weekend_sleep_quality',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Hs. De Universidad',
                'name'=>'working_hours',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Hs. ejercicio',
                'name'=>'exercise_hours',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Hs. ocio',
                'name'=>'recreation_hours',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Hs. viaje',
                'name'=>'travel_hours',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Desvío estándar',
                'value'=>'$data->isReactionTest()?$data->userReactionTests[0]->standardDeviation:""',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Media 10% más rápido',
                'value'=>'$data->isReactionTest()?$data->userReactionTests[0]->meanTopTenPercent:""',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Media 10% más lento',
                'value'=>'$data->isReactionTest()?$data->userReactionTests[0]->meanBottomTenPercent:""',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Lapsus',
                'value'=>'$data->isReactionTest()?$data->userReactionTests[0]->crashCount:""',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
                'header'=>'Super lapsus',
                'value'=>'$data->isReactionTest()?$data->userReactionTests[0]->superLapsusCount:""',
                'htmlOptions'=>array('style'=>'text-align: right;'),
                ),
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'template'=>'{view}',
            'buttons'=>array(
                'view'=>array(
                    'url'=>'$data->getViewURL()',
                ),
            ),
        ),
    ),
)); ?>

</div>
