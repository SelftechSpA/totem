<?php
/* @var $this SiteController */
$this->pageTitle=Yii::app()->name;
?>
<div class="row span12 center">
    
    <!--<div id="myCarousel" class="carousel slide span8">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="active item">
                <div class="video-wrapper">
                    <iframe width="640" height="400" src="//www.youtube.com/embed/sUthYayXCXk?rel=0" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="item">
                <div class="span6">
                    <h1>Bienvenido</h1>
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
            </div>
        </div>
        <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
        <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>-->
    
    <div class="span7">
        <div class="video-wrapper">
            <iframe width="780" height="439" src="//www.youtube.com/embed/Yih4VjgiCWA?rel=0" frameborder="0" allowfullscreen></iframe>
        </div>
        <h1>Bienvenido</h1>
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
    <span class="span4">
        <div id="banners_home">
            <a href="index.php?r=site/video&code=noTo9JZHr3c"><img src="images/banner_evento.gif" alt=""></a>
            <br><br>
            <a href="index.php?r=site/video&code=LjBCkCVkcsg"><img src="images/banner_claves.gif" alt=""></a>
            <br><br>
        </div>
    	<!--<div id="facebook_box">
			<div class="fb-like-box" data-href="https://www.facebook.com/selfishnesspowernap" data-width="292" data-show-faces="true" data-header="false" data-stream="true" data-show-border="true"></div>
		</div>-->
    </span>
</div>
<div class="row barra-inferior menu-home">
    <?php echo CHtml::link('', array('/site/test'), array('class'=>'span6')); ?>
</div>
