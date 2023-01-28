const buttons = document.querySelectorAll('.showModal')
const forms = document.querySelectorAll('.validation')
const modalFeather = document.querySelectorAll('.modalFeather')
const titleInput=document.querySelectorAll('.titleInput')
const inputRead = document.querySelectorAll('.inputRead')
console.log(titleInput);
const titleBox =document.querySelectorAll('.titleBox')
const containerContent =document.querySelectorAll('.containerContent');
var newElement=document.createElement('div');
var btnClear =document.querySelectorAll('.btnClear');
console.log('okay');
console.log(inputRead);
buttons.forEach((button,index) => {
  button.addEventListener('click',function(e){
    titleBox[index].innerHTML = button.dataset.title;
      if (!forms[index].checkValidity())
      {
        e.preventDefault()
        e.stopPropagation()
        forms[index].classList.add('was-validated')
      }

      else{
            for (let i = 0; i < titleInput.length; i++)
                {
                    if(inputRead[i].tagName === "SELECT")
                    {
                        console.log('run ture');
                        newElement.innerHTML +=`
                        <div class="row">
                        <p>
                        <strong>${titleInput[i].textContent.split('*')[0]}</strong>
                        :
                        <span>${inputRead[i].options[inputRead[i].selectedIndex].text}</span>
                        </p>
                        </div>`;
                        containerContent[index].append(newElement)
                    }
                    else
                    {
                        console.log('run false');
                        newElement.innerHTML +=`
                        <div class="row">
                        <p>
                        <strong>${titleInput[i].textContent.split('*')[0]}</strong>
                        :
                        <span>${inputRead[i].value}</span>
                        </p>
                        </div>`;
                        containerContent[index].append(newElement)
                    }
                }

                $('#print_confirmation').modal('show');
                $(modalFeather[index]).modal('hide');
            }
    });
    });

btnClear.forEach(clear => {
    clear.addEventListener('click',function(e){
        newElement.innerHTML ="";
    })
});
