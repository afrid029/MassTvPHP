<html>

<head>
    <link rel="stylesheet" href="../masstv/Assets/CSS/storedVideoContainer.css">
</head>

<script>
    function GetEmbaded(url) {
        const youtubeRegex =
            /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)|youtu\.be\/)([a-zA-Z0-9_-]{11})/;
        const ytmatch = url.match(youtubeRegex);
        if (ytmatch) {
            return `https://www.youtube.com/embed/${ytmatch[1]}`;
        }
        const vimeoRegex = /^(https?:\/\/)?(www\.)?(vimeo\.com\/)(\d+)(\?.*)?$/;
        const vimatch = url.match(vimeoRegex);
        if (vimatch) {
            return `https://player.vimeo.com/video/${vimatch[4]}`;
        }

        return false;
    }

    function handlePlayer({
        url = 'no',
        value
    }) {
        let player = document.getElementById('videoPlayerModel').style;
        let Notplayer = document.getElementById('VideoNotAvailableModel').style;
        var video = document.getElementById('video');
       
        if (value === 'true') {
            let embadedUrl = GetEmbaded(url);
            
            video.pause();
            
            if (embadedUrl) {
            
                document.getElementById('videoPlayer').src = embadedUrl;
                player.display = 'flex';
               
            } else {
                Notplayer.display = 'flex';
            }

           
        }else {
            document.getElementById('videoPlayer').src = '';
            player.display = 'none';
            Notplayer.display = 'none';
            video.play();

        }

        //document.getElementById('videoPlayer').src = url;
       // alert(`This is the video url: ${url} and the value is ${value}`);
    }

</script>

<body>

    <div class="wrapper">
        <div class="otherVideo">
            <h4>Our Playlist</h4>
            <hr />
        </div>
        <?php
        include('./Models/VideoPlayer.php');
        include('./Models/VideoNotAvailable.php');

        $db = mysqli_connect('localhost', 'root', '', 'mydb');
        $query = "SELECT * FROM videos order by updatedat desc limit 20";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $title = $row['title'];
                $url = $row['url'];
                $image = $row['image'];
                $id = $row['ID'];
                include('./components/storedVideo.php');
            }
        } else {
            echo "<h3>No Videos Found</h3>";
        }

        $db->close();

        include('./components/footer.php');
    
        ?>
        
    </div>

</body>

</html>