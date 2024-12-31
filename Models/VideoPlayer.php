<html>

<head>



    <style>
        iframe {
            width: -webkit-fill-available;
            margin: 5px;
            height: 65vh;
            border-radius: 5px;
            border: 0px;
        }
    </style>

</head>

<body>

    <div class="modal-overlay" id="videoPlayerModel">
        <div class="modal-content" style="width: 100vw; height: 70vh;">
            <div class="heading">
                <h2 style="margin-bottom:4px; margin: auto;">
                    Video Player
                </h2>
                <div class="close-button" onclick="handlePlayer({value: 'false'})">
                    Close
                </div>
            </div>

            <iframe id='videoPlayer'
                title='YouTube video'
                allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture'
                allowFullScreen></iframe>
        </div>
    </div>

</body>

</html>