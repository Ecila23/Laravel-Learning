@extends ('layout')

@section ('content')
<div id="wrapper">
	<div id="page" class="container">
		<div id="content">
			<div class="title">
				<h2>Edit Post</h2>
            </div>
            <div class="form">
                <form method="POST" action="/posts/<?= $post->slug ?>">
                @csrf
                @method('PUT')                   
                    <div class="field">
                        <label class="label" for="title">Title</label>
                        <div class="control">
                            <input type="text" name="title" id="title" value="<?= $post->title?>" value="{{ old('title') }}">
                            @error('title')
                                <p class="help is-danger">{{ $errors->first('title') }}</p>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="field">
                        <label class="label" for="body">Body</label>
                        <div class="control">
                            <textarea name="body" id="body" cols="30" rows="10" value="{{ old('body') }}"><?= $post->body?></textarea>
                            @error('body')
                                <p class="help is-danger">{{ $errors->first('body') }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="field">
                        <label class="label" for="body">Tags</label>
                        <div class="control">
                            <select name="tags[]" multiple>
                                @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">
                                        {{ $tag->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('tags')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <button type="submit">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection