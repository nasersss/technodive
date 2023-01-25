//add new item
const inputChecked=document.querySelectorAll(".inputChecked");
const btnValidation=document.querySelectorAll(".btnValidation");
const errorMassege = document.querySelectorAll('.errorMassege');
const supplyChecked=document.querySelectorAll(".supplyChecked");
console.log('okay');
console.log(btnValidation);
var quantity;
var quantitySupply;

inputChecked[0].addEventListener('change',function(e){
    e.preventDefault();
    quantity=inputChecked[0].options[inputChecked[0].selectedIndex].text.split(' ');
    inputChecked[1].disabled =false;
    console.log(quantity[quantity.length-2]);
});

inputChecked[1].addEventListener('keyup',function(e){
    e.preventDefault();
    console.log('select');
    if(parseFloat(quantity[quantity.length-2]) < parseFloat(inputChecked[1].value) || parseFloat(inputChecked[1].value) <= 0)
    {
        errorMassege[0].innerHTML="تأكد من الكمية التي ادخلتها";
        btnValidation[0].disabled =true;
        console.log(parseFloat(inputChecked[1].value));
    }

    else
    {
        errorMassege[0].innerHTML="";
        btnValidation[0].disabled =false;
    }
})

inputChecked[2].addEventListener('keyup',function(e){
    e.preventDefault();
    console.log('select');
    if(parseFloat(quantity[quantity.length-2]) < parseFloat(inputChecked[2].value) || parseFloat(inputChecked[2].value) <= 0)
    {
        errorMassege[1].innerHTML="تأكد من الكمية التي ادخلتها";
        btnValidation[0].disabled =true;
        console.log(parseFloat(inputChecked[2].value));
    }

    else
    {
        errorMassege[1].innerHTML="";
        btnValidation[0].disabled =false;
    }
})

console.log('run');



// edit item

const inputCheckedEdit=document.querySelectorAll(".inputCheckedEdit");
const btnValidationEdit=document.querySelectorAll(".btnValidationEdit");
const errorMassegeEdit = document.querySelectorAll('.errorMassegeEdit');
const supplyCheckedEdit=document.querySelectorAll(".supplyCheckedEdit");

var quantitySupplyEdit;


console.log(btnValidationEdit);
var quantity;

inputCheckedEdit[0].addEventListener('change',function(e){
    e.preventDefault();
    quantity=inputCheckedEdit[0].options[inputCheckedEdit[0].selectedIndex].text.split(' ');
    inputCheckedEdit[1].disabled =false;
    console.log(quantity[quantity.length-2]);
});

inputCheckedEdit[1].addEventListener('keyup',function(e){
    e.preventDefault();
    if(parseFloat(quantity[quantity.length - 2]) < parseFloat(inputCheckedEdit[1].value) || parseFloat(inputCheckedEdit[1].value) <= 0)
    {
        errorMassegeEdit[0].innerHTML="تأكد من الكمية التي ادخلتها";
        btnValidationEdit[0].disabled =true;
        console.log(parseFloat(inputCheckedEdit[1].value));
    }
    else
    {
        errorMassegeEdit[0].innerHTML="";
        btnValidationEdit[0].disabled =false;
    }
})



supplyCheckedEdit[0].addEventListener('change',function(e){
    e.preventDefault();
    quantitySupplyEdit=supplyCheckedEdit[0].options[supplyCheckedEdit[0].selectedIndex].text.split(' ');
    supplyCheckedEdit[1].disabled =false;
    console.log(quantitySupplyEdit[quantitySupplyEdit.length - 1]);
});

supplyCheckedEdit[1].addEventListener('keyup',function(e){
    e.preventDefault();
    console.log(quantitySupplyEdit);
    if(parseFloat(quantitySupplyEdit[quantitySupplyEdit.length - 1]) < parseFloat(supplyCheckedEdit[1].value) || parseFloat(supplyCheckedEdit[1].value) <= 0)
    {
        errorMassegeEdit[0].innerHTML="تأكد من الكمية التي ادخلتها";
        btnValidationEdit[0].disabled =true;
        console.log(parseFloat(supplyCheckedEdit[1].value));
    }
    else
    {
        errorMassegeEdit[0].innerHTML="";
        btnValidationEdit[0].disabled =false;
    }
})

