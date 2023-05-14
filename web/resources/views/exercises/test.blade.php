<!DOCTYPE html>
<html>
    <head>
        <title>Responsive Crop. Advanced demos</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        
        <script src="/js/jquery.js" ></script>
        <script src="/js/rcrop.min.js" ></script>
        <link href="/css/rcrop.min.css" media="screen" rel="stylesheet" type="text/css">

        <style>
            pre{
                overflow: auto;
            }
            .image-wrapper{
                max-width: 600px;
                min-width: 200px;
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
            
            #cropped-original, #cropped-resized{
                padding: 20px;
                border: 4px solid #ddd;
                min-height: 60px;
                margin-top: 20px;
            }
            #cropped-original img, #cropped-resized img{
                margin: 5px;
            }
        </style>
        
        <script>
            // Crop feature ref https://github.com/aewebsolutions/rcrop
            var bufferFileName;
            function onFileChoose() {
                let f_choose_file = document.querySelector(".f-choose-file");
                let f_view_file = document.querySelector(".f-view-file");
                bufferFileName = URL.createObjectURL(f_choose_file.files[0]);
                f_view_file.setAttribute('src', bufferFileName);

                $('.f-view-file').rcrop({
                    minSize : [200,200],
                    preserveAspectRatio : false,
                    
                    preview : {
                        display: true,
                        size : [100,100],
                        wrapper : '#custom-preview-wrapper'
                    }
                });
                
                $('.f-view-file').on('rcrop-changed', function(){
                    var srcOriginal = $(this).rcrop('getDataURL');
                    var srcResized = $(this).rcrop('getDataURL', 50,50);
                    
                    $('#cropped-original').append('<img src="'+srcOriginal+'">');
                    $('#cropped-resized').append('<img src="'+srcResized+'">');
                });
            }
        </script>
        
    </head>
    <body>
        <main>
            

            <form class="f-file" action="{!! route('ocr.upload') !!}" method="post" enctype="multipart/form-data">
                @csrf
                Select image or open camera to upload:<br />
                <input class="f-choose-file" onchange="onFileChoose()" type="file" name="req_content" accept="image/*;capture=camera"><br />
                

                <div class="image-wrapper">
                    <img class="f-view-file" src="" /><br />
                    <div id="custom-preview-wrapper"></div>
                    <div id="cropped-resized">
                        <h3>Images resized (50x50)</h3>
                    </div>
                    <div id="cropped-original">
                        <h3>Images not resized (original size)</h3>
                    </div>
                </div>

                <input type="submit" value="Upload Image" name="submit">
            </form><br />
            
        </main>
    </body>
</html>
