@component('components.header')
@endcomponent
   
    
    <div class="container">
  <br /><br /><br />
  <h1>Gallery {{ $f_cat }} tại {{ Config::get('constants.general.site_name') }}</h1>
  
<p><section class="img-gallery-magnific">

@if ($cat == 'place')
    @for ($i=1; $i <= 22; $i++)
    <div class="magnific-img">
				<a class="image-popup-vertical-fit" href="../images/portfolio/place/p ({{ $i }}).jpg" title="Chụp Ảnh Kiến trúc">
					<img src="../images/portfolio/place/p ({{ $i }}).jpg" alt="Chụp Ảnh Kiến trúc" />
				</a>
			</div>
    @endfor
@elseif ($cat == 'fashion')
	@for ($i=1; $i <= 40; $i++)
    <div class="magnific-img">
				<a class="image-popup-vertical-fit" href="../images/portfolio/fashion/f ({{ $i }}).jpg" title="Chụp Ảnh Thời trang">
					<img src="../images/portfolio/fashion/f ({{ $i }}).jpg" alt="Chụp Ảnh Thời trang" />
				</a>
			</div>
    @endfor
@elseif ($cat == 'event')
    @for ($i=1; $i <= 3; $i++)
      <div class="magnific-img">
				<a class="image-popup-vertical-fit" href="../images/portfolio/event/e ({{ $i }}).mp4" title="Làm video Thương mại">
					<iframe src="../images/portfolio/event/e ({{ $i }}).mp4" sandbox></iframe>
				</a>
			</div>
	@endfor
@else
    @for ($i=1; $i <= 29; $i++)
      <div class="magnific-img">
				<a class="image-popup-vertical-fit" href="../images/portfolio/product/pr ({{ $i }}).jpg" title="Chụp Ảnh Sản phẩm">
					<img src="../images/portfolio/product/pr ({{ $i }}).jpg" alt="Chụp Ảnh Sản phẩm" />
				</a>
			</div>
	@endfor
@endif
			
		</section>
		<div class="clear"></div>
	</p>

</div>


<script type="text/javascript">

$(document).ready(function(){
    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
    mainClass: 'mfp-with-zoom', 
    gallery:{
                enabled:true
            },

    zoom: {
        enabled: true, 

        duration: 300, // duration of the effect, in milliseconds
        easing: 'ease-in-out', // CSS transition easing function

        opener: function(openerElement) {

        return openerElement.is('img') ? openerElement : openerElement.find('img');
    }
    }

    });

});

</script>

