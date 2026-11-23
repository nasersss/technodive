const pump_list = document.querySelector('#pumpList');
const accounts_client =document.querySelectorAll('.accounts-client');
const pumps =document.querySelectorAll('.pump-info');
var form = document.getElementById('validation');
const clint_list = document.querySelector("#clint_list");
var clints =document.querySelectorAll('.clints');
var tr_data =document.querySelectorAll('.tr_data');
var quantity =document.querySelectorAll('.quantity');
var notice =document.querySelectorAll('.notice');
var newElement = document.createElement('tbody');
const add = document.getElementById('add');
const inputs = document.getElementById('inputs');
var items;
var index =1;

var clintsInfoPtrol = [];
var clintsInfoDisal = [];
var countPtrol =1;
var countDisal =1;

for (let i = 1; i < clints[0].options.length; i++) {
    console.log(clints[0].options[i].value.split('-')[1] == 'بترول');
    if (clints[0].options[i].value.split('-')[1] == 'بترول')
    {
        console.log('ptrol');
        clintsInfoPtrol[countPtrol] =
        {
            name:clints[0].options[i].innerHTML.split('-')[0],
            type:clints[0].options[i].innerHTML.split('-')[1].split(' ')[0],
            stratValue:Number(clints[0].options[i].innerHTML.split('له')[1].split(' ')[1]),
            quantityValue:0,
            state:0,
        }
        countPtrol++
    }
    else if(clints[0].options[i].value.split('-')[1] == 'ديزل')
    {
        console.log('disal');
        clintsInfoDisal[countDisal] =
        {
            name:clints[0].options[i].innerHTML.split('-')[0],
            type:clints[0].options[i].innerHTML.split('-')[1].split(' ')[0],
            stratValue:Number(clints[0].options[i].innerHTML.split('له')[1].split(' ')[1]),
            quantityValue:0,
            state:0,
        }
        countDisal++;
    }
}

pump_list.addEventListener('change',function (e) {
    let index = e.target.selectedIndex;
    let type_pump= e.target[index].dataset.type_pump;
    for (let index = 0; index < clints.length; index++) {
        clints[index].options.selectedIndex = 0;
    }
        if(type_pump==0){
            items=[];
            accounts_client.forEach(element => {
                element.setAttribute('hidden',true);
                let name = element.value.split('-');
                if(name[1]=='بترول'){
                    element.removeAttribute('hidden')
                    items.push(element);
                }
                    });
        }
        else if (type_pump==1){
            items=[];

            accounts_client.forEach(element => {
                element.setAttribute('hidden',true);
                let name = element.value.split('-');
                if(name[1]=='ديزل'){
                    element.removeAttribute('hidden')
                    items.push(element);
                }
                    });
        }
})


function createOption(){
    var clients = items;

let accountElement = "";
console.log(clients);
clients.forEach(element => {
    accountElement+= `
   <option  value="${element.value}"  class="accounts-client">${element.innerHTML}</option>
   `
});
return accountElement;
}


add.addEventListener('click', function () {
    if (!form[0].checkValidity()) {
        form[0].classList.add('was-validated');
        console.log('error');
      }
       else
{
    newElement.innerHTML = `<tr class="tr_data">
    <td>
        <select class="form-control form-white  inputRead clints"
            data-placeholder="Choose a color..." name="clintName[]" required>
            <option disabled selected value="">الرجاء اختيار احد العملاء</option>
               ${createOption()}
    </select>
    </td>
    <td>
        <input name="quantity[]" type="number" class="form-control inputRead quantity" onblur="sumQuantity(${index})"
            id="validationCustom06" placeholder="ادخل الكمية.." required="">
    </td>
    <td>
        <input name="notice[]" type="text" class="form-control inputRead notice"
            id="validationCustom06" placeholder="ادخل الملاحظة..">
    </td>
    <td style="cursor: pointer; padding: 5px; text-align: center" class="delete" onclick="deleteTage(${index})">
    <span class="text-danger fs-4 fw-bold form-control">X</span>
</td>
</tr>`;
    inputs.append(newElement.lastElementChild)
    tr_data =document.querySelectorAll('.tr_data');
    clints =document.querySelectorAll('.clints');
    quantity =document.querySelectorAll('.quantity');
    notice =document.querySelectorAll('.notice');
    index++;
}
})


/**
 * [get all Quantity the same user and sum Quantity]
 *
 * @param mixed index
 *
 * @return [type]
 *
 */
function sumQuantity(index)
{
    var typePump =pump_list.options[pump_list.selectedIndex].innerHTML.split('(')[1].split(' ')[1];
    var numberClint =clints[index].options[clints[index].selectedIndex].index;
    var totalPtrol =0;
    var totalDisal =0;
    // console.log(typePump[66].split('  '));
    for (let i = 0; i < clints.length; i++) {
    if (typePump == 'بترول') {
       if(numberClint == clints[i].options[clints[i].selectedIndex].index)
       {
        totalPtrol +=Number(quantity[i].value);
        clintsInfoPtrol[numberClint] =
        {
            name:clints[index].options[clints[index].selectedIndex].innerHTML.split('-')[0],
            type:clints[index].options[clints[index].selectedIndex].innerHTML.split('-')[1].split(' ')[0],
            stratValue:clintsInfoPtrol[numberClint].stratValue,
            quantityValue: totalPtrol,
            total:(clintsInfoPtrol[numberClint].stratValue) - totalPtrol,
            state:clintsInfoPtrol[numberClint].total < 0 ? 0:1,
        }
    }
    }
    else if(typePump == 'ديزل')
    {
        if(numberClint == clints[i].options[clints[i].selectedIndex].index)
       {
        totalDisal +=Number(quantity[i].value);
        clintsInfoPtrol[numberClint] =
        {
            name:clints[index].options[clints[index].selectedIndex].innerHTML.split('-')[0],
            type:clints[index].options[clints[index].selectedIndex].innerHTML.split('-')[1].split(' ')[0],
            stratValue:clintsInfoDisal[numberClint].stratValue,
            quantityValue: totalDisal,
            total:(clintsInfoPtrol[numberClint].stratValue) - totalDisal,
            state:clintsInfoPtrol[numberClint].total < 0 ? 0:1,
        }
       }
    }
    else
    {
        console.log('please select any options');
    }
    }

    for (let i = 0; i < clints.length; i++) {
        for (let x = 0; x < clints[i].options.length; x++) {
            typePump =clints[i].options[x].value.split('-')[1];
        if (typePump == 'بترول') {
            if(numberClint == clints[i].options[x].index){
            var letter =clints[i].options[clints[i].selectedIndex].innerHTML.split('له')[1].split(' ')[1];
            clints[i].options[x].innerHTML= clints[i].options[x].innerHTML.replace(letter,clintsInfoPtrol[numberClint].total)
        }}
        }

    }
}
function deleteTage(tageIndex)
{
    tr_data[tageIndex].style.display='none';

    quantity[tageIndex].removeAttribute('name');
    clints[tageIndex].removeAttribute('name');
    notice[tageIndex].removeAttribute('name');

    quantity[tageIndex].classList.remove('inputRead');
    clints[tageIndex].classList.remove('inputRead');
    notice[tageIndex].classList.remove('inputRead');

    quantity[tageIndex].value ="0";
    clints[tageIndex].options.selectedIndex =0;
    notice[tageIndex].value ="0";

    quantity[tageIndex].removeAttribute('required')
    clints[tageIndex].removeAttribute('required')
    notice[tageIndex].removeAttribute('required')
}






