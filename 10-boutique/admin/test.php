<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
</head>
<body>
    <h1>Classic editor</h1>
   <form>
        <textarea id="editor">
            <p>This is some sample content.</p>
        </textarea>
   </form>
   <p><strong>E.xemple de description et l&agrave; en </strong><em>ital</em></p><ol><li><em>test</em></li><li><em>test</em></li></ol>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
</body>
</html>
