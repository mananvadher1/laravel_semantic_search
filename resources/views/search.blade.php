@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Semantic Search</h2>

    <form method="POST" action="{{ route('search') }}">
        @csrf
        <input type="text" name="query" value="{{ old('query', $query ?? '') }}" placeholder="Describe your need..." class="form-control mb-2">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

    @if(isset($results))
        <h4 class="mt-4">Results:</h4>
        @if(count($results))
            <ul class="list-group">
                @foreach($results as $result)
                    <li class="list-group-item">
                        <strong>Main Category:</strong> {{ $result['category']->main_category }}<br>
                        <strong>Sub Category:</strong> {{ $result['category']->sub_category }}<br>
                        <strong>Service:</strong> {{ $result['category']->service }}<br>
                        <strong>Score:</strong> {{ number_format($result['score'], 3) }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>No results found.</p>
        @endif
    @endif
</div>
@endsection
