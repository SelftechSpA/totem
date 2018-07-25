<?php
$this->breadcrumbs=array(
	'TestReactions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>Yii::t('app', 'Create') . ' ' . $model->label(),'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update') . ' ' . $model->label(),'url'=>array('update','id'=>$model->id)),
	array('label'=>Yii::t('app', 'Configure') . ' ' . $model->label(),'url'=>array('configure','id'=>$model->id)),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Delete') . ' ' . $model->label(),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')) : array(),
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2),'url'=>array('admin')) : array(),
);
?>

<div class="cuestionario form-centered">
<h1>Resultados del test</h1>

<div class="">
    <div class="row span6 center">
        <?php $this->widget('bootstrap.widgets.TbDetailView',array(
        	'data'=>$model,
        	'attributes'=>array_merge(array(
        	    'userTest.test',
                'userTest.date_taken',
                array('label'=>'Tiempo de reacción promedio', 'name'=>'userTest.score', 'value'=>round($model->userTest->score, 1).'ms'),
                'crash_count',
                'invalid_count',
                'missed_count',
        	),
        	(Yii::app()->getModule('user')->isAdmin())?array(
        	    'meanTopTenPercent',                
                'meanBottomTenPercent',                
                'standardDeviation',
            ):array()
            ),
        )); ?>
        <?php if ($model->userTest->score >= 500) { ?>
        <div class="row" style="padding:0px;">
            <span class="span1">
                <div class="semaforo pull-left">
                    <div class="light red on"><div class="glow"></div></div>
                    <div class="light"><div class="glow"></div></div>
                    <div class="light"><div class="glow"></div></div>
                </div>
            </span>
            <span class="span5">
                <div class="semaforo-info pull-left alert alert-block alert-error">
                    <span class="aviso-puntaje">Su tiempo de reacción promedio es<strong><?php echo round($model->userTest->score, 1).'ms'; ?></strong></span>
                    <strong>Peligro. <br>Reducida velocidad de reacción y capacidad atencional</strong>
                    <p>Evite conducir o realizar actividades que impliquen riesgos para Ud. o los demás.</p>
                    <p>Al volante el sueño puede ser tan peligroso como el alcohol. El cansancio acumulado puede provocar accidentes de transito.</p>
                </div>
            </span>
        </div>
        <?php } else if ($model->userTest->score >= 300) { ?>.
        <div class="row" style="padding:0px;">
        <span class="span1">
            <div class="semaforo pull-left">
                <div class="light"><div class="glow"></div></div>
                <div class="light yellow on"><div class="glow"></div></div>
                <div class="light"><div class="glow"></div></div>
            </div>
        </span>
        <span class="span5">
            <div class="semaforo-info pull-left alert alert-block alert-warning">
                <span class="aviso-puntaje">Su tiempo de reacción promedio es<strong><?php echo round($model->userTest->score, 1).'ms'; ?></strong></span>
                <strong>Precaución. <br>Presenta moderada velocidad de reacción y capacidad atencional</strong>
                <p>Procure descansar previamente si va a conducir o realizar actividades que impliquen riesgos para Ud. o los demás.</p>
                <p>Al volante el sueño puede ser tan peligroso como el alcohol. El cansancio acumulado puede provocar accidentes de transito.</p>
            </div>
        </span>
        </div>
        <?php }else{ ?>
        <div class="row" style="padding:0px;">
        <span class="span1">
            <div class="semaforo pull-left">
                <div class="light"><div class="glow"></div></div>
                <div class="light"><div class="glow"></div></div>
                <div class="light green on"><div class="glow"></div></div>
            </div>
        </span>
        <span class="span5"> 
            <div class="semaforo-info pull-left alert alert-block alert-success">
                <span class="aviso-puntaje">Su tiempo de reacción promedio es<strong><?php echo round($model->userTest->score, 1).'ms'; ?></strong></span>
                <strong>Seguro. <br>Presenta una adecuada velocidad de reacción y capacidad atencional.</strong>
                <p></p>
            </div>
        </span>
        </div>
        <?php } ?>
        <!--
        <script>
        function hoverCallback(index, options, content){
            var row = options.data[index];
            return 'Hora: ' + row.x + ':00 - ' + row.x + ':59<br>Promedio: ' + Math.floor(row.a) + 'ms';
        }
        </script>
        <h5>Tiempo de reacción según la hora del día</h5>
        <?php    
            /*$data = array();
            $ykeys = array();
            $labels = array();
            
            //$measurements = $model->userReactionTestMeasurements;
            $i = 0;
            
            $tests = UserTest::model()->findAllByAttributes(array('user_id'=>Yii::app()->getUser()->id, 'test_id'=>4));
            $hourly_sum = array();
            $hourly_count = array();
            for($hour = 0; $hour < 24; $hour++){
                $hourly_sum[$hour] = 0;
                $hourly_count[$hour] = 0;
            }
            if (isset($tests))
                foreach ($tests as $t) {
                    $hour = date('G', strtotime($t->date_taken));
                    $hourly_sum[$hour] = $t->score;
                    $hourly_count[$hour]++;
                }  
                        
            for($hour = 0; $hour < 24; $hour++){
                $avg = $hourly_count[$hour] > 0 ? $hourly_sum[$hour] / $hourly_count[$hour] : 0;
                array_push($data, array('x' => $hour, 'a' => round($avg, 1)));
            }
                
            $this->widget('application.extensions.morris.MorrisChartWidget', array(
                'id'      => 'myChartElement',
                'options' => array(
                    'chartType' => 'Line',
                    'data'      => $data,
                    'xkey'      => 'x',
                    'ykeys'     => array('a'),
                    'labels'    => array('Tiempo de reacción'),
                    'hoverCallback' => 'js:hoverCallback',          
                    'parseTime' => false,
                    'postUnits' => 'ms',
                    'goals' => array(500, array_sum($hourly_sum) / array_sum($hourly_count)),
                    'goalLineColors' => array('#F99', '#AAA'),
                    'goalStrokeWidth' => 2,
                    //'ymax' => 'auto 600',   
                    'continuousLine' => 'true',
                    'ymin'      => 0,
                    'ymax'      => 3000,
                    'smooth'    => false,                
                ),
            ));*/        
        ?>-->
        
        <div class="alert alert-block alert-info">
            Ahora podras aprender más sobre los Hábitos de Sueño Saludable a través de estos videos en los que participan especialistas en Cronobiología y Medicina del Sueño.
        </div>
        
        <iframe width="570" height="321" src="//www.youtube.com/embed/videoseries?list=PLHoIooffOTDqO9cTsOK215ROw3XnGoJsI" frameborder="0" allowfullscreen></iframe>
        <br>  
        
    </div>
    <div class="row actions">
        <?php $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Realizar otro test',
            'type' => 'green',
            'size' => 'large',
            'icon' => 'chevron-left white',
            'url'=>array('/site/test'),
        )); ?>
    </div>
    
    <div class="row span6 center">
         <div class="importante">
            <strong>Nota</strong>
             <p>No importa cómo le fue en la prueba. Tenga en cuenta que la velocidad de reacción disminuye a medida que usted está despierto.</p>
         </div>
     </div>
</div>

</div>