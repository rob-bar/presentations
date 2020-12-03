<!doctype html>
<html lang="nl">
  <head>
    <meta charset="utf-8">

    <title>Javascript</title>
    <meta name="description" content="
      JavaScript (JS) is a dynamic computer programming language.[5] It is most commonly used as part of web browsers, whose implementations allow client-side scripts to interact with the user, control the browser, communicate asynchronously, and alter the document content that is displayed.[5] It is also being used in server-side network programming (with Node.js), game development and the creation of desktop and mobile applications.
    ">
    <meta name="author" content="Robbie Bardijn">
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="css/reveal.css">
    <link rel="stylesheet" href="css/theme/night.css" id="theme">
    <link rel="stylesheet" href="lib/css/zenburn.css">

    <!-- If the query includes 'print-pdf', include the PDF print sheet -->
    <script>
      if( window.location.search.match( /print-pdf/gi ) ) {
        var link = document.createElement( 'link' );
        link.rel = 'stylesheet';
        link.type = 'text/css';
        link.href = 'css/print/pdf.css';
        document.getElementsByTagName( 'head' )[0].appendChild( link );
      }
    </script>

    <!--[if lt IE 9]>
      <script src="lib/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>
    <div class="reveal">
      <div class="slides">
        <?php foreach (glob("slides/*.php") as $filename): ?>
          <?php include $filename; ?>
        <?php endforeach ?>
      </div>
    </div>

    <script src="lib/js/head.min.js"></script>
    <script src="js/reveal.min.js"></script>
    <script src="js/jquery.min.js"></script>

    <script>
      Reveal.initialize({
        controls: true,
        progress: true,
        history: true,
        center: true,

        theme: "night", // available themes are in /css/theme
        transition: 'default', // default/cube/page/concave/zoom/linear/fade/none

        // Parallax scrolling
        // parallaxBackgroundImage: 'https://s3.amazonaws.com/hakim-static/reveal-js/reveal-parallax-1.jpg',
        // parallaxBackgroundSize: '2100px 900px',

        // Optional libraries used to extend on reveal.js
        dependencies: [
          { src: 'lib/js/classList.js', condition: function() { return !document.body.classList; } },
          { src: 'plugin/markdown/marked.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
          { src: 'plugin/markdown/markdown.js', condition: function() { return !!document.querySelector( '[data-markdown]' ); } },
          { src: 'plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } },
          { src: 'plugin/zoom-js/zoom.js', async: true, condition: function() { return !!document.body.classList; } },
          { src: 'plugin/notes/notes.js', async: true, condition: function() { return !!document.body.classList; } }
        ]
      });
    </script>

    <script>
      $('script[type="data/example"]').each(function() {
        var script = $(this);
        var src = script.attr('src');
        var div = script.parent();

        var dest = $('<pre class="language-javascript">');
        var code = $('<code contenteditable="true">').appendTo(dest);

        $.ajax(src, { dataType : 'text'}).done(function(content) {
          code.text(content);
          setTimeout(function(){window.hljs.highlightBlock( dest.appendTo(div)[0] )},1000);
        });

      });
    </script>
  </body>
</html>
