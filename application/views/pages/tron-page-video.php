<script>
    var tag = document.createElement('script');
    // tag.src = "https://www.youtube.com/player_api";
    tag.src = "https://www.youtube.com/iframe_api";

    var firstScriptTag = document.getElementsByTagName('script')[0];
    firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

    // CHANGED: width & height not fix
    var player;
    // function onYouTubePlayerAPIReady()
    function onYouTubeIframeAPIReady() {
      player = new YT.Player('player', {
        // height: $(window).innerHeight(),
        // width: $(window).innerWidth(),
        // height: '480',
        // width: '480',
        // height: 'auto',
        // width: 'auto',
        videoId: 'HAX3X-Jvdog',
        playerVars:{
          'autoplay': 1,
          'control': 0,
          'html5':1
        },
        events:{
          'onReady': onPlayerReady,
          'onStateChange': onPlayerStateChange
        }
      })
    }

    function onPlayerReady(event)
    {
      // BUG: iframe requestfullscreen var

      event.target.playVideo();
      var $ = document.querySelector.bind(document);
      iframe = $('#player');

      var requestfullscreen = iframe.requestFullScreen || iframe.mozRequestFullScreen || iframe.webkitRequestFullScreen;
      if (requestfullscreen)
      {
        requestfullscreen.bind(iframe)();
      }

    }

    var done = false;
    function onPlayerStateChange(event)
    {
      if (event.data == YT.PlayerState.ENDED && !done) {
        setTimeout(location.reload(), 6000);
        done = true;
      }
    }
</script>
<div class="yt_black_bg">
  <div id="player" width=100% height=100%></div>
  <!-- <iframe width="60%" height="1400px" src="https://www.youtube.com/embed/HAX3X-Jvdog?autoplay=1&controls=0" frameborder="0" allowfullscreen></iframe> -->
</div>
