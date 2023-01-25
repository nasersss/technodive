
const inputCheckedClinet=document.querySelectorAll(".inputChecked");
const btnValidationClinet=document.querySelectorAll(".btnValidation");
const errorMassegeClinet = document.querySelectorAll('.errorMassege');
const supplyCheckedClinet=document.querySelectorAll(".supplyChecked");
var quantitySupplyClinet;
var quantitySupply;

inputCheckedClinet[0].addEventListener('change',function(e){
    e.preventDefault();
    quantitySupplyClinet=inputCheckedClinet[0].options[inputCheckedClinet[0].selectedIndex].text.split(' ');
    inputCheckedClinet[1].disabled =false;
    console.log(quantitySupplyClinet[quantitySupplyClinet.length - 2]);
});

supplyCheckedClinet[0].addEventListener('change',function(e){
    e.preventDefault();
    console.log('op');
    quantitySupply=supplyCheckedClinet[0].options[supplyCheckedClinet[0].selectedIndex].text.split(' ');
    inputCheckedClinet[1].disabled =false;
    console.log(quantitySupply[quantitySupply.length - 1]);
});


inputCheckedClinet[1].addEventListener('keyup',function(e){
    e.preventDefault();
     console.log(parseFloat(quantitySupplyClinet[quantitySupplyClinet.length - 2]) >= parseFloat(inputCheckedClinet[1].value)
    , parseFloat(quantitySupply[quantitySupply.length - 1]) >= parseFloat(inputCheckedClinet[1].value)
    , Number(inputCheckedClinet[1].value) > 0);
    if(parseFloat(quantitySupplyClinet[quantitySupplyClinet.length - 2]) >= parseFloat(inputCheckedClinet[1].value)
    && parseFloat(quantitySupply[quantitySupply.length - 1]) >= parseFloat(inputCheckedClinet[1].value)
    && (Number(inputCheckedClinet[1].value) > 0)
    )
    {
        errorMassegeClinet[0].innerHTML="";
        btnValidationClinet[0].disabled =false;
    }

    else
    {
        errorMassegeClinet[0].innerHTML="تأكد من الكمية التي ادخلتها";
        btnValidationClinet[0].disabled =true;
    }
})



// edit item
const inputCheckedEdit=document.querySelectorAll(".inputCheckedEdit");
const btnValidationEdit=document.querySelectorAll(".btnValidationEdit");
const errorMassegeEdit = document.querySelectorAll('.errorMassegeEdit');

console.log('okay');
var quantity;

inputCheckedEdit[0].addEventListener('change',function(e){
    e.preventDefault();
    quantity=inputCheckedEdit[0].options[inputCheckedEdit[0].selectedIndex].text.split(' ');
    inputCheckedEdit[1].disabled =false;
    console.log(quantity[quantity.length-1]);
});

inputCheckedEdit[1].addEventListener('keyup',function(e){
    e.preventDefault();
    if(parseFloat(quantity[quantity.length - 1]) < parseFloat(inputCheckedEdit[1].value) || parseFloat(inputCheckedEdit[1].value) <= 0)
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


