<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<style>
    .resultsSheet{
        font-size: 100%;
        margin-top: 0px !important;
    }
    .title{
        font-weight: bold;
        font-size: 15px;
    }
    .score{
        text-align: right;
        font-weight: bold;
        font-size: 15px;
    }
    th{
        font-size: 15px;
        padding-left: 0 !important;
    }
    h4{
        font-size: 15px;
    }
    .info{
        color: gray;
    }
</style>

<div class="row span12 center resultsSheet">
    <div class="span12 nomargin pull-left">
        <img class="logo" src="images/logo_print.png" alt="" width="200" align="left" />
        <div class="pull-right">
            <h4>Últimos resultados</h4>
            <h4>Usuario: <?php echo Yii::app()->user->name; ?></h4>
            <h4>Fecha: <?php echo date('Y-m-d H:i:s'); ?></h4>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div class="span12 nomargin" style="border-top: 4px solid #e5e5e5; width: 100%;">
        
    </div>
    <table cellpadding="0" cellspacing="0" style="border-bottom: 4px solid #fc6351; width: 100%;">
        <tr>
            <th class="title" colspan="2">Test</th>
            <th class="title" colspan="1">Fecha</th>
            <th class="title" colspan="2">Resultado</th>
            <th class="title" colspan="1"></th>
        </tr>

        <tr>
        	<td><img src="images/ico_test_pittsburgh.png" alt="" width="50"></td>
        	<td class="title">Calidad de sueño</td>
            <td><?php echo $lastPittsburghTest->date_taken; ?></td>
        	<td class="score"><?php echo $lastPittsburghTest->score; ?></td>
        	<td><?php echo $lastPittsburghTest->getResultText(); ?></td>
            <td class="info"><?php echo '#'.$lastPittsburghTest->id; ?></td>
        </tr>

        <tr>
            <td><img src="images/ico_test_epworth.png" alt="" width="50"></td>
            <td class="title">Escala de somnolencia diurna</td>
            <td><?php echo $lastEpworthTest->date_taken; ?></td>
            <td class="score"><?php echo $lastEpworthTest->score; ?></td>
            <td><?php echo $lastEpworthTest->getResultText(); ?></td>
            <td class="info"><?php echo '#'.$lastEpworthTest->id; ?></td>
        </tr>

        <tr>
        	<td><img src="images/ico_test_map.png" alt="" width="50"></td>
        	<td class="title">Predicción de apnea</td>
            <td><?php echo $lastMapTest->date_taken; ?></td>
        	<td class="score"><?php echo $lastMapTest->score; ?></td>
        	<td><?php echo $lastMapTest->getResultText(); ?></td>
            <td class="info"><?php echo '#'.$lastMapTest->id; ?></td>
        </tr>
        
        <tr>
            <td><img src="images/ico_test_reaccion.png" alt="" width="50"></td>
            <td class="title">Tiempo de reacción</td>
            <td><?php echo $lastReactionTest->date_taken; ?></td>
            <td class="score"><?php echo $lastReactionTest->score; ?></td>
            <td><?php echo isset($lastReactionTest->userReactionTests[0])?$lastReactionTest->userReactionTests[0]->getResultText():null; ?></td>
            <td class="info"><?php echo '#'.$lastReactionTest->id; ?></td>
        </tr>

        <tr>
            <td colspan="6" style="text-align: center; padding: 20px;">
                <span class="screen-only">
                    <?php echo CHtml::link("Volver", array("site/test"), array("class"=>"btn btn-default btn-normal")); ?>
                    &nbsp;
                    <button class="btn btn-green" onclick="window.print();">Imprimir</button>
                </span>
            </td>
        </tr>
    </table>
</div>