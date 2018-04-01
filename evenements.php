<!DOCTYPE html>
<html style="" lang="fr">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="icon" href="logo.ico">
        <title>Lykion ton Ellinidon de Paris - Evénement</title>
        <meta name="viewport" content="width=Manifestations-width, initial-scale=1, maximum-scale=1">
        <meta property="og:title" content="Manifestations - Lykion ton Ellinidon de Paris">
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
            <h1 class="hidden noDisplay">Manifestations</h1>
            <img src="img/global/emotionheader.jpg" />
        </header>
        <nav>
            <a class="mobile-nav" title="Ouvrir/fermer la navigation">Ouvrir/fermer la navigation</a>
            <ul class="nav nav--fit nav--block greybox">
                <li><a href="index.php">Accueil</a></li>
                <li><a href="presentation.html">Présentation</a></li>
                <li><a href="historique.html">Historique</a></li>
                <li><a href="cours.html">Cours de danse</a></li>
                <li class="current"><a href="evenements.php">Manifestations</a></li>
                <li><a href="costumes.php">Nos costumes</a></li>
                <li><a href="contact.html">Contact</a></li>
                <li><a href="liens.html">Liens</a></li>
            </ul>
        </nav>
        <section class="content">
            <div class="flexbox">
                <div class="flexbox__item  one-fifth greybox ">
                    <p><a id="ong_nos_spectacles" class="current" href="#nos_spectacles" onclick="javascript:displayManif('nos_spectacles');">Nos spectacles</a></p>
                </div>
                <div class="flexbox__item  one-fifth greybox ">
                    <p><a id="ong_manifs_culturelles" href="#manifs_culturelles" onclick="javascript:displayManif('manifs_culturelles');">Manifestations culturelles</a></p>
                </div>
                <div class="flexbox__item  one-fifth greybox ">
                    <p><a id="ong_medias" href="#medias" onclick="javascript:displayManif('medias');">Médias</a></p>
                </div>
                <div class="flexbox__item  one-fifth greybox ">
                    <p><a id="ong_presta_privees" href="#presta_privees" onclick="javascript:displayManif('presta_privees');">Prestations privées</a></p>
                </div>
                <div class="flexbox__item  one-fifth greybox ">
                    <p><a id="ong_grands_rdv" href="#grands_rdv" onclick="javascript:displayManif('grands_rdv');">Les grands rendez-vous</a></p>
                </div>
            </div>
            <select id="event_type" onchange="displayManif(this.value);">
               <option value="nos_spectacles">Nos spectacles</option>
               <option value="manifs_culturelles">Manifestations culturelles</option>
               <option value="medias">Médias</option>
               <option value="presta_privees">Prestations privées</option>
               <option value="grands_rdv">Les grands rendez-vous</option>
            </select>
            <div id="nos_spectacles">
                <h2>Nos Spectacles</h2>
                <?php
                    $json_source = file_get_contents('nos_spectacles.json');

                    $json_data = json_decode($json_source);
                    if ($json_data) {
                        foreach($json_data as $v){
                            if ($v->event_type == "article") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <img class="home_mea_img" src="img/evenements/'.$v->event_img.'" title="'.$v->event_img_title.'" alt="'.$v->event_img_title.'" />
                                        '.$v->event_text.'
                                    </div>
                                </article>';
                            } elseif ($v->event_type == "youtube") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <object type="text/html" data="'.$v->event_video_url.'" style="width:100%;height:500px;"></object>
                                    </div>
                                </article>';
                            } elseif ($v->event_type == "video") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <video controls src="videos/'.$v->event_video_url.'" width="100%" height="100%" poster="img/evenements/'.$v->event_img.'">'.$v->event_title.'</video>
                                    </div>
                                </article>';
                            }
                           
                        }
                    }
                ?>
            </div>
            <div id="manifs_culturelles">
                <h2>Manifestations culturelles</h2>
                <?php
                    $json_source = file_get_contents('http://refonte.lykion-ton-ellinidon-paris.dev/manifestations_culturelles.json');

                    $json_data = json_decode($json_source);
                    if ($json_data) {
                        foreach($json_data as $v){
                            if ($v->event_type == "article") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <img class="home_mea_img" src="img/evenements/'.$v->event_img.'" title="'.$v->event_img_title.'" alt="'.$v->event_img_title.'" />
                                        '.$v->event_text.'
                                    </div>
                                </article>';
                            } elseif ($v->event_type == "youtube") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <object type="text/html" data="'.$v->event_video_url.'" style="width:100%;height:500px;"></object>
                                    </div>
                                </article>';
                            } elseif ($v->event_type == "video") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <video controls src="videos/'.$v->event_video_url.'" width="100%" height="100%" poster="img/evenements/'.$v->event_img.'">'.$v->event_title.'</video>
                                    </div>
                                </article>';
                            }
                           
                        }
                    }
                ?>
            </div>
            <div id="medias">
                <h2>Médias</h2>
                <?php
                    $json_source = file_get_contents('http://refonte.lykion-ton-ellinidon-paris.dev/medias.json');

                    $json_data = json_decode($json_source);
                    if ($json_data) {
                        foreach($json_data as $v){
                            if ($v->event_type == "article") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <img class="home_mea_img" src="img/evenements/'.$v->event_img.'" title="'.$v->event_img_title.'" alt="'.$v->event_img_title.'" />
                                        '.$v->event_text.'
                                    </div>
                                </article>';
                            } elseif ($v->event_type == "youtube") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <object type="text/html" data="'.$v->event_video_url.'" style="width:100%;height:500px;"></object>
                                    </div>
                                </article>';
                            } elseif ($v->event_type == "video") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <video controls src="videos/'.$v->event_video_url.'" width="100%" height="100%" poster="img/evenements/'.$v->event_img.'">'.$v->event_title.'</video>
                                    </div>
                                </article>';
                            }
                           
                        }
                    }
                ?>
            </div>
            <div id="presta_privees">
                <h2>Prestations privées</h2>
                <?php
                    $json_source = file_get_contents('http://refonte.lykion-ton-ellinidon-paris.dev/presta_privees.json');

                    $json_data = json_decode($json_source);
                    if ($json_data) {
                        foreach($json_data as $v){
                            if ($v->event_type == "article") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <img class="home_mea_img" src="img/evenements/'.$v->event_img.'" title="'.$v->event_img_title.'" alt="'.$v->event_img_title.'" />
                                        '.$v->event_text.'
                                    </div>
                                </article>';
                            } elseif ($v->event_type == "youtube") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <object type="text/html" data="'.$v->event_video_url.'" style="width:100%;height:500px;"></object>
                                    </div>
                                </article>';
                            } elseif ($v->event_type == "video") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <video controls src="videos/'.$v->event_video_url.'" width="100%" height="100%" poster="img/evenements/'.$v->event_img.'">'.$v->event_title.'</video>
                                    </div>
                                </article>';
                            }
                           
                        }
                    }
                ?>
            </div><div id="grands_rdv">
                <h2>Les grands rendez-vous</h2>
                <?php
                    $json_source = file_get_contents('http://refonte.lykion-ton-ellinidon-paris.dev/grands_rdv.json');

                    $json_data = json_decode($json_source);
                    if ($json_data) {
                        foreach($json_data as $v){
                            if ($v->event_type == "article") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <img class="home_mea_img" src="img/evenements/'.$v->event_img.'" title="'.$v->event_img_title.'" alt="'.$v->event_img_title.'" />
                                        '.$v->event_text.'
                                    </div>
                                </article>';
                            } elseif ($v->event_type == "youtube") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <object type="text/html" data="'.$v->event_video_url.'" style="width:100%;height:500px;"></object>
                                    </div>
                                </article>';
                            } elseif ($v->event_type == "video") {
                                echo '<article>
                                    <h3>'.$v->event_title.'</h3>
                                    <div class="home_mea">
                                        <video controls src="videos/'.$v->event_video_url.'" width="100%" height="100%" poster="img/evenements/'.$v->event_img.'">'.$v->event_title.'</video>
                                    </div>
                                </article>';
                            }
                           
                        }
                    }
                ?>
            </div>
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