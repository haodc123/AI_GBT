@component('components.header')
@endcomponent

    <style>
        
        pre{
            overflow: auto;
        }
        img{
            max-width: 100%;
        }
        
        label{
            display: inline-block;
            width: 60px;
            margin-top: 10px;
        }
        #update{
            margin: 10px 0 0 60px ;
            padding: 10px 20px;
        }
        
        #cropped, #cropped-resized{
            padding: 20px;
            border: 4px solid #ddd;
            min-height: 60px;
            margin-top: 20px;
        }
        #cropped img, #cropped-resized img{
            margin: 5px;
        }

        
    </style>
    
    <script>
        var bufferFileName;
        var srcCropped;
        let f_choose_file;
        let f_view_file;
        let loader;

        function onFileChoose() {
            f_choose_file = document.querySelector(".f-choose-file");
            f_view_file = document.querySelector(".f-view-file");
            loader = document.querySelector(".loading");
            bufferFileName = URL.createObjectURL(f_choose_file.files[0]);
            f_view_file.setAttribute('src', bufferFileName);

            $('.step-2').css('visibility', 'visible');
            $('.f-view-file').rcrop('destroy'); // destroy old file
            // Crop feature https://github.com/aewebsolutions/rcrop
            $('.f-view-file').rcrop({
                minSize : [150,100],
                preserveAspectRatio : false,
                grid : true,
                full: true,
                preview : {
                    display: true,
                    size : [150,100],
                    wrapper : '#custom-preview-wrapper'
                }
            });
            
            $('.f-view-file').on('rcrop-ready', function(){
                srcCropped = $(this).rcrop('getDataURL'); // binary value: data:image/png;base64...
                console.log(srcCropped);
            });
            $('.f-view-file').on('rcrop-changed', function(){
                srcCropped = $(this).rcrop('getDataURL'); // binary value: data:image/png;base64...
                // $('#cropped-original').append('<img src="'+srcOriginal+'">');
            });
        }
        function dataURLToBlob(dataURL) {
            const arr = dataURL.split(",");
            const mime = arr[0].match(/:(.*?);/)[1];
            const bstr = atob(arr[1]);
            let n = bstr.length;
            const u8arr = new Uint8Array(n);
            while (n--) {
                u8arr[n] = bstr.charCodeAt(n);
            }
            return new Blob([u8arr], { type: mime });
        }
        function onUploadBlob(){
            if (srcCropped == null)
                srcCropped = $('.f-view-file').rcrop('getDataURL');
            const blobData = dataURLToBlob(srcCropped);

            const formData = new FormData();
            formData.append("_token", "{{ csrf_token() }}");
            formData.append("cropped_image", blobData);

            displayLoading();

            fetch("/exc/ocr_api_upload", {
                method: "POST",
                body: formData,
            })
            .then((response) => response.json())
            .then((data) => {
                console.log("Data response: ", data.ocr_text);
                hideLoading();
                $('.step-3').css('visibility', 'visible');
                $('#exc_req_content').val(data.ocr_text);
                $('#exc_img_path').val(data.image_url);
            })
            .catch((error) => {
                console.error("An error occur on upload: ", error);
            });
        }

        // showing loading
        function displayLoading() {
            loader.classList.add("display");
            // to stop loading after some time
            setTimeout(() => {
                loader.classList.remove("display");
            }, 5000);
        }
        // hiding loading 
        function hideLoading() {
            loader.classList.remove("display");
        }
    
    </script>
    

<div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-1 col-sm-1"></div>
        <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
