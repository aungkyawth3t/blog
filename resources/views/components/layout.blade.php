<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Creative Coder Blog</title>
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
        crossorigin="anonymous"
        />
    </head>
    <body id="home">
        <x-navbar/>
        {{ $slot }}
        <x-footer/>
        <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"
        ></script>
    </body>
    <script type="importmap">
		{
			"imports": {
				"ckeditor5": "./ckeditor5/ckeditor5.js",
				"ckeditor5/": "./ckeditor5/"
			}
		}
		</script>
	<script src="https://cdn.ckbox.io/ckbox/2.6.1/ckbox.js" crossorigin></script>
	<script type="module" src="/ckeditor/main.js"></script>
	<!-- A friendly reminder to run on a server, remove this during the integration. -->
	<script>
		window.onload = function () {
			if (window.location.protocol === "file:") {
				alert("This sample requires an HTTP server. Please serve this file with a web server.");
			}
		};
	</script>
</html>