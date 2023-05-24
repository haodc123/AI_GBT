@component('components.header')

@endcomponent


	<section id="banner" data-video="images/banner">

		<div class="inner">
			<header>
				<h1>GIẢI BÀI TẬP MỌI CẤP ĐỘ</h1>
			</header>

			<div class="saleoff">
				<a href="exc/camera" class="button big alt scrolly input-camera">Chụp Bài tập bằng Camera</a><br />
				<a href="exc/type" class="input-type"><span>Hoặc tự gõ Bài tập &nbsp;>></span></a>
			</div>

		</div>

	</section>


<!-- Main -->

	<div id="main">

		<section id="s-refer" class="wrapper style2">

			<div class="inner">

				<header>

					<h2>Tham khảo</h2>

					<p>Cùng tham khảo những Bài tập mà mọi người đã đưa lên...</p>

				</header>

				<!-- Tabbed Video Section -->

					<div class="flex flex-tabs">

						<ul class="tab-list">

							<li><a href="#" data-tab="tab-1" class="switch active">Lớp 8</a></li>
							<li><a href="#" data-tab="tab-2" class="switch">Lớp 9</a></li>
							<li><a href="#" data-tab="tab-3" class="switch">Lớp 10</a></li>
							<li><a href="#" data-tab="tab-4" class="switch">Lớp 11</a></li>
							<li><a href="#" data-tab="tab-5" class="switch">Lớp 12</a></li>
							<li><a href="#" data-tab="tab-6" class="switch">Khác</a></li>

						</ul>

						<div class="tabs">

							<!-- Tab 1 -->

								<div class="tab tab-1 flex flex-3 active">

								@for ($i=1; $i<=9; $i++)

										<div class="video col">
											<div class="image fit">
												<img src="images/portfolio/product/pr ({{ $i }}).jpg" alt="Chụp ảnh Sản phẩm" />
											</div>
											<a href="gallery/product" class="link"><span>Click Me</span></a>
										</div>

								@endfor

								</div>

							<!-- Tab 2 -->

								<div class="tab tab-2 flex flex-3">

								@for ($i=1; $i<=6; $i++)

										<div class="video col">
											<div class="image fit">
												<img src="images/portfolio/fashion/f ({{ $i }}).jpg" alt="Chụp ảnh Thời trang" />
											</div>
											<a href="gallery/fashion" class="link"><span>Click Me</span></a>
										</div>

								@endfor

								</div>

							<!-- Tab 3 -->
								<div class="tab tab-3">

								@for ($i=1; $i<=5; $i++)

										<div class="video col">
											<div class="image fit">
												<img src="images/portfolio/place/p ({{ $i }}).jpg" alt="Chụp ảnh Thời trang" />
											</div>
											<a href="gallery/place" class="link"><span>Click Me</span></a>
										</div>

								@endfor

								</div>

						</div>

					</div>

			</div>

		</section>


	

		<section id="s-blogs" class="wrapper ">

			<div class="inner">

				<header class="align-center">

					<h2>Thông tin hữu ích</h2>

					<p>Mẹo, Bí kíp, Hướng dẫn, Tài liệu, chỉ nhau học,...</p>

				</header>


				<!-- 3 Column Video Section -->

					<div class="flex flex-3">


					@foreach ($someblogs as $blog)

						<div class="video col">

							<div class="image fit">

								<img src="images/blogs/{{ $blog->blog_thumb }}" alt="Dịch vụ Media, Ảnh - {{ $blog->blog_title }}" />

							</div>

							<p class="caption">

								{{ $blog->blog_title }}

							</p>

							<a href="blogs/{{ $blog->blog_title_slug }}" class="link"><span>Click Me</span></a>

						</div>

					@endforeach

					

					</div>

			</div>

		</section>



	</div>


@component('components.footer')

@endcomponent