<?php session_start(); ?>

<html>

<head>
    <title>MASS TV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="../masstv/Assets/images/mainLogo.jpg" />
    <link rel="stylesheet" href="../masstv/Assets/CSS/dashboard.css">
    <link rel="stylesheet" href="../masstv/Assets/CSS/adminPanel.css">
    <link rel="stylesheet" href="../masstv/Assets/CSS/social.css">

    <script>
        function handleLoginModel(value) {
            let loginModel = document.getElementById('loginModel').style;


            if (value === 'true') {
                document.getElementById('password').value = '';
                document.getElementById('email').value = '';
                document.getElementById('submit').disabled = true;
                loginModel.display = 'flex';
            } else {
                loginModel.display = 'none';
            }
            // value ? loginModel.display = 'flex' : loginModel.display = 'none';

            // console.log(loginModel);

        }

        function logOut() {
            // document.getElementById('logoutbtn').style.pointerEvents = 'none';
            let button = document.getElementById('logout');
            let button2 = document.getElementById('logouting');
            button.style.display = 'none';
            button2.style.display = 'flex';
            window.location.href = '/logout';
        }

    </script>
</head>

<body style="width: 97vw;">

    <?php
    if (isset($_SESSION['fromAction']) && $_SESSION['fromAction'] === true) { ?>


        <div class="alert-container" id="alert">
            <div class="alert" id="alertCont">
                <p><?php echo $_SESSION['message'] ?></p>
            </div>
        </div>

        <?php
        if ($_SESSION['status'] === true) {
            echo "<script>document.getElementById('alertCont').style.backgroundColor = '#1D7524';</script>";
        } else {
            echo "<script>document.getElementById('alertCont').style.backgroundColor = '#E44C4C';</script>";
        }
        ?>
        <script>
            document.getElementById('alert').style.display = 'flex';
            setTimeout(() => {
                document.getElementById('alert').style.display = 'none';
            }, 3000);
        </script>
    <?php
    }
    $_SESSION['fromAction'] = false;

    $db = mysqli_connect('localhost', 'root', '', 'mydb');
    $query = "select * from logo order by updatedAt desc limit 1";
    $result = mysqli_query($db, $query);
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cover = $row['image'];
    }
    mysqli_close($db);
    ?>


    <div style="background-image: url('<?php echo $cover ?? '../masstv/Assets/images/masstvlogo.png'; ?>');"
        class="jumbotron "
        id="banner">
        <div class="overlay"></div>
        <header>
            <div class="row">
                <div class="col-2 header">
                    <!-- <span style="color: red; font-weight: 900">MASS</span> -->
                    <img src="../masstv/Assets/images/massweblogo2.png" style="width: 128px;  align-items:center;" />
                </div>
                <div class="col-2 align-center">
                    <?php if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] === true) { ?>
                        <div onclick="logOut()" id="logout" class="btn-logout">Logout</div>
                        <div  style="display: none; font-size: 10px; background-color: #DE9322; color: white;" id="logouting" class="btn-logout">Loging Out...</div>
                    <?php } else { ?>
                        <div onclick="handleLoginModel('true')" class="btn-signin">Sign In</div>
                    <?php } ?>
                </div>
            </div>

            <?php if (isset($_SESSION['isloggedin']) && $_SESSION['isloggedin'] === true) {
                include('./components/adminPanel.php');
            } ?>
        </header>

        <div class="mass">MASS TV . CA</div>

        <?php include('./components/social.php') ?>
        <?php include('./components/liveVideo.php') ?>


    </div>
    <div class="live">
        <h5>Live TV</h5>
        <div class="liveIcon"> </div>
    </div>
    <?php include('./components/StoredVideoContainer.php') ?>

    <!-- Models -->
    <?php include('./Models/login.php') ?>
    <?php include('./Models/AddLive.php') ?>
    <?php include('./Models/AddVideo.php') ?>
    <?php include('./Models/UpdateLogo.php') ?>




</body>

</html>