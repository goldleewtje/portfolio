<?php
unset($_COOKIE['Winkelmand']);
?>
<html>
    <head>
    </head>
    <body>
        <iframe id="my_iframe" style="display:none;"></iframe>
    </body>
    <script>
        function delete_cookie( name ) {
            document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
        }
        function $_GET(param) {
            var vars = {};
            window.location.href.replace( location.hash, '' ).replace( 
                /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
                function( m, key, value ) { // callback
                    vars[key] = value !== undefined ? value : '';
                }
            );

            if ( param ) {
                return vars[param] ? vars[param] : null;	
            }
            return vars;
        }
        function download(filename, text) {
            var element = document.createElement('a');
            element.setAttribute('href', 'data:text/plain;charset=utf-8,' + encodeURIComponent(text));
            element.setAttribute('download', filename);

            element.style.display = 'none';
            document.body.appendChild(element);
            element.click();

            document.body.removeChild(element);

        }

        var file = "Bevestiging " + $_GET('dl') + ".PDF";
        download(file,"This is the content of my file :)");
        setTimeout( () => {
            window.location.href = "HomePage.php";
        }, 500);

    </script>

</html>