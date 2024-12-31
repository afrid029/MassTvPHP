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
        function validateVideoForm() {
            let url = document.getElementById('videourl');
            let title = document.getElementById('title');
            let image = document.getElementById('image');
            let button = document.getElementById('videoupload');

            if (url.value && title.value && image.value) {
                button.disabled = false;
            } else {
                button.disabled = true;
            }
        }

        function submitVideoform() {
            let button = document.getElementById('videoupload');
             button.disabled = true;
             return true;
        }
    </script>
</head>

<body>
    <div
        class="modal-overlay" id="addVideoModel"
        style="background-image: url('<?php echo $cover ?? '../masstv/Assets/images/masstvlogo.png'; ?>');">

       
        <div class="modal-content">
            <button
                onclick="handleAddVideoModel('false')"
                class="close-button">
                X
            </button>
            <h2>Update Live Stream</h2>
            <form action="/addvideo"  method="post" class="Form" oninput="validateVideoForm()" enctype="multipart/form-data" onsubmit="return submitVideoform()">
            <div class="FormRow">
              <label htmlFor="url">Paste Video URL Here (Youtube/Vimeo)</label>
              <input
                type="url"
                name="videourl"
                id="videourl"
              />
            </div>
            <div class="FormRow">
              <label htmlFor="title">Title of the Video</label>
              <input
                type="name"
                name="title"
                id="title"
              />
            </div>
            <div class="FormRow">
              <label htmlFor="image">Upload Thumbnail</label>
              <input
                type="file"
                name="image"
                id="image"
                accept="image/*"
              />
            </div>

                <button
                    type="submit"
                    disabled="true"
                    id="videoupload"
                    name="videoupload"
                    class="upload">
                    Upload
                </button>
            </form>
        </div>
    </div>

</body>


</html>