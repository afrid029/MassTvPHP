<html>
    <head>
    
    <link rel="stylesheet" href="../masstv/Assets/CSS/adminPanel.css">

    <script>
        function handleAddLiveModel(value) {
            let addLiveModel = document.getElementById('addLiveModel').style;
            addLiveModel.display = value === 'true' ? 'flex' : 'none';
            document.getElementById('url').value = '';
            document.getElementById('liveupload').disabled = true;
        }

        function handleAddVideoModel(value) {
            let addVideoModel = document.getElementById('addVideoModel').style;
            addVideoModel.display = value === 'true' ? 'flex' : 'none';
            document.getElementById('videourl').value = '';
            document.getElementById('title').value = '';
            document.getElementById('image').value = '';
            document.getElementById('videoupload').disabled = true;
        } 
        
        function handleLogoModel(value) {
            let addLogoModel = document.getElementById('addLogoModel').style;
            addLogoModel.display = value === 'true' ? 'flex' : 'none';
            document.getElementById('logo').value = '';
            document.getElementById('logoupload').disabled = true;
        }
    </script>
    </head>
    <body>
        
    <div class="adminPanel">
                <div onclick="handleAddLiveModel('true')" class='panel'>
                    Change Live Stream
                </div>
                <div onclick="handleAddVideoModel('true')" class='panel'>
                    Add Video
                </div>
                <div onclick="handleLogoModel('true')" class='panel'>
                    Update Logo
                </div>
            </div>
    </body>
</html>