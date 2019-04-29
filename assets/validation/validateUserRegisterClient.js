function validateName (input) {
  if (input.value.length < 2 || input.value.length > 10) {
      // Input is fine. Reset error message.
      input.setCustomValidity('Length at least 2 characters and maximum 10 characters');
  }
  else{
    input.setCustomValidity('');
  }
}

function validateUserName (input) {
  if (input.value.length < 4 || input.value.length > 8) {
      // Input is fine. Reset error message.
      input.setCustomValidity('User name minimum 4 characters and maximum 8 characters');
  }
  else{
    input.setCustomValidity('');
  }
}

function validatePassword (input) {
  if (input.value.length < 6 || input.value.length > 12) {
    input.setCustomValidity('Password length minimum 6 and maximum 12 characters');
  }
  else {
    input.setCustomValidity('');
  }
}

function validateConfirmPassword(input){
  if (input.value !== document.getElementsByName('password')[0].value) {
    input.setCustomValidity('Both passwords must match!');
  }
  else {
    input.setCustomValidity('');
  }
}