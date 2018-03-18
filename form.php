<?php
	require_once 'config.php';
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
	        $sql = "INSERT INTO stand (Nom_P, Num, Email, pack) VALUES (?, ?, ?, ?)";
	         
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