@if ($input_type == 'camera')
        <div id="wrapper-camera">
            
            <h4 class="direct-txt">/ Chụp ảnh Bài tập</h4>

            <div class="step-1">
                <span class="step-number">1</span> <span class="step-title">Chọn ảnh từ camera hoặc thư viện</span><br /><br />
                <input class="f-choose-file" onchange="onFileChoose()" type="file" name="req_content" accept="image/*;capture=camera"><br />
                <!-- <input type="file" accept="image/*" capture="camera" /> //Only camera -->
            </div><br />

            <div class="step-2">
                <span class="step-number">2</span> <span class="step-title">Cắt ảnh chỉ chứa phần Bài tập để dễ nhận dạng rồi bấm Upload</span><br /><br />
                <div class="image-wrapper">
                    <img class="f-view-file" src="" /><br />
                    <div id="custom-preview-wrapper"></div>
                    <!-- <div id="cropped">
                        <h3>Images cropped</h3>
                    </div> -->
                </div>
                <button onclick="onUploadBlob()" >Upload Bài tập</button>
                <div class="loading"></div>
            </div>
            
            <div class="step-3">
                <span class="step-number">3</span> <span class="step-title">Xem lại và sửa cho đúng lần cuối rồi Gửi đi</span><br /><br />
                <form class="f-input" method="POST" action="{!! route('exc.process', ['input_type' => $input_type]) !!}">
                    @csrf
                    <ul>
                        <li>
                            <input type="hidden" name="exc_img_path" id="exc_img_path" value="">
                            <textarea cols="100" rows="8" name="exc_req_content" id="exc_req_content" placeholder="Nhận dạng Bài tập" required="required">{{ $ocr_text ?? '' }}</textarea>
                        </li>
                        <li>
                            <select name="exc_req_grade">
                                <option value="0">Lớp: Chưa xác định</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ !isNotDefine($grade) && $grade == $i ? 'selected' : '' }}>Lớp {{ $i }}</option>
                                @endfor
                                <option value="13">Đại học - Khác</option>
                            </select>
                        </li><br />
                        <li>
                            <select name="exc_req_subject">
                                <option value="0">Môn học: Chưa xác định</option>
                                @foreach ($list_all_sub as $sub)
                                    <option value="{{ $sub->id }}" {{ !isNotDefine($subject_i) && $subject_i == $sub->id ? 'selected' : '' }}>{{ $sub->title }}</option>
                                @endforeach
                            </select>
                        </li><br />
                        <li>
                            <div class="reserve-book-btn text-center">
                                <button class="hvr-underline-from-center" type="submit" value="SEND" id="submit">Gửi đi</button>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>

@else
        <div id="wrapper-type">
            
            <h4 class="direct-txt">/ Nhập Bài tập</h4>

            <div>
                <span class="step-title">Nhập Bài tập và bấm Gửi</span><br /><br />
                <form class="f-input" method="POST" action="{!! route('exc.process', ['input_type' => $input_type]) !!}">
                    @csrf
                    <ul>
                        <li>
                            <textarea cols="100" rows="8" name="exc_req_content" id="exc_req_content" placeholder="Nhập Bài tập..." required="required"></textarea>
                        </li>
                        <li>
                            <select name="exc_req_grade">
                                <option value="0">Chọn lớp: Chưa xác định</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}" {{ !isNotDefine($grade) && $grade == $i ? 'selected' : '' }}>Lớp {{ $i }}</option>
                                @endfor
                                <option value="13">Đại học - Khác</option>
                            </select>
                        </li><br />
                        <li>
                            <select name="exc_req_subject">
                                <option value="0">Chọn môn học: Chưa xác định</option>
                                @foreach ($list_all_sub as $sub)
                                    <option value="{{ $sub->id }}" {{ !isNotDefine($subject_i) && $subject_i == $sub->id ? 'selected' : '' }}>{{ $sub->title }}</option>
                                @endforeach
                            </select>
                        </li><br />
                        <li>
                            <div class="reserve-book-btn text-center">
                                <button class="hvr-underline-from-center" type="submit" value="SEND" id="submit">Gửi đi</button>
                            </div>
                        </li>
                    </ul>
                </form>
            </div>
        </div>
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

@component('components.footer')
@endcomponent