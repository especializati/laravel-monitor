@csrf()
<input type="text" name="url" placeholder="URL" value="{{ $site->url ?? old('site') }}">
<button type="submit">Enviar</button>
