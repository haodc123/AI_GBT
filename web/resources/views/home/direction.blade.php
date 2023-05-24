@component('components.header')

@endcomponent

	<section id="banner" data-video="images/banner">

		<div class="inner direction">
			<header>
				<h1>GIẢI BÀI TẬP MỌI CẤP ĐỘ</h1>
			</header>

			<ul>
                <!-- <li>
                    <select name="exc_req_country">
                        <option value="0">Chọn Quốc gia: Việt Nam</option>
                    </select>
                </li><br /> -->
                <li>
                    <select id="s_grade" name="exc_req_grade">
                        <option value="0">Chọn lớp: Chưa xác định</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">Lớp {{ $i }}</option>
                        @endfor
                        <option value="13">Đại học - Khác</option>
                    </select>
                </li>
                <li>
                    <select id="s_subject" name="exc_req_subject">
                        <option value="0">Chọn môn học: Chưa xác định</option>
                        @foreach ($list_all_sub as $sub)
                            <option value="{{ $sub->id }}">{{ $sub->title }}</option>
                        @endforeach
                    </select>
                </li>
                <li>
                    <div class="saleoff">
                        <a href="exc/camera" class="button big alt scrolly input-camera">Chụp Bài tập bằng Camera</a>
                        <a href="exc/type" class="input-type"><span>Hoặc tự gõ Bài tập &nbsp;>></span></a>
                    </div>
                </li>
            </ul>

		</div>

	</section>

    
    
@component('components.footer')

@endcomponent