<?php
session_start();

if(isset($_SESSION['prenom']))
{
    $prenom = $_SESSION['prenom'];
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Résultat wikipédia</title>
        <link href="wikipedia/main.css" rel="stylesheet">
        <script src="wikipedia/wikipedia.js"></script>
        <script src="wikipedia/jquery.js"></script>
    </head>
    <body>
        <form action="#" method="get" onsubmit="return false">
            <p>Faites une recherche sur wikipedia :</p>
            <input id="spellcheckinput" onkeyup="getjs(this.value);" type="text" placeholder="Tapez votre recherche ici" name="seach-wiki">
            <span id="spellcheckresult"></span>
            <?php if(isset($prenom)){?>
                <script>
                    $(function(){
                        $('#spellcheckinput').val('<?php echo $prenom; ?>');
                        getjs($('#spellcheckinput').val());
                    });
                </script>
            <?php }?>
        </form>
        <div id="result"></div>
        <h2 style="text-align: center;">Voici vos images sur google image</h2>
        <iframe src="search.php" style="height: 400px; width: 80%; margin: auto;display: block;" name="myFrame">
    </body>
</html>