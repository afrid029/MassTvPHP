<html>

<head>
    <title>MASS TV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="icon" type="image/png" href="Assets/images/massweblogo3.png" />

    <link rel="stylesheet" href="Assets/CSS/login.css">
    <link rel="stylesheet" href="Assets/CSS/AllVideo.css">

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
            let player = document.getElementById('videoPlayerModel');
            let Notplayer = document.getElementById('VideoNotAvailableModel');
            // var video = document.getElementById('video');

            if (value === 'true') {
                let embadedUrl = GetEmbaded(url);

                // video.pause();

                if (embadedUrl) {

                    document.getElementById('videoPlayer').src = embadedUrl;
                    player.classList.remove('closing');
                    player.style.display = 'flex';
                    

                } else {
                    Notplayer.style.display = 'flex';
                }


            } else {
                document.getElementById('videoPlayer').src = '';
                player.classList.add('closing')

                setTimeout(() => {
                    player.style.display = 'none';
                    Notplayer.style.display = 'none';
                    // player.classList.remove('closing')
                }, 500)

                
                // video.play();

            }

        }

        
    </script>

</head>

<body>



    <?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'mydb');
    if (!isset($_COOKIE['user'])) {
        $_SESSION['isloggedin'] = false;
    } else {

        $data = base64_decode($_COOKIE['user']);

        // Extract the IV (the first 16 bytes)
        $iv = substr($data, 0, 16);

        // Extract the encrypted email (the rest of the string)
        $encryptedEmail = substr($data, 16);
        $key = 'a1b2c3d4e5f67890123456789abcdef0123456789abcdef0123456789abcdef';
        // Decrypt the email using AES-256-CBC decryption
        $decryptedEmail = openssl_decrypt($encryptedEmail, 'aes-256-cbc', $key, 0, $iv);

        $query = "SELECT * from users where email = '$decryptedEmail'";

        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 1) {
            // echo "Helloooooo";

            $_SESSION['isloggedin'] = true;
        } else {
            $_SESSION['isloggedin'] = false;
            setcookie('user', '', time() - 3600, '/');
        }
    }
    ?>

    <div class="goBack">
        <div class="goBack-img">
            <img src="/Assets/images/back.png" style="width: 24px;" alt="">
        </div>
        <div class="goBack-text" onclick="window.open('/','_self')">Go To Home</div>
    </div>

    <div class="pageTitleRow">
        <div class="pageTitle">
            <hr>
            <h4 class="eventTitle">Political Events</h4>
        </div>
        <div class="sideBox"></div>
    </div>

    <div class="All-Wrapper">
        <?php

        $query = "Select * from videos where category='Politics' order by updatedat desc";
        $result = mysqli_query($db, $query);
        foreach ($result as $video) {
            $title = $video['title'];
            $url = $video['url'];
            $image = $video['image'];
            $id = $video['ID'];
            include('./components/storedVideo.php');
        }

        mysqli_close($db);

        include('./Models/VideoPlayer.php');
        include('./Models/VideoNotAvailable.php');

        ?>
    </div>

    <footer>
        <?php
        include('./components/footer.php');
        ?>
    </footer>

</body>

</html>