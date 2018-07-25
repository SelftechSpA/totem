<?php
$this->breadcrumbs=array(
	'TestReactions'=>array('index'),
	Yii::t('app', 'Create'),
);

$this->menu = array(
	Yii::app()->getModule('user')->isAdmin() ? array('label'=>Yii::t('app', 'Manage') . ' ' . $model->label(2), 'url'=>array('admin')) : array(),
);
?>

<style>
	body { -webkit-touch-callout: none; -webkit-text-size-adjust: none; -webkit-user-select: none; -webkit-highlight: none; -webkit-tap-highlight-color: rgba(0,0,0,0); }
</style>

<script type="text/javascript" src="js/spinedit/bootstrap-spinedit.js"></script>
<link rel="stylesheet" type="text/css" href="js/spinedit/bootstrap-spinedit.css" />
<script type="text/javascript" src="js/slider/bootstrap-slider.js"></script>
<link rel="stylesheet" type="text/css" href="js/slider/slider.css" />
<script type='application/javascript' src='js/fastclick.js'></script>

<script src="js/TweenMax.min.js"></script>
<script src="js/reaction_test_totem.js"></script>
<div class="row center" style="width: 640px; margin-bottom: 30px; position: relative;">
    <h1>Test de reacción</h1>
    <div class="reaction-tips">
        <a href="javascript:;" class="eyes_open_icon" rel="tooltip" data-placement="right" title="Ojos bien abiertos, el sueño al volante impacta como el alcohol"></a>
        <a href="javascript:;" class="dont_drink_and_drive_icon" data-placement="right" rel="tooltip" title="Evite ingerir alcohol si va a conducir"></a>
        <a href="javascript:;" class="dont_text_and_drive_icon" data-placement="right" rel="tooltip" title="No hable por celular mientras conduce"></a>
    </div>
    <div id="game-container">
        <?php echo CHtml::link("Abortar test", array("/totem/test"), array("class"=>"btn btn-inverse bt-abandon-test", "id"=>"bt-abandon-reaction-test")); ?>
        
        <div id="terrain" class="right">
            <div id="noise"></div>
            <div id="rayas" class="frame-0" data-frame="0"></div>
            <div id="obstacle"></div>
        </div>
        <div id="broadcast"></div>
        <div id="reactionTimeLabel">Tiempo de reacción:</div>
        <div id="reactionTime"></div>
        <!--<div id="remainingTime">Tiempo restante: 3 minutos</div>-->
        <div id="stats">Crash: 0<br>Fallidos: 0</div>
        <div id="interiorAuto"></div>
    	<div id="clickButton">Esquivar</div>

        <div id="intro">
            <div class="info-inner">
                <h1>Introducción</h1>
                <br>
                <p>
                    Esta prueba, denominada Test de Reacción Psicomotora, mide la capacidad atencional y la velocidad de reacción ante la aparición de un estímulo.<br>
                    Estas variables son fundamentales durante tu período de actividad y se ven afectadas por la pérdida de sueño total o parcial durante la noche y por el desequilibrio de tus ritmos biológicos.<br>
                </p>
                <br>
                <br>
                <button type="button" id="introButton" class="btn btn-danger btn-large">Continuar</button>
            </div>
        </div>
    	<div id="gameOver">
            <div class="info-inner">Test finalizado. Espere por favor...</div>
    	</div>
    	<div id="play">
            <div class="info-inner">
                <h1 style="margin-top: 0px;">Antes de empezar...</h1>
                <br>
                <p>
                <div>
                    <label>¿Cuántas horas durmió anoche?</label>
                </div>
                <br>
                <div style="margin-top: -70px;">
                    <input type="text" name="horas_sueno" id="horas_sueno" class="spinEditHoras">
                </div>

                <br><br>

                <div>
                    <label>¿Cuántas horas hace que está despierto?</label>
                </div>
                <br>
                <div style="margin-top: -70px;">
                    <input type="text" name="horas_despierto" id="horas_despierto" class="spinEditHoras">
                </div>


                <div class="hidden">
                    <label>¿Qué hora es?</label> <span>Hora</span> &nbsp;
                    <input type="text" name="hora_actual" id="hora_actual" class="spinEditHoras"> &nbsp; &nbsp; &nbsp; &nbsp;
                    <span>Minutos</span>&nbsp;
                    <input type="text" name="minutos_actual" id="minutos_actual" class="spinEditMinutos"><br><br>
                </div>

                <br><br>

                <div>
                    <label>¿Cómo se siente?</label>
                </div>
                <div>
                    <span>Nada Alerta</span>&nbsp;&nbsp;
                    <input type="text" name="como_se_siente" id="como_se_siente" class="slider" value="5">&nbsp;&nbsp;
                    <span>Muy Alerta</span>
                </div>




                </p>
                <br>
                <button type="button" id="instructionsButton" class="btn btn-danger btn-large">Continuar</button>
            </div>
    	</div>
    	<div id="instructions">
            <div class="info-inner">
                <h1>Instrucciones</h1>
                <p style="text-align: left;">
                    a. Mientras conduzca aparecerán obstáculos en la ruta.<br>
                    b. Apenas vea un obstáculo esquívelo presionando la barra espaciadora.<br>
                    c. Mientras tanto mantenga su carril.<br>
                    d. Para que aparezcan los resultados deberá completar el test de 3 minutos.<br>
                    e. Presione "Comenzar" o la barra para empezar.<br>
                    <br>
                </p>
                <button type="button" id="playButton" class="btn btn-danger btn-large">Comenzar</button>
            </div>
    	</div>
    </div>
    <div id="debug" style="display: none;"></div>
</div>

<script type="text/javascript">
window.addEventListener('load', function() {
    test = document.getElementById('interiorAuto');
	FastClick.attach(test);

	test.addEventListener('click', function(event) {
		tryMoveCar();
	}, false);

}, false);
</script>