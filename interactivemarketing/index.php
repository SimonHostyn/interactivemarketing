<?php

    if(!empty($_POST['voornaam']) && !empty($_POST['naam']) && !empty($_POST['email'])){

        $voornaam = $_POST['voornaam'];
        $naam = $_POST['naam'];
        $email =$_POST['email'];

        if(strpos($email,'@') == false){
            echo 'ah shit, ge vergat een @ in de mail';
        }


        $conn = new PDO("mysql:host=localhost; dbname=interactive;","root","");
        $statement = $conn->prepare("INSERT into userData (email,naam,voornaam) VALUES(:email, :naam, :voornaam)");
        $statement->bindParam(":email",$email);
        $statement->bindParam(":naam",$naam);
        $statement->bindParam(":voornaam",$voornaam);
        $result = $statement->execute();

        if($result == true){
            echo 'signup gelukt';
        }
        else{
            echo 'yikes';
        }
    }

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/screen.css">
    <title>IMD voor vrouwen | Kom het hier te weten!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <link href="https://fonts.googleapis.com/css?family=Merriweather&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Overpass&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato|Overpass&display=swap" rel="stylesheet">


    <meta name="theme-color" content="#272727">
    <link rel=”canonical” href= "">
    <link rel="shortcut icon" href="">
    <!--Social Media posting-->

    <!-- Place this data between the <head> tags of your website -->
    <meta name="description" content="Ben jij creatief en goed met je computer zoals een webdesigner? TEST HET HIER!" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="Ben jij een webdesigner?">
    <meta name="twitter:description" content="Ben jij creatief en goed met je computer zoals een webdesigner? TEST HET HIER!">
    <meta name="twitter:creator" content="@author_handle">
    <!-- Twitter Summary card images must be at least 120x120px -->
    <meta name="twitter:image" content="">

    <!-- Open Graph data -->
    <meta property="og:title" content="Ben jij een webdesigner" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="Ben jij creatief en goed met je computer zoals een webdesigner? TEST HET HIER!" />
    <meta property="og:site_name" content="IMD tester" />
    <meta property="fb:admins" content="Facebook numeric ID" />

    </head>

    <body>
        <section class="text-section text-section1">
        <div class="sect1">    
            <h1>WE NEED YOU!</h1>
            <p id="subtitle">IMD is elk jaar opnieuw opzoek naar nieuwe studenten die een carrière willen beginnen in webdesign of webdevelopment. </br>
            Met deze test kan je te weten komen of jij de capaciteiten hebt om IMD'er te worden!</p>
        </div>
        </section>
        
        <section class="text-section text-section2">
        <div class="sect2">
            <h2>Doe de test</h2>
            <p>Vul de volgende test in en kom zo te weten of je een echte IMD'er bent.</p>
        </div>
            
            <div id="center">
                <h1 id="titel"></h1>
                <p id="vraag"></p>
                <div class="btn">
                    <button class="buttons" onclick="ja()" id="ja">ja</button>
                    <button class="buttons" onclick="nee()" id="nee">nee</button>
                </div>
                <button onclick="start()" id="startknop">Start de test!</button>
                <p id="score"></p>
                <br>
                <p id="nummer"></p>
            </div>
        </section>
        
        
    
        <section class="containerform">
            <div class="sect3">
            <h2>Over IMD</h2>
            <p>Wil je alvast nu al meer weten over Interactive Multimedia Design? Bekijk dan hier de programmagids van de opleiding! Je ontdekt er meteen wat IMD jou kan bieden, welke vakken je kan volgen en de beroepsmogelijkheden nadat je afstudeert.</p>
            <a id="programma" href="https://www.thomasmore.be/opleidingen/professionele-bachelor/informatiemanagement-en-multimedia/interactive-multimedia-design" >Programmagids</a>
            </div>
            <div class="form">
                <h2>Schrijf je in</h2>
                <form action="" method="POST">
                    <input type="text" name="naam" id="naam" placeholder="Naam">
                    <br>
                    <input type="text" name="voornaam" id="voornaam" placeholder="Voornaam">
                    <br>
                    <input type="text" name="email" id="email" placeholder="Email">
                    <br>
                    <input type="submit" value="inzenden">
                </form>
            </div>
        </section>

        <!-- <section class="about">
            <p>IMD staat voor Interactive Multimedia & Design en wij specialiseren ons in websites.</p>
        </section> -->

        <script>
            var score = 0;
            var vraagnummer = 1;
    
            function ja() {
                score++;
                vraagnummer++;
            }
    
            function nee() {
                vraagnummer++;
            }
    
            function start() {
    
                document.getElementById("startknop").innerHTML = "volgende vraag";
    
                if (vraagnummer == 1) {
                    document.getElementById("titel").innerHTML = "Vraag 1";
                    document.getElementById("vraag").innerHTML = "Kan je goed met computers werken?";
                } else if (vraagnummer == 2) {
    
                    document.getElementById("titel").innerHTML = "Vraag 2";
                    document.getElementById("vraag").innerHTML = "Is code schrijven een interesse?";
                } else if (vraagnummer == 3) {
    
                    document.getElementById("titel").innerHTML = "Vraag 3";
                    document.getElementById("vraag").innerHTML = "Kan je met stress omgaan?";
                } else if (vraagnummer == 4) {
    
                    document.getElementById("titel").innerHTML = "Vraag 4";
                    document.getElementById("vraag").innerHTML = "Is creativiteit een deel van jou?";
                } else if (vraagnummer == 5) {
    
                    document.getElementById("titel").innerHTML = "Vraag 5";
                    document.getElementById("vraag").innerHTML = "testvraag?";
                }
    
                if (vraagnummer == 6) {
    
                    if (score >= 0 && score <= 2) {
                        document.getElementById("titel").innerHTML = "Geen zorgen!";
                        document.getElementById("vraag").innerHTML = "Bij IMD leer je de fundamentele bouwstenen.";
                    } else if (score => 3 && score <= 4) {
                        document.getElementById("titel").innerHTML = "Je hebt talent!";
                        document.getElementById("vraag").innerHTML = "Je hebt de talenten om bij IMD te komen.";
                    } else if (score >= 5) {
                        document.getElementById("titel").innerHTML = "UITSTEKEND!";
                        document.getElementById("vraag").innerHTML = "Jij bent de toekomstige IMD student!";
                    }
    
                    document.getElementById("ja").style.display = "none";
                    document.getElementById("nee").style.display = "none";
                    document.getElementById("startknop").style.display = "none";
                }
            }
        </script>
</body>
</html>