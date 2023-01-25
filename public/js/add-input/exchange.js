const add = document.getElementById('add');
const inputs = document.getElementById('inputs');
var form = document.getElementById('need-validation');

console.log(form);
var newElement = document.createElement('tbody');
var senders = document.querySelectorAll('.accounts-senders');
var deleteItem = document.querySelectorAll('.delete');
var newItem = document.querySelectorAll('.tr_data');


var types = document.querySelectorAll('.type');
var senderName = document.querySelectorAll('.senderName');
var dieselQuantity = document.querySelectorAll('.dieselQuantity');
var quantity = document.querySelectorAll('.quantity');


var accountsSenders = [
    [
    {
        index:0,
        type:0,
        value:0,
        ptrol:{
            valueStart:0,
            valueOrder:0,
            valueEnd:0,
        },
        disal:{
            valueStart:0,
            valueOrder:0,
            valueEnd:0,
        },
    }]];
 console.log(typeof(senderName[0].options[senderName[0].selectedIndex].innerHTML));
//  type[number-1].options[type[number-1].selectedIndex].value
    var  clintPrevious=[
        {
            index:0,
            clintPreviousIndex:senderName[0].options.selectedIndex,
         }
    ];
var index =1;
clintPrevious[index-1]=[
    {
        index:0,
        clintPreviousIndex:senderName[0].options.selectedIndex,
     }
];
senders.forEach((sender,i) => {
      accountsSenders[i+1]=[{
        index:i+1,
        type:(sender.value).split('-')[1] == 'بترول' ? 1 : 2,
        name:(sender.value).split('-')[0],
        value:sender.value,
        ptrol:{
            valueStart:(sender.value).split('-')[1] == 'بترول' ? Number((sender.innerHTML).split(' ')[(sender.innerHTML).split(' ').length -1 ]): 0,
            valueOrder:0,
            valueEnd:0,
        },
        disal:{
            valueStart:(sender.value).split('-')[1] == 'بترول' ? 0 : Number((sender.innerHTML).split(' ')[(sender.innerHTML).split(' ').length -1 ]) ,
            valueOrder:0,
            valueEnd:0,
        },
     }];
 });
function createOption(){
    let items = "";
senders.forEach(sender => {
   items+= `<option value="${sender.value}" hidden>${sender.innerHTML}</option>`;
});
return items;
}


function getIndexType(indexType) {

    var selectIndex = senderName[indexType].options.selectedIndex;
    senderName[indexType].options.selectedIndex =0;
 if(types[indexType].options.selectedIndex === 1){
    console.log('ptrol');
    for (let index = 1; index < senderName[indexType].options.length; index++) {

        if (senderName[indexType].options[index].innerHTML.split('-')[1].split(' ')[0] == 'بترول') {
            senderName[indexType].options[index].hidden =false;

            if (Number(senderName[indexType].options[index].innerHTML.split('-')[1].split(' ')[3]) === 0) {
                senderName[indexType].options[index].disabled = true;
                senderName[indexType].options[index].style.color = 'red';
            } else {
                senderName[indexType].options[index].disabled = false;
                senderName[indexType].options[index].style.color = 'black';

                let name =senderName[indexType].options[index].innerHTML.split(' ');
                name[name.length -1] = Number(accountsSenders[index][0].ptrol.valueStart) - Number(accountsSenders[index][0].ptrol.valueOrder);
                senderName[indexType].options[index].innerHTML =name.toString().replace(/,/g,' ');
            }
        }
        else
        {
            senderName[indexType].options[index].hidden =true;
        }
    }
    accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].disal= {...accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].disal, valueOrder: Number(accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].disal.valueOrder) - Number(dieselQuantity[indexType].value)};
    accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].disal= {...accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].disal, valueEnd: Number(accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].disal.valueStart) - Number(accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].disal.valueOrder)};
}

else if(types[indexType].options.selectedIndex === 2){
    console.log('disal');
    for (let index = 1; index < senderName[indexType].options.length; index++) {

        if (senderName[indexType].options[index].innerHTML.split('-')[1].split(' ')[0] == 'ديزل') {
            senderName[indexType].options[index].hidden =false;
            if (Number(senderName[indexType].options[index].innerHTML.split('-')[1].split(' ')[3]) === 0) {
                senderName[indexType].options[index].disabled = true;
                senderName[indexType].options[index].style.color = 'red';
            } else {
                senderName[indexType].options[index].disabled = false;
                senderName[indexType].options[index].style.color = 'black';

                let name =senderName[indexType].options[index].innerHTML.split(' ');
                name[name.length -1] = Number(accountsSenders[index][0].disal.valueStart) - Number(accountsSenders[index][0].disal.valueOrder);
                senderName[indexType].options[index].innerHTML =name.toString().replace(/,/g,' ');
            }
        }
        else
        {
            senderName[indexType].options[index].hidden =true;
        }
    }

    accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].ptrol= {...accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].ptrol, valueOrder: Number(accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].ptrol.valueOrder) - Number(quantity[indexType].value)};
    accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].ptrol= {...accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].ptrol, valueEnd: Number(accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].ptrol.valueStart) - Number(accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].ptrol.valueOrder)};

}
else
{
    console.log("please select any option");
}


}

 function getquantity(quantityIndex) {
    let totalOrderPtrol =0;
    let end =senderName[quantityIndex].options[senderName[quantityIndex].selectedIndex].innerHTML.split(' ');
    if(types[quantityIndex].options.selectedIndex === 1)
    {
        console.log('ptrol');
                if (
                    Number(quantity[quantityIndex].value) >=0
                 && Number(quantity[quantityIndex].value) <= Number(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol.valueStart)
                 && 0 <= Number(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol.valueEnd)
                 && 0 <= Number(end[end.length -1]) - Number(quantity[quantityIndex].value)
                 && 0 <= Number(end[end.length -1])
             )
             {
                    for (let index = 0; index < quantity.length; index++)
                    {
                        if(senderName[quantityIndex].options.selectedIndex === senderName[index].options.selectedIndex && types[index].options.selectedIndex === 1)
                        {
                            totalOrderPtrol +=Number(quantity[index].value);
                        }
                    }
              }
              else
              {
                  quantity[quantityIndex].value = Number(end[end.length -1] ) ;
                  for (let index = 0; index < quantity.length; index++)
                  {
                      if(senderName[quantityIndex].options.selectedIndex === senderName[index].options.selectedIndex && types[index].options.selectedIndex === 1)
                      {
                              totalOrderPtrol +=Number(quantity[index].value);
                      }

                  }
              }
        accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol= {...accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol, valueOrder:totalOrderPtrol}
        accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol.valueEnd = Number(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol.valueStart) -  accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol.valueOrder;
        for (let i = 0; i < senderName.length; i++) {
            for (let index = 1; index < senderName[i].length; index++) {
                if (senderName[i].options[index].innerHTML.split('-')[1].split(' ')[0] == 'بترول') {
                    let name =senderName[i].options[index].innerHTML.split(' ');
                    name[name.length -1] = Number(accountsSenders[index][0].ptrol.valueStart) - Number(accountsSenders[index][0].ptrol.valueOrder);
                    senderName[i].options[index].innerHTML =name.toString().replace(/,/g,' ');
                }
               }
        }
    }
    else
    {
        console.log("please select any option");
    }

}

function getquantityDisal(quantityIndex) {
    let totalOrderDisal = 0;
    let end =senderName[quantityIndex].options[senderName[quantityIndex].selectedIndex].innerHTML.split(' ');
    if(types[quantityIndex].options.selectedIndex === 2)
    {
        console.log('disal');

                if (
                    Number(dieselQuantity[quantityIndex].value) >=0
                 && Number(dieselQuantity[quantityIndex].value) <= Number(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal.valueStart)
                 && 0 <= Number(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal.valueEnd)
                 && 0 <= Number(end[end.length -1]) - Number(dieselQuantity[quantityIndex].value)
                 && 0 <= Number(end[end.length -1])
             )
             {
                    for (let index = 0; index < dieselQuantity.length; index++)
                    {
                        if(senderName[quantityIndex].options.selectedIndex === senderName[index].options.selectedIndex && types[index].options.selectedIndex === 2)
                        {
                                totalOrderDisal +=Number(dieselQuantity[index].value);
                        }

                    }
              }
              else
              {
                dieselQuantity[quantityIndex].value = Number(end[end.length -1]) ;
                  for (let index = 0; index < dieselQuantity.length; index++)
                  {
                      if(senderName[quantityIndex].options.selectedIndex === senderName[index].options.selectedIndex && types[index].options.selectedIndex === 2)
                      {
                        totalOrderDisal +=Number(dieselQuantity[index].value);
                      }

                  }
              }

        accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal= {...accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal, valueOrder:totalOrderDisal}
        accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal.valueEnd = Number(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal.valueStart) -  accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal.valueOrder;
        for (let i = 0; i < senderName.length; i++) {
            for (let index = 1; index < senderName[i].length; index++) {
                if (senderName[i].options[index].innerHTML.split('-')[1].split(' ')[0] == 'ديزل') {
                    let name =senderName[i].options[index].innerHTML.split(' ');
                    name[name.length -1] = Number(accountsSenders[index][0].disal.valueStart) - Number(accountsSenders[index][0].disal.valueOrder);
                    senderName[i].options[index].innerHTML =name.toString().replace(/,/g,' ');
                }
               }
        }
    }

    else
    {
        console.log("please select any option");
    }
}

// add.addEventListener('click', function ()
function addNewRow()
{
    if (!form[0].checkValidity()) {
        form[0].classList.add('was-validated');
        console.log('error');
      }
       else
{
    newElement.innerHTML = `<tr class="tr_data">
    <td>
        <select class="form-control form-white inputRead type" onchange="getIndexType(${index})"
            data-placeholder="Choose a color..." name="type[]" required>
            <option disabled selected value="">الرجاء اختيار نوع البدل</option>
            <option value='0' rel="petrolselect">بترول &#11013; ديزل</option>
            <option value='1' rel="desilselect">ديزل &#11013; بترول</option>
        </select>
    </td>
    <td>
        <select class="form-control form-white  inputRead senderName" onchange="changeQuantityClint(${index})" onclick="changeOtherClint(${index})"
            data-placeholder="Choose a color..." name="senderName[]" required>
            <option disabled selected value="">الرجاء اختيار احد العملاء</option>
               ${createOption()}
    </select>
    </td>
    <td>
        <input name="petrolQuantity[]" type="number" onblur="getquantity(${index})" class="form-control inputRead quantity"
            id="validationCustom06" value="" placeholder="ادخل كمية البترول.." required="">
    </td>
    <td>
        <input name="dieselQuantity[]"  type="number" onblur="getquantityDisal(${index})" class="form-control inputRead dieselQuantity"
        id="validationCustom06" placeholder="ادخل كمية الديزل.." required="">
    </td>

    <td style="cursor: pointer; padding: 5px; text-align: center" onblur="getquantity(${index})" class="delete" onclick="deleteTage(${index})">
        <span class="text-danger fs-4 fw-bold form-control">X</span>
    </td>
</tr>`;

    inputs.append(newElement.lastElementChild);
    newItem = document.querySelectorAll('.tr_data');
    deleteItem =document.querySelectorAll('.delete');
    types=  document.querySelectorAll('.type');
    senderName=  document.querySelectorAll('.senderName');
    dieselQuantity=  document.querySelectorAll('.dieselQuantity');
    quantity=  document.querySelectorAll('.quantity');

    clintPrevious[index]=[
        {
            selectIndex:index,
            clintPreviousIndex:senderName[index].options.selectedIndex,
     }
 ]
     ;

    index++;
 }
}
// )

function changeOtherClint(indexSelectClintClick)
{

    for (let index = 1; index < senderName[indexSelectClintClick].length; index++) {
        if (senderName[indexSelectClintClick].options[index].innerHTML.split('-')[1].split(' ')[0] == 'بترول') {

            let name =senderName[indexSelectClintClick].options[index].innerHTML.split(' ');
            name[name.length -1] = Number(accountsSenders[index][0].ptrol.valueStart) - Number(accountsSenders[index][0].ptrol.valueOrder);
            senderName[indexSelectClintClick].options[index].innerHTML = name.toString().replace(/,/g,' ');
         }
         else if (senderName[indexSelectClintClick].options[index].innerHTML.split('-')[1].split(' ')[0] == 'ديزل') {

            let nameDisal =senderName[indexSelectClintClick].options[index].innerHTML.split(' ');
            nameDisal[nameDisal.length -1] = Number(accountsSenders[index][0].disal.valueStart) - Number(accountsSenders[index][0].disal.valueOrder);
            senderName[indexSelectClintClick].options[index].innerHTML = nameDisal.toString().replace(/,/g,' ');
         }
    }
    for (let index = 1; index < senderName[indexSelectClintClick].options.length; index++) {
        if (Number(senderName[indexSelectClintClick].options[index].innerHTML.split('-')[1].split(' ')[3]) === 0) {

            senderName[indexSelectClintClick].options[index].disabled = true;
            senderName[indexSelectClintClick].options[index].style.color = 'red';
        } else {

            senderName[indexSelectClintClick].options[index].disabled = false;
            senderName[indexSelectClintClick].options[index].style.color = 'black';
        }

    }
}

function changeQuantityClint(indexSelectClint)
{
    let endSelectValue =senderName[indexSelectClint].options[senderName[indexSelectClint].selectedIndex].innerHTML.split(' ');
    console.log(quantity);
    console.log(indexSelectClint);
    console.log(Number(quantity[indexSelectClint].value));
    if (types[indexSelectClint].options.selectedIndex === 1)
    {
        console.log("ptrol");
    if (
            Number(quantity[indexSelectClint].value) >=0
         && Number(quantity[indexSelectClint].value) <= Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol.valueStart)
         && 0 <= Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol.valueEnd)
         && 0 <= Number(endSelectValue[endSelectValue.length -1]) - Number(quantity[indexSelectClint].value)
         && 0 <= Number(endSelectValue[endSelectValue.length -1])
     )
     {
        console.log(quantity);
        console.log(indexSelectClint);
        console.log(Number(quantity[indexSelectClint].value));
        accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].ptrol= {...accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].ptrol, valueOrder: Number(accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].ptrol.valueOrder) - Number(quantity[indexSelectClint].value)};
        accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol ={...accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol,valueOrder:Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol.valueOrder) + Number(quantity[indexSelectClint].value)};
     }
     else if(Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol.valueOrder) >= Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol.valueStart))
     {
        accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol.valueOrder =accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol.valueStart;
     }
     else
     {
        accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].ptrol= {...accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].ptrol, valueOrder: Number(accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].ptrol.valueOrder) - Number(quantity[indexSelectClint].value)};
        quantity[indexSelectClint].value = Number(endSelectValue[endSelectValue.length -1]) ;
        accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol ={...accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol,valueOrder:Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol.valueOrder) + Number(quantity[indexSelectClint].value)};
    }
    console.log(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].ptrol.valueOrder);
    for (let i = 0; i < senderName.length; i++) {
        for (let index = 1; index < senderName[i].length; index++) {
            if (senderName[i].options[index].innerHTML.split('-')[1].split(' ')[0] == 'بترول') {
                let name =senderName[i].options[index].innerHTML.split(' ');
                name[name.length -1] = Number(accountsSenders[index][0].ptrol.valueStart) - Number(accountsSenders[index][0].ptrol.valueOrder);
                senderName[i].options[index].innerHTML =name.toString().replace(/,/g,' ');
            }
           }
    }
    }

    else if (types[indexSelectClint].options.selectedIndex === 2)
    {
        console.log("ptrol");
    if (
            Number(dieselQuantity[indexSelectClint].value) >=0
         && Number(dieselQuantity[indexSelectClint].value) <= Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueStart)
         && 0 <= Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueEnd)
         && 0 <= Number(endSelectValue[endSelectValue.length -1]) - Number(dieselQuantity[indexSelectClint].value)
         && 0 <= Number(endSelectValue[endSelectValue.length -1])
     )
     {
        accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal= {...accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal, valueOrder: Number(accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal.valueOrder) - Number(dieselQuantity[indexSelectClint].value)};
        accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal ={...accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal,valueOrder:Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueOrder) + Number(dieselQuantity[indexSelectClint].value)};
     }
     else if(Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueOrder) >= Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueStart))
     {
        accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueOrder =accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueStart;
     }
     else
     {
        accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal= {...accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal, valueOrder: Number(accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal.valueOrder) - Number(dieselQuantity[indexSelectClint].value)};
        dieselQuantity[indexSelectClint].value = Number(endSelectValue[endSelectValue.length -1]) ;
        accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal ={...accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal,valueOrder:Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueOrder) + Number(dieselQuantity[indexSelectClint].value)};
    }
    for (let i = 0; i < senderName.length; i++) {
        for (let index = 1; index < senderName[i].length; index++) {
            if (senderName[i].options[index].innerHTML.split('-')[1].split(' ')[0] == 'ديزل') {
                let name =senderName[i].options[index].innerHTML.split(' ');
                name[name.length -1] = Number(accountsSenders[index][0].disal.valueStart) - Number(accountsSenders[index][0].disal.valueOrder);
                senderName[i].options[index].innerHTML =name.toString().replace(/,/g,' ');
            }
           }
    }
    }

    else
    {
        console.log("please select any option");
    }
    clintPrevious[indexSelectClint]=[
        {
            selectIndex:index,
            clintPreviousIndex:senderName[indexSelectClint].options.selectedIndex,
        }
    ]
 }

 function deleteTage(tageIndex)
    {
        if (types[tageIndex].options.selectedIndex === 0 || senderName[tageIndex].options.selectedIndex === 0) {

            console.log(true);
            newItem[tageIndex].style.display='none';
            types[tageIndex].removeAttribute('name')
            senderName[tageIndex].removeAttribute('name')
            dieselQuantity[tageIndex].removeAttribute('name')
            quantity[tageIndex].removeAttribute('name')

            types[tageIndex].classList.remove('inputRead')
            senderName[tageIndex].classList.remove('inputRead')
            dieselQuantity[tageIndex].classList.remove('inputRead')
            quantity[tageIndex].classList.remove('inputRead')

            types[tageIndex].options.selectedIndex =0;
            senderName[tageIndex].options.selectedIndex =0;
            dieselQuantity[tageIndex].value ="0";
            quantity[tageIndex].value ="0";

            types[tageIndex].removeAttribute('required')
            senderName[tageIndex].removeAttribute('required')
            dieselQuantity[tageIndex].removeAttribute('required')
            quantity[tageIndex].removeAttribute('required')

        }
        else
        {
            console.log(false);
            var selectIndex = senderName[tageIndex].options.selectedIndex;
            senderName[tageIndex].options.selectedIndex =0;
         if (types[tageIndex].options.selectedIndex === 1) {
            console.log('ptrol');
            for (let index = 1; index < senderName[tageIndex].options.length; index++) {

                if (senderName[tageIndex].options[index].innerHTML.split('-')[1].split(' ')[0] == 'بترول') {
                    senderName[tageIndex].options[index].hidden =false;
                }
                else
                {
                    senderName[tageIndex].options[index].hidden =true;
                }
            }
            accountsSenders[selectIndex][0].ptrol= {...accountsSenders[selectIndex][0].ptrol, valueOrder: Number(accountsSenders[selectIndex][0].ptrol.valueOrder) - Number(quantity[tageIndex].value)}
            for (let i = 0; i < senderName.length; i++) {
                for (let index = 1; index < senderName[i].length; index++) {
                    if (senderName[i].options[index].innerHTML.split('-')[1].split(' ')[0] == 'بترول') {
                        let name =senderName[i].options[index].innerHTML.split(' ');
                        name[name.length -1] = Number(accountsSenders[index][0].ptrol.valueStart) - Number(accountsSenders[index][0].ptrol.valueOrder);
                        senderName[i].options[index].innerHTML =name.toString().replace(/,/g,' ');
                    }
                   }
            }
        }
        else if(types[tageIndex].options.selectedIndex === 2){
            console.log('disal');
            for (let index = 1; index < senderName[tageIndex].options.length; index++) {

                if (senderName[tageIndex].options[index].innerHTML.split('-')[1].split(' ')[0] == 'ديزل') {
                    senderName[tageIndex].options[index].hidden =false;
                }
                else
                {
                    senderName[tageIndex].options[index].hidden =true;
                }
            }
            accountsSenders[selectIndex][0].disal= {...accountsSenders[selectIndex][0].disal, valueOrder: Number(accountsSenders[selectIndex][0].disal.valueOrder) - Number(dieselQuantity[tageIndex].value)}
            for (let i = 0; i < senderName.length; i++) {
                for (let index = 1; index < senderName[i].length; index++) {
                    if (senderName[i].options[index].innerHTML.split('-')[1].split(' ')[0] == 'ديزل') {
                        let name =senderName[i].options[index].innerHTML.split(' ');
                        name[name.length -1] = Number(accountsSenders[index][0].ptrol.valueStart) - Number(accountsSenders[index][0].ptrol.valueOrder);
                        senderName[i].options[index].innerHTML =name.toString().replace(/,/g,' ');
                    }
                   }
            }
        }
        else
        {
            console.log("please select any option");
        }


        newItem[tageIndex].style.display='none';
        types[tageIndex].removeAttribute('name')
        senderName[tageIndex].removeAttribute('name')
        dieselQuantity[tageIndex].removeAttribute('name')
        quantity[tageIndex].removeAttribute('name')


        types[tageIndex].classList.remove('inputRead')
        senderName[tageIndex].classList.remove('inputRead')
        dieselQuantity[tageIndex].classList.remove('inputRead')
        quantity[tageIndex].classList.remove('inputRead')


        types[tageIndex].options.selectedIndex =0;
        senderName[tageIndex].options.selectedIndex =0;
        dieselQuantity[tageIndex].value ="0";
        quantity[tageIndex].value ="0";


        types[tageIndex].removeAttribute('required')
        senderName[tageIndex].removeAttribute('required')
        dieselQuantity[tageIndex].removeAttribute('required')
        quantity[tageIndex].removeAttribute('required')

        }

    }
