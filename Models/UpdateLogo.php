<html>

<head>

    <style>
        .close-button {
            background-color: red;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 50%;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .close-button:hover {
            background-color: darkred;
        }
    </style>

    <script>
        function validateLogoForm() {
            let image = document.getElementById('logo');
            let button = document.getElementById('logoupload');

            if (image.value) {
                button.disabled = false;
            } else {
                button.disabled = true;
            }
        }
        function submitLogoForm() {
             let button = document.getElementById('logoupload');
            let button2 = document.getElementById('logouploading');
            button.style.display = 'none';
            button2.style.display = 'block';
             return true;
        }
    </script>
</head>

<body>
    <div
        class="modal-overlay" id="addLogoModel"
        style=" background-image: url('<?php echo $cover ?? '../masstv/Assets/images/masstvlogo.png'; ?>')">
        <div class="modal-content">
            <button
                onclick="handleLogoModel('false')"
                class="close-button">
                X
            </button>
            <h2>Update Logo</h2>
            <form action="/addlogo" method="post" class="Form" oninput="validateLogoForm()" enctype="multipart/form-data" onsubmit="submitLogoForm()" >

                <div class="FormRow">
                    <label htmlFor="image">Upload Logo</label>
                    <input
                        type="file"
                        name="logo"
                        id="logo"
                        accept="image/*" />
                </div>

                <button
                    type="submit"
                    id="logoupload"
                    name="logoupload"
                    class="upload">
                    Upload
                </button>
                <button
                    disabled="true"
                    id="logouploading"
                    style="display: none;"
                    class="upload">
                    Uploading...
                </button>
            </form>
        </div>
    </div>

</body>


</html>