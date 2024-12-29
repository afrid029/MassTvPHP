<html>

<head>
    <link rel="stylesheet" href="../masstv/Assets/CSS/storedVideo.css">
</head>

<body>
    <div class="card-container">
        <div class="card">
            <div class="card-media">

                <div class="contentbg">

                </div>

                <div class="playIcon">
                    <img src="../masstv/Assets/images/play-button.png" alt="">
                </div>
            </div>
            <div class="card-content">
                <p>Hello every ss sdfsf sdfsdf sfsdfsd sdfsdf sdfdsf sssdasd asdasd ssdsdsa asdasdasds assadsad asdsad asdasdas asdasdsadsa asdsadsad  </p>
            </div>
        </div>

        <?php if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin']) { ?>
            <div class="btn-del">Delete</div>
        <?php }
        ?>

    </div>
</body>

</html>