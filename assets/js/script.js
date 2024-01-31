

//  Doc ready starts
$(document).ready(function(){

    function validateSalutation() {
        const salutationRadios = document.getElementsByName('salutation');
        let isValid = false;
    
        // Check if at least one radio button is checked
        for (let i = 0; i < salutationRadios.length; i++) {
          if (salutationRadios[i].checked) {
            isValid = true;
            break;
          }
        }
    
        if (!isValid) {
            $('#salutation-err').html('<p class="errormsg">Please select a salutation</p>');
            document.getElementById('salutation_0').focus();
            return false;
        }
    
        return isValid;
      }
    

          
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

    validateSalutation()

    const fName = $('#given-name').val();
    if(fName.length < 3) {
        $('#gname-err').html('<p class="errormsg">Please enter a valid name</p>');
        document.getElementById('given-name').focus();
        return false;
    } else {
        $('#gname-err .errormsg').remove();
    }
    const lName = $('#surname').val();
    if(lName.length < 3) {
        $('#sname-err').html('<p class="errormsg">Please enter a valid name</p>');
        document.getElementById('surname').focus();
        return false;
    } else {
        $('#sname-err .errormsg').remove();
    }
    const company = $('#company').val();
    if(company.length < 3) {
        $('#company-err').html('<p class="errormsg">Please enter a valid name</p>');
        document.getElementById('company').focus();
        return false;
    } else {
        $('#company-err .errormsg').remove();
    }
    const position = $('#position').val();
    if(position.length < 3) {
        $('#position-err').html('<p class="errormsg">Please enter a valid name</p>');
        document.getElementById('position').focus();
        return false;
    } else {
        $('#position-err .errormsg').remove();
    }

    const nationality = $('#nationality').val();
   if(nationality.length < 1 ) {
       $('#country-err').html('<p class="errormsg">Please select Country</p>');
       document.getElementById('nationality').focus();
       return false;
   } else {
       $('#country-err .errormsg').remove();
   }


   const state = $('#state').val();
   if(state.length < 1 ) {
       $('#state-err').html('<p class="errormsg">Please enter state</p>');
       document.getElementById('state').focus();
       return false;
   } else {
       $('#state-err .errormsg').remove();
   }
   const city = $('#city').val();
   if(city.length < 1 ) {
       $('#city-err').html('<p class="errormsg">Please enter city</p>');
       document.getElementById('city').focus();
       return false;
   } else {
       $('#city-err .errormsg').remove();
   }
   
   const telephone = $('#telephone').val();
    if(!(telephone.length >= 6 &&  telephone.length <= 13)) {
 //  if(!(telephone.length ===9)) { //|| !$.isNumeric(telephone)
      $('#tel-err').html('<p class="errormsg">Please enter a valid phone number. </p>');
      document.getElementById('telephone').focus();
    //   $('.number-wraper').addClass('active')
      return false;
  } else {
      $('#tel-err .errormsg').remove();
  }

   const mobile = $('#inputNumber').val();
    if(!(mobile.length  >= 6 &&  mobile.length <= 13)) {
 //  if(!(mobile.length ===9)) { //|| !$.isNumeric(mobile)
      $('#mobile-err').html('<p class="errormsg">Please enter a valid mobile number.');
      document.getElementById('inputNumber').focus();
     // $('.number-wraper').addClass('active')
      return false;
  } else {
      $('#mobile-err .errormsg').remove();
  }

//   const fax = $('#inputFax').val();
//   if (!(fax.length >= 6 && fax.length <= 13)) {
//  //  if(!(fax.length ===9)) { //|| !$.isNumeric(fax)
//       $('#fax-err').html('<p class="errormsg">Please enter a valid fax number.');
//       document.getElementById('inputFax').focus();
//       $('.number-wraper').addClass('active')
//       return false;
//   } else {
//       $('#fax-err .errormsg').remove();
//   }
       
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

//    const website = $('#inputWebsite').val();
//    if(website.length < 1 ) {
//        $('#website-err').html('<p class="errormsg">Please select Emirate</p>');
//        document.getElementById('inputWebsite').focus();
//        return false;
//    } else {
//        $('#website-err .errormsg').remove();
//    }
   
// validateAttendance
// Validate 'attend' radio buttons
const attendRadios = document.getElementsByName('attend');
let isAttendValid = false;

for (let i = 0; i < attendRadios.length; i++) {
  if (attendRadios[i].checked) {
    isAttendValid = true;
    break;
  }
}

if (!isAttendValid) {
  $('#attend-err').html('<p class="errormsg">Please select either "shall attend" or "shall not attend"</p>');
  return false;
}

// Validate 'customRadio1'
if (!$("#confirmation").prop("checked")) {
  $('#confirmation-err').html('<p class="errormsg">Please tick the checkbox. </p>');
  return false;
} else {
  $('#confirmation-err .errormsg').remove();
}


// if (!$("#iagree").prop("checked")) {
//     $('#iagree-err').html('<p class="errormsg">Please tick the checkbox . </p>');
//     return false;
//   } else {
//     $('#iagree-err .errormsg').remove();
//   }
  
  if (!$("#consent").prop("checked")) {
    $('#consent-err').html('<p class="errormsg">Please tick the checkbox . </p>');
    return false;
  } else {
    $('#consent-err .errormsg').remove();
  }
// Validate 'customRadio1'
// if (!$("#customRadio1").prop("checked")) {
//   $('#accept-err').html('<p class="errormsg">Please accept the Terms and Conditions</p>');
//   return false;
// } else {
//   $('#accept-err .errormsg').remove();
// }

// Additional code or actions can be placed here if needed

   
    
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