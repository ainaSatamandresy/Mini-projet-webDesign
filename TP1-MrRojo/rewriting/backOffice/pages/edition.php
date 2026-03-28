<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Back-Office</title>
</head>
<body>

<form method="post" action="enregistrer.php" enctype="multipart/form-data">

    <label>Titre</label>
    <input type="text" name="titre"><br><br>

    <label>Image</label>
    <input type="file" name="image"><br><br>

    <label>Contenu</label>
    <textarea id="monEditeur" name="contenu"></textarea>


    <label>source</label>
    <input type="text" name="source"><br><br>



    <button type="submit">Enregistrer</button>

</form>

<script src="https://cdn.tiny.cloud/1/76asbq6w8fd2frlh4vh05ptfhzkivrq7cd07sd96fcqndxg8/tinymce/8/tinymce.min.js" referrerpolicy="origin" crossorigin="anonymous"></script>
<!-- <script>
  tinymce.init({
    selector: '#monEditeur'
  });
</script> -->


<script>
tinymce.init({
  selector: '#monEditeur',
  menubar: false,
  plugins: 'lists link image',
  toolbar: 'undo redo | bold italic | h2 h3 | bullist numlist | link image',
  setup: function (editor) {
    editor.ui.registry.addButton('h2', {
      text: 'H2',
      onAction: function () {
        editor.execCommand('FormatBlock', false, 'h2');
      }
    });
    editor.ui.registry.addButton('h3', {
      text: 'H3',
      onAction: function () {
        editor.execCommand('FormatBlock', false, 'h3');
      }
    });
  }
});
</script>

</body>
</html>

