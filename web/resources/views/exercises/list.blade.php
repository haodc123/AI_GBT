@component('components.header')
@endcomponent

<div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
<div class="container">

    <div class="row">
        <div class="other-blogs col-lg-10 col-md-10 col-sm-12">
            <div class="row">
                <h4 class="direct-txt">/ Các Bài tập liên quan</h4>
            </div>
            <div class="row">

            @component('components.list_related', [
                    'list_exc_related' => $list_exc, 
                    'list_all_sub_part' => $list_all_sub_part,
                    'grade' => $grade,
                    'subject_s' => $subject_s
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