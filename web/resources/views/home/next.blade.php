@component('components.header')
@endcomponent

    <div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
                </div>
                
                <div class="next-inform col-lg-7 col-md-7 col-sm-9 col-xs-9">
                    <br /><br /><br /><br />
                        <div class="next-title">
                            <span>
                                {{ $title }}
                            </span>
                        </div>
                    
                        <div class="next-content clearfix">
                            {{ $content }} 
                        </div>

                        <div class="blog-btn-v">
                            <a class="back-btn hvr-underline-from-center" href="{{ route($backlink) }}">>> Quay về</a>
                        </div>
                    
                </div> <!-- End next-inform -->
                
                <div class="col-lg-2 col-md-2 col-sm-1 col-xs-1">
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end blog-main -->

@component('components.footer')
@endcomponent