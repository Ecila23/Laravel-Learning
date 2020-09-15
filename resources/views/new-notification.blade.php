@extends ('layout')

@section ('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
            <div class="form">
                <form method="POST" action="/notifications">
                @csrf                   
                    <div>
                        <button type="submit">New Notification</button>
                    </div>
                </form>
                @if (session('message'))
                <div>
                    <p>{{ session('message') }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection