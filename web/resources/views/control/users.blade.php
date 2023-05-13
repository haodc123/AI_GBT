@component('components.header')
@endcomponent

    <div id="blog" class="blog-main pad-top-100 pad-bottom-100 parallax">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1"></div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">

                    @component('components.nav_controls')
                        @slot('cur')
                            users
                        @endslot
                    @endcomponent

                    <!-- title row -->
                    <div class="row">
                        <h2 class="detail-title">
                        Quản lý Users
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Tel</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Point</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <form method="POST" action="/control/update_user">
                                        @csrf <!-- {{ csrf_field() }} -->
                                            <td>
                                                <label>{{ $user->user_name }}</label>
                                            </td>
                                            <td>
                                                <label>{{ $user->user_tel }}</label>
                                            </td>
                                            <td>
                                                <label>{{ $user->user_addr }}</label>
                                            </td>
                                            <td>
                                                <label>{{ $user->user_point }}</label>
                                            </td>
                                            <input type="hidden" name="f_id" value="{{ $user->id }}"/>
                                            <td>
                                                <button type="submit" 
                                                    name="user_action"
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
                            {{ $users->links() }}
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

    <script type="text/javascript" src="{{ URL::asset('js/controls.js') }}"></script>
    
@component('components.footer')
@endcomponent