@extends('layouts.sidenav')
@section('title', 'Code Editor')

@section('content')

<h1>Code Editor</h1>
<form method="post" action="/admin/show-code-html">
    @csrf
    <div class="form-group">
        <label for="code_type">Code Type</label>
        <select id="code_type" name="code_type">
            <option value="js">JavaScript</option>
            <option value="paragraph">Paragraph</option>
            <option value="php">PHP</option>
            <option value="html">HTML</option>
        </select>
    </div>
    <div class="form-group">
        <label for="content">Content:</label>
        <textarea name="content" id="content"></textarea>
    </div>
    
    <button type="submit">Submit</button>
</form>

@endsection