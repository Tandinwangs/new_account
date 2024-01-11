<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>RegistrationForm_v6 by Colorlib</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{ asset ('assets/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset ('assets/fontawesome/css/fontawesome-all.min.css') }}">
		<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">  -->
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<div class="image-holder">
					<img src="{{ asset ('assets/img/registration-form-6.png') }}" alt="" style="opacity:.9">
				</div> 
				<form method="POST" action="" enctype="multipart/form-data">
					@csrf
					@if(session('success'))
						<div id="success-message" class="alert-success">
							{{ session('success') }}
						</div>
					@endif

				@if(session('error'))
						<div id="error-message" class="alert-error">
							{{ session('error') }}
						</div>
					@endif
					<h3 style="color:#004188">Get New AccountNo.</h3>
					<div class="form-row">
						<input type="text" id="account_number" name="account_number" class="form-control" placeholder="Account Number" required/>
					
						
					</div>

					<div class="form-row">
						<select name="account_type" id="account_type"  class="form-control" style="display:none">
							<option selected disabled>Choose one:</option>
							<option value="Saving">Saving</option>
							<option value="Current">Current</option>
							<option value="Working">Working Capital</option>
							<option value="Piggy">Piggy Bank</option>
						</select>
					</div>	

					<div class="form-row">
						<select name="nationality" id="nationality"  class="form-control" style="display:none">
							<option selected disabled>Choose one:</option>
							<option value="Bhutanese">Bhutanese</option>
							<option value="Non-Bhutanese">Non-Bhutanese</option>
						</select>
					</div>	

					<input type="text" id="cid" name="cid" class="form-control" placeholder="CID" style="display:none" required />

					<input
						placeholder="DOB"
						type="text"
						class="form-control"
						onfocus="(this.type='date')"
						onblur="(this.type='text')"
						id="dob" 
						style="display:none"
						/>

					<div class="form-row">
						<input type="text" id="dzongkhag" name="dzongkhag" class="form-control" placeholder="Dzongkhag" style="display:none" required />
						<input type="text" id="gewog" name="gewog" class="form-control" placeholder="Gewog" style="display:none" required />
					</div>

					<div class="form-row">
					<input type="text" id="village" name="village" class="form-control" placeholder="Village" style="display:none" required />
						<input type="text" id="name" name="name" class="form-control" placeholder="Name" style="display:none" required />

					</div>

					

					<div class="form-row">
						<input type="text" id="thram_number" name="thram_number" class="form-control" placeholder="Thram No." style="display:none" required/>
						<input type="text" id="house_number" name="house_number" class="form-control" placeholder="House No." style="display:none" required />
					</div>	

					<div class="form-row">
						<input type="text" id="phone_number" name="phone_number" class="form-control" placeholder="Phone No." style="display:none" required />
						<input type="email" id="email" name="email" placeholder="Email" class="form-control" style="display:none" required />
					</div>	
			

				

					<!-- <button type="submit" class="btn btn-primary" name="button" id="button" onclick="showData()" style="display:none">Submit Now
						<i class="zmdi zmdi-long-arrow-right"></i>
					</button> -->

					<div id="dataContainer" style="display: none; background-color: #f0f0f0; padding: 10px; border-radius: 5px; margin-top: 10px; text-align: center;">
						<!-- Display your data here -->
						Thank You! 
						Your new account number is:<br> 
						<strong id="new_account_no" >234235235</strong>
					</div>

				</div>

			

					</div>					
				</form>
			
				
			</div>
			<div id="preloader" style="display:none"></div>
		</div>
 

		<script src="{{ asset ('assets/js/jquery-3.3.1.min.js') }}"></script>
		<script src="{{ asset ('assets/js/main.js') }}"></script>
		<script>
			function showData() {
				$('#dataContainer').fadeIn();
				}
		</script>


	<script>
		$(document).ready(function() {

		$('#account_number').on('input', function() {
			var accountNumber = $(this).val();

		fetch('/check-account-number/' + accountNumber)
            .then(function(response) {
                return response.json(); 
            })
            .then(function(data) {
                if (data.exists) {
					
                    $('#cid').show();

					$('#account_type').on('change', function() {
						if (data.exists.account_type == $(this).val()) {
                            $('#nationality').show(); 
                        } else {
                            $('#nationality').hide(); 
                        }
					)}

					$('#nationality').on('change', function() {
						if (data.exists.nationality == $(this).val()) {
                            $('#cid').show(); 
                        } else {
                            $('#cid').hide(); 
                        }
					)}

					   // Add an event listener for the cid input
                    $('#cid').on('input', function() {
						if(data.exists.cid == $(this).val()){
							$('#dob').show();
						}else{
							$('#dob').hide();
						}
                    });

					$('#dob').on('input', function() {
						if(data.exists.dob == $(this).val()){
							$('#dzongcode').show();
						}else{
							$('#dzongcode').hide();
						}
					})

					
					$('#dzongcode').on('change', function() {
						if (data.exists.dzongcode == $(this).val()){
							$('#gewog').show();
						} else {
							$('#gewog').hide();
						}
					});

					$('#gewog').on('change', function() {
						if(data.exists.gewog == $(this).val()){
							$('#villcode').show();
						}else{
							$('#villcode').hide();
						}
					});

					$('#villcode').on('change', function() {
						if(data.exists.villcode == $(this).val()){
							$('#thram_no').show();
						}else{
							$('#thram_no').hide();
						}
					});

					
					$('#thram_number').on('input', function() {
						if(data.exists.thram_number == $(this).val()){
							$('#house_number').show();
						}else{
							$('#house_number').hide();
						}
					});

					
					$('#house_number').on('input', function() {
						if(data.exists.house == $(this).val()){
							$('#phone_number').show();
						}else{
							$('#phone_number').hide();
						}
					});

					
					$('#phone_number').on('input', function() {
						if(data.exists.phone_number == $(this).val()){
							$('#email').show();
						}else{
							$('#email').hide();
						}
					});

					$('#email').on('input', function() {
						if(data.exists.email == $(this).val()){
							$('#preloader').show();
								setTimeout(function() {
									$('#preloader').hide();
								}, 2000);
							setTimeout(() => {
								$('#dataContainer').show();
								   // Assuming data.exists.value is a boolean
								   var new_account_no = data.exists.new_account_no ;

									// Update the content of the <p> tag
									$('#new_account_no').text(new_account_no);
							}, 2000)
						
					
						}else{
							$('#dataContainer').hide();
						}
					})

				
					
                } else {
                    $('#cid').hide();
                    $('#village').hide(); // Hide the village input field
                }
            })
            .catch(function(error) {
                console.error('Error:', error);
            });
    });
});

        </script>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto-hide the success message after 5 seconds (5000 milliseconds)
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000);
    </script>

	</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>