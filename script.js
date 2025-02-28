/** This script does not need to check for DOMContentLoaded because it is loaded with defer */


/****** If more than one Youtube embed on page, stop others if play new **/
(function loadYouTubeAPI() {
    const script = document.createElement('script');
    script.src = "https://www.youtube.com/iframe_api";
    script.async = true;
    /*script.onload = () => {
        console.log('YouTube IFrame API script loaded');
    };*/
    const firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(script, firstScriptTag);
})();



// Array to hold all YouTube players
let players = [];

// This function is called automatically when the YouTube API is ready
/*
Note, function onYouTubeIframeAPIReady() { does not work when built with webpack */

window.onYouTubeIframeAPIReady = function() {
    //console.log('in onyoutubeAPIReady');
    // Find all YouTube iframe elements on the page
    const iframes = document.querySelectorAll('iframe[src*="youtube.com/embed"]');

    // Initialize a player for each iframe
    iframes.forEach((iframe, index) => {
        const src = iframe.src;

        const player = new YT.Player(iframe, {
            events: {
                onStateChange: onPlayerStateChange
            }
        });
        
        players.push(player);
    });
}

// Event listener for player state changes
function onPlayerStateChange(event) {
    if (event.data === YT.PlayerState.PLAYING) {
        // Pause all other players
        players.forEach((player) => {
            if (player !== event.target) {
                player.pauseVideo();
            }
        });
    }
}