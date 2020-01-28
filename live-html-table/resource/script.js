
function slugify(string) {
    let slug = string;
    slug = slug.replace(/[^a-zA-Z0-9]/g, '-');

    return slug;
}

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

        indexes.push(value);
    }

    let selector = '#container > ';
    for(let value of indexes) {
        value = slugify(value);
        selector += ' table > tbody > tr > td.index-'+value;
    }

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

let application = new Application('editor');
application.loadExemple('week');