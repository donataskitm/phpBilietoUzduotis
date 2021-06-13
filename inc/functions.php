<?php

function validate($data){
    global $validation;
    if($_POST['flynum'] ==-1){
        $validation[] = "Wählen Sie die Flugnummer";
    }

    if (empty($_POST['code']) || !preg_match('/^[1-6][0-9]{10}$/', $_POST['code'])){
        $validation[] = "Ungültiger persönlicher Code";
    }
   if (empty($_POST['name']) || !preg_match('/^[A-Z][a-z\d_]{2,20}$/',  $_POST['name'])){
        $validation[] = "Ungültiger Name";
    }
    if (empty($_POST['nachname']) || !preg_match('/^[A-Z][a-z\d_]{2,20}$/',  $_POST['nachname'])){
        $validation[] = "Ungültiger Nachname";
    }
    if($_POST['from'] ==-1){
        $validation[] = "Wählen Sie aus, wo Sie fliegen";
    }
    if($_POST['to'] ==-1){
        $validation[] = "Wählen Sie, wohin Sie fliegen";
    }
    if ((empty($_POST['price'])) || $_POST['price']<=0 || !preg_match( '/^\d+(\.\d{2})?$/',  $_POST['price'])){
        $validation[] = "Geben Sie einen Preis ein";
    }
    if($_POST['luggage'] ==-1){
        $validation[] = "Wählen Sie das Gewicht des Gepäcks";
    }
    if($_POST['from'] ==$_POST['to']){
        $validation[] = "bfahrts- und Ankunftsrichtung stimmen überein";
    }
}


function storeData(){
    global $data;
    $data = "data/data.txt"; //kelias iki tekstinio failo
    $content = file_get_contents($data); //failo turinys
    $formData = implode(",", $_POST); //konvertuojama post masyva i string
    $content .= $formData."/n";  //pridedam eilutes pabaigos zenkla
    file_put_contents($data, $content); //rasom formos duomenis i tekstini faila
    //var_dump($content);
}

