
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <title>Document</title>



</head>
<body>


<?php if(isset($_POST['send'])): ?>
<?php validate($_POST);?>
    <?php if(empty($validation)){
        storeData();
    }?>
<?php endif ?>



<div class="  col-3  m-auto" id="first">
    <h1 class="text-center">Für einen Flug einchecken</h1>
    <?php
    if(isset($validation)){
        foreach($validation as $error){

            echo $error;
            echo  '<br/>';
        }
    }

    ?>
<form  method="post"  id="regforma"  >
    <label>Flugnummer</label><br/>
    <select name="flynum" class="form-select pt-1 pb-1 mb-3 w-100" aria-label="Flugnummer">
        <option value=-1 selected >Wählen</option>
        <?php
            foreach($flights as $flight => $value):
                echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
            endforeach;
            ?>
    </select>
    <div class="form-group ">
        <label for="code">Persönlicher Code</label>
        <input type="text" class="form-control" name="code" id="code" placeholder="Geben Sie den persönlichen Code ein"> <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    -->
    </div>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="Geben Sie den Namen ein">
    </div>
    <div class="form-group">
        <label for="nachname">Nachname</label>
        <input type="text" class="form-control" name="nachname" id="nachname" placeholder="Geben Sie den Nachnamen ein">
    </div>
    <label>Von wo fliegst du?</label><br/>
    <select name="from" class="form-select pt-1 pb-1 mb-3 w-100" aria-label="fliegst">
        <option value=-1 selected >Wählen</option>


        <?php
        foreach($from as $city => $value):
            echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
        endforeach;
        ?>
    </select >
    <label>Wohin du fliegst?</label><br/>
    <select name="to" class="form-select pt-1 pb-1 mb-3 w-100" aria-label="Flugnummer">
        <option value=-1 selected >Wählen</option>
        <?php
        foreach($to as $city1 => $value):
            echo '<option value="'.$value.'">'.$value.'</option>'; 
        endforeach;
        ?>

    </select>
    <div class="form-group">
        <label for="price">Preis</label>
        <input type="text" class="form-control" name="price" id="price" placeholder="Geben Sie den Preis ein">
    </div>

    <label for="luggage">Gepäck</label>
    <select name="luggage" class="form-select pt-1 pb-1 mb-3 w-100" aria-label="Geben Sie das Gewicht des Gepäcks ein">

        <option value=-1 selected >Wählen</option>
        <?php
        foreach($luggage as $weight => $value):
            echo '<option value="'.$value.'">'.$value.'</option>'; //close your tags!!
        endforeach;
        ?>
    </select >

    <div class="form-group">
        <label for="notes">Anmerkungen</label>
        <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
    </div>
    <div class="text-center">
        <a class="btn btn-primary" href="#second" data-toggle="collapse" role="button">Link</a>
    <button type="submit" data-toggle="collapse" form="regforma" name="send"  class="btn btn-primary ">Spausdinti</button>
    </div>
</form>
</div>




<div id="second "  class="container border mb-5" >
    <div class="row bg-light pl-3 text-primary font-weight-bold align-middle"><span>Uberprufen Sie die Detail Ihrer Reise</span></div>
    <div class="row ">
        <div class="col-8 ">
            <div class="row">
                <div class="col-5  font-weight-bold pt-2"><span> <?php echo date("j\. M\. Y ");?></span>  </div>
                <div class="col-2 ">
                    <div class="row"> <span>Van</span>  </div>
                    <div class="row"> <span>Noh</span>  </div>
                </div>


                   <div class="col-5  ">
                    <div class="row">  <span><?php echo $_POST[from];?></span> </div>
                    <div class="row"> <span><?php echo $_POST[to];?></span>  </div>
                </div>
            </div>

            <div class="row align-middle pl-3">  <img   style="width: auto; height: 20px;" src="pic/nec.jpg" class="img-fluid "  alt="image"><span>Neckermann NEC Charter</span></div>
            <div class="row ">
                <div class="col-3 align-middle  pt-2">  <span>12:12 Uhr</span> </div>
                <div class="col-2  align-middle">  <img   style="width: auto; height: 20px;" src="pic/arrow.jpg" class="img-fluid "  alt="image"> </div>
                <div class="col-3 align-middle">  <span>19:50 Uhr</span> </div>
                <div class="col-4  align-middle">  <span>12Std. 30Min. Direct/Nonstop</span> </div>
            </div>
            <div class="row align-middle  pt-4 pl-3 text-primary ">  <span>Fliugdetails und Angaben zu Gepackgebuhre anzeigen ></span></div>
        </div>
        <div class="col-4 bg-light  ">
            <div class="row bg-light ">  <h5>Reiseubersicht</h5>  </div>
            <div class="row bg-light ">
                <div class="col-6 Reisender 1 Erwachsener">   </div>
                <div class="col-6  ">  <p><?php echo $_POST[name]." ". $_POST[nachname];?></p> </div>
            </div>
            <div class="row bg-light ">
                <div class="col-6 ">  <p>Gepäck</p> </div>
                <div class="col-6  ">  <p><?php echo $_POST[luggage];?></p> </div>
            </div>
            <div class="row bg-light ">
                <div class="col-6 ">  <p>Preis</p> </div>
                <div class="col-6  ">  <p><?php echo $_POST[price]. " eur";?></p> </div>
            </div>
            <div class="row mb-4">
                <div class="col-6  ">  <p>Gesamtkosten</p> </div>
                <div class="col-6  ">  <p>


                        <?php
                        $t = $_POST[price];
                        if ($_POST[luggage] > "20") {
                            $t=$t+30;
                            echo $t. " eur";
                        }
                        ?>
                    </p> </div>
       </div>

        </div>
    </div>
    <div   class=" text-center " >
        <button type="submit"  name="send"  class="btn btn-primary">Spausdinti</button>
    </div>
</div>




</body>
</html>
