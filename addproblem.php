<?php
require_once '../controller/skincarec.php';
require_once '../model/problems.php';
$problems = null;
$problemsc = new problemsc();
if (isset($_POST['submit'])) {
    if (
        isset($_POST['skintype'])
        && isset($_POST['problem'])
    ) {

        if (
            !empty($_POST['skintype']) &&
            !empty($_POST['problem'])  
        ) 
        {
          $problems = new problems(
            null,
            $_POST['skintype'],
            $_POST['problem'],
            false
        );

           $problemsc->addproblem($problems);
            // Redirect user to list.php with problem parameters
            $problem = $_POST['problem'];
            header("Location: showproblem.php?problem=$problem");
            exit();
        } else {
            $error = "Missing information";
        }
    }
    $_POST = array();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<!--footer-->
<section class="contaner-fluid footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="contact-info">
                    <img src="https://image.ibb.co/kUASdV/contact-image.png" alt="image"/>
                    <h2>Tell us more</h2>
                    <h4>We would love to know more about your skin!</h4>
                </div>
            </div>
            <div class="col-md-9">
                <div class="contact-form text-center">
                    <form action="#" method="post">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="skintype">Skin Type:</label>
                            <div class="col-sm-10">          
                                <select class="form-control" id="skintype" name="skintype">
                                    <option value="normal">Peau normale</option>
                                    <option value="oily">Peau grasse</option>
                                    <option value="dry">Peau sèche</option>
                                    <option value="combination">Peau mixte</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="problem">Problème de Peau:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" id="problem" name="problem"></textarea>
                            </div>
                        </div>
                        <div class="form-group">        
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default" name="submit">submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>     
</section>

<!--end footer-->

<script>
  const idInput = document.getElementById("ID");

  idInput.addEventListener("keyup", idValidation);

  function idValidation() {
    const idValue = idInput.value;
    const idPattern = /^[0-9]{3,}$/;
    const isValid = idPattern.test(idValue);

    if (!isValid) {
      idInput.style.color = "red";
    } else {
      idInput.style.color = "green";
    }
  }

  const form = document.querySelector("form");

  form.addEventListener("submit", function (event) {
    const idValue = idInput.value;

    const idPattern = /^[0-9]{3,}$/;

    const isIdValid = idPattern.test(idValue);

    if (!isIdValid) {
      event.preventDefault();
      idInput.style.color = "red";
      const errorSpan = document.createElement("span");
      errorSpan.textContent = "Le champ ID doit contenir au moins 3 caractères qui sont tous des chiffres.";
      errorSpan.style.color = "red";
      idInput.parentNode.insertBefore(errorSpan, idInput.nextSibling);
    }
  });
  
</script>



</body>
</html>

