

<html>
    <head>
        <link rel="stylesheet" href="../masstv/Assets/CSS/error.css">
    </head>

    <script> 
        function navigateToHome(){
            window.open("/");
        }
    </script>

    <body>
    <div class="error">
            <h1 ><span style="margin-right:10px;"> <img style="margin-right:10px; width: 24px; height: 24px" src="../masstv/assets/images/file-corrupted-svgrepo-com.svg" alt="Icon" /></span>Page Not Found</h1>
           <div> <?php session_start(); echo $_SESSION['error'];?> </div><br>
            <div class="goback" onclick="navigateToHome()">
                   
            Go to Home</div>
        </div>
        <div class="foot">

        </div>
    </body>
</html>