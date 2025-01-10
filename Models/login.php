<html>

<head>
    <link rel="stylesheet" href="Assets/CSS/login.css">

    <script>
        // function submitform() {
        //     console.log('submit');

        // }

        function validateForm() {
            let email = document.getElementById('email');
            let password = document.getElementById('password');
            let button = document.getElementById('submit');

            let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

            if (emailPattern.test(email.value) && password.value.length > 0) {
                button.disabled = false;
            } else {
                button.disabled = true;
            }
            // console.log(email);

            // let emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
            // if (!emailPattern.test(email)) {
            //     event.target.style.border = '1px solid red';
            // } else {
            //     event.target.style.border = '1px solid green';
            // }
        }

        function submitLoginform() {
            let button = document.getElementById('submit');
            let button2 = document.getElementById('submiting');
            button.style.display = 'none';
            button2.style.display = 'block';
            return true;
        }
    </script>
</head>



<body>
    <div
        class="modal-overlay" id="loginModel" onclick="handleLoginModel('false')"
        style=" background-image: url('<?php echo $cover ?? 'Assets/images/masstvlogo.png'; ?>')">
        <div class="modal-content" onclick="event.stopPropagation()">
            <div class="banner">
                <h2> <span style="color:red">WWW.</span>MASSTV<span style="color:red">.CA</span></h2>
            </div>
            <h4>Login</h4>

            <form action="/login" method="post" oninput="validateForm()" onsubmit="return submitLoginform()">
                <div class="Form">
                    <div class="FormRow">
                        <label htmlFor="email">Email</label>
                        <input
                            type="email"
                            name="email"
                            id="email" required />
                    </div>
                    <div class="FormRow">
                        <label htmlFor="password">Password</label>
                        <input
                            type="password"
                            name="password"
                            id="password" required />
                    </div>

                    <button
                        type="submit"
                        id="submit"
                        name="submit"
                        disabled="true"
                        class="upload"> Login
                    </button>

                    <button
                        style="display: none;"
                        id="submiting"
                        disabled="true"
                        class="upload"> logging in...
                    </button>
            </form>
        </div>
    </div>
    </div>
</body>

</html>