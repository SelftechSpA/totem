<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="row botonera-tests span12 center" style="margin-top: 0px; padding-left: 35px;">
    <div class="span5 center">
        <h1 style="margin-top: -20px">Elija el test que desee realizar:</h1>
    </div>
    <a href="index.php?r=TestPittsburgh/create" class="test span6">
        <div class="row-fluid span12">
            <span class="span5">
                <img src="images/ico_test_pittsburgh.png" alt="">
                <h1>Calidad de sueño</h1>
            </span>
            <span class="span5 offset1">
                <br><br>
                <?php generateTestButton($this, 1, 'TestPittsburgh'); ?>
            </span>
        </div>
    </a>
    <a href="index.php?r=TestReaction/create" class="test span6">
        <div class="row-fluid span12">
            <span class="span5">
                <img src="images/ico_test_reaccion.png" alt="">
                <h1>Tiempo de reacción</h1>
            </span>
            <span class="span5 offset1">
                <br><br>
                <?php generateTestButton($this, 4, 'TestReaction'); ?>
            </span>
        </div>
    </a>
    <a href="index.php?r=TestMAP/create" class="test span6">
        <div class="row-fluid span12">
            <span class="span5">
                <img src="images/ico_test_map.png" alt="">
                <h1>Predicción de apnea</h1>
            </span>
            <span class="span5 offset1">
                <br><br>
                <?php generateTestButton($this, 2, 'TestMAP'); ?>
            </span>
        </div>
    </a>
    <a href="index.php?r=TestEpworth/create" class="test span6">
        <div class="row-fluid span12">
            <span class="span5">
                <img src="images/ico_test_epworth.png" alt="">
                <h1>Escala de somnolencia</h1>
            </span>
            <span class="span5 offset1">
                <br><br>
                <?php generateTestButton($this, 3, 'TestEpworth'); ?>
            </span>
        </div>
    </a>
</div>
<br>
<div class="row span5 center" style="text-align: center;">
    <?php 
    if ($this->someTestTaken())
        $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Finalizar e imprimir resultados',
            'type' => 'green',
            'size' => 'large',
            'icon' => 'ok white',
            'url'=>array('/totem/results'),
        ));     
    else
        $this->widget('bootstrap.widgets.TbButton',array(
            'label' => 'Salir',
            'type' => 'normal',
            'size' => 'large',
            'icon' => 'remove',
            'url'=>array('/totem/index'),
        ));   
    ?>
</div>
    
    <?php    
    
        function generateTestButton($controller, $test_id, $test_class){
            if ($controller->testTaken($test_id)){
                echo '<span class="complete"><i class="icon-ok"></i>&nbsp;Completado.&nbsp;&nbsp;</span>' . CHtml::button("Realizar de nuevo", array("class"=>"btn btn-normal btn-large", 'style'=>'height: 67px;'));
            }else{
                echo CHtml::button("Hacer el test", array("class"=>"btn btn-green btn-large"));
            }
        }
    
        /*function renderResults($obj, $test_id, $ymin, $ymax){
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
        }*/
    ?>
