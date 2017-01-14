<!DOCTYPE HTML>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="x-ua-compatible" content="IE=9">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
    <link href="http://twitter.github.com/bootstrap/assets/js/google-code-prettify/prettify.css" rel="stylesheet" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
    <script type="text/javascript" src="../jquery.touchSwipe.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>

    <title>touchSwipe</title>
</head>
<body>
<a href="https://github.com/mattbryson"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://s3.amazonaws.com/github/ribbons/forkme_right_white_ffffff.png" alt="Fork me on GitHub"></a>
<div class="container">

    <script id='code_1'>
        $(function() {

            //Re set any options with a new options hash
            $("#setMultiple").click(function(){
                $("#test").swipe({threshold:0, fingers:2});

                alert( "Options are now \n"  + JSON.stringify( $("#test").swipe("option") ) );
            });

            //Get the options hash
            $("#getAll").click(function(){
                alert( JSON.stringify( $("#test").swipe("option") ) );
            });

            //Legacy set options with the 'option' method
            $("#setThreshold").change(function(){
                $("#test").swipe("option", "threshold", $(this).val() );
            });

            $("#getThreshold").click(function(){
                alert( $("#test").swipe("option", "threshold") );
            });

            $("#test").swipe( {
                threshold:200,
                swipe:function(event, direction, distance, duration, fingerCount){
                    this.text("You swiped " + distance + "px");
                }
            });
        });
    </script>

    <span class='title'></span>
    <h4>methods: <span class='methods'><code>option</code>, <code>swipe</code></span></h4>
    <p>From 1.6.11 onwards you can simply re call <code>swipe</code> and pass a new options hash to update an existing instance</p>
    <p>You can also use the legacy <code>option</code> method to can change any of the init option properties at run time.</br>

        <b>see the <a href="../docs/%24.fn.swipe.defaults.html"><u>docs</u></a> for more info.

    </p>

    <button class='btn btn-small btn-info example_btn'>Jump to Example</button>
    <pre class="prettyprint lang-js" data-src='code_1'></pre>
    <span class='navigation'></span>

    </br>


    Threshold: <select class='btn' id="setThreshold" style="width:70px;">
        <option>20</option>
        <option>50</option>
        <option>100</option>
        <option>200</option>
        <option>500</option>
        <option>1000</option>
    </select>
    <button class='btn' id="getThreshold">Get Threshold</button>
    <button class='btn' id="getAll">Get All</button>
    <button class='btn' id="setMultiple">Set threshold to 0 and fingers to 3</button>


    <div id="test" class="box">Swipe me</div>

    <br/><br/>

    <span class='navigation'></span>
</div>
</body>
</html>


