$(document).ready(function(){
    $(".play").click(function(){
        path = $(this).attr('path');
        $(".reproductor").attr({
            src: path
        })
        
        var audio = document.getElementById("audio");

        audio.play();
    });
});