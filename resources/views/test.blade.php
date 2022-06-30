@extends('layouts.app')

@section('content')
    <h3>Draggables</h3>
    <button class="btn btn-primary drag">Drag me</button>
    <button class="btn btn-primary draghandle">Drag my <strong class="handle">handle</strong></button>
    <button class="btn btn-primary dragdrop">Drag and Drop me</button>
    <span class="draggables">
      <button>1</button>
      <button>2</button>
      <button>3</button>
      <button>4</button>
    </span>

    <div class="drop"><p>Drop here</p></div>

    <h3>Normal List</h3>
    <ul class="normal">
        <li>Item 1</li>
        <li>Item 2
            <ul>
                <li>Item 2.1</li>
                <li>Item 2.2
                    <ul>
                        <li>Item 2.2.1</li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>Item 3
            <ul>
                <li>Item 3.1</li>
            </ul>
        </li>
    </ul>

    <h3>Floating LI elements</h3>
    <ul class="float">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
        <li>
            Item 3
        </li>
        <li>
            Item 4
        </li>
    </ul>

    <h3>Inline-block LI elements</h3>
    <ul class="inline">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
        <li>
            Item 3
        </li>
        <li>
            Item 4
        </li>
    </ul>

    <h3>Grouped Lists</h3>
    <ul class="grouped">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
    </ul>
    <ul class="grouped">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
    </ul>

    <h3>List of DIVs</h3>
    <div class="list parent">
        <div>Child 1</div>
        <div>Child 2</div>
        <div>
            Child 3
            <div class="list">
                <div>Subchild</div>
            </div>
        </div>
    </div>

    <h3>Off Switch</h3>
    <button class="btn btn-primary off">All off</button>
@endsection
