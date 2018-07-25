<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="row botonera-tests span12 center">
    <div class="span12 nomargin">
        <h1 style="color:silver;">ELIGE EL <span style="color:black;">TEST</span> QUE DESEES REALIZAR</h1>
    </div>
    <div class="test span3">
        <!--<img src="images/ico_test_pittsburgh.png" alt="">
        <h1 style="text-transform: uppercase;">Calidad de sueño</h1>
        <?php echo CHtml::link("Hacer el test", array("TestPittsburgh/create"), array("class"=>"btn btn-green")); ?>-->
        <?php echo CHtml::link('<div class="test span3">
        <img src="images/ico_test_pittsburgh.png" alt="">
        <h1 style="text-transform: uppercase;">Calidad de sueño</h1></div>', array("TestPittsburgh/create")); ?>
    </div>
    
    <div class="test span3">
        <!--<img src="images/ico_test_reaccion.png" alt="">
        <h1>Tiempo de reacción</h1>
        <?php echo CHtml::link("Hacer el test", array("TestReaction/create"), array("class"=>"btn btn-green btn-large")); ?>-->
        <?php echo CHtml::link('<div class="test span3">
        <img src="images/ico_test_reaccion.png" alt="">
        <h1 style="text-transform: uppercase;">Tiempo de reacción</h1></div>', array("TestReaction/create")); ?>
    </div>
    <div class="test span3">
        <!--<img src="images/ico_test_map.png" alt="">
        <h1>Predicción de apnea</h1>
        <?php echo CHtml::link("Hacer el test", array("TestMAP/create"), array("class"=>"btn btn-green btn-large")); ?>-->
        <?php echo CHtml::link('<div class="test span3">
        <img src="images/ico_test_map.png" alt="">
        <h1 style="text-transform: uppercase;">Predicción de apnea</h1></div>', array("TestMAP/create")); ?>
    </div>
    <div class="test span3">
        <!--<img src="images/ico_test_epworth.png" alt="">
        <h1>Escala de somnolencia</h1>
        <?php echo CHtml::link("Hacer el test", array("TestEpworth/create"), array("class"=>"btn btn-green btn-large")); ?>-->
        <?php echo CHtml::link('<div class="test span3">
        <img src="images/ico_test_epworth.png" alt="">
        <h1 style="text-transform: uppercase;">Escala de somnolencia</h1></div>', array("TestEpworth/create")); ?>
    </div>
</div>

<div class="row span12 center">
        <?php echo CHtml::link("Generar planilla últimos resultados", array("site/results"), array("class"=>"btn btn-green btn-large")); ?>
</div>

<div class="row span12 center">
    <div class="span12 nomargin">
        <h1>Últimos resultados</h1>    
        
        <?php $this->widget('bootstrap.widgets.TbGridView',array(
            'id'=>'TestResults-grid',
            'dataProvider'=>$results->search(),
            'type'=>'bordered striped',
            //'filter'=>$results,
            'summaryText'=>'',
            'columns'=>array(
                array('name'=>'date_taken',
                      'htmlOptions'=>array('width'=>160),
                      ),
                array(
                    'name'=>'test',
                    'value'=>'GxHtml::valueEx($data->test)',
                    'filter'=>GxHtml::listDataEx(Test::model()->findAllAttributes(null, true)),
                    'htmlOptions'=>array('width'=>200),
                ),
                array(
                    'name'=>'score',
                    'header'=>Yii::t('app', 'Score'),
                    'value'=>'round($data->score, 1)',
                ),       
                array(
                    'class'=>'bootstrap.widgets.TbButtonColumn',
                    'template'=>'{view}',
                    'buttons'=>array(
                        'view' => array(
                            'label'=>Yii::t('app', 'View test results'),     // text label of the button
                            'url'=>'$data->getViewURL()',       // the PHP expression for generating the URL of the button
                            'icon'=>'eye-open',
                        ),                
                    ),            
                    'htmlOptions'=>array('width'=>80),
                ),
            ),
        )); ?>
    </div>
    <script>
        function hoverCallback(index, options, content){
            var row = options.data[index];
            for (var i=0; i<options.ykeys.length; i++){
                if (row[options.ykeys[i]]){
                    return row.x + '<br><strong>' + options.labels[i] + '</strong><br>Puntaje: ' + row[options.ykeys[i]];
                }
            }
        }
        $(function(){
            setTimeout(function(){
                $('#chartTabs a, #chartTabs li').removeClass('active');
                $('#chartTabs a:first').tab('show');
            }, 1000);
        });
    </script>
    <div class="span7" style="">
        <h1>Mi progreso</h1>
        <?php $this->widget('bootstrap.widgets.TbTabs', array(
            'type'=>'pills', // 'tabs' or 'pills'
            'tabs'=>array(
                array('label'=>'Calidad de sueño', 
                      'content'=>renderResults($this, 1, 0, 0, 21), 
                      'active'=>true),
                array('label'=>'Tiempo de reacción', 
                      'content'=>renderResults($this, 4, 0, 3000), 
                      'active'=>true),
                array('label'=>'Predicción de apnea', 
                      'content'=>renderResults($this, 2, 0, 1), 
                      'active'=>true),
                array('label'=>'Escala de somnolencia', 
                      'content'=>renderResults($this, 3, 0, 24), 
                      'active'=>true),
            ),
            'htmlOptions'=>array('id'=>'chartTabs',
                                 'style'=>'padding-top: 23px;'),
        )); ?>
        
        <?php    
        
            function renderResults($obj, $test_id, $ymin, $ymax){
                $last_tests = UserTest::model()->findAllByAttributes(array('user_id'=>Yii::app()->getUser()->id, 'test_id'=>$test_id));
                $data = array();
                $ykeys = array();
                $labels = array();
                
                if (!empty($last_tests)){
                    foreach ($last_tests as $t) {
                        array_push($data, array('x' => $t->date_taken, $t->test->id => $t->score));
                    }
                    
                    $t = $last_tests[0]->test; 
                    ob_start();
                    $obj->widget('application.extensions.morris.MorrisChartWidget', array(
                        'id'      => 'myChartElement_'.$test_id,
                        'options' => array(
                            'chartType' => 'Line',
                            'data'      => $data,
                            'xkey'      => 'x',
                            'ykeys'     => array($t->id),
                            'labels'    => array($t->name),
                            'hoverCallback' => 'js:hoverCallback',
                            'ymin'      => $ymin,
                            'ymax'      => $ymax,
                            'smooth'    => false,
                        ),
                        'htmlOptions'=>array('class'=>'resultsChart'),
                    ));
                    return ob_get_clean();
                }
            } 
        ?>
    </div>
</div>
<style>
    .resultsChart{
        background-image: url(images/graph_scale.jpg);
        background-size: 5px 81%;
        background-position: 97% 24px;
        background-repeat: no-repeat;        
    }
</style>
