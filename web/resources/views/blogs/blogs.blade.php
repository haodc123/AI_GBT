@component('components.header')
@endcomponent

    <div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                	<br /><br /><br />
                    <h2 class="block-title text-center">
					Câu chuyện muôn nơi
					<br /><br />
				</h2>
                    <div class="blog-box clearfix">
                        @foreach ($bloglist as $blog)
                        <div class="wow fadeIn" data-wow-duration="1s" data-wow-delay="0.1s">
                            <div class="col-md-6 col-sm-6">
                                <div class="blog-block">
                                <a href="{{ route('blogs.show', ['title'=>$blog->blog_title_slug]) }}">
                                    <div class="blog-img-box">
                                        <img src="../images/blogs_img/@php echo $blog->blog_thumb @endphp" alt="" />
                                    </div>
                                    <div class="blog-dit">
                                        <h2>@php echo $blog->blog_title @endphp</h2>
                                        <h5>@php echo $blog->updated_at @endphp</h5>
                                    </div>
                                </a>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        @endforeach
                        
                    </div>
                    <!-- end blog-box -->

                    <div class="blog-btn-v">
                        
                    </div>

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