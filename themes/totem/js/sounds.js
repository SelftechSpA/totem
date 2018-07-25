var showPlayButton = function() {
    $('#audio-player > #player-stop').hide();
    $('#audio-player > #player-play').show();
};

var showStopButton = function() {
    $('#audio-player > #player-stop').show();
    $('#audio-player > #player-play').hide();
};

var initVoicePlayer = function(path, fileName, onready){
    soundManager.setup({
        'url': path+'/js/soundmanager/',
        onready: function() {
            window.sound = soundManager.createSound({
                'url': path+'/audios/'+fileName,
                'onplay': showStopButton,
                'onfinish': showPlayButton,
                'onstop': showPlayButton
            });
            $('#audio-player > #player-play').show();
            if (onready)
                onready(window.sound);
        }
    });
};

var playVoice = function(){
    window.sound.play();
};

$(document).ready(function(){
    $('#audio-player > #player-play').click(playVoice);

    $('#audio-player > #player-stop').click(function(){
        window.sound.stop();
    });
});

function initPlayerOnLoad(path, fileName){
    $(document).ready(function(){
        $(document).focus(function(){
            initVoicePlayer(path, fileName, function(sound){ soundManager.stopAll(); sound.play(); });
        });
    });
}