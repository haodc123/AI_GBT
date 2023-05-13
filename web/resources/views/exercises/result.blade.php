@component('components.header')
@endcomponent

<div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
<div class="container">
    <div class="row">
        <div class="col-lg-2 col-md-1 col-sm-1"></div>
        <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
            <br /><br /><br />
            <h4 class="direct-txt">/ Kết quả</h4>
            <br />

            <p>
                mode: {{ $mode ?? 0 }}; input_type: {{ $input_type ?? '' }}; 
            </p>
            <p>
                req_content: {{ $req_content ?? '' }}
            </p>

            <h2 class="detail-title">
            Response
            </h2>
            <br />
            <div class="blog-box clearfix">
                <div class="detail-content">

                {{ $res_content }}

                </div>
                <!-- end detail-content -->
                <div class="detail-bottom">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                            <div class="fb-like" data-href="https://www.facebook.com/batstyle.aothun.aophongcach" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4"></div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6"></div>
                    </div>
                </div>
                <!-- end detail-bottom -->

            </div>
            <!-- end blog-box -->

                </div>
                <!-- end col -->
                <div class="col-lg-2 col-md-1 col-sm-1"></div>
            </div>
            <!-- end row -->
            <div class="row">
                <div class="col-lg-1 col-md-1"></div>
                <div class="other-blogs col-lg-10 col-md-10 col-sm-12">
                    <div class="row">
                        <div class="col-lg-1 col-md-1"></div>
                        <h2>Bài tập gần đây</h2>
                    </div>
                    <div class="row">
                        
                    </div>
                </div>
                <div class="col-lg-1 col-md-1"></div>
            </div>
            
        </div>
        <!-- end container -->
    </div>
    <!-- end blog-main -->

@component('components.footer')
@endcomponent