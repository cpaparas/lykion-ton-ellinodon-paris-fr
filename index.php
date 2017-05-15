<!DOCTYPE html>
<html style="" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="icon" href="logo.ico">
        <title>Lykion ton Ellinidon de Paris - Accueil</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta property="og:title" content="Accueil - Lykion ton Ellinidon de Paris">
        <meta property="og:site_name" content="Lykion ton Ellinidon de Paris">
        <meta property="og:description" content="Lykion ton Ellinidon de Paris">
        <meta property="og:image" content="http://www.lykion-ton-ellinidon-paris.fr/logo36x36.png">
        <meta name="format-detection" content="telephone=no">
        <meta name="description" content="Lykion ton Ellinidon de Paris.">
        <meta name="keywords" content="Lykion, ton, Ellinidon, de, Paris, Grèce,Hellas,Danse grecque,Danse,Danses grecques,Patrimoine culturel hellénique,Patrimoine immatériel,Hellénisme,Philhellénisme,Philhellènes,Association,Association loi 1901 ,Greek dances,Costumes grecs,Danse traditionnelle,Danse folklorique,Danse traditionnelle grecque,Danse folklorique grecque,Lykion,Lykeio ton Hellinidon,Lykeio,Culture,Macédoine,Thrace,Crète,Îles grecques,Dodécanèse,Épire,Cyclades">
        <meta name="robots" content="index,follow">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/mobile.css" rel="stylesheet">
        <script src="js/jquery-3.1.1.min.js" type="text/javascript"></script>
        <script src="js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.7&appId=215408588573769";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <header>
            <h1 class="hidden noDisplay">Accueil</h1>
            <img src="img/global/emotionheader.jpg" />
        </header>
        <nav>
            <a class="mobile-nav" title="Ouvrir/fermer la navigation">Ouvrir/fermer la navigation</a>
            <ul class="nav nav--fit nav--block greybox">
                <li class="current"><a href="/">Accueil</a></li>
                <li><a href="presentation.html">Présentation</a></li>
                <li><a href="historique.html">Historique</a></li>
                <li><a href="cours.html">Cours de danse</a></li>
                <li><a href="evenements.html">Manifestations</a></li>
                <li><a href="costumes.html">Nos costumes</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="liens.html">Liens</a></li>
            </ul>
        </nav>
        <section class="content">
        <?php
            $json_source = file_get_contents("http://".$_SERVER["HTTP_HOST"].'/accueil.json');

            $json_data = json_decode($json_source);

            if ($json_data) {
                foreach($json_data as $v){
                    if ($v->event_type == "article") {
                        echo '<article>
                            <h2>'.$v->event_title.'</h2>
                            <div class="home_mea">
                                <img class="home_mea_img" src="img/accueil/'.$v->event_img.'" title="'.$v->event_img_title.'" alt="'.$v->event_img_title.'" />
                                '.$v->event_text.'
                            </div>
                        </article>';
                    } elseif ($v->event_type == "youtube") {
                        echo '<article>
                            <h2>'.$v->event_title.'</h2>
                            <div class="home_mea">
                                <object type="text/html" data="'.$v->event_video_url.'" style="width:100%;height:500px;"></object>
                            </div>
                        </article>';
                    } elseif ($v->event_type == "video") {
                        echo '<article>
                            <h2>'.$v->event_title.'</h2>
                            <div class="home_mea">
                                <video controls src="videos/'.$v->event_video_url.'" width="100%" height="100%" poster="img/evenements/'.$v->event_img.'">'.$v->event_title.'</video>
                            </div>
                        </article>';
                    }
                   
                }
            }
        ?>
        </section>
        <section class="leftside">
            <article>
                <div class="fb-page" data-href="https://www.facebook.com/Lykion-Ton-Ellinidon-Paris-1461200997535180" data-tabs="journal" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Lykion-Ton-Ellinidon-Paris-1461200997535180" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/Lykion-Ton-Ellinidon-Paris-1461200997535180">Lykion Ton Ellinidon Paris</a></blockquote></div>
            </article>
        </section>
        <footer>
            <ul class="nav nav--fit nav--block greybox">
                <li>
                    <a title="© Λύκειο των Ελληνίδων ΠΑΡΙΣΙ" href="http://www.lykion-ton-ellinidon-paris.fr/">© Lykion ton Ellinidon de Paris <span id="year"></span></a>
                </li>
            </ul>
        </footer>
    </body>
</html>