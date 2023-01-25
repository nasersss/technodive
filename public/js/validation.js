(function () {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
      .forEach(function (form) {
        form.addEventListener('submit', function (event) {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
  })()



//validation for all form
// var requierd = "هذا الحقل مطلوب";
// const addSupplirs = document.getElementById('addSupplirs');
// const name = document.getElementById('name');
// const address = document.getElementById('address');
// const phone = document.getElementById('phone');
// const accountNumber = document.getElementById('accountNumber');

// addSupplirs.addEventListener('submit', (e) => {
//     e.preventDefault();
//     if (name.value == "" || name.value == null && address.value == "" || address.value == null && phone.value == "" || phone.value == null)
//     {
//         const alert = document.getElementById('alert').innerHTML= requierd;
//         const alertAddress = document.getElementById('alertAddress').innerHTML = requierd;
//         const alertPhone = document.getElementById('alertPhone').innerHTML = requierd;
//         const alertAccountNumber = document.getElementById('alertAccountNumber').innerHTML= requierd;
//     }
//     else if (phone.value.match(/^777[\d/g]/) && phone.value.length == 9) 
//         {
//             const alertPhone = document.getElementById('alertPhone').innerHTML = "يجب التحقق من كتابة الرقم بشكل صحيح";
//         } 
        
//   else {
//         const alert = document.getElementById('alert').innerHTML= "";
//         const alertAddress = document.getElementById('alertAddress').innerHTML= "";
//         const alertPhone = document.getElementById('alertPhone').innerHTML= "";
//         const alertAccountNumber = document.getElementById('alertAccountNumber').innerHTML= "";
//     }
    
// });