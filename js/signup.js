$(function () {
  $("#datepicker").datepicker({
        autoclose: true,
        todayHighlight: true
  }).datepicker('update', new Date());
});

// var f = document.getElementsByTagName("form")[0];
//
// f.addEventListener("submit", function(event){
//   event.preventDefault();
//
//   // First Name
//   if(this['firstName'].value.length <= 3)
//   {
//     this['firstName'].nextElementSibling.innerHTML = "Invalid";
//   }
//
//   // lastName
//   if(this['lastName'].value == "")
//   {
//     this['lastName'].nextElementSibling.innerHTML = "Invalid";
//   }
//
//   if(this['about'].value.length <= 3)
//   {
//     this['about'].nextElementSibling.innerHTML = "Invalid";
//   }
//
//   // Email
//   if(!((this['email'].value=="")  ||     (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(this['email'].value))))
//   {
//     this['email'].nextElementSibling.innerHTML = "Invalid";
//
//   }
//
//   // Address
//   if(this['address'].value.length <= 3)
//   {
//     this['address'].nextElementSibling.innerHTML = "Invalid";
//   }
//
//   // country
//   if(this['country'].value == "")
//   {
//     this['country'].nextElementSibling.innerHTML = "Invalid";
//   }
//
//   // state
//   if(this['state'].value == "")
//   {
//     this['state'].nextElementSibling.innerHTML = "Invalid";
//   }
//
//   //Education
//   if(this['edu'].value == "")
//   {
//     this['edu'].nextElementSibling.innerHTML = "Invalid";
//   }
//
//   // Zip
//   if (!((/^[0-9]*$/.test(this['zip'].value)) && (this['zip'].value.length == 6)))
//   {
//     this['zip'].nextElementSibling.innerHTML = "Invalid";
//   }
//
//   // Contact
//   if (!((/^[0-9]*$/.test(this['contact'].value)) && (this['contact'].value.length == 6)))
//   {
//     this['contact'].nextElementSibling.innerHTML = "Invalid";
//   }
//
// });
