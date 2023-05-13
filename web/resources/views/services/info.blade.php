@component('components.header')
@endcomponent

    <div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-1 col-sm-1"></div>
                <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
                	<br /><br /><br />
                    <h4 class="direct-txt">/ Dịch vụ Ảnh và Media tại {{ Config::get('constants.general.site_name') }}</h4>
                    <br />
                    <h2 class="detail-title">
					{{ $f_type }}
				    </h2>
                    <br />
                    <div class="blog-box clearfix">
                        <div class="detail-content">

                        @if ($type == 'place')
    <p>Bạn cần những tấm hình chụp nội thất, đoạn phim quảng cáo ấn tượng, những tấm hình đẹp chuyên nghiệp về không gian, địa điểm kinh doanh của bạn sẽ tăng hiệu quả marketing lên rất nhiều. Mình sẽ giúp bạn đạt được điều này !<br />
Không những tạo hình ảnh, video, chúng mình còn tư vấn hoàn thiện ý tưởng để hình ảnh dễ marketing và dễ tạo ấn tượng nhất có thể.</p>
    <br />
    <img src="../images/portfolio/place/p (3).jpg" />
                        @elseif ($type == 'social')
    <p>Bạn có để ý không? Mỗi video Tiktok rất là ngắn, và trong vòng vài giây đầu, nếu không tạo ấn tượng, bạn sẽ bị bỏ qua...</p>
    <p>Câu chuyện ở đây là làm sao để video, hình ảnh nó bắt mắt, nó ấn tượng ngay lúc đầu...</p>
    <p>Làm hình ảnh, video để quảng bá trên Mạng xã hội là 1 điều khá phổ biến trong thời gian gần đây, nhưng làm điều này một cách chuyên nghiệp để thúc đẩy tốt marketing thì hầu như chỉ có các doanh nghiệp lớn.<br />
    Chúng mình mang đến những giải pháp giá cả rất phải chăng với nhiều gói và mức giá để hầu như ai cũng có thể tiếp cận được.<br />
    Trong thời buổi Tiktok, mạng xã hội bùng nổ, nhà nhà bán hàng, làm thương mại, nếu không có hình ảnh tốt, khó lòng cạnh tranh.<br />
    <br />
    - Dịch vụ lên <strong>ý tưởng, kịch bản, lời thoại</strong> video;<br />
    - Dịch vụ <strong>quay video</strong>;<br />
    - Dịch vụ <strong>edit video</strong>.</p>
                        @elseif ($type == 'event')
    <p>Chúng tôi mang đến cho khách hàng một giải pháp toàn diện về quay phim chụp ảnh sự kiện với các dịch vụ đa dạng như: <br />
    - Quay phim highlights sự kiện, <br />
    - Quay livestream sự kiện, 
    - Quay fullshow...<br />
    Chúng mình chuyên thực hiện quay phim chụp ảnh với phong cách mới mẻ, riêng biệt, dễ tạo điểm nhấm và marketing.<br />
    Với đội ngũ ekip chuyên nghiệp & sáng tạo, chúng tôi sẽ tư vấn và thực hiện các video sự kiện với nhiều quy mô ngân sách khác nhau. Sự khác biệt lớn nhất và nổi bật nhất của chúng mình chính là sáng tạo và tâm huyết.</p>
                        @elseif ($type == 'product')
    <p>Chúng mình cung cấp cho khách hàng đầy đủ các dịch vụ chuyên nghiệp từ: lên ý tưởng, stylist… đến việc lựa chọn địa điểm, chụp và chỉnh sửa ảnh hình…<br />
- Quý khách có thể lựa chọn 1 trong những dịch vụ đơn lẻ. Chúng tôi sẵn sàng phục vụ và đáp ứng từng yêu cầu nhỏ nhất của khách hàng.<br />
- Linh động về thời gian, giá cả: quý khách hàng có thể lựa chọn thời gian chụp theo yêu cầu hoặc theo các gói mà chúng tôi cung cấp sẵn.</p>
    <br />
    <img src="../images/portfolio/product/pr (5).jpg" />
                        @else
    <p>Mừng tháng khai trương, chúng mình giảm giá 10-=20% các dịch vụ.</p>
    <br />
    <img src="../images/sale-off.png" />
                        @endif
    <p>Tại sao nên lựa chọn dịch vụ chụp ảnh, quay phim tại {{ Config::get('constants.general.site_name') }} ?</p>
    <p> - Chúng mình là một đội designer chuyên nghiệp, đã từng nhiều năm kinh nghiệm trong Marketing – chụp ảnh và dựng video.<br />
     - Không những làm hình ảnh, video thương mại, chúng mình còn lên ý tưởng nhằm marketing tốt nhất.<br />
     - Cam kết về dịch vụ và chất lượng sản phẩm: Đáp ứng chính xác và kịp thời các yêu cầu của khách hàng, giao sản phẩm đúng hẹn.<br />
     - Tư vấn khách hàng nhiệt tình, chi tiết.</p>
    <p>Liên hệ ngay Hot line 038 2040 081 để được báo giá bạn nhé.</p>
                        </div>
                        <!-- end detail-content -->
                        <div class="detail-bottom">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                    <div class="fb-like" data-href="" data-width="" data-layout="standard" data-action="like" data-size="small" data-share="true"></div>
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
                        <h2>Dịch vụ khác</h2>
                    </div>
                    <div class="row">
                    
                        <div class="other-blogs-box col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <a href="/services/product">
                                <img src="../images/service_product.jpg">
                                <p>Chụp Ảnh Thương mại, Sản phẩm</p>
                            </a>
                        </div>

                        <div class="other-blogs-box col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <a href="/services/place">
                                <img src="../images/service_place.jpg">
                                <p>Chụp Ảnh Kiến trúc</p>
                            </a>
                        </div>

                        <div class="other-blogs-box col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <a href="/services/social">
                                <img src="../images/service_social.jpg">
                                <p>Video Quảng bá Mạng xã hội</p>
                            </a>
                        </div>

                        <div class="other-blogs-box col-lg-3 col-md-4 col-sm-6 col-xs-12">
                            <a href="/services/event">
                                <img src="../images/service_event.jpg">
                                <p>Video Sự kiện</p>
                            </a>
                        </div>
                        
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