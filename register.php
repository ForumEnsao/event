<div class="container">
    <div class="row">
        <div id="register-form" class="col-lg-6 col-lg-offset-3">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                
                <div class="col-lg-12">
                    <h2 class="uppercase">Enregistrement</h2>
                    <p>Remplissez ce formulaire et le tour est joué !</p>
                </div>
            <form action="form2.php" method="post">
                <!-- REGISTER FORM -->
                <div class="register-form col-lg-12">
                    <div class="control-group">
                    <div class="controls">
                        <label for="Nom_P">Nom de l'entreprise</label><br>
                        <input type="text" name="Nom_P" id="Nom_P" required data-validation-required-message="Entrez votre nom" />
                    </div>
                    </div>

                    <div class="control-group">
                    <div class="controls ">                           
                        <label for="Email">Email</label><br>
                        <input type="Email" name="Email" id="Email"  required data-validation-required-message="Entrez votre Email" />
                    </div>
                    </div>

                    <div class="control-group">
                    <div class="controls ">                            
                        <label for="Num">Numéro de Téléphone</label><br>
                        <input type="text" name="Num" id="Num" required data-validation-required-message="Entrez votre Numero" />
                    </div>
                    </div>

                     <div class="control-group">
                    <div class="controls ">                            
                        <label for="pack">TYPE</label><br>
                        <select name="pack" id="pack">
                            <option value="" disabled selected="selected">Sélectionnez le pack</option>
                            <option value="Basic">Formule Basic</option>
                            <option value="Gold">Formule Deluxe</option>
                            <option value="Diamant">Formule Premium</option>
                        </select>
                    </div>
                    </div>

                    <div class="col-lg-12 text-right">
                    <button class="button button-big button-dark" type="submit" onclick="contact_send()">SEND</button>
                    </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
