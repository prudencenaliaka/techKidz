
$(document).ready(function(){
  $("#sec1").hide();
  $("#sec2").hide();
  $("#btn1").click(function(){
    $("#sec2").fadeOut(2000),
    $("#sec1").fadeIn(2000),
  })
  $("#btn2").click(function(){
    $("#sec1").fadeOut(2000),
    $("#sec2").fadeIn(2000),
  })
})
})

const button   = document.querySelector('.submit-button'),
      stateMsg = document.querySelector('.pre-state-msg');

const updateButtonMsg = function() {
  button.classList.add('state-1', 'animated');

  setTimeout(finalButtonMsg, 2000);
};

const finalButtonMsg = function() {
  button.classList.add('state-2');

  setTimeout(setInitialButtonState, 2000);
};

const setInitialButtonState = function() {
  button.classList.remove('state-1', 'state-2', 'animated');
};

button.addEventListener('click', updateButtonMsg);
