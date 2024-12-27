<html>

<head>
    <title>MASS TV</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="../masstv/Assets/images/mainLogo.jpg" />
    <link rel="stylesheet" href="../masstv/Assets/CSS/dashboard.css">
    <link rel="stylesheet" href="../masstv/Assets/CSS/adminPanel.css">
    <link rel="stylesheet" href="../masstv/Assets/CSS/social.css">
    <script src="../masstv/Assets/JS/masstv.js"></script>
</head>

<body>

    <div style="background-image: url('../masstv/Assets/images/masstvlogo.png')"
        class="jumbotron "
        id="banner">
        <header>
            <div class="row">
                <div class="col-2 header">
                    <span style="color: red; font-weight: 900">MASS</span>
                    <img src="../masstv/Assets/images/tv.webp" style="width: 32px; transform: rotate(-10deg); align-items:center;" />
                </div>
                <div class="col-2 align-center">
                    <div class="btn-signin">Sign In</div>
                    <!-- {isloggedin ? (
                <Button
                    color="error"
                    onClick={Logout}
                    sx={{
                      borderRadius: "25px",
                      "&:hover": {
                        backgroundColor: "#E44C4C",
                        color: "white",
                        border: "1px solidrgb(255, 255, 255)",
                      },
                    }}
                    variant="outlined"
                    size="small">
                    Log Out
                </Button>
                ) : (
                <Button
                    onClick={()=> LoginModalHandler(true)}
                    sx={{
                      borderRadius: "25px",
                      "&:hover": {
                        backgroundColor: "#1565c0",
                        color: "white",
                        border: "1px solid #B8BAB9",
                      },
                    }}
                    variant="outlined"
                    size="small"
                    >
                    Sign in
                </Button>
                )} -->
                </div>
            </div>

            <!-- {isloggedin ?
        <AdminPanel /> : ""} -->

            <?php include('./components/adminpanel.php') ?>
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

   

</body>

</html>