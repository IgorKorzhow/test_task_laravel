@props(['product'])
@php /** @var App\Models\Product $product */ @endphp
<div class="container">
    <div>
        <div>This message inform that your product was created</div>
        <div>{{ $product->id }}</div>
        <div>{{ $product->article }}</div>
        <div>{{ $product->name }}</div>
        <div>{{ $product->status }}</div>
    </div>
</div>

<style>
    .container {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
