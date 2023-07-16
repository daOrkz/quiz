

<script type="text/javascript">

let form = document.forms[1];
let message = document.getElementById('info-message');



form.addEventListener('submit', function(e){

  e.preventDefault();
  
  let correct   = document.querySelector('#correct');
  let incorrect = document.querySelector('#incorrect');

  if(correct.checked) {
    
    renderCorrectMessage();

    return form.submit();

  }

  renderIncorrectMessage();

})


function renderCorrectMessage(){
  let container = '';
    message.innerHTML = ' '
    container +=
    `
      <div class="alert alert-info" role="alert">
        <h5 class="mb-0"> Верный ответ! </h5>
      </div>
    `;
    message.insertAdjacentHTML('afterbegin', container);
}

function renderIncorrectMessage(){
  let container = '';
    message.innerHTML = ' '
    container +=
    `
      <div class="alert alert-danger" role="alert">
        <h5 class="mb-0"> Не верный ответ! </h5>
      </div>
    `;
    message.insertAdjacentHTML('afterbegin', container);
}


</script>
