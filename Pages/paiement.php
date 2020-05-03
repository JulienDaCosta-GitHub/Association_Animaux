
<?php
require_once('header.php');

require_once('../Admin/Config/Crud.php');

$crud = new Crud();

$id = $crud->escape_string($_GET['id']);

$result = $crud->getData("SELECT * FROM produit WHERE id=$id");

foreach ($result as $res) {

    $nom = $res['nom'];
    $type_animal = $res['type_animal'];
    $prix = $res['prix'];
    $stock = $res['stock'];
    $filename = $res['image'];
}



$total = $prix*$_SESSION['form']['quantite'] ;

if(isset($_POST['payer'])) {
    header("Location: remerciement.php?");

}

?>



<br>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<body></body>
<div class="container" align="center">
    <h2>Total :<strong><?php echo $total?>€</strong></h2>
    <div class='row'>
        <div class='col-md-4'></div>
        <div class='col-md-4'>
            <script src='https://js.stripe.com/v2/' type='text/javascript'></script>
            <form accept-charset="UTF-8"  action="" method="POST" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="pk_bQQaTxnaZlzv4FnnuZ28LFHccVSaj" id="payment-form" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="✓" /><input name="_method" type="hidden" value="PUT" /><input name="authenticity_token" type="hidden" value="qLZ9cScer7ZxqulsUWazw4x3cSEzv899SP/7ThPCOV8=" /></div>
                <div class='form-row'>
                    <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Nom sur la carte</label>
                        <input class='form-control' size='4' type='text' name="nomprenom" placeholder="Nom prenom" title="Veuillez le nom prenom" maxlength="100"required pattern="/^([a-zA-Z\u00C0-\u00FF]+['- ]?[a-zA-Z\u00C0-\u00FF]+){1,30}$/"> 
        
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-xs-12 form-group card required'>
                        <label class='control-label'>Numéro de carte</label>
                        <input autocomplete='off' class='form-control card-number' size='20' type='text'  name="numero" placeholder="1111 2222 3333 4444"  title="Veuillez entrer 16 chiffres" required minlength="16" maxlength="16" pattern="[0-9]{16}" >
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-xs-4 form-group cvc required'>
                        <label class='control-label'>CVC</label>
                        <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' type='text' name="cvc" title="Veuillez entrer 3chiffres" required minlength="3" maxlength="3" pattern="[0-9]{3}">
                    </div>
                    <div class='col-xs-4 form-group expiration required'>
                        <label class='control-label'>Expiration</label>

                        <select class='form-control card-expiry-month' id="expiry-month"  name="mois" required >
															<option id="trans-label_month" value="" default="default" selected="selected" required>Month</option>
															<option value="1">01</option>
															<option value="2">02</option>
															<option value="3">03</option>
															<option value="4">04</option>
															<option value="5">05</option>
															<option value="6">06</option>
															<option value="7">07</option>
															<option value="8">08</option>
															<option value="9">09</option>
															<option value="10">10</option>
															<option value="11">11</option>
															<option value="12">12</option>
													</select>
                    </div>
                    <div class='col-xs-4 form-group expiration required'>
                        <label class='control-label'> </label>
                        <input class='form-control card-expiry-year' placeholder='YYYY' type='text' name="annee" title="Veullez entrer une année"  required minlength="4" maxlength="4"  pattern="[0-9]{4}">
                    </div>
                </div>


                <div class='form-row'>
                    <div class='col-md-12 form-group'>
                        <a href="remerciement.php"><button class="btn btn-success btn-block"  type="submit" name="payer">Payer</button></a>
                    </div>
                </div>
                <div class='form-row'>
                    <div class='col-md-12 error form-group hide'>
                        <div class='alert-danger alert'>
                            Please correct the errors and try again.
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class='col-md-4'></div>
    </div>
</div>