<div class="container">
    @card(['title' => 'Most Commented', 'subtitle' => 'Posts with most comments'])
            @slot('items')
                    @foreach ($mostCommented as $post)
                            <li class="list-group-item">
                                    <a href="{{ route('posts.show', ['post' => $post->id]) }}">{{ $post->title; }}</a>
                                    <i><p class="text-muted">{{ $post->comments_count; }} Comments</p></i>
                            </li>   
                    @endforeach
            @endslot
    @endcard
    @card(['title' => 'Most Active', 'subtitle' => 'Authors with most posts written'])
            @slot('items', collect($mostActive)->pluck('name'))
    @endcard
    <!-- Active Users Last Month -->
    @card(['title' => 'Most Active Users Last Month', 'subtitle' => 'Users with the most posts written last month'])
            @slot('items', collect($mostActiveLastMonth)->pluck('name'))
    @endcard
</> 