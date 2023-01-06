
    function validate(){

      var firstname = document.myform.fname.value;
      var lastname = document.myform.lname.value;
      var email = document.myform.email.value;
      var mobileno = document.myform.number.value;
      var password = document.myform.password.value;
      var cpassword = document.myform.cpassword.value;
      var birthdate = document.getElementById('mybday').value;
      var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
      var passwordformat = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/; 
      if(firstname == ""|| firstname==null){
           alert("First name cannot be empty");
          return false;
      }
      else if(lastname == "" || lastname == null){
          alert("Last name can not be empty");
          return false;
      }
       if(email == "" ||email == null){
          alert("email can not be empty");
          return false;
      }
    else if(filter.test(email)){

    }  else{
        alert("You entered invalid Email syntax ");
        return false;
    }

     if(mobileno == "" || mobileno== null){
          alert("mobileno can not be empty");
          return false;
      }
      else if(isNaN(mobileno)){
        alert("Enter Numeric value only");
          return false;
      }
      else if(mobileno.length !==10){
        alert("The number of digits should be ten");
        return false;
      }
      if(password ==""||password==null){
        alert("password can not be Empty.");
        return false;
      }
      else if(passwordformat.test(password)){

      }else{
        alert("you enterd invalid password formats");
        return false;
      }
       if(password !== cpassword){
        alert("Please Enter the correct password");
        return false;
      }
      if(birthdate == ""|| birthdate==null){
        alert("** Choose your birtdate ");
        return false;
      }
    
    }