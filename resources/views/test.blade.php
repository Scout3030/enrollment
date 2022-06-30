<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('drag-and-drop/demo.css')}}" rel='stylesheet' type='text/css'>
    <link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
    <link href="{{ asset('drag-and-drop/draganddrop.css') }}" rel='stylesheet' type='text/css'>
    <link href="https://bootswatch.com/flatly/bootstrap.min.css" rel="stylesheet" type="text/css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src='{{ asset('drag-and-drop/draganddrop.js') }}' type='text/javascript'></script>
    <style>
        body { background-color:#fafafa;}
        .container { margin:150px auto;}
    </style>
    <script type='text/javascript'>
        $(function() {
            //grouped lists
            $('ul.grouped').sortable({
                group: true
            });

            //normal list
            $('ul.normal').sortable({
                autocreate: true,
                update: function(evt) {
                    console.log(JSON.stringify($(this).sortable('serialize')));
                }
            });

            //remaining lists
            $('ul.float, ul.inline').sortable({
                update: function(evt) {
                    console.log(JSON.stringify($(this).sortable('serialize')));
                }
            });

            //div list
            $('.list.parent').sortable({container: '.list', nodes: ':not(.list)'});

            //draggable
            $('.drag').draggable();
            $('.draggables').draggable({delegate: 'button', placeholder: true});
            $('.draghandle').draggable({handle: '.handle', placeholder: true});
            $('.dragdrop').draggable({
                revert: true,
                placeholder: true,
                droptarget: '.drop',
                drop: function(evt, droptarget) {
                    $(this).appendTo(droptarget).draggable('destroy');
                }
            });

            //off switch
            $('.off').on('click', function() {
                $('.sortable').each(function() { $(this).sortable('destroy'); });
                $('.draggable').each(function() { $(this).draggable('destroy'); });
            });
        });
    </script>
    <title>jQuery draganddrop.js Examples</title>
</head>
<body>
<div id="jquery-script-menu">
    <div class="jquery-script-center">
        <ul>
            <li><a href="http://www.jqueryscript.net/form/Mobile-Drag-Drop-Plugin-jQuery/">Download This Plugin</a></li>
            <li><a href="http://www.jqueryscript.net/">Back To jQueryScript.Net</a></li>
        </ul>
        <div class="jquery-script-ads"><script type="text/javascript"><!--
                google_ad_client = "ca-pub-2783044520727903";
                /* jQuery_demo */
                google_ad_slot = "2780937993";
                google_ad_width = 728;
                google_ad_height = 90;
                //-->
            </script>
            <script type="text/javascript"
                    src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
            </script></div>
        <div class="jquery-script-clear"></div>
    </div>
</div>
<div class="container">
    <h1>jQuery draganddrop.js Examples</h1>

    <h3>Draggables</h3>
    <button class="btn btn-primary drag">Drag me</button>
    <button class="btn btn-primary draghandle">Drag my <strong class="handle">handle</strong></button>
    <button class="btn btn-primary dragdrop">Drag and Drop me</button>
    <span class="draggables">
      <button>1</button>
      <button>2</button>
      <button>3</button>
      <button>4</button>
    </span>

    <div class="drop"><p>Drop here</p></div>

    <h3>Normal List</h3>
    <ul class="normal">
        <li>Item 1</li>
        <li>Item 2
            <ul>
                <li>Item 2.1</li>
                <li>Item 2.2
                    <ul>
                        <li>Item 2.2.1</li>
                    </ul>
                </li>
            </ul>
        </li>
        <li>Item 3
            <ul>
                <li>Item 3.1</li>
            </ul>
        </li>
    </ul>

    <h3>Floating LI elements</h3>
    <ul class="float">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
        <li>
            Item 3
        </li>
        <li>
            Item 4
        </li>
    </ul>

    <h3>Inline-block LI elements</h3>
    <ul class="inline">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
        <li>
            Item 3
        </li>
        <li>
            Item 4
        </li>
    </ul>

    <h3>Grouped Lists</h3>
    <ul class="grouped">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
    </ul>
    <ul class="grouped">
        <li>
            Item 1
        </li>
        <li>
            Item 2
        </li>
    </ul>

    <h3>List of DIVs</h3>
    <div class="list parent">
        <div>Child 1</div>
        <div>Child 2</div>
        <div>
            Child 3
            <div class="list">
                <div>Subchild</div>
            </div>
        </div>
    </div>

    <h3>Off Switch</h3>
    <button class="btn btn-primary off">All off</button>
</div>
<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
</body>
</html>
