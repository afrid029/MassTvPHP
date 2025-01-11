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
                     <input type='hidden' name='id' value='<?php echo $id ?>'>
                     <input type='hidden' name='image' value='<?php echo $image ?>'>
                     <button onclick="submitDeletVideo(event)"  name='delete' class='btn btn-del'>Delete</button>
                    
                 </form>
                 
             </div>

         <?php  }
            ?>
     </div>

     <script>

        function submitDeletVideo(event){
            // let button = document.getElementById('delete');
            // let button2 = document.getElementById('deleting');
            // button.style.display = 'none';
            // button2.style.display = 'block';

            console.log(event);
            event.target.textContent = 'Deleting...'
            event.target.classList=['btn btn-deleting'];
            
            //return true;
        }

        // const delbutton = document.querySelector('.btn-del');

        // delbutton.addEventListener('click', function(){
        //     button.setAttribute('class', 'btn btn-deleting')
        // })
     </script>
 </body>

 </html>