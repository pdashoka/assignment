$(document).ready(function () {
    $('#FullName').on('input', function () {
        checkFullName();
	});
	
	$('#PersonalIdentificationNumber').on('input', function () {
        checkpersonalidentification();
		
    })
	$('#LoanAmount').on('input', function () {
        checkLoanAmount();
		
    })
	$('#LoanPeriod').on('input', function () {
        checkLoanPeriod();
		
    })
	$('#PerposeofLoan').on('input', function () {
        checkPerposeofLoan();
		
    })
   
    $('#submitbtn').click(function() {
		//alert("Hello");
		
		var i = 2;	
		if(!checkFullName() || !checkpersonalidentification() || !checkLoanAmount() || !checkLoanPeriod() || !checkPerposeofLoan())
		{
		//alert("Hello3");
		console.log("error");		
		}else{
		//alert("Hello4");
		console.log("ok");
            $("#message").html("");
            var form = $('#assignmentform')[0];
            var data = new FormData(form);
            $.ajax({
                type: "POST",
                url: "process.php",
                data: data,
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                beforeSend: function () {
                    $('#submitbtn').html('<i class="fa-solid fa-spinner fa-spin"></i>');
                    $('#submitbtn').attr("disabled", true);
                    $('#submitbtn').css({ "border-radius": "50%" });
                },

                success: function (data) {
                   // $('#message').html(data);
					//alert(data);
					if(data == '11'){
						$('#message').show(); 
						$('#message').html('<div class="alert alert-danger">Please enter fullname.</div>');
						$('#FullName').focus();
					}else if(data == '12')
					{
						$('#message').show(); 
						$('#message').html('<div class="alert alert-danger">Please Enter Correct Personal identification Number.</div>');
						$('#PersonalIdentificationNumber').focus();
						console.log('Not Ok');	
					}else if(data == '13')
					{
						$('#message').show(); 
						$('#message').html('<div class="alert alert-danger">Loan Amount should be 1,000 to 10,000</div>');
						$('#LoanAmount').focus();
						console.log('Not Ok');	
					}else if(data == '14')
					{
						$('#message').show(); 
						$('#message').html('<div class="alert alert-danger">Loan period should be 6 months to 24 months</div>');
						$('#checkLoanPeriod').focus();
						console.log('Not Ok');	
					}else{
						$('#message').show(); 
						$('#message').html('<div class="alert alert-success">Thank you ! Your form submited sucessfully</div>');
						$('#assignmentform').trigger("reset");
                        $('#submitbtn').html('Submit');
                        $('#submitbtn').attr("disabled", false);
                        $('#submitbtn').css({ "border-radius": "4px" });
						$('#message').delay(7000).hide(0); 
					}
					
                },
                complete: function () {
                    setTimeout(function () {
                        //$('#assignmentform').trigger("reset");
                        $('#submitbtn').html('Submit');
                        $('#submitbtn').attr("disabled", false);
                        $('#submitbtn').css({ "border-radius": "4px" });
                    }, 200);
                }
            });
		
		}
		
		});
	
});

function checkFullName() {
    var pattern = /^([a-zA-Z]|\s)*$/;
    var user = $('#FullName').val();
    var validuser = pattern.test(user);
    $('#message').hide;
	if ($('#FullName').val() == '') {
        $('#fullName_err').html('Please Enter Your Full Name');
        return false;
    }else if ($('#FullName').val().length < 4) {
        $('#fullName_err').html('Your name is too short');
        return false;
    } else if (!validuser) {
        $('#fullName_err').html('Your should be a-z ,A-Z only');
        return false;
    } else {
        $('#fullName_err').html('');
        return true;
    }
}

function checkpersonalidentification() {
    
	if (($("#PersonalIdentificationNumber").val() == '')) {
        $("#PersonalIdentificationNumber_err").html("Please Enter Personal Identification Number");
        return false;
    }else if (!$.isNumeric($("#PersonalIdentificationNumber").val())) {
        $("#PersonalIdentificationNumber_err").html("only number is allowed");
        return false;
    } else if ($("#PersonalIdentificationNumber").val().length <= 10) {
        $("#PersonalIdentificationNumber_err").html("11 digit required");
        return false;
    }
    else {
        $("#PersonalIdentificationNumber_err").html("");
        return true;
    }
}

function checkLoanAmount() {
    
	if (($("#LoanAmount").val() == '')) {
        $("#LoanAmount_err").html("Please Enter Loan Amount");
        return false;
    }else if (($("#LoanAmount").val() < 1000) || ($("#LoanAmount").val() > 10000)) {
        $("#LoanAmount_err").html("Loan amount should be 1,000 to 10,000");
        return false;
    }else if (!$.isNumeric($("#LoanAmount").val())) {
        $("#LoanAmount_err").html("Only number is allowed");
        return false;
    }else {
        $("#LoanAmount_err").html("");
        return true;
    }
}

function checkLoanPeriod() {
    
	if (($("#LoanPeriod").val() == '')) {
        $("#LoanPeriod_err").html("Please Enter Loan Period");
        return false;
    }else if (($("#LoanPeriod").val() < 6) || ($("#LoanPeriod").val() > 24)) {
        $("#LoanPeriod_err").html("Loan period should be 6 to 24");
        return false;
    }else if (!$.isNumeric($("#LoanPeriod").val())) {
        $("#LoanPeriod_err").html("only number is allowed");
        return false;
    }else {
        $("#LoanPeriod_err").html("");
        return true;
    }
}

function checkPerposeofLoan() {
    
	if (($("#PerposeofLoan").val() == '')) {
        $("#PerposeofLoan_err").html("Please Select perpose Of Loan");
        return false;
    }else {
        $("#PerposeofLoan_err").html("");
        return true;
    }
}


