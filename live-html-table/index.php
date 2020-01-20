<!doctype html>
<html>
<head>

    <title>
        The array viewer
    </title>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">
<style>
    body {

        font-family: Helvetica, Verdana, sans-serif;
        padding:0;
        margin:0;
        background-color:#334
    }

    table {
        border-collapse: collapse;
        margin:0;
        border: none;
        border-spacing: 0;
    }

    td, th {
        border: solid 1px #AAA;

   }
    td {
        min-width: 50px;
        vertical-align: top;
        background-color:rgba(230, 230, 230, 0.5);
    }

    th {
        color:#EEE;
        min-width: 20px;
        padding: 2px 4px;
    }

    th.type {
        font-size: 10px;
    }

    table.horizontal > tbody > tr > th {
        background-color:#555;
    }

    table.vertical > tbody > tr > th {
        background-color:#55D;
    }


    #container {
        position: relative;
        left:0;
        top:0;
    }

    span.value {
        display: block;
        padding:4px 8px;
        background-color:#FFF;
    }

    .selected {
        background-color: #AFF;
        animation: blink 1s;
        animation-iteration-count: infinite;
    }

    @keyframes blink {
        0% {background-color: #0FF;}
        50% {background-color: #F0F;}
        100% {background-color: #0FF;}
    }
    .selected span.value {
        background-color: transparent;
    }



    main {
        margin: 20px;
    }


    #selector {
        padding-bottom: 8px;
        margin-bottom: 8px;
        border-bottom: solid 1px #AAA;
    }

    #selector input, #selector button {
        font-size: 2rem;
        padding: 4px 8px;
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

<main>
    <form id="selector">

        <input id="query" placeholder="Exemple $array[5][3][2]" value="$array[5]['date']['day']"/><button>ok</button>
    </form>

    <div id="container"></div>
</main>





<script>

    function refresh() {
        $.ajax({
            url: 'render.php?' + (new Date()).getTime(),
            success: function(response) {
                document.getElementById('container').innerHTML = response;
                setTimeout(function() {
                    //refresh();
                }, 500);
            }
        })
    }
   refresh();

    document.getElementById('selector').addEventListener('submit', (event) => {
        event.preventDefault();
        let query = document.getElementById('query').value;

        let matches = query.match(/\[(.*?)\]/gi);
        let indexes = [];
        for(let value of matches) {
            value = value.replace('[', '');
            value = value.replace(']', '');
            value = value.replace("'", '');
            value = value.replace("'", '');
            value = value.replace('"', '');
            value = value.replace('"', '');
            console.log(value);
            indexes.push(value);
        }



        let selector = '#container > ';
        for(let value of indexes) {
            selector += ' table > tbody > tr > td.index-'+value;
        }

        console.log(selector);


        document.querySelectorAll('.selected').forEach((element) => {
            element.classList.remove('selected');
        });

        let node = document.querySelector(selector);
        if(node) {
            node.classList.add('selected');
        }
        else {
            alert('index inexistant')
        }

    });

</script>


</body>
</html>