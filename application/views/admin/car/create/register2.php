<!DOCTYPE html>
<!-- release v4.4.9, copyright 2014 - 2018 Kartik Visweswaran -->
<!--suppress JSUnresolvedLibraryURL -->
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Krajee JQuery Plugins - &copy; Kartik</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" media="all" rel="stylesheet" type="text/css"/>
    <link href="../themes/explorer-fa/theme.css" media="all" rel="stylesheet" type="text/css"/>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../js/plugins/sortable.js" type="text/javascript"></script>
    <script src="../js/fileinput.js" type="text/javascript"></script>
    <script src="../js/locales/fr.js" type="text/javascript"></script>
    <script src="../js/locales/es.js" type="text/javascript"></script>
    <script src="../themes/explorer-fa/theme.js" type="text/javascript"></script>
    <script src="../themes/fa/theme.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>
<div class="container kv-main">

        <form enctype="multipart/form-data">
            <input id="input-b3" name="input-b3[]" type="file" class="file" multiple 
    data-show-upload="false" data-show-caption="true" data-msg-placeholder="Select {files} for upload...">
    
            <br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</div>
    
</body>
<script>
  $("#input-b3").fileinput({
    theme: 'fa',
    allowedFileExtensions: ['jpg'],
        overwriteInitial: false,
        maxFileSize: 300,
        
        
});
</script>
</html>