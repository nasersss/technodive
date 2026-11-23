const add = document.getElementById('add');
const inputs = document.getElementById('inputs');
var form = document.getElementById('validation');

var newElement = document.createElement('tbody');
var senders = document.querySelectorAll('.accounts-senders');
var deleteItem = document.querySelectorAll('.delete');
var newItem = document.querySelectorAll('.tr_data');


var types = document.querySelectorAll('.type');
var senderName = document.querySelectorAll('.senderName');
var recipientName = document.querySelectorAll('.recipientName');
var quantity = document.querySelectorAll('.quantity');
var rate = document.querySelectorAll('.rate');
var notice = document.querySelectorAll('.notice');


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
    accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].disal= {...accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].disal, valueOrder: Number(accountsSenders[clintPrevious[indexType][0].clintPreviousIndex][0].disal.valueOrder) - Number(quantity[indexType].value)};
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
    let totalOrderDisal = 0;
    let end =senderName[quantityIndex].options[senderName[quantityIndex].selectedIndex].innerHTML.split(' ');

     if(types[quantityIndex].options.selectedIndex === 1)
    {

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
                        console.log(senderName[quantityIndex].options.selectedIndex === senderName[index].options.selectedIndex);
                        console.log(types[index].options.selectedIndex === 1);
                        if(senderName[quantityIndex].options.selectedIndex === senderName[index].options.selectedIndex && types[index].options.selectedIndex === 1)
                        {
                                console.log(totalOrderPtrol,'totalOrderPtrol');
                                totalOrderPtrol +=Number(quantity[index].value);
                                console.log('one');
                                console.log(totalOrderPtrol,'totalOrderPtrol');
                                console.log(Number(quantity[index].value),'Number(quantity[index].value)');
                                console.log(Number(end[end.length -1]),'Number(end[end.length -1])');

                        }

                    }
              }
              else
              {
                  quantity[quantityIndex].value = Number(end[end.length -1]) ;
                  for (let index = 0; index < quantity.length; index++)
                  {
                      if(senderName[quantityIndex].options.selectedIndex === senderName[index].options.selectedIndex && types[index].options.selectedIndex === 1)
                      {
                              totalOrderPtrol +=Number(quantity[index].value);
                              console.log('tow');

                      }

                  }
              }

        console.log( accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol);
        accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol= {...accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol, valueOrder:totalOrderPtrol}
        console.log( accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol);
        console.log(totalOrderPtrol);
        accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol.valueEnd = Number(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol.valueStart) -  accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol.valueOrder;
        console.log(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol);
        for (let i = 0; i < senderName.length; i++) {
            for (let index = 1; index < senderName[i].length; index++) {
                if (senderName[i].options[index].innerHTML.split('-')[1].split(' ')[0] == 'بترول') {
                    let name =senderName[i].options[index].innerHTML.split(' ');
                    name[name.length -1] = Number(accountsSenders[index][0].ptrol.valueStart) - Number(accountsSenders[index][0].ptrol.valueOrder);
                    senderName[i].options[index].innerHTML = name.toString().replace(/,/g,' ');
                }
               }
        }


        console.log(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].ptrol);
    }



    else  if(types[quantityIndex].options.selectedIndex === 2)
    {

                if (
                    Number(quantity[quantityIndex].value) >=0
                 && Number(quantity[quantityIndex].value) <= Number(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal.valueStart)
                 && 0 <= Number(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal.valueEnd)
                 && 0 <= Number(end[end.length -1]) - Number(quantity[quantityIndex].value)
                 && 0 <= Number(end[end.length -1])
             )
             {
                    for (let index = 0; index < quantity.length; index++)
                    {
                        if(senderName[quantityIndex].options.selectedIndex === senderName[index].options.selectedIndex && types[index].options.selectedIndex === 2)
                        {
                                totalOrderDisal +=Number(quantity[index].value);
                        }
                        // else
                        // {
                        //     totalOrderDisal =Number(end[end.length -1]);
                        //  }
                    }
              }
              else
              {
                  quantity[quantityIndex].value = Number(end[end.length -1]) ;
                  for (let index = 0; index < quantity.length; index++)
                  {
                      if(senderName[quantityIndex].options.selectedIndex === senderName[index].options.selectedIndex && types[index].options.selectedIndex === 2)
                      {
                        totalOrderDisal +=Number(quantity[index].value);
                      }
                    //   else
                    //   {
                    //     totalOrderDisal =Number(end[end.length -1]);
                    //   }
                  }
              }


        accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal= {...accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal, valueOrder:totalOrderDisal}
        accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal.valueEnd = Number(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal.valueStart) -  accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal.valueOrder;
        console.log(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal);
        for (let i = 0; i < senderName.length; i++) {
            for (let index = 1; index < senderName[i].length; index++) {
                if (senderName[i].options[index].innerHTML.split('-')[1].split(' ')[0] == 'ديزل') {
                    let name =senderName[i].options[index].innerHTML.split(' ');
                    name[name.length -1] = Number(accountsSenders[index][0].disal.valueStart) - Number(accountsSenders[index][0].disal.valueOrder);
                    senderName[i].options[index].innerHTML =name.toString().replace(/,/g,' ');
                }
               }
        }


        console.log(accountsSenders[senderName[quantityIndex].options.selectedIndex][0].disal);
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
            <option disabled selected value="">حدد النوع</option>
            <option value="0">بترول</option>
            <option value="1">ديزل</option>
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
        <input name="quantity[]" type="number" onblur="getquantity(${index})" class="form-control inputRead quantity"
            id="validationCustom06" value="" placeholder="ادخل الكمية.." required="">
    </td>
    <td style="cursor: pointer; padding: 5px; text-align: center" class="delete" onclick="deleteTage(${index})">
        <span class="text-danger fs-4 fw-bold form-control">X</span>
    </td>
</tr>`;

    inputs.append(newElement.lastElementChild);
    newItem = document.querySelectorAll('.tr_data');
    deleteItem =document.querySelectorAll('.delete');
    types=  document.querySelectorAll('.type');
    senderName=  document.querySelectorAll('.senderName');
    recipientName=  document.querySelectorAll('.recipientName');
    quantity=  document.querySelectorAll('.quantity');
    rate=  document.querySelectorAll('.rate');
    notice=  document.querySelectorAll('.notice');
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
            Number(quantity[indexSelectClint].value) >=0
         && Number(quantity[indexSelectClint].value) <= Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueStart)
         && 0 <= Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueEnd)
         && 0 <= Number(endSelectValue[endSelectValue.length -1]) - Number(quantity[indexSelectClint].value)
         && 0 <= Number(endSelectValue[endSelectValue.length -1])
     )
     {
        accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal= {...accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal, valueOrder: Number(accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal.valueOrder) - Number(quantity[indexSelectClint].value)};
        accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal ={...accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal,valueOrder:Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueOrder) + Number(quantity[indexSelectClint].value)};
     }
     else if(Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueOrder) >= Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueStart))
     {
        accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueOrder =accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueStart;
     }
     else
     {
        accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal= {...accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal, valueOrder: Number(accountsSenders[clintPrevious[indexSelectClint][0].clintPreviousIndex][0].disal.valueOrder) - Number(quantity[indexSelectClint].value)};
        quantity[indexSelectClint].value = Number(endSelectValue[endSelectValue.length -1]) ;
        accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal ={...accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal,valueOrder:Number(accountsSenders[senderName[indexSelectClint].options.selectedIndex][0].disal.valueOrder) + Number(quantity[indexSelectClint].value)};
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

            console.log(tageIndex);
            newItem[tageIndex].style.display='none';
            types[tageIndex].removeAttribute('name')
            senderName[tageIndex].removeAttribute('name')
            quantity[tageIndex].removeAttribute('name')

            types[tageIndex].classList.remove('inputRead')
            senderName[tageIndex].classList.remove('inputRead')
            quantity[tageIndex].classList.remove('inputRead')

            types[tageIndex].options.selectedIndex =0;
            senderName[tageIndex].options.selectedIndex =0;
            quantity[tageIndex].value ="0";

            types[tageIndex].removeAttribute('required')
            senderName[tageIndex].removeAttribute('required')
            quantity[tageIndex].removeAttribute('required')
        }
        else 
        {
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
            accountsSenders[selectIndex][0].disal= {...accountsSenders[selectIndex][0].disal, valueOrder: Number(accountsSenders[selectIndex][0].disal.valueOrder) - Number(quantity[tageIndex].value)}
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
        console.log(tageIndex);
        newItem[tageIndex].style.display='none';
        types[tageIndex].removeAttribute('name')
        senderName[tageIndex].removeAttribute('name')
        quantity[tageIndex].removeAttribute('name')

        types[tageIndex].classList.remove('inputRead')
        senderName[tageIndex].classList.remove('inputRead')
        quantity[tageIndex].classList.remove('inputRead')

        types[tageIndex].options.selectedIndex =0;
        senderName[tageIndex].options.selectedIndex =0;
        quantity[tageIndex].value ="0";

        types[tageIndex].removeAttribute('required')
        senderName[tageIndex].removeAttribute('required')
        quantity[tageIndex].removeAttribute('required')

        }

    }
