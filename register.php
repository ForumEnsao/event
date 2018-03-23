<?php
	require_once '/home/forumensao/config.php';
	$Nom_P = $pack = $Num = $Email ="";
	$Nom_P_err  = $Num_err= $Email_err = "";
 
	if($_SERVER["REQUEST_METHOD"] == "POST"){
	 
	    if(empty(trim($_POST['Nom_P']))){
	        $Nom_P_err = "Please enter a name.";     
	    }  else{
	        $Nom_P = trim($_POST['Nom_P']);
	    }

	    // Validate Nom_P
	    if(empty(trim($_POST["Email"]))){
	        $Email_err = "Please enter a Email.";
	    } else{

	        $sql = "SELECT id FROM users WHERE Email = ?";
	        
	        if($stmt = mysqli_prepare($link, $sql)){
	            // Bind variables to the prepared statement as parameters
	            mysqli_stmt_bind_param($stmt, "s", $param_Email);
	            
	            // Set parameters
	            $param_Email = trim($_POST["Email"]);
	            
	            // Attempt to execute the prepared statement
	            if(mysqli_stmt_execute($stmt)){
	                /* store result */
	                mysqli_stmt_store_result($stmt);
	                
	                if(mysqli_stmt_Num_rows($stmt) == 1){
	                    $Email_err = "This Email is already taken.";
	                } else{
	                    $Email = trim($_POST["Email"]);
	                }
	            } else{
	                echo "Oops! Something went wrong. Please try again later.";
	            }
	        }
	         
	        // Close statement
	        mysqli_stmt_close($stmt);
   		}
    
	    // Validate Num
	    if(empty(trim($_POST['Num']))){
	        $Num_err = "Please enter a Num.";     
	    } elseif(strlen(trim($_POST['Num'])) < 10){
	        $Num_err = "Num must have atleast 6 characters.";
	    } else{
	        $Num = trim($_POST['Num']);
	    }

	    $pack = trim($_POST['pack']);
		    
		    // Check input errors before inserting in database
	    if(empty($Nom_P_err)  && empty($Num_err) && empty($Email_err) ){
	        
	        // Prepare an insert statement
	        $sql = "INSERT INTO stand (Nom_P, Num, Email, pack) VALUES ('$Nom_P', '$Email', '$Num', '$pack')";
	         
	        if($stmt = mysqli_prepare($link, $sql)){
	            // Bind variables to the prepared statement as parameters
	            mysqli_stmt_bind_param($stmt, "ssss", $param_Nom_P, $param_Email, $param_Num, $pack);
	            
	            // Set parameters
	            $param_Nom_P = $Nom_P;
	            $param_Email = $Email;
	            $param_Num = $Num; 
	            
	            // Attempt to execute the prepared statement
	            if(mysqli_stmt_execute($stmt)){
	                $message = "Enregistrement effectué avec succès ";
					echo "<script type='text/javascript'>alert('$message');</script>";
	                header("location: index.php");
	            } else{
	                echo "Something went wrong. Please try again later.";
	            }
	        }
	         
	        // Close statement
	        mysqli_stmt_close($stmt);
	    }
	    
	    // Close connection
	    mysqli_close($link);
	}

?>


<div class="container">
    <div class="row">
        <div id="register-form" class="col-lg-6 col-lg-offset-3">
            <div class="row">
                <button title="Close (Esc)" type="button" class="mfp-close">×</button>
                
                <div class="col-lg-12">
                    <h2 class="uppercase">Enregistrement</h2>
                    <p>Remplissez ce formulaire et le tour est joué !</p>
                </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <!-- REGISTER FORM -->
                <div class="register-form col-lg-12">
                    <div class="control-group">
                    <div class="controls">
                        <label for="Nom_p">Nom de l'entreprise</label><br>
                        <input type="text" name="Nom_p" id="Nom_p" required data-validation-required-message="Entrez votre nom" />
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
                    <button class="button button-big button-dark" type="submit" onclick="contact_send();">SEND</button>
                    </div>
            </form>
                </div>
            </div>
        </div>
    </div>
</div>
