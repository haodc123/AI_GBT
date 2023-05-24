@component('components.header')
@endcomponent

<div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
<div class="container">

    <div class="row">
        <div class="col-lg-2 col-md-1 col-sm-1"></div>
        <div class="col-lg-8 col-md-10 col-sm-10 col-xs-12">
            
            <h4 class="direct-txt">/ Bài tập</h4>
            
            <div class="blog-box clearfix">
                <div class="res-content">
                Câu hỏi:<br />
                {{ $exercise->exc_content }}
                <br />
                Lời giải:<br />
                {{ $exercise->exc_answer }}
                <br /><br />
                Lớp: {{ $exercise->exc_grade }}
                <br />
                Môn học: {{ $exercise->exc_subject }} - {{ $exercise->exc_part }}
                <br />
                Ngày gửi: {{ $exercise->created_at }}

                </div>
                <!-- end detail-content -->
            </div>
            <!-- end blog-box -->
        </div>
        <!-- end col -->
        <div class="col-lg-2 col-md-1 col-sm-1"></div>
    </div><br />
    <!-- end row -->

    <div class="row">
        <div class="other-blogs col-lg-10 col-md-10 col-sm-12">
            <div class="row">
                <h4 class="direct-txt">/ Các Bài tập liên quan</h4>
            </div>
            <div class="row">

            @component('components.list_related', [
                    'list_exc_related' => $list_exc_related, 
                    'list_all_sub_part' => $list_all_sub_part,
                    'grade' => $grade,
                    'subject_s' => '',
                    'exc_id' => $exercise->id
                ])
            @endcomponent

            </div>
        </div>
        <!-- End other blog -->
        <div class="col-lg-1 col-md-1"></div>
    </div>
            
</div>
<!-- end container -->
</div>
<!-- end blog-main -->

@component('components.footer')
@endcomponent