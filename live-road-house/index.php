<!doctype html>
<html>
<head>
<style>
    body {
        background-image: url(background.png);
        font-family: Helvetica, Verdana, sans-serif;
        padding:0;
        margin:0;
    }

    #container {
        position: relative;
        left:0;
        top:0;
    }

    .items {
        display:flex;
        position: absolute;
        top:0px;
    }

    .road {
        position: absolute;
        left:0;
        width: 100%;
        height:46px;
        background-image: url(road.png);
        top: 75px;
    }

    .element {
        position: relative;
        width:90px;
    }

    .index {
        background-image: url("panneau.png");
        width: 30px;
        height: 23px;
        position: absolute;
        top:70px;
        left: 50px;
        text-align: center;
        font-size:10px;
        padding-top: 5px;
        background-repeat: no-repeat;

    }

    #array-caption {
        position: absolute;
        right:8px;
        background-color: #FFF;
        border: solid 1px #555;
        padding:4px 8px;
        border-radius: 4px;
        top:50px;
    }

</style>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/black-tie/jquery-ui.css"/>

    <script
            src="https://code.jquery.com/jquery-3.4.1.js"
            integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</head>
<body>
<script>

    function refresh() {
        $.ajax({
            url: 'render.php?' + (new Date()).getTime(),
            success: function(response) {
                document.getElementById('container').innerHTML = response;

                //$('.ui-dialog').remove();


                $('.element').click(function() {
                    displayInfo(this);
                });

                $('.element.selected').click();


                setTimeout(function() {
                    refresh();
                }, 500);
            }
        })
    }

    function displayInfo(item) {
        let content = 'Au numero '+item.dataset.index+' : '+item.dataset.value;
        $('<div>'+content+'</div>').dialog();
        console.log(item)
    }


    refresh();

</script>

<div id="container"></div>

</body>
</html>