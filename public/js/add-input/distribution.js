const add = document.getElementById('add');
const inputs = document.getElementById('inputs');
var newElement = document.createElement('tbody');
var senders = document.querySelectorAll('.accounts-client');
var quantity = document.querySelectorAll('.quantity');
var supplyId = document.querySelectorAll('.supplyId');
var form = document.getElementById('validation');
var newItem = document.querySelectorAll('.tr_data');
var rate = document.querySelectorAll('.rate');
var notice = document.querySelectorAll('.notice');
var clintName = document.querySelectorAll('.clintInfo');
var index =1;
console.log(clintName);
function createOption(){
let items = "";
senders.forEach(element => {
   items+= `<option value="${element.value}">${element.innerHTML}</option>`
});
return items;
}
//console.log(createOption());
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
        <select class="form-control form-white clintInfo inputRead " data-placeholder="Choose a color..." name="clintName[]" required>
            <option disabled selected value="">الرجاء اختيار احد العملاء</option>
               ${createOption()}
        </select>
    </td>

    <td>
        <input name="quantity[]" type="number" onblur="getquantity(${index})" class="form-control inputRead quantity"
            id="validationCustom06" placeholder="ادخل الكمية.." required="">
    </td>
    <td>
      <input name="rate[]" type="number" class="form-control inputRead rate"
         id="validationCustom06" placeholder="ادخل العمولة.." value='0'>
    </td>
    <td>
        <input name="notice[]" type="text" class="form-control inputRead notice"
            id="validationCustom06" placeholder="ادخل الملاحظة.." >
    </td>
    <td style="cursor: pointer; padding: 5px; text-align: center" class="delete" onclick="deleteTage(${index})">
        <span class="text-danger fs-4 fw-bold form-control">X</span>
    </td>
</tr>`;

    inputs.append(newElement.lastElementChild)
    quantity = document.querySelectorAll('.quantity');
    newItem = document.querySelectorAll('.tr_data');
    rate = document.querySelectorAll('.rate');
    notice = document.querySelectorAll('.notice');
    clintName = document.querySelectorAll('.clintInfo');

    index++;
}
}

var guantitySupplySelect = supplyId[0].options[supplyId[0].selectedIndex].innerHTML.split('-');
/**
 * [هذه الدالة تأتي بالكمية التوريدة]
 *
 * @return [number]
 *
 */
var supplySelect ;
var supplySelectIndex ;
function getQuantity(){
    for (let index = 0; index < supplyId[0].length; index++) {
        console.log(supplyId.length);
        if(supplySelectIndex === index)
        {
            supplyId[0].options[index].innerHTML = supplySelect;
        }
    }
    supplySelect =supplyId[0].options[supplyId[0].selectedIndex].innerHTML;
    supplySelectIndex = supplyId[0].options.selectedIndex;
}
/**
 * [تقوم هذه الدالة بجمع  جميع القيم وتقوم بطرح المجموع من التوريدة]
 *
 * @param mixed quantityIndex
 *
 * @return [string]
 *
 */
function getquantity(quantityIndex) {
    var total =0
    var numberLast=supplySelect.split('-');
    for (let index = 0; index < quantity.length; index++) {
        total +=Number(quantity[index].value);
        console.log(total);
    }

    if(Number(numberLast[numberLast.length - 1]) < total)
    {
        quantity[quantityIndex].value =0;
    }
    else
    {
        numberLast[numberLast.length - 1] = Number(numberLast[numberLast.length - 1]) - total;
        console.log(numberLast[numberLast.length - 1]);
        supplyId[0].options[supplyId[0].selectedIndex].innerHTML = numberLast[0]+ ' - '+ numberLast[numberLast.length - 1];
    }
    console.log('okay');
}





function deleteTage(tageIndex)
{
    newItem[tageIndex].style.display='none';
    quantity[tageIndex].value ="0";
    getquantity(tageIndex);
    console.log('okay');
    quantity[tageIndex].removeAttribute('name');
    rate[tageIndex].removeAttribute('name');
    notice[tageIndex].removeAttribute('name');
    clintName[tageIndex].removeAttribute('name');

    quantity[tageIndex].classList.remove('inputRead');
    rate[tageIndex].classList.remove('inputRead');
    notice[tageIndex].classList.remove('inputRead');
    clintName[tageIndex].classList.remove('inputRead');

    rate[tageIndex].value ="0";
    notice[tageIndex].value ="0";
    clintName[tageIndex].options.selectedIndex =0;

    quantity[tageIndex].removeAttribute('required');
    rate[tageIndex].removeAttribute('required');
    notice[tageIndex].removeAttribute('required');
    clintName[tageIndex].removeAttribute('required');

    console.log(quantity[tageIndex]);
    console.log(rate[tageIndex]);
    console.log(notice[tageIndex]);
    console.log(clintName[tageIndex]);

}


