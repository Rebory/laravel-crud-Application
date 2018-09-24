<!DOCTYPE html>
<html>
<head>
	<title>Laravel 5.6 CRUD Application</title>
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
 
<!-- include summernote css/js-->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    

    <script type="text/javascript">
$(document).ready(function() {
    $('.summernote').summernote({
        height: "250px"
    });
});

</script>
</head>
<body>


<div class="container">
    @yield('content')
</div>


</body>
</html>