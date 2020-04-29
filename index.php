<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>localisation</title>
</head>
<body>
    
<h1>Exercice Météo</h1>
<h2>Lien pour pour récuperer les données météo d'une position via les coordonnées GPS (Longitude et Latitude)</h2>
<h2><a href="https://www.prevision-meteo.ch/services/json/lat=XXXIng=YYY">https://www.prevision-meteo.ch/services/json/lat=XXXIng=YYY</a></h2>
<p>Remplacer XXX par la longitude et YYY par la latitude</p>
<h2>PDF explicatif de l'API:</p>

    
    <p><a href="https://www.prevision-meteo.ch/uploads/pdf/recuperation-donnees-meteo.pdf"></a></p>

<button>Voir la météo sur ma position</button>
    
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script>
    
        // Si le bouton est cliqué
        $('button').click(function(){
            
            // Options de la geolocalisation
            let options = {
                enableHighAccuracy: true,       // Activation de la haute précision
                timeout: 5000,                  // Temps en ms avant timeout
                maximumAge: 0                   // Desactive le cache gps
            }

            // Fonction qui sera appelée si la localisation n'a pas pu être récupérée (e.code contient le code de l'erreur)
            let error = function(e){
                if(e.code == e.TIMEOUT){
                    alert('Temps expiré')
                } else if(e.code == e.PERMISSION_DENIED){
                    alert('Vous avez refusé le geolocalisation');
                } else if(e.code == e.POSITION_UNAVAILABLE){
                    alert('Localisation impossible');
                } else {
                    alert('Problème inconnu');
                }
            }

            // Fonction qui sera appelée si la localisation a reussi (p contient les coordonnées de localisation)
            let success = function(p){

                let latitude = p.coords.latitude;
                let longitude = p.coords.longitude;

                console.log('Votre latitude actuelle est ' + latitude + ' et votre longitude est ' + longitude);

            }

            // Code permettant de mettre en place la demande de geolocalisation au navigateur
            navigator.geolocation.getCurrentPosition(success, error, options);

        });
    
    </script>


<div id="view">
</div>

    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
    <script src="js/script.js"></script>

</body>
</html>