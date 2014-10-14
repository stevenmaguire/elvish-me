<section>
    <div class="row">
        <div class="large-12 columns">
            <h2>Generate elvish ipsum</h2>
            {!! Form::open(['route' => 'content.do']) !!}
            <div class="row collapse">
                <div class="small-3 medium-3 columns">
                    {!! Form::select('type', $types, (isset($type) ? $type : null)) !!}
                </div>
                <div class="small-1 medium-3 columns">
                    {!! Form::text('count', (isset($count) ? $count : null), ['placeholder' => 'Amount']) !!}
                </div>
                <div class="small-5 medium-4 columns">
                    <label for="link">
                        {!! Form::checkbox('link', true, (isset($link) ? $link : false), ['id' => 'link']) !!}
                        Link to definitions
                    </label>
                </div>
                <div class="small-3 medium-2 columns">
                    {!! Form::submit('Generate', ['class' => 'button postfix']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @if(isset($content))
    <div class="row">
        <div class="small-12 columns">
            <blockquote>
                <h3>{{ $count }} {{ ($count == 1 ? rtrim($type,'s') : $type) }} of elvish ipsum</h3>
                @foreach($content as $item)
                @if(isset($link) && $link)
                <p>{!! preg_replace('/([^\s,.]+)/', '<a href="/define/$1" title="Define: $1">$1</a>', $item); !!}</p>
                @else
                <p>{!! $item !!}}</p>
                @endif
                @endforeach
            </blockquote>
        </div>
    </div>
    @endif
</section>
