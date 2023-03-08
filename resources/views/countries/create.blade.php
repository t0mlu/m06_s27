@extends('countries.layout')

@section('content')
<h2>Countries create</h2>
<form action="{{ route('countries.store') }}" method="POST">
    @csrf
    <table>
        @foreach ($fillable as $atr)
        <tr>
            <td>
                <strong>{{ ucfirst($atr) }}:</strong>
            </td>
            <td>
                <input name="{{ $atr }}"/>
            </td>
        </tr>
        @endforeach
    </table>
    <button type="submit">Create</button>
</form>
@endsection