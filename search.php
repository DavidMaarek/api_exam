<?php
session_start();

if(isset($_SESSION['nomcomplet']))
{
    $prenom = $_SESSION['nomcomplet'];
}

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <!--Import Google Icon Font-->
        <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.css"  media="screen,projection"/>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <script src="wikipedia/jquery.js"></script>
    </head>
    <body>
      <div class="container">
          <div id="search">
              <form id="search_form">
                <div class="row">
                  <div class="col l4 m6 s12 offset-l4 offset-m3">
                    <div class="div card-panel">
                      <h5 class="center-align">Rechercher Google Image</h5>
                      <div class="input-field col s12 s12">
                        <input type="text" id="search_txt" placeholder="Keyword" />
                      </div>
                        <center><button type="submit" value="Search" name="submit" class="waves-effect waves-light btn light-blue" id="send-search">
                            <i class="material-icons left">language</i>
                            Rechercher
                        </button>

                        </center>
                     </div>
                  </div>
                </div>
              </form>
          </div>
      </div>
        <div class="col l4 m6 div card-panel">
          <div id="result" style="display: flex;"></div>
        </div>
    <?php if(isset($prenom)){?>
        <script>
            $(function(){
                $('#search_txt').val('<?php echo $prenom; ?>');
                $('#send-search').click();
            })
        </script>
    <?php } ?>
</body>
    <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/materialize.js"></script>
    <script src="js/search.js"></script>
</html>