@extends('countries.layout')

@section('content')
<h2>Countries create</h2>
<form action="{{ route('countries.update', $country) }}" method="POST">
    @csrf
    @method('PUT')

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
    <button type="submit">Update</button>
</form>
@endsection