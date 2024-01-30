<?php  
ob_start();
 include("hktdcAdmin/includes/conn.php"); 
 if(isset($_REQUEST['btnadd'])){
	$status = 1;
	$fullName=$_POST['full-name'];	
    $nationality=$_POST['nationality'];
	$dob=$_POST['dob'];	
    $emirate=$_POST['city'];
	$mobile=$_POST['mobile'];
	$email=$_POST['email'];
    $agree = $_POST['customRadio1'];
	//echo $agree; die;
	//$store=$_POST['store'];
	//$invoiceNumber=$_POST['invoicenumber'];
    $randomNumber = rand(101, 99999);
    //echo $randomNumber; die;
	$arabic=0;
	$series=0;

    //	if($fullName!="" && $invoiceNumber!="" && $email !="" && $store !=""){
	if($fullName!="" && $email !=""){
		
		//var_dump($email); exit;
		include_once("hktdcAdmin/classes/class.upload.php");
		//var_dump($store); exit;
		$p_image=image_upload($_FILES['inputInvoice'],$randomNumber."main_img".time());
        
        //var_dump($p_image); exit;

		$g_image="";
		for($i=1;$i<=12;$i++){
			$u_image=image_upload($_FILES['productimg'.$i],$product."g_img".$i);
			//var_dump($_FILES['productimg'.$i]);
			if($u_image!=""){
				$g_image.=",".$u_image;
			}
		}
		$g_image=ltrim($g_image,",");
		
		//var_dump($_FILES['invoiceimg']); exit;
		//var_dump($p_image); exit;
		//
		$msg=""; $error="";        
            $query = "INSERT INTO `".TB_pre."shop_win` (`full_name`,`dob`,`country`,mobile,`email`,`emirate`,`invoice_img`,`is_arabic`) VALUES('$fullName','$dob','$nationality','$mobile','$email','$emirate','$p_image', '$arabic')";
            
		  $r = mysqli_query($url, $query) or die(mysqli_error($url));
		  if($r){
			  $active = "active";
			  $msg.= "Thank you!<br><br>

Your entry has been submitted succesfully. <br><br>
<div class='msgclose'>X</div>";
		  }
		  else {
			  $active = "no-active";
			  $error.= "Failed: Error occured";
		  }
	}
	else {
		header('Location: index.php');
		//	  $error.= "Failed: Fill all the required fields";
		  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HKTDC</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <div class="outer-wraper">
        <div class="popupOuter">
            <div class="popupWraper">
                <div class="popupClose">X</div>
                <!-- <h3>gg </h3> -->
                <div class="popupContent">
                  

               
                </div>
            </div>
        </div>
        <!-- popup ends-->
        <!-- <header class="header">
            <div class="container">
                <div class="logo d-flex align-items-center pt-5"><img src="assets/img/raising-canes-logo.png" alt="Raising Canes" class="img-fluid"></div>
            <div class="hero">
                <div class="conditions mt-5 text-white"><p class="text-center">Buy a meal at the <strong>JBR Dubai</strong> restaurant from <strong>Dec 29th to the January 5th 2024</strong></p></div>
                <div class="win">
                    <div class="win-img">
                        <img src="assets/img/prize.webp" alt="Get a chance to win an E-Scooter or an iphone 15" class="hide-sm img-fluid">
                        <img src="assets/img/prize-sm.webp" alt="Get a chance to win an E-Scooter or an iphone 15" class="sm-only img-fluid">
                    </div>
                  
                </div>
            </div>
            </div>
        </header> -->
        <section class="campaign">
            <div class="participation <?php if(isset($active)) {  echo $active; } else { echo 'no-active';} ?>">
                <div class="red-box">
           
                <?php if(isset($msg)){ if($msg!=""){ 
                echo $msg;
            }}?>
            <?php if(isset($error)){ if($error!=""){ ?>
              	<div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h4><i class="icon fa fa-ban"></i> <?php echo $error; ?></h4>
                    
               	</div>
               <?php } } ?>
                </div>
            </div>
            <div class="container">
            <div class="row">
          <div class="col">
          <div class="shop-form mt-5 pt-md-0 pt-5">
                <h2 class="text-center">Fill The Details</h2>
			  	<form role="form" method="post"  class="form-horizontal" action="index.php#submitForm" enctype="multipart/form-data" id="submitForm" >
                  <div class="box-body row">
                    <div class="col-md-12">
                        <h5 for="title">* Title</h5>
                        <div class="title_row form-check custom-control custom-radio radio-btn">
				<span><input id="ucCoreInfo1_rblSalutation_0"  type="radio" name="ucCoreInfo1:rblSalutation" value="PROF"><label for="ucCoreInfo1_rblSalutation_0">Prof</label></span><span><input id="ucCoreInfo1_rblSalutation_1"  type="radio" name="ucCoreInfo1:rblSalutation" value="DR"><label for="ucCoreInfo1_rblSalutation_1">Dr</label></span><span><input id="ucCoreInfo1_rblSalutation_2"  type="radio" name="ucCoreInfo1:rblSalutation" value="MR"><label for="ucCoreInfo1_rblSalutation_2">Mr</label></span><span><input id="ucCoreInfo1_rblSalutation_3"  type="radio" name="ucCoreInfo1:rblSalutation" value="MRS"><label for="ucCoreInfo1_rblSalutation_3">Mrs</label></span><span><input id="ucCoreInfo1_rblSalutation_4"  type="radio" name="ucCoreInfo1:rblSalutation" value="MS"><label for="ucCoreInfo1_rblSalutation_4">Ms</label></span><span><input id="ucCoreInfo1_rblSalutation_5"  type="radio" name="ucCoreInfo1:rblSalutation" value="MISS"><label for="ucCoreInfo1_rblSalutation_5">Miss</label></span>
			</div>
                   
                    </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" placeholder="Given Name*" name="given-name" id="given-name" required />
						<div id="gname-err"></div>
                  </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" placeholder="Surname*" name="surname" id="surname" required />
						<div id="sname-err"></div>
                  </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" placeholder="Company*" name="company" id="company" required />
						<div id="company-err"></div>
                  </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                    <input type="text" class="form-control" placeholder="Position*" name="position" id="position" required />
						<div id="position-err"></div>
                  </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="form-select-box">
                        <select class="form-select form-control" name="nationality" id="nationality">
                            <option value="" selected>Country / Region*</option>
                            <?php include('inc/nationality-english.php'); ?>
                        </select>
                        </div>
                        <div id="country-err"></div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="State*" name="state" id="state" required />
						<div id="state-err"></div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" placeholder="City*" name="city" id="city" required />
						<div id="city-err"></div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12"> 
                        <div class="number-wraper">
                            <input type="tel" name="telephone" class="form-control inputtel" id="telephone" placeholder="Telephone * 971 X XXXX XXX" required>
                            <div id="tel-err"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12"> 
                        <div class="number-wraper">
                            <input type="tel" name="mobile" class="form-control inputmobile" id="inputNumber" placeholder="Mobile * 971 5X XXXX XXX" required>
                            <div id="mobile-err"></div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12"> 
                        <div class="number-wraper">
                            <input type="tel" name="fax" class="form-control inputfax" id="inputFax" placeholder="Fax * 971 5X XXXX XXX" required>
                            <div id="fax-err"></div>
                        </div>
                    </div>
                   

            <div class="col-md-6 col-sm-12 col-xs-12"> 
            <input type="email" class="form-control" placeholder="Email*" name="email" id="inputEmail4" required/>
					  <div id="email-err"></div>
					  <div id="email-exists"></div>

            </div>
            <div class="col-md-6 col-sm-12 col-xs-12"> 
            <input type="text" class="form-control" placeholder="Website" name="website" id="inputWebsite" required/>
					  <div id="website-err"></div>

            </div>
            <hr>


                    

            <div class="col-md-12"> 
           
         
            <div class="form-check custom-control custom-radio radio-btn mb-5">
               <div class="confirmation">
                <div class="salutation"><p><strong>* I / WE</strong></p></div>
                <div class="row attending">
						<div class="col"><input id="shallAttend" type="radio" name="attend" value="101"><label for="shallAttend">shall attend</label></div><div class="col"><input id="shallNotAttend" type="radio" name="attend" value="102"><label for="shallNotAttend">shall not attend</label></div>
					</div>
                    <div class="row tickboxes mb-3">
                        <input type="checkbox" name="confirmation" id="confirmation">
                        <label for="confirmation" id="confirmationLabel">I confirm that I have read and agree with the Hong Kong Trade Development Council's (“HKTDC”) <a href="http://www.hktdc.com/mis/tu/en/" target="_blank">Terms of Use</a>. I acknowledge that the above information may be used by the HKTDC and Hong Kong Economic and Trade Office  (“HKETO”) in Dubai (the "Organisers") for incorporation in all or any of their databases for direct marketing or business matching purposes, and for any other purposes as stated in HKTDC's Privacy Policy Statement (<a href="http://www.hktdc.com/mis/pps/en" target="_blank">http://www.hktdc.com/mis/pps/en</a>) and HKETO Dubai’s Privacy Policy (<a href="https://www.hketodubai.gov.hk/en/privacy.html" target="_blank">https://www.hketodubai.gov.hk/en/privacy.html</a>).   I am admitted to the Fair on condition that I abide by the <a href="http://www.hktdc.com/mis/vrr/en/" target="_blank">Visitors’ Rules and Regulations</a> set by the HKTDC.</label>
                    </div>
                    <div class="row tickboxes mb-3">
                        <input type="checkbox" name="iagree" id="iagree">
                        <label for="iagree" id="iagreeLabel">I agree that the above information will be collected by Hong Kong Tourism Board and Cathay Pacific for business liaison, post-event communication and future marketing purposes.</label>
                    </div>
                    <div class="row tickboxes mb-3">
                        <input type="checkbox" name="consent" id="consent">
                        <label for="consent" id="consentLabel">I would like to continue to be part of the HKTDC’s contact list and be informed of the latest market intelligence and business opportunities.
[This box is solely for European Union (“EU”) / European Economic Area (“EEA”) customers as required by the relevant data protection law in the EU.]</label>
                    </div>
               </div>
                <div id="accept-err"></div>
            </div>
            <div class="form-buttons mb-5"><button type="submit" class="btn btn-primary submitnreset" name="btnadd" id="submit-button">Submit</button>
                <button type="reset" class="btn btn-primary submitnreset" name="btnareset">Reset</button>
            </div>
		</div>  
					 
                  </div><!-- /.box-body -->

                  <div class="box-footer">
                   
                  </div>
                </form>
			  </div>
        
              
          </div>
        </div>
            </div>

        </section>
       
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>