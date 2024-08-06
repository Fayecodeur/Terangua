<?php
function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}



//  fonction qui permet d'afficher le body

function generateEmailBody($email, $fullName, $date, $time, $numPeople)
{
  $formattedDate = (new DateTime($date))->format('d F Y');

  return '
        <html>
        <head>
            <title>Nouvelle Réservation</title>
        </head>
        <body>
            <h3>Nouvelle Réservation</h3>
            <p><strong>Email :</strong> ' . htmlspecialchars($email) . '</p>
            <p><strong>Nom complet :</strong> ' . htmlspecialchars($fullName) . '</p>
            <p><strong>Date de la réservation :</strong> ' . $formattedDate . '</p>
            <p><strong>Heure de la réservation :</strong> ' . htmlspecialchars($time) . '</p>
            <p><strong>Nombre de personnes :</strong> ' . htmlspecialchars($numPeople) . '</p>
            <p>Térangua Délice</p>
        </body>
        </html>
    ';
}
