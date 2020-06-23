<form method="POST" action="{{route('one-to-one-android-insert')}}">
    @csrf

    <label>Nome: </label>
    <input id="name" name="name">

    <label>Latitude: </label>
    <input id="latitude" name="latitude">

    <label>Longitude: </label>
    <input id="longitude" name="longitude">

    <button type="submit">Enviar</button>
</form>