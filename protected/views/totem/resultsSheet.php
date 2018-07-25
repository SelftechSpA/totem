<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<style>
    @page { 
        size: 72mm 150mm; 
        margin: 0;
    }
    .resultsSheet, body, label, p, input, button, select, textarea{
        /*font-family: "Courier New", Courier, monospace !important;*/
    }
    .resultsSheet{
        width: 72mm;
        margin-top: 0px !important;
        overflow: hidden;
        /*border: 1px solid red;*/
       
    }
    .logo{
        width: 60mm;
        margin-top: 3mm;
        margin-bottom: 3mm;
    }
    h4{
        font-size: 8pt;
        line-height: 1;
        font-weight: normal;
        margin-top: 0.6mm;
        margin-bottom: 0.6mm;
    }
    
    .info{
        color: gray;
    }
    .testResult{
        border-top: 1pt dashed black;
        padding: 2mm 1.5mm;
        width: 100%;
        box-sizing: border-box;
        line-height: 1;
        min-height: 11mm;
    }
    .testResult img{
        margin: 0;
        width: 1cm;
    }
    .testResult h2{
        font-size: 9pt;
        left: 10px;
        line-height: 1;
        margin: 4px 0 4px 49px;
    }
    .testResult p{
        font-size: 8pt;
        margin: 0 0 1pt 49px;
    }
    .note{
        font-size: 7pt;
        border-top: 1pt dashed black;
        border-bottom: 3pt double #000; 
        width: 100%;
        text-align: center;
        line-height: 1;
        padding: 3mm 0 3mm 0;
        margin-bottom: 5mm;
    }
    .note h2{
        font-size: 8pt;
        line-height: 1;
        margin: 0;
    }

    .print-again{
        width: 200px;
    }

    .print-end{
        width: 140px;
    }

    @media print{
        body, html{
            margin: 0;
            padding: 0;
        }
        #page > .content, .resultsSheet, #content{
            margin: 0;
            padding: 0;
        }
    }    
</style>

<div class="row center resultsSheet print-only">
    <div class="nomargin" style="text-align: center;">
        <img class="logo" src="images/logo_print_ticket.png" alt="" align="" />
        <div class="">
            <h4>Informe de resultados</h4>
            <h4>Usuario: <?php echo Yii::app()->user->name; ?></h4>
            <h4>Fecha: <?php echo date('Y-m-d H:i:s'); ?></h4>
        </div>
    </div>
    <div style="clear: both;"></div>
    <?php 
    generateResultRow($lastPittsburghTest, 'Calidad de sueño (Pittsburgh)', 'ico_test_pittsburgh.png');
    generateResultRow($lastEpworthTest, 'Escala de somnolencia diurna (Epworth)', 'ico_test_epworth.png');
    generateResultRow($lastMapTest, 'Predicción de apnea (MAP)', 'ico_test_map.png');
    generateResultRow($lastReactionTest, 'Tiempo de reacción', 'ico_test_reaccion.png');
    ?>
    <div class="note">
        <h2>Importante</h2>
        <br>
        Estos cuestionarios cuantifican la probabilidad de padecer un trastorno de sueño, pero no deben ser interpretados en forma aislada.<br>
        Es decir, en ningún caso reemplazan una consulta médica.<br>
        Ante cualquier duda consulte a su médico de confianza.
    </div>
</div>
<div class="row span12 center screen-only" style="text-align: center;">
    <div class="span4 offset4">
        <h2>Por favor retire su ticket</h2>
        <div class="printer">
            <div class="slot">
                <div class="paper"></div>
            </div>
        </div>
        <br>
        <?php echo CHtml::link("Finalizar", array("totem/index"), array("class"=>"btn btn-green btn-large print-end")); ?>
        <br>
        <br>
        <br>
        <button class="btn btn-default btn-normal print-again" onclick="window.print();">Imprimir de nuevo</button>
    </div>
</div>
<?php 
function generateResultRow($test, $title, $image){
    if ($test->date_taken == ''){
    ?>  
    <div class="testResult">
        <img src="images/<?php echo $image; ?>" alt="" align="left">
        <h2><?php echo $title; ?></h2>
        <p>No realizado</p>
    </div>
    <?php
    }else{
    ?>
    <div class="testResult">
        <img src="images/<?php echo $image; ?>" alt="" align="left">
        <h2><?php echo $title; ?></h2>
        <p><?php echo $test->date_taken; ?> <?php echo '#'.$test->id; ?></p>
        <p>Resultado: <strong><?php echo $test->score; ?></strong></p>
        <p><?php echo $test->getResultText(); ?></p>
    </div>
    <?php
    }
}
?>
<script>
    $(function(){
      window.print();  
    });
</script>