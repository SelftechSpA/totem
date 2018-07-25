<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<div class="row span12 center">    
    <div class="span7" style="margin-top: 150px;">
        <h1>¡Bienvenido!</h1>
        <p class="info">A lo largo del día el cuerpo funciona en tres programas distintos: la  vigilia, el sueño lento y el sueño REM.<br>
            Cada uno cumple una función fisiológica normal.<br>
            <br>
            Sin embargo, estamos descansando varias horas menos en las últimas décadas y ello repercute en el rendimiento físico, en el rendimiento cognitivo y en el desarrollo de ciertas enfermedades relacionadas a la falta de sueño.<br>
            <br>
            Ese déficit de sueño se convierte en un factor de riesgo en las sociedades de funcionamiento continuo, (Sociedades 24/7) y junto al sedentarismo, la nutrición inadecuada, el tabaquismo, el consumo de alcohol y las drogas atentan contra nuestra salud, nuestro rendimiento laboral, nuestra vida social y sobre la seguridad pública.<br>
            <br>
            Descansar funciona como la elongación de los músculos antes del ejercicio, incrementando la capacidad del cerebro para adaptarse eficazmente a las exigencias que se plantean a diario.
        </p> 
    </div>   
    <span class="span2 offset2" style="margin-top: 280px">
        <?php echo CHtml::link('Toque aquí para comenzar', array("totem/begin"), array("class"=>"btn btn-green btn-large")); ?>
    </span>
</div>

<style>
    .menu ul{
        display: none;
    }
    .menu img{
        position: relative;
        left: 50%;
        margin-left: -200px;
        float: none;
        width: 400px;
    }
</style>
