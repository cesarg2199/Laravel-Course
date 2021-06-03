 @if($loop->even)
            <div>{{$key}}. {{$post['title']}}</div>
        @else
            <div style="background-color:gray">{{$key}}. {{$post['title']}}</div>
        @endif