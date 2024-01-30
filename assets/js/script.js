

//  Doc ready starts
$(document).ready(function(){

    const dob = document.getElementById('inputDob')
    dob.addEventListener('focus', ()=>{
        dob.type = "date"
   //   $(dob).datepicker({ dateFormat: 'dd-mm-yy' }).val();
    })
    const radio = $('.radio-btn')
    $(radio).click(function(){
        $('.form-check-input').addClass('checked')
    })

    const termsButton = document.querySelectorAll('.termsClick')
    const popupClose = document.querySelector('.popupClose')
    const popupOuter = document.querySelector('.popupOuter')
    termsButton.forEach((terms)=>{
        terms.addEventListener('click',()=>{
            popupOuter.classList.add('show')
        })
    })
    
    popupClose.addEventListener('click', function(){
        popupOuter.classList.remove('show')
    })

    const msgclose = document.querySelector('.msgclose')
//console.log(12);
if (msgclose) { 
     msgclose.addEventListener('click', ()=>{
         //   this.classList.add()
         const fullUrl = window.location.href;
            const hash = window.location.hash
            const remainingUrl = fullUrl.replace(hash, '');
            const outerOverlay = document.querySelector('.participation')
           outerOverlay.classList.remove('active')
           if(hash === '#getCoupon') {
            window.location.replace(remainingUrl);
           }
           
            })
}

   


            //  Image check starts
            $('#inputInvoice').on('change', function(){
                var inputInvoice = $('#inputInvoice').val();
                var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            
                if (!allowedExtensions.exec(inputInvoice)) {
                //    alert('Invalid file type! Please select a JPG, JPEG, PNG, or GIF image.');
                    $('#invoice-err').html('<p class="errormsg">Invalid file type! Please select a JPG, JPEG, PNG, or GIF image.</p>')
                    // Clear the input field if an invalid file is selected
                    $(this).val('');
                    return false;
                } else {
                    $('#invoice-err .errormsg').remove();
                }
            
            });
            
            // Image check ends

            // Submit
            
$('#submit-button').on('click', function(){
    const fName = $('#full-name').val();
    if(fName.length < 3) {
        $('#name-err').html('<p class="errormsg">Please enter a valid name</p>');
        document.getElementById('full-name').focus();
        return false;
    } else {
        $('#name-err .errormsg').remove();
    }

    const nationality = $('#nationality').val();
   if(nationality.length < 1 ) {
       $('#country-err').html('<p class="errormsg">Please select Country</p>');
       document.getElementById('nationality').focus();
       return false;
   } else {
       $('#country-err .errormsg').remove();
   }

   const dob = $('#inputDob').val();
   if(dob.length < 4 ) {
       $('#dob-err').html('<p class="errormsg">Please enter a valid date</p>');
       return false;
   } else {
       $('#dob-err .errormsg').remove();
   }

   const city = $('#city').val();
   if(city.length < 1 ) {
       $('#city-err').html('<p class="errormsg">Please select Emirate</p>');
       document.getElementById('city').focus();
       return false;
   } else {
       $('#city-err .errormsg').remove();
   }
   
 

   const mobile = $('#inputNumber').val();
    if(!(mobile.length ===9  || mobile.length ===10)) {
 //  if(!(mobile.length ===9)) { //|| !$.isNumeric(mobile)
      $('#mobile-err').html('<p class="errormsg">Please enter a valid phone number.<br>Number format : 5xxxxxxxx / 05xxxxxxxx </p>');
      document.getElementById('inputNumber').focus();
      $('.number-wraper').addClass('active')
      return false;
  } else {
      $('#mobile-err .errormsg').remove();
  }
       
    const email = $('#inputEmail4').val();
   const regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;    
   if(!regex.test(email)){    
   /*alert("invalid email id");    
   return regex.test(email);  */  
       $('#email-err').html('<p class="errormsg">Please enter a valid email</p>');
       document.getElementById('inputEmail4').focus();
       return false;
   } else {
       $('#email-err .errormsg').remove();
   }

   
   

    
    const invoice = $('#inputInvoice').val();

   
    if(invoice.length < 1 ) {
       //  console.log(invoice);
        $('#invoice-err').html('<p class="errormsg">Please upload a picture in jpg/png/gif format </p>');
        $('#inputInvoice').val("");
        return false;
    } else {
     //   console.log(invoice.length);
        $('#invoice-err .errormsg').remove();
    }

  


    if (!$("#customRadio1").prop("checked")) {
        $('#accept-err').html('<p class="errormsg">Please accept the Terms and Conditions</p>');
        return false;
    } else {
        $('#accept-err .errormsg').remove();
    }
   
    
    const currentUrl = window.location.href
    // console.log(currentUrl);
    const reqUrl = currentUrl.replace('#submitForm','');
    let formSubmitted = currentUrl.includes("#submitForm");
    // if(formSubmitted === true) {
    //     console.log(4545);
    //     const msgclose = document.querySelector('.msgclose')
    //     msgclose.addEventListener('click', ()=>{
    //         console.log(123)
    //         const outerOverlay = document.querySelector('.outer-overlay')
    //         outerOverlay.classList.remove('active')
    //         window.location.replace(reqUrl);
    //         })
    // } 

    
}) 
            // Submit


            const invoice2Img = document.querySelector('.inputInvoice')
            const fileLabel2Img = document.querySelector('.invoice-wraper')
            
            const image2CopySpan = document.querySelector('.invoice-wraper')
            if(fileLabel2Img){
            fileLabel2Img.addEventListener('click', ()=>{
              //  console.log(55);
                document.getElementById('inputInvoice').click()
                image2CopySpan.classList.add('hideNow')
                invoice2Img.classList.remove('hideNow')
            })
        }


}) 
// Doc ready ends