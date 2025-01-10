<?php
$db = mysqli_connect('localhost', 'root', '', 'mydb');
$query = "select * from live order by updatedAt desc limit 1";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $stream = $row['stream'];
} else {
    $stream = '';
}

mysqli_close($db);
?>

<html>

<head>
    <link rel="stylesheet" href="Assets/CSS/liveVideo.css">
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>


</head>

<body>
    <div class="hlsWrapper">
        <div class="hls-player">
            <video id="video" class="video" controls autoplay muted playsinline width="100%"> </video>

            <div class="live">
            <h5>Live TV</h5>
            <div class="liveIcon"> </div>
        </div>

        </div>

       
    </div>

    <script>
        // Check if Hls.js is supported by the browser
        if (Hls.isSupported()) {
            //console.log('HLS Supported');
            var video = document.getElementById('video');
            var hls = new Hls();

            // Load the HLS stream source (m3u8 playlist)
            hls.loadSource('<?php echo $stream ?>'); // Replace with your actual stream URL
            hls.attachMedia(video);

            // Event listener for when the stream is loaded and ready to play
            hls.on(Hls.Events.MANIFEST_PARSED, function() {
                video.play();
            });

            // Error handling
            hls.on(Hls.Events.ERROR, function(event, data) {
                //console.error('HLS.js error:', data);
            });
        } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
            // For Safari (which has native support for HLS)
            //console.log('natively Supported');

            video.src = '<?php echo $stream ?>' // Replace with your actual stream URL
            video.addEventListener('loadedmetadata', function() {
                video.play();
            });
        } else {
            console.error('HLS not supported in this browser');
        }

        function handleFullscreenChange() {
            if (document.fullscreenElement || document.webkitFullscreenElement || document.mozFullScreenElement || document.msFullscreenElement) {
                // console.log('The video is now in fullscreen mode');
                //document.querySelector('.video').c;
                document.getElementById('video').setAttribute('class', 'full-video')
            } else {
                // console.log('The video has exited fullscreen mode');
                document.getElementById('video').setAttribute('class', 'video')
            }
        }

        // Add event listener for fullscreen change
        document.addEventListener('fullscreenchange', handleFullscreenChange);
        document.addEventListener('webkitfullscreenchange', handleFullscreenChange); // For Safari
        document.addEventListener('mozfullscreenchange', handleFullscreenChange); // For Firefox
        document.addEventListener('msfullscreenchange', handleFullscreenChange); // For IE/Edge
    </script>
</body>

</html>