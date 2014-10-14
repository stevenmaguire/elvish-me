<section>
    <div class="row">
        <div class="large-12 columns">
            <h2>Generate elvish ipsum</h2>
            {!! Form::open(['route' => 'content.do']) !!}
            <div class="row collapse">
                <div class="small-7 columns">
                    {!! Form::select('type', $types, (isset($type) ? $type : null)) !!}
                </div>
                <div class="small-3 columns">
                    {!! Form::text('count', (isset($count) ? $count : null), ['placeholder' => 'Amount']) !!}
                </div>
                <div class="small-2 columns">
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
                <p>{!! preg_replace('/([^\s,.]+)/', '<a href="/define/$1" title="Define: $1">$1</a>', $item); !!}</p>
                @endforeach
            </blockquote>
        </div>
    </div>
    @endif
</section>
