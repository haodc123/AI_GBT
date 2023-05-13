@component('components.header')
@endcomponent

<script type="text/javascript" src="{{ URL::asset('js/controls.js') }}"></script>

    <div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">

                    @component('components.nav_controls')
                        @slot('cur')
                            blogs
                        @endslot
                    @endcomponent

                    <!-- title row -->
                    <div class="row">
                        <h2 class="detail-title">
                        Quản lý Blogs
                        </h2>
                        <br />
                    </div>

                    <!-- result row -->
                    <div class="row">
                        <div class="blog-box clearfix">
                            <table class="table table-hover list-ctrl">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Content</th>
                                        <th scope="col">Cat</th>
                                        <th scope="col">Thumb</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @foreach ($blogs as $blog)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <form method="POST" action="/control/update_blog">
                                        @csrf <!-- {{ csrf_field() }} -->
                                            <td>
                                                <input type="text" name="f_title" style="width: 120px;"
                                                    value="{{ $blog->blog_title }}">
                                                </input>
                                            </td>
                                            <td>
                                                <textarea name="f_content" style="width: 500px; float: left;" row="12">
                                                    {{ $blog->blog_content }}
                                                </textarea>
                                            </td>
                                            <td>
                                                <input type="text" name="f_cat"
                                                    value="{{ $blog->blog_cat }}">
                                                </input>
                                            </td>
                                            <td>
                                                <input type="text" name="f_thumb"
                                                    value="{{ $blog->blog_thumb }}">
                                                </input>
                                            </td>
                                            <td>
                                                <select name="f_status">
                                                    <option value="0" {{ $blog->blog_status==0 ? 'selected' : '' }}>Draft</option>
                                                    <option value="1" {{ $blog->blog_status==1 ? 'selected' : '' }}>Published</option>
                                                </select>
                                            </td>
                                            <input type="hidden" name="f_id" value="{{ $blog->id }}"/>
                                            <td>
                                                <button type="submit"
                                                    name="blog_action"
                                                    value="update"
                                                    class="btn btn-primary">Update</button>
                                                <button type="submit" 
                                                    name="blog_action"
                                                    value="delete" 
                                                    onclick="return confirm('Bạn chắc không?')"
                                                    class="btn btn-danger">Delete</button>
                                            </td>
                                        </form>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                                </tbody>
                            </table>

                        </div>
                        <!-- end blog-box -->
                    </div>
                    <!-- end result row -->

                    <!-- paging row -->
                    <div class="row">
                        <div style="float:right;">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                    <!-- end paging row -->
                </div>
                <!-- end col -->
                <div class="col-lg-2 col-md-1 col-sm-1"></div>
            </div>
            <!-- end row -->
            
            
        </div>
        <!-- end container -->
    </div>
    <!-- end blog-main -->
    
@component('components.footer')
@endcomponent