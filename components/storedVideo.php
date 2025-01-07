 

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
                <p class="content-text"><?php echo $title ?>  </p>
            </div>
        </div>

      
            <form class="deleteForm"  style="width: inherit;" action="/deletevideo" method="post">
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="hidden" name="image" value="<?php echo $image ?>">
                <button type="submit" name="delete" class="btn-del">Delete</button>
            </form>
       

       

    </div>
</body>

</html>