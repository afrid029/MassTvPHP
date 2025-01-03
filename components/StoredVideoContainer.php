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


        } else {
            document.getElementById('videoPlayer').src = '';
            player.display = 'none';
            Notplayer.display = 'none';
            video.play();

        }

    }

    function reloadCss() {
                const elements = document.querySelectorAll('.deleteForm');
                <?php if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin']): ?>
                   
                    elements.forEach(element => {
                        element.style.display = 'flex';
                    });

                <?php else : ?>

                    elements.forEach(element => {
                        element.style.display = 'none';
                    });

                <?php endif; ?>
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
        $query = "With RankedVideo as
                    (Select *, ROW_NUMBER() 
                    over (partition by category order by updatedat desc) as rn from videos)
                    Select * from RankedVideo where rn <= 20";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) > 0) {

            $categories = [];
            while ($row = mysqli_fetch_assoc($result)) {

                $categories[$row['category']][] = $row;
            }

            foreach ($categories as $category => $videos) {
                $playlist = ($category == 'Stage') ? 'Stage Events' : (($category == 'Community') ? 'Community Events' : (($category == 'Religious') ? 'Religious Events' : 'Political Events'));
                echo "<div class='category' >";
                echo "<h3>$playlist</h3>";
                echo "<hr />";
                echo "<div class='videos' id=$category>";
                $i = 0;
                foreach ($videos as $video) {
                    if ($i < 5) {
                        $title = $video['title'];
                        $url = $video['url'];
                        $image = $video['image'];
                        $id = $video['ID'];
                        include('./components/storedVideo.php');
                        array_shift($categories[$category]);
                    } 
                    $i++;
                } ?>

                <script>reloadCss();</script>
                <?php
                echo "</div>";
                echo "</div>";


                if (count($categories[$category]) > 0) {
                    echo "<div  class='$category-more more'  onclick = loadAditonalVideos(event)>More Videos</div>";
                }
            }
        } else {
            echo "<h3>No Videos Found</h3>";
        }

        mysqli_close($db);

        include('./components/footer.php');

        ?>


        <script>
            function loadAditonalVideos(event) {

                const classNames = event.target.className;
                const className = classNames.split(' ')[0];
                console.log(className);


                const type = className.substring(className.indexOf('-') + 1);
                const categ = className.substring(0, className.indexOf('-'));

                if (type == "more") {

                    const fetchedData = <?php echo json_encode($categories); ?>;
                    const datas = fetchedData[categ];

                    datas.forEach(data => {
                        xhr = new XMLHttpRequest();
                        xhr.open('POST', 'masstv/components/AdditionalVideo.php', true);
                        xhr.setRequestHeader('Content-Type', 'application/json');
                        xhr.onload = function() {
                            if (this.status === 200) {
                                const div1 = document.createElement('div');
                                div1.setAttribute('class', categ + '-add');
                                div1.innerHTML = this.responseText;
                                div1.style.display = 'flex';
                                div1.style.flexWrap = 'wrap';
                                div1.style.transition = 'all 0.5s';
                                div1.style.justifyContent = 'space-around';
                                document.getElementById(categ).appendChild(div1);

                                reloadCss();

                                setTimeout(() => {
                                    div1.classList.add('active');
                                }, 100);
                            }
                        }
                        xhr.send(JSON.stringify(data));


                    });

                    event.target.textContent = 'Shrink Videos';
                    event.target.setAttribute('class', categ + '-less less');


                } else {
                    event.target.textContent = 'More Videos';
                    event.target.setAttribute('class', categ + '-more more');

                    const additionals = document.querySelectorAll('.' + categ + '-add');

                    additionals.forEach(additional => {
                        additional.classList.remove('active');
                        additional.classList.add('inactive');
                        setTimeout(() => {
                            additional.classList.add('inactive');
                        }, 100);

                        setTimeout(() => {
                            additional.style.display = 'none';
                        }, 300);

                    });
                }
            }
        </script>

    </div>

</body>

</html>