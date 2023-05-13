@component('components.header')
@endcomponent

<div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-1 col-sm-1"></div>
        <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
({{ $input_type }})
@if ($input_type == 'camera')
            <br /><br /><br />
            <h4 class="direct-txt">/ Chụp ảnh Bài tập</h4>
            <br />

            <!-- <input type="file" accept="image/*" capture="camera" /> //Only camera -->
            <form action="{!! route('ocr.upload') !!}" method="post" enctype="multipart/form-data">
                @csrf
                Select image or open camera to upload:<br />
                <input type="file" name="req_content" accept="image/*;capture=camera">
                <input type="submit" value="Upload Image" name="submit">
            </form>


            <form class="f-input" method="POST" action="{!! route('exc.process', ['input_type' => $input_type]) !!}">
                @csrf
                <ul>
                    <li>
                        <textarea cols="100" rows="8" name="exc_req_content" id="exc_req_content" placeholder="Nhận dạng Bài tập" required="required">{{ $ocr_text ?? '' }}</textarea>
                    </li>
                    <li>
                        <div class="reserve-book-btn text-center">
                            <button class="hvr-underline-from-center" type="submit" value="SEND" id="submit">Gửi đi</button>
                        </div>
                    </li>
                </ul>
            </form>

@else
            <br /><br /><br />
            <h4 class="direct-txt">/ Nhập Bài tập</h4>
            <br />

            <form class="f-input" method="POST" action="{!! route('exc.process', ['input_type' => $input_type]) !!}">
                @csrf
                <ul>
                    <li>
                        <textarea cols="100" rows="8" name="exc_req_content" id="exc_req_content" placeholder="Nhập Bài tập..." required="required"></textarea>
                    </li>
                    <li>
                        <div class="reserve-book-btn text-center">
                            <button class="hvr-underline-from-center" type="submit" value="SEND" id="submit">Gửi đi</button>
                        </div>
                    </li>
                </ul>
            </form>
@endif
        </div> 
    </div>
            
</div>
    <!-- end container -->
</div>
    <!-- end blog-main -->

    <!-- Use camera stream on browser (not open native camera app) -->
    <!-- https://usefulangle.com/post/352/javascript-capture-image-from-camera -->
    <!-- HTML -->
    <!-- <button id="start-camera">Start Camera</button>
    <video id="video" width="320" height="240" autoplay></video>
    <button id="click-photo">Take a Photo</button>
    <canvas id="canvas" width="320" height="240"></canvas>

    <div id="dataurl-container">
        <canvas id="canvas" width="320" height="240"></canvas>
        <div id="dataurl-header">Image Data URL</div>
        <textarea id="dataurl" readonly=""></textarea>
    </div> -->
    <!-- End HTML part of Use camera stream -->
    <!-- Script -->
    <!-- <script>

        let camera_button = document.querySelector("#start-camera");
        let video = document.querySelector("#video");
        let click_button = document.querySelector("#click-photo");
        let canvas = document.querySelector("#canvas");
        let dataurl = document.querySelector("#dataurl");
        let dataurl_container = document.querySelector("#dataurl-container");

        camera_button.addEventListener('click', async function() {
            let stream = null;

            try {
                stream = await navigator.mediaDevices.getUserMedia({ video: true, audio: false });
            }
            catch(error) {
                alert(error.message);
                return;
            }

            video.srcObject = stream;

            video.style.display = 'block';
            camera_button.style.display = 'none';
            click_button.style.display = 'block';
        });

        click_button.addEventListener('click', function() {
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            let image_data_url = canvas.toDataURL('image/jpeg');
            
            dataurl.value = image_data_url;
            dataurl_container.style.display = 'block';
        });

    </script> -->
    <!-- End Script part of Use camera stream -->

</body>
</html>