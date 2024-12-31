 

<html>

<head>
    <link rel="stylesheet" href="../masstv/Assets/CSS/storedVideo.css">
   
</head>

<body>
    <div class="card-container">
        <div class="card">
            <div class="card-media" style="background-image: url('<?php echo $image ?>');" onclick="handlePlayer({url: '<?php echo $url ?>', value: 'true'})">

                <div class="contentbg">

                </div>

                <div class="playIcon">
                    <img src="../masstv/Assets/images/play-button.png" alt="">
                </div>
            </div>
            <div class="card-content">
                <p><?php echo $title ?>  </p>
            </div>
        </div>

        <?php if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin']) { ?>

            <form style="width: inherit;" action="/deletevideo" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="image" value="<?php echo $image ?>">
                <button type="submit" name="delete" class="btn-del">Delete</button>
            </form>
        <?php }
        ?>

    </div>
</body>

</html>