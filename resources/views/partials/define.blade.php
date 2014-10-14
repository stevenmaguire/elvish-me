<section>
    <div class="row">
        <div class="large-12 columns">
            <h2>Define elvish words</h2>
            {!! Form::open(['route' => 'define.do']) !!}
            <div class="row collapse">
                <div class="small-9 medium-10 columns">
                    {!! Form::text('keyword', (isset($keyword) ? $keyword : null), ['placeholder' => 'Elvish']) !!}
                </div>
                <div class="small-3 medium-2 columns">
                    {!! Form::submit('Define', ['class' => 'button postfix']) !!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    @if(isset($keyword))
    <div class="row">
        <div class="large-12 columns">
            <blockquote>
                <h3>Defintion for "{{ $keyword }}"</h3>
                @if($definition)
                <p>{{ $definition }}</p>
                @else
                <p>No definition found in this massive dicitionary :(</p>
                @endif
            </blockquote>
        </div>
    </div>
    @endif
</section>
