@extends('layouts.sidenav')
@section('title', 'Update Story')

@section('header')
<link rel="stylesheet" href="{{ asset('assets/richtexteditor/rte_theme_default.css') }}" />
<script type="text/javascript" src="{{ asset('assets/richtexteditor/rte.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/richtexteditor/plugins/all_plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/rte-upload.js') }}"></script>
@endsection

@section('content')

<h1>Story</h1>
<form method="post" action="/admin/story">
    @csrf
    <div class="form-group">
        <input name="story" id="inp_story" type="hidden" />
        <div id="story_editor" class="richtexteditor" style="width: 100%; margin:0 auto;">
        <?php echo $story; ?>
        </div>
    </div>

    <input type="hidden" name="action" value="story" />
    <button type="submit">Submit</button>
</form>

<script>
    var editor1 = new RichTextEditor(document.getElementById("story_editor"));
    
    editor1.attachEvent("change", function() {
        document.getElementById("inp_story").value = editor1.getHTMLCode();
    });
</script>

@endsection