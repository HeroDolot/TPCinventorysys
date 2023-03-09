function validatePassword() {
    var password = document.getElementById('pword').value;
    var retype = document.getElementById('retype').value;
    var errorMessage = document.getElementById('error-message');
  
    if (password !== retype) {
      errorMessage.innerHTML = "Passwords do not match";
      document.getElementById("register").setAttribute("disabled", "disabled");
    } else {
      errorMessage.innerHTML = "";
      document.getElementById("register").removeAttribute("disabled");
    }
  }

//   function usernameTaken() {
//     var username = document.getElementById('username').value;
//     var unameTaken = document.getElementById('unameTaken');
//     var usernameValidation = document.getElementById('username-Validation');
//     var xhttp = new XMLHttpRequest();
    

//     xhttp.onreadystatechange = function() {
//       if (this.readyState == 4 && this.status == 200) {
//           if (this.responseText == "taken") {
//               document.getElementById("unameTaken").style.display = "block";
//               event.preventDefault();
//           } else {
//               document.getElementById("registrationForm").submit();
//           }
//       }
//     };
//       xhttp.open("GET", "./../controller/authentication/registration-con.php?uname=" + uname, true);
//       xhttp.send();
// }