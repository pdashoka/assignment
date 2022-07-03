<!DOCTYPE html>
<html>
<head>
<title>Frenn Test Assignment</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style>
        .error input {
            border-color: red;
            border-width: 2px;
        }

        .success input {
            border-color: green;
            border-width: 2px;
        }

        .error span {
            color: red;
        }

        .success span {
            color: green;
        }

        span.error {
            color: red;
        }

        i {
            font-weight: 900;
            font-family: 'Font Awesome 5 Free';
        }
		
		.lebelBold{
			font-weight: 600;
		}
    </style>

</head>

<body class="bg-light">


<nav class="navbar navbar-dark bg-primary"  style="text-align:center">
  <h2 style="color:white;">Frenn Test Assignment</h2>
</nav>
   

    <div class="container p-3">
        <div class="col-lg-6 m-auto d-block p-3 bg-white">
            <h2 class="pb-3 text-success" style="text-align:center">
               
            </h2>
            <div id="message"></div>
            <form method="POST" id="assignmentform">
                <div class="row">
					<div class="form-group col-md-12">
                        <label for="FullName" class="lebelBold">
                            Name
                        </label>
                        <input type="text" name="FullName" id="FullName" placeholder="Enter Full Name" class="form-control">
                        <span class="error" id="fullName_err"> </span>
                    </div>
					
					<div class="form-group col-md-12">
                        <label for="PersonalIdentificationNumber" class="lebelBold">
                            Personal identification Number
                        </label>
                        <input type="number" name="PersonalIdentificationNumber" id="PersonalIdentificationNumber" class="form-control" maxlength="12" size="12" placeholder="Enter Personal identification Number">
                        <span class="error" id="PersonalIdentificationNumber_err"> </span>
                    </div>
					
				
                    <div class="form-group col-md-6">
                        <label for="LoanAmount" class="lebelBold"> 
                            Loan Amount:
                        </label>
                        <input type="number" name="LoanAmount" id="LoanAmount" class="form-control" maxlength="6" placeholder="Enter Loan Amount">
                        <span class="error" id="LoanAmount_err"> </span>
                    </div>
                    <div class="form-group col-md-6" >
                        <label for="LoanPeriod" class="lebelBold">
                            Loan Period:
                        </label>
                        <input type="number" name="LoanPeriod" id="LoanPeriod" class="form-control" maxlength="4" placeholder="Enter Loan Period [In Month]">
                        <span class="error" id="LoanPeriod_err"> </span>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="PerposeofLoan" class="lebelBold">
                            Perpose of Loan
                        </label>
                        <select class="form-control" name="PerposeofLoan" id="PerposeofLoan" >
						  <option selected value="">Please Select Perpose of Loan</option>
						  <option value="Holiday">Holiday</option>
						  <option value="Repair">Repair</option>
						  <option value="Consumer Electronics">Consumer Electronics</option>
						  <option value="Wedding">Wedding</option>
						  <option value="Rental">Rental</option>
						  <option value="Car">Car</option>
						  <option value="School">School</option>
						  <option value="Investment">Investment</option>
						</select>
                        <span class="error" id="PerposeofLoan_err"> </span>
                    </div>

                   


                    <div class="col-md-12">
                        <button type="button" id="submitbtn" class="btn btn-primary">Submit</button>
                    </div>

                </div>

            </form>
        </div>
    </div>




<script src="js/validation.js"></script>
</body>
<footer class="page-footer font-small blue pt-4" style="background-color: #45637d; color:white;">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase">Assignment</h5>
        <p>By : Ashok</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3">

        

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->
<!-- Copyright -->
  <div class="footer-copyright text-center py-3">&nbsp;</div>
  <!-- Copyright -->
  </div>
  <!-- Footer Links -->


</footer>
</html>