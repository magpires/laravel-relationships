<form method="POST" action="{{route('one-to-one-android-insert')}}">
    <input type="hidden" name="_token" value="fPm8z6cDnDY1w6XaMp411qpHpjzQViU3azVsWYuR">
    {{-- @csrf --}}

    <label>Nome: </label>
    <input id="name" name="name">

    <label>Latitude: </label>
    <input id="latitude" name="latitude">

    <label>Longitude: </label>
    <input id="longitude" name="longitude">

    <button type="submit">Enviar</button>
</form>