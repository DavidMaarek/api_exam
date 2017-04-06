var spellcheck = function (data) {
    var found = false;
    var url='';
    var text = data [0];

    if (text != document.getElementById('spellcheckinput').value)
        return;

    for (i=0; i<data [1].length; i++) {
        if (text.toLowerCase () == data [1] [i].toLowerCase ()) {
            found = true;
            url ='http://fr.wikipedia.org/wiki/' + text;
            document.getElementById('spellcheckresult').innerHTML = '<div style="color:green">Résultat trouvé !</div><a target="_top" href="' + url + '">Lien vers la page</a> (ou vu direct en dessous). Vous pouvez changez la valeur si vous le souhaitez';
            $('#result').empty();
            $('#result').append('<iframe src="'+url+'" style="height: 400px; width: 80%; margin: auto;display: block;" name="myFrame">');
        }
    }

    if (! found)
        document.getElementById('spellcheckresult').innerHTML = '<div style="color:red">Incorrect</div>';
};

var getjs = function (value) {
    if (! value)
        return;

    url = 'http://en.wikipedia.org/w/api.php?action=opensearch&search='+value+'&format=json&callback=spellcheck';

    document.getElementById ('spellcheckresult').innerHTML = 'Recherche ...';
    var elem = document.createElement ('script');
    elem.setAttribute ('src', url);
    elem.setAttribute ('type','text/javascript');
    document.getElementsByTagName ('head') [0].appendChild (elem);
};