<!DOCTYPE html>
<html lang="en">
<head>
 <title>Bootstrap Example</title>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.orange-indigo.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
   <div class="row">
    <div class="col-md-12">
                   <div class="row">
                       <div class="col-md-12">
                      <h3><center> <img src="sd.PNG" width="5%"/>  
                                    Firebase Phone Auththentication With Laravel</center></h3>
                       </div>
                   </div>        
               <div>
                   
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                     <input class="mdl-textfield__input" id="phoneNumber" type="text" pattern="\+[0-9\s\-\(\)]+" 

                                                         id="phone-number">
                     <label class="mdl-textfield__label" for="phone-number">
                                                         Enter your Mobile number..</label>
                     <span class="mdl-textfield__error">Input is not an international M number!</span>
                   </div>
                     
                   <button class="btn btn-primary" id="sign-in-button">Sign-in</button>
                 
       
                 <button class="mdl-button mdl-js-button mdl-button--raised" id="sign-out-button">
                 Sign-out</button>
                 <form id="verification-code-form">          
                   <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                     <input class="mdl-textfield__input" type="text" id="verification-code">
                     <label class="mdl-textfield__label" for="verification-code">
                      Enter the verification code...</label>
                   </div>
                   <input type="submit" class="btn btn-success" 

                    id="verify-code-button" value="Verify Code"/>       
                   <button class="btn btn-danger" id="cancel-verify-code-button">Cancel</button>
                 </form>
               </div> 
   </div>
   </div>
   <br />
   <br />
   <div class="row">
       <div class="col-md-12">
           <div class="card card-default">
               <div class="card-header">
                   <div class="row">
                       <div class="col-md-12">
                           <h4>User Login Information</h4>
                       </div>
                   </div>
               </div>

               <div>
                   <div>
                       Firebase sign-in status: <span id="sign-in-status">Unknown</span>
                       <div>Firebase auth <code>User Details</code> object value:</div>
                       <pre><code id="account-details">No User Login</code></pre>
                   </div>
               </div>      
           </div>
       </div>
   </div>
</div>
<script src="{{ asset('frontend/js/vendor/jquery.min.js') }}"></script>

<script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-app.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-auth.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/7.15.5/firebase-analytics.js"></script>

<script type="text/javascript">
  // Your web app's Firebase configuration
  var firebaseConfig = {
    apiKey: "AIzaSyB6jDtylQrNgNCpGy6QMu8AnqNHMhFMNnA",
    authDomain: "ponnny-ad521.firebaseapp.com",
    databaseURL: "https://ponnny-ad521.firebaseio.com",
    projectId: "ponnny-ad521",
    storageBucket: "ponnny-ad521.appspot.com",
    messagingSenderId: "933810852198",
    appId: "1:933810852198:web:61c8219cf638dc316cf8a7",
    measurementId: "G-4YHPZBJT1K"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();

  window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('sign-in-button', {
  'size': 'invisible',
  'callback': function(response) {
    // reCAPTCHA solved, allow signInWithPhoneNumber.
    onSignInSubmit();
  }
});
 window.confirmationResult; 


$('#sign-in-button').click(function(){

  var phoneNumber = $('#phoneNumber').val();
  var appVerifier = window.recaptchaVerifier;
  firebase.auth().signInWithPhoneNumber(phoneNumber, appVerifier)
  .then(function (confirmationResult) {
    // SMS sent. Prompt user to type the code from the message, then sign the
    // user in with confirmationResult.confirm(code).
    window.confirmationResult = confirmationResult;
    alert('s');


  }).catch(function (error) {
    // Error; SMS not sent
    // ...
    alert('n');
  });

});

$('#verify-code-button').click(function(){
    var code = $('#verification-code').val();
    confirmationResult.confirm(code).then(function (result) {
      // User signed in successfully.
      var user = result.user;
      var uid = user.uid;
     var email = user.email;
     var photoURL = user.photoURL;
     var phoneNumber = user.phoneNumber;
     var isAnonymous = user.isAnonymous;
     var displayName = user.displayName;
     var providerData = user.providerData;
     var emailVerified = user.emailVerified;
      console.log(user);
      // ...
    }).catch(function (error) {
      // User couldn't sign in (bad verification code?)
      // ...
      console.log(error);
    });
});


</script>

</body>
</html>