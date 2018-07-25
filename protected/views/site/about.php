<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<style>
    strong{
        color: #fc6351;
    }
</style>
<div class="row span12 center">
    <div class="span6">
        <?php //echo CHtml::image('images/about.jpg'); ?>
        <?php $this->widget('bootstrap.widgets.TbCarousel', array(
            'items'=>array(
                array('image'=>'images/about.jpg'/*, 'label'=>'First Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'*/),
                array('image'=>'images/about_slider_1.jpg'/*, 'label'=>'First Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'*/),
                array('image'=>'images/about_slider_2.jpg'/*, 'label'=>'Second Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'*/),
                array('image'=>'images/about_slider_3.jpg'/*, 'label'=>'Third Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'*/),
                array('image'=>'images/about_slider_4.jpg'/*, 'label'=>'Third Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'*/),
                array('image'=>'images/about_slider_5.jpg'/*, 'label'=>'Third Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'*/),
                array('image'=>'images/about_slider_6.jpg'/*, 'label'=>'Third Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'*/),
            ),
        )); ?>
    </div>
    <div class="span5">
        <h1>HSS: Hábitos de Sueño Saludable</h1>
        <p class="info">
            <h3>NUESTRA MISIÓN: DIVULGAR, EDUCAR, CONCIENTIZAR.</h3>

            <strong>La falta de sueño adecuado es un factor de riesgo en las sociedades modernas</strong>, y al igual que la inactividad física, la nutrición inadecuada, el tabaquismo y el consumo excesivo de alcohol, atenta contra nuestra salud, rendimiento y seguridad.<br>
            <br>
            <strong>La duración y la calidad de nuestro descanso resultan vitales</strong> para obtener la mejor versión de nosotros mismos, mejorar nuestras capacidades adaptativas y generativas y maximizar nuestro potencial, tanto en la vida personal como en la laboral.<br>
            <br>
            Somos un equipo de profesionales especialistas en Medicina del Sueño y Cronobiología, y ponemos a tu disposición la <strong>Primera Estación Interactiva de Sueño Saludable</strong>, para que puedas evaluar cómo descansás y aprendas a manejar y equilibrar tus ritmos biológicos,  en una sociedad que nos exige cada día más y que funciona sin parar las 24 horas continuas.<br>
            <br>
            Conocenos en <a href="http://dromcronobiologia.com.ar">www.dromcronobiologia.com.ar</a>, donde podrás acceder a más información, videos, publicaciones científicas y conocer las soluciones que llevamos a las empresas para mejorar la gestión de las personas.
        </p>
    </div>
</div>
<div class="row barra-inferior menu-about">
    <?php echo CHtml::link('', array('/site/test'), array('class'=>'span6')); ?>
</div>