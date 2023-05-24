<!-- List Exercise -->
<ul class="list-exercise">
@foreach ($list_exc_related as $item)
    @if (!(isset($exc_id) && $exc_id == $item->id))
    <li>
        <a href="{{ route('exc.show', ['exc_i'=>$item->id]) }}">    
            <span>{{ shortenStr($item->exc_content) }}</span>
        </a>
    </li><br />
    @endif
@endforeach
</ul>

<!-- List Subject -->
<ul class="list-subject">
    <li>
        Bài tập theo Môn học:<br />
    </li>
@foreach ($list_all_sub_part as $item)
    @if ($item->type == 1)
    <li>
        <a href="{{ route('exc.list', ['grade'=>$grade, 'subject_s'=>$item->title_slug]) }}">    
            <span>{{ $item->title }} {{ $grade != 0 ? 'Lớp '.$grade : '' }}</span>
        </a>
    </li>
    @elseif ($item->type == 2 && $item->sub_parent == $subject_s && $item->grade == $grade)
    <li>
        <a href="{{ route('exc.list', ['grade'=>$grade, 'subject_s'=>$item->title_slug]) }}">    
            <span>{{ $item->title }} {{ $grade != 0 ? 'Lớp '.$grade : '' }}</span>
        </a>
    </li>
    @endif
@endforeach
</ul>

@if ($grade == 0)
    <!-- List Grade -->
    <ul class="list-grade">
        <li>
        Bài tập theo Lớp học:<br />
        </li>
    @for ($i = 1; $i <= 12; $i++)
        <li>
            <a href="{{ route('exc.list', ['grade'=>$i, 'subject_s'=>0]) }}">
                <span class="grade">Lớp {{ $i }}</span>
            </a>
        </li>
    @endfor    
    </ul>
@endif