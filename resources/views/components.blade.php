@extends('layouts.default')
@section('title', 'Welcome Page')
@section('content')
<div class="mb-4">
    <h1>Another Heading Text</h1>
    <h2>Another Heading Text</h2>
    <h3>Another Heading Text</h3>
    <h4>Another Heading Text</h4>
    <h5>Another Heading Text</h5>
    <h6>Another Heading Text</h6>
    <p>Lorem ipsum dolor sit amet consectetur, adipiscing elit class nullam scelerisque magnis, morbi molestie ligula eleifend. Eleifend varius pellentesque tempus porttitor proin sodales dapibus scelerisque at suscipit, convallis bibendum inceptos fringilla aliquam ligula blandit ut morbi. Ultricies viverra etiam aenean ad eros tristique pellentesque primis auctor est, conubia velit aliquet tellus a semper turpis placerat sagittis. Dui facilisis ante tempor imperdiet ullamcorper nisl nec mus libero lobortis, scelerisque cursus justo tincidunt aenean eu massa curae. Placerat facilisi purus nec nisi tempus iaculis pellentesque, euismod blandit convallis interdum velit feugiat at nascetur, vulputate dictum vivamus sem parturient ridiculus. Felis rhoncus duis quam habitant natoque turpis cubilia, nulla accumsan aliquam pulvinar euismod urna primis, porttitor massa eget et taciti elementum.</p>
    <ul>
        <li>Lorem ipsum dolor sit amet consectetur, adipiscing elit class nullam scelerisque magnis</li>
        <li>Lorem ipsum dolor sit amet consectetur, adipiscing elit class nullam scelerisque magnis</li>
        <li>Lorem ipsum dolor sit amet consectetur, adipiscing elit class nullam scelerisque magnis</li>
        <li>Lorem ipsum dolor sit amet consectetur, adipiscing elit class nullam scelerisque magnis</li>
    </ul>
</div>
<div class="rounded-container mb-4">
    <h2>Another Heading Text</h2>
    <div class="budge budge-green">Something</div>
    <div class="budge budge-red">Something</div>
    <div class="budge budge-yellow">Something</div>
    <div class="budge budge-purple">Something</div>

    <div class="flex items-center justify-center gap-4">
        <div class="gray-container">
            <h5>Something in here</h5>
            <a href="" class="btn btn-purple btn-small">Click</a>
            <button class="btn btn-purple btn-small">Save</button>
            <a href="" class="btn btn-purple btn-big">Click</a>
            <button class="btn btn-purple btn-big">Save</button>
            <a href="" class="btn btn-transparent btn-small">Click</a>
            <button class="btn btn-transparent btn-small">Save</button>
        </div>
        <div class="rounded-container">
            <a href="" class="btn btn-transparent btn-big">Click</a>
            <button class="btn btn-transparent btn-big">Save</button>
            <a href="" class="btn btn-gray btn-small">Click</a>
            <button class="btn btn-gray btn-small">Save</button>
            <a href="" class="btn btn-gray btn-big">Click</a>
            <button class="btn btn-gray btn-big">Save</button>
            <div class="caption">This is a caption</div>
            <div class="small-caption">This is a caption</div>
        </div>
    </div>
</div>
<div class="rounded-container mb-4">
    <div class="flex items-center justify-center gap-4 mb-4">
        <input type="text" name="" class="input-element" placeholder="First name">
        <input type="email" name="" class="input-element" placeholder="Email address">
        <input type="tel" name="" class="input-element" placeholder="Telephone">    
    </div>
    <div class="flex items-center justify-center gap-4">
        <input type="date" name="" class="input-element" placeholder="Date">
        <select name="" class="input-element">
            <option value="" disabled selected>select something</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
        </select>
        <textarea name="" class="input-element" rows="4"></textarea>
    </div>
</div>
@endsection