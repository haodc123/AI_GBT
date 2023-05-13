@component('components.header')
@endcomponent

    <div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-1 col-sm-1"></div>
                <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
                	<br /><br /><br />
                    <h4 class="direct-txt">/ Câu chuyện muôn nơi</h4>
                    <br />
                    <h2 class="detail-title">
					@php echo $blog->blog_title @endphp
				    </h2>
                    <br />
                    <div class="blog-box clearfix">
                        <div class="detail-content">

                        @php echo $blog->blog_content @endphp

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
                        <h2>Câu chuyện mới nhất</h2>
                    </div>
                    <div class="row">
                    @foreach ($bloglist as $blog)
                        <div class="other-blogs-box col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <a href="{{ route('blogs.show', ['title'=>$blog->blog_title_slug]) }}">
                                <img src="../images/blogs/{{ $blog->blog_thumb }}">
                                <p>{{ $blog->blog_title }}</p>
                            </a>
                        </div>
                    @endforeach
                        
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