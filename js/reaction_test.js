var LEFT = false;
var RIGHT = true;
var carPosition = RIGHT;
var keyDown = false;
var pressTime = 0;
var timeOffset = 0.1; //seg
var obstacleSpeed = 0.5; // seconds
var startTime = 0;
var obstacleIntervalMin = 5000; // ms
var obstacleIntervalMax = 10000; // ms
var keyPressed = true;
var obstaclesNumber = 30; //Cantidad de obstaculos en todo el juego (Default: 30)
var obstaclesPassed = 0; //Cantidad de obstaculos que ya pasaron
var reactions = new Array();
var invalidCount = 0;
var broadcastTimer;
var crashCount = 0;

function tryMoveCar(){
    if(!keyPressed){
        keyPressed = true;
        var d = new Date();
        pressTime = d.getTime();
        //log('press', pressTime);
        $('#obstacle').hide();

        if(startTime > 0){
            var reactionTime = getReactionTime(pressTime, startTime);
            //console.log('tryMoveCar '+(new Date()).getTime()+' - pressTime: '+pressTime+' startTime: '+startTime+' dif: '+(pressTime-startTime));
            /*if(reactionTime < obstacleSpeed * 1000){
                log('<strong style="color: green;">actual_reaction</strong>', reactionTime);
            }else{
                log('<strong style="color: red;">actual_reaction</strong>', reactionTime);
            }*/
            addReactionTime(reactionTime);
        }
    }else{
        //log('press', 'click inválido');
        showBroadcast('Manténgase en su carril', 'notice');
        invalidCount++;
        updateStats();
    }

    if(carPosition == LEFT){
        $('#terrain').attr('class', 'right');
        carPosition = RIGHT;
    }else{
        $('#terrain').attr('class', 'left');
        carPosition = LEFT;
    }
}

function getReactionTime(pressTime, startTime){
    var reactionTime = pressTime - startTime;
    //console.log('real: '+reactionTime);
    reactionTime = reactionTime - (timeOffset * 1000);
    //console.log('final: '+reactionTime);
    if(reactionTime < 0){
        reactionTime = 0;
    }

    return reactionTime;
}

function addReactionTime(value){
    reactions.push(value);
    if (value == -1){
        value = "--";
        crashCount++; // missed counted as crash
    }
    $('#reactionTime').html(value+'ms');

    if (value > 500){
        crashCount++;
    }
    updateStats();
}

function updateStats(){
    $('#stats').html('Crash: '+crashCount+'<br>Fallidos: '+invalidCount);
}

function showBroadcast(msg, clase){
    clearTimeout(broadcastTimer);
    if (!clase)
        clase = 'notice';
    $('#broadcast').attr('class', clase).html(msg);
    $('#broadcast').show();
    broadcastTimer = setTimeout(hideBroadcast, 3000);
}

function hideBroadcast(){
    $('#broadcast').fadeOut('fast');
}

$(document).ready(function(){
    preload(['themes/bootstrap/images/juego/fondo.png',
             'themes/bootstrap/images/juego/noise.gif',
             'themes/bootstrap/images/juego/1.png',
             'themes/bootstrap/images/juego/2.png',
             'themes/bootstrap/images/juego/3.png',
             'themes/bootstrap/images/juego/4.png',
             'themes/bootstrap/images/juego/5.png',
             'themes/bootstrap/images/juego/interior.gif',
             'themes/bootstrap/images/juego/rayas_der_ani.png',
             'themes/bootstrap/images/juego/rayas_izq_ani.png']);

	$('#intro').fadeIn();
	$('#horas_sueno').focus();

	var date = new Date();
    $('.spinEditHoras').spinedit({
        minimum: 0,
        maximum: 23,
        step: 1,
        value: 0,
        numberOfDecimals: 0
    });
    $('.spinEditMinutos').spinedit({
        minimum: 0,
        maximum: 59,
        step: 1,
        value: 0,
        numberOfDecimals: 0
    });
    $('.slider').slider({
        min: 0,
        max: 10,
        step: 1,
        value: 5,
        tooltip: 'show',
        handle: 'round'
    });


	$('#hora_actual').spinedit('setValue', date.getHours());
    $('#minutos_actual').spinedit('setValue', date.getMinutes());

	$('#instructionsButton').click(function(){
	   $('#play').fadeOut();
	   $('#instructions').fadeIn();
	   $('#playButton').focus();
	});

    $('#introButton').click(function(){
       $('#intro').fadeOut();
       $('#play').fadeIn();
       $('#horas_sueno').focus();
    });

	$('#playButton').click(function(){
        $('#instructions').fadeOut();
        playGame();
    });

    setInterval(function(){
        var frame = $('#rayas').attr('data-frame');
        $('#rayas').removeClass('frame-'+frame);
        frame=(frame+1)%3;
        $('#rayas').attr('data-frame', frame);
        $('#rayas').addClass('frame-'+frame);
    }, 60);
});

function getRandomObstacleInterval(){
    return Math.round(Math.random() * (obstacleIntervalMax - obstacleIntervalMin)) + obstacleIntervalMin;
}

function getAverageObstacleInterval(){
    return obstacleIntervalMin + (obstacleIntervalMax - obstacleIntervalMin) / 2;
}

function playGame(){
    $(document).keydown(function(evt) {

        if (evt.which == 32){
            evt.preventDefault();
            evt.stopPropagation();
            if (!keyDown) {
                tryMoveCar();
                keyDown = true;
            }
        }
    }).keyup(function(){
        keyDown = false;
    });

    /*$('#interiorAuto').click(function(){
        tryMoveCar();
    });*/

    //First obstacle
    setTimeout(function(){ addObstacle(); }, getRandomObstacleInterval());
    //trees
    //setInterval(function(){ addTree(true); addTree(false); }, 600);

}

/*function updateRemainingTime(){
    var minutesRemaining = Math.ceil((obstaclesNumber - obstaclesPassed) * getAverageObstacleInterval() / 1000 / 60);
    var remainingText;
    if (minutesRemaining <= 1){
        remainingText = '1 minuto';
    }else{
        remainingText = minutesRemaining + ' minutos';
    }
    $('#remainingTime').html('Tiempo restante: ' + remainingText);
}*/

function addObstacle(){
    if(!keyPressed){
        showBroadcast('¡¡Pulse ahora!!', 'warning');
        addReactionTime(-1);
    }

	//log('addObstacle','ingreso');
	keyPressed = false;
	var tl = new TimelineMax();

	//updateRemainingTime();

	//Next obstacle
	if(obstaclesPassed < obstaclesNumber){
		setTimeout(function(){ addObstacle(); }, getRandomObstacleInterval());
		obstaclesPassed++;
	}else{
	    $('#gameOver').fadeIn();
	    var horas_sueno = $('#horas_sueno').val();
	    var horas_despierto = $('#horas_despierto').val();
	    var hora_actual = $('#hora_actual').val();
	    var minutos_actual = $('#minutos_actual').val();
	    var como_se_siente = $('#como_se_siente').val();
	    /*log('invalidCount', invalidCount);
        log('horas_sueno', horas_sueno);
	    log('horas_despierto', horas_despierto);
	    log('hora_actual', hora_actual);
	    log('minutos_actual', minutos_actual);
	    log('como_se_siente', como_se_siente);*/

	    $.post("index.php?r=TestReaction/create", {
	        'ReactionTest[userReactionTestMeasurements][]': reactions,
	        'ReactionTest[invalid_count]': invalidCount,
	        'ReactionTest[sleep_hours]': horas_sueno,
	        'ReactionTest[awake_hours]': horas_despierto,
	        'ReactionTest[time_now]': parseFloat(hora_actual) + parseFloat(minutos_actual) / 60,
	        'ReactionTest[alert_level]': como_se_siente
	        }
	    ).done(function(data){
	        document.location.href="?r=TestReaction/view&id="+data;
	    });
		return;
	}

	var obstacle = $('#obstacle');
	var  randomNumber = getRandomInt(1,4);
	obstacle.removeClass().addClass('obstacle_'+randomNumber);
	//log('Clase del Obstaculo:','obstacle_'+randomNumber);
	var xpos = 0;

	//tl.to(obstacle, 0.001,{opacity: 1});
	tl.fromTo(obstacle, obstacleSpeed, {rotation:0, scaleX:1, scaleY:1}, {scaleX:6, scaleY:6}, '-=0.050');
	if(carPosition == RIGHT){
	    $('#obstacle').show();
		tl.fromTo(obstacle, obstacleSpeed, {x:-110, y:-120}, {x:0, y:160, ease: Power2.easeIn}, '-=0.550')/*.call(function(position){
		   return function(){
			  checkCrash(position);
		   };
		}(carPosition))*/;
		setTimeout(function(position){
           return function(){
              checkCrash(position);
           };
        }(carPosition), (obstacleSpeed + timeOffset)*1000);
	}else{
	    $('#obstacle').show();
		tl.fromTo(obstacle, obstacleSpeed, {x:20, y:-120}, {x:-110, y:160, ease: Power2.easeIn}, '-=0.550')/*.call(function(position){
		   return function(){
			  checkCrash(position);
		   };
		}(carPosition))*/;
		setTimeout(function(position){
           return function(){
              checkCrash(position);
           };
        }(carPosition), (obstacleSpeed + timeOffset) * 1000);
	}
    var d = new Date();
    startTime = d.getTime();
    pressTime = Number.POSITIVE_INFINITY;
    console.log('addObstacle');
}

function checkCrash(position){
	var tl = new TimelineMax();
	var obstacle = $('#obstacle');
    //console.log('checkCrash '+(new Date()).getTime()+' - pressTime: '+pressTime+' startTime: '+startTime+' dif: '+(pressTime-startTime));
    var reactionTime = getReactionTime(pressTime, startTime);
	if(reactionTime > (obstacleSpeed + timeOffset)*1000){
		//chocaste
		//obstacle.addClass('dead');
		if(position == RIGHT){
			tl.to(obstacle, obstacleSpeed, {rotation:100, x:450, y: 50, ease: Power2.easeOut});
		}else{
			tl.to(obstacle, obstacleSpeed, {rotation:-100, x:-450, y: 50, ease: Power2.easeOut});
		}
		showBroadcast('¡¡Crash!!', 'error');
		log('State','<span style="color: red">Crash</span>');

		tl.fromTo('#terrain', 0.600, {left: (-40 + getRandomInt(-20, 20))+'px', top: (-40 + getRandomInt(-20, 20))+'px', ease: Elastic.easeOut}, {left: '-20px', top: '-20px', ease: Elastic.easeOut}, '-=' + obstacleSpeed);
		tl.fromTo('#game-container', 0.050, {opacity: 0.5}, {opacity: 1}, '-=' + obstacleSpeed * 2);

	}else{
		//no chocaste
		if(position == RIGHT){
			tl.to(obstacle, obstacleSpeed/3, {x:120, y:400});
		}else{
			tl.to(obstacle, obstacleSpeed/3, {x:-230, y:400});
		}
		showBroadcast('¡Bien!', 'success');
		log('State','<span style="color: blue">Safe</span>');
	}
}

function addTree(position){
	var tree = $('<div class="tree"></div>');
	$('#game-container').append(tree);

	var tlTree = new TimelineMax();
	if(position){ tlTree.delay(0.2); }
	tlTree.fromTo(tree, obstacleSpeed, {opacity: 0}, {opacity: 1, ease: Power2.easeIn});
	tlTree.fromTo(tree, obstacleSpeed*2, {scaleX:0.8, scaleY:0.8}, {scaleX:2.5, scaleY:2.5, ease: Power2.easeIn}, '-=0.5');
	if(!position){
		tlTree.fromTo(tree, obstacleSpeed*2,{x:250, y:-15}, {x:470, y:280, ease: Power2.easeIn},'-=1');
	}else{
		tlTree.fromTo(tree, obstacleSpeed*2,{x:90, y:-15}, {x:-130, y:280, ease: Power2.easeIn},'-=1');
	}

	tlTree.call(function(){ tree.remove(); });

}

function log(subject,msg){
	$('#debug').prepend('<div><strong>'+subject+'</strong>: '+msg+'</div>');
}

function getRandomInt (min, max) {
    return Math.floor(Math.random() * (max - min + 1)) + min;
}

function preload(arrayOfImages) {
    $(arrayOfImages).each(function(){
        $('<img/>')[0].src = this;
    });
}