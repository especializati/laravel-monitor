@csrf()
<input type="text" name="url" placeholder="URL" value="{{ $site->url ?? old('url') }}">
<button type="submit">Enviar</button>
