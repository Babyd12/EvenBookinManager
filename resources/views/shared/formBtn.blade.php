@php
    $class ??= null;
    $action ??= '';
    $method ??= 'post';
    $another_method ??= '';
    $token ??= true;
    $value ??= 'Edit Me';
    $argument ??= null;
@endphp


<form method="{{ $method }}" action="{{ route($action, $argument) }}">
    @if ($token)
        @csrf
        @method($another_method )
        <input @class(['btn btn-primary', $class]) type="submit" value="{{ $value }}">
    @else
        <input @class(['btn btn-primary', $class]) type="submit" value="{{ $value }}">
    @endif
</form>
