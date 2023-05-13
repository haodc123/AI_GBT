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
                            orders
                        @endslot
                    @endcomponent

                    <!-- title row -->
                    <div class="row">
                        <h2 class="detail-title">
                        Quản lý Orders
                        </h2>
                        <br />
                    </div>

                    <!-- filter row -->
                    <div class="f_ctrl_filter row">
                        <form>
                            @csrf <!-- {{ csrf_field() }} -->
                            <td>
                                <input class="fe_ctrl" type="text" name="ff_name"
                                placeholder="filter name" onfocusout="onOrdersFilter()">
                                </input>
                            </td>
                            <td>
                                <input class="fe_ctrl" type="text" name="ff_tel"
                                placeholder="filter tel" onfocusout="onOrdersFilter()">
                                </input>
                            </td>
                            <td>
                                <input class="fe_ctrl" type="text" name="ff_addr"
                                placeholder="filter addr" onfocusout="onOrdersFilter()">
                                </input>
                            </td>
                            <td>
                                <input class="fe_ctrl" type="text" name="ff_food"
                                placeholder="filter note" onfocusout="onOrdersFilter()">
                                </input>
                            </td>
                            <td>
                                <select class="fe_ctrl" name="ff_status">
                                    <option value="0" >Not confirm</option>
                                    <option value="1" >Confirmed</option>
                                    <option value="2" >Ready delivery</option>
                                    <option value="3" >Deliveried</option>
                                    <option value="4" >Finish</option>
                                </select onfocusout="onOrdersFilter()">
                            </td>
                        </form>
                    </div>
                    <!-- end filter row -->

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
                                        <th scope="col">Note</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php $i = 1; @endphp
                                @foreach ($orders as $order)
                                    <tr>
                                        <th scope="row">{{ $i }}</th>
                                        <form method="POST" action="/control/update_order">
                                        @csrf <!-- {{ csrf_field() }} -->
                                            <td>
                                                <label>{{ $order->customer_name }}</label>
                                                <input type="hidden" name="f_name"
                                                    value="{{ $order->customer_name }}">
                                                </input>
                                            </td>
                                            <td>
                                                <label>{{ $order->customer_tel }}</label>
                                                <input type="hidden" name="f_tel"
                                                    value="{{ $order->customer_tel }}">
                                                </input>
                                            </td>
                                            <td>
                                                <input type="text" name="f_addr"
                                                    value="{{ $order->customer_addr }}">
                                                </input>
                                            </td>
                                            <td>
                                                <input type="text" name="f_food"
                                                    value="{{ $order->order_note }}">
                                                </input>
                                            </td>
                                            <td>
                                                <select name="f_status">
                                                    <option value="0" {{ $order->order_status==0 ? 'selected' : '' }}>Not confirm</option>
                                                    <option value="1" {{ $order->order_status==1 ? 'selected' : '' }}>Confirmed</option>
                                                    <option value="2" {{ $order->order_status==2 ? 'selected' : '' }}>Ready delivery</option>
                                                    <option value="3" {{ $order->order_status==3 ? 'selected' : '' }}>Deliveried</option>
                                                    <option value="4" {{ $order->order_status==4 ? 'selected' : '' }}>Finish</option>
                                                </select>
                                            </td>
                                            <input type="hidden" name="f_id" value="{{ $order->id }}"/>
                                            <input type="hidden" name="f_customer_id" value="{{ $order->customer_id }}"/>
                                            <td>
                                                <button type="submit"
                                                    name="order_action"
                                                    value="update"
                                                    class="btn btn-primary">Update</button>
                                                <button type="submit" 
                                                    name="order_action"
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
                            {{ $orders->links() }}
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