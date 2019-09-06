<form method="POST" action="{{ route('newsletter.subscribe') }}">
    @csrf

    <fieldset>
        <legend>{{ __( 'Newsletter subscription' ) }}</legend>

        <div>
            <label for="email">{{ __( 'Email address' ) }}</label>
            <input type="email" name="email" id="email" placeholder="Your email.." value="{{ old('email') }}" required />
            <input type="hidden" name="list" id="list" value="" />

            @if ( $errors->has('email') )
                <p>{{ $errors->first('email') }}</p>
            @endif
        </div>
    </fieldset>

    <button type="submit">{{ __( 'Subscribe' ) }}</button>
</form>
