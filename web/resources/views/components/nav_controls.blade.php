<!-- Nav row -->
<div class="row">
    <h4 class="control-nav">
        <ul>
        <li
            @if ($cur=='blogs') 
                class="active" 
            @endif
            ><a href="{{ route('ctrBlogList') }}">Blogs</a></li>
            <li 
            @if ($cur=='orders') 
                class="active" 
            @endif
            ><a href="{{ route('ctrOrderList') }}">Orders</a></li>
            <li
            @if ($cur=='users') 
                class="active" 
            @endif
            ><a href="{{ route('ctrUserList') }}">Users</a></li>
            
        </ul>
    </h4>
</div>