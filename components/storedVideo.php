 <html>

 <head>
     <link rel="stylesheet" href="Assets/CSS/storedVideo.css">

 </head>

 <body>
     <div class="card-with-del">
         <div class="card-container">
             <div class="card">
                 <div class="card-media" style="background-image: url('<?php echo $image ?>');" onclick="handlePlayer({url: '<?php echo $url ?>', value: 'true'})">

                     <div class="contentbg">

                     </div>

                     <div class="playIcon">
                         <img src="Assets/images/play-button.png" alt="">
                     </div>
                 </div>
                 <div class="card-content">
                     <p class="content-text"><?php echo $title ?> </p>
                 </div>
             </div>
         </div>


         <?php
            if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin']) { ?>
             <div class="deleteForm">
                 <form style='width: inherit;' action='/deletevideo' method='post'>
                     <input type='hidden' name='id' value='$id'>
                     <input type='hidden' name='image' value='$image'>
                     <button type='submit' name='delete' class='btn-del'>Delete</button>
                 </form>
             </div>

         <?php  }
            ?>
     </div>
 </body>

 </html>