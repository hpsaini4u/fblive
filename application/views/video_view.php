<html>
<body>
<head>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
</head>
<script>
 function init() {
     	FB.api('/115849155760622', function(response) {
  console.log(response);
});
    }

    window.fbAsyncInit = function() {
      FB.init({
        appId      : '115849155760622',
        xfbml      : true,
        version    : 'v2.11'
      });

      init();
    };

    (function(d, s, id){
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) {return;}
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

</script>
</body>
</html>