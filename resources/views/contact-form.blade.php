@extends ('layout')

@section ('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>Send me an email</h2>
            </div>
            <div class="form">
                <form method="POST" action="/email">
                @csrf                   
                    <div class="field">
                        <label class="label" for="topic">Topic</label>
                        <div class="control">
                            <input type="text" name="topic" id="topic" value="{{ old('topic') }}" >
                            @error('topic')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="email">Email</label>
                        <div class="control">
                            <input type="email" name="email" id="email" value="{{ old('email') }}" >
                            @error('email')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit">Email</button>
                    </div>
                </form>
            </div>
            @if (session('message'))
            <div>
                <p>{{ session('message') }}</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection