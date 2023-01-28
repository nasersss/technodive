const add = document.getElementById('add');
var forms = document.querySelectorAll('.validation')
const inputs = document.getElementById('inputs');
var newElement=document.createElement('div');
var type =document.querySelectorAll('.type');
var numberOfCoupons =document.querySelectorAll('.numberOfCoupons');
var quantities =document.querySelectorAll('.quantity');
var total =document.querySelectorAll('.total');
var tr_data= document.querySelectorAll('.tr_data');
var copunts =document.querySelectorAll('.copunts');
const informationClint =document.getElementById('informationClintType');
const informationClintWithAcountType =document.getElementById('informationClintWithAcountType');
const massegeError = document.getElementById('massegeError');
var ptrolQuantityClint;
var disalQuantityClint;
var ptrolTage;
var disalTage ;
var totaltypes = [{index:0,type:0,value:0,ptrolValue:0,disalValue:0}];
var sumPtrol=0;
var sumDisal =0;
var index =2 ;
var coun =0;

var ptrol ={
    strat:0,
    order:0,
    end:0
}
var disal = {
    strat:0,
    order:0,
    end:0
}

console.log(forms[0]);
 function checkAcoutnClint()
{
    ptrolQuantityClint = informationClintWithAcountType.options[informationClintWithAcountType.selectedIndex].innerHTML.split('|')[1].split(' ')[4];
    disalQuantityClint = informationClintWithAcountType.options[informationClintWithAcountType.selectedIndex].innerHTML.split('|')[2].split(' ')[4];

    if(Number(ptrolQuantityClint) <= 0)
    {
       type.forEach((selectType,index) => {
           selectType.options[1].disabled = true;
           selectType.options[1].style.color="red";
           selectType.options[1].innerHTML=" بترول " ;
           ptrolTage = `<option value="0" disabled style="color:red">بترول</option>`;
       });
    }
    else
    {
        type.forEach((selectType,index) => {
           selectType.options[1].disabled = false;
           selectType.options[1].style.color="black";
           selectType.options[1].innerHTML="بترول " ;
           ptrolTage=`<option value="0">المتبقي من البترول ${ptrol.end}</option>`;
        })
    }

    if(Number(disalQuantityClint) <= 0)
    {
       type.forEach((selectType,index) => {
           selectType.options[2].disabled = true;
           selectType.options[2].style.color="red";
           selectType.options[2].innerHTML=" ديزل   "  ;
           disalTage = `<option value="1" disabled style="color:red">ديزل</option>`;
       });
    }
    else
    {
        type.forEach((selectType,index) => {
           selectType.options[2].disabled = false;
           selectType.options[2].style.color="black";
           selectType.options[2].innerHTML="ديزل" ;
           disalTage = `<option value="1">المتبقي من الديزل ${disal.end}</option>`;
        })
    }
}

informationClintWithAcountType.addEventListener('change',function(e){
    e.preventDefault();
    ptrolQuantityClint = informationClintWithAcountType.options[informationClintWithAcountType.selectedIndex].innerHTML.split('|')[1].split(' ')[4];
    disalQuantityClint = informationClintWithAcountType.options[informationClintWithAcountType.selectedIndex].innerHTML.split('|')[2].split(' ')[4];
    ptrol.strat =Number(ptrolQuantityClint);
    disal.strat =Number(disalQuantityClint);
    checkAcoutnClint();
    copunts.forEach(copunt => {
        copunt.remove();
    });
    type[0].selectedIndex =0;
    numberOfCoupons[0].value=0;
    quantities[0].value =0;
    total[0].value=0;
    sumPtrol=0;
    sumDisal =0;
    document.getElementById('totalPtrol').innerHTML =`
            <span  class=" fw-bold" >رصيد العميل من البترول  = ${ptrol.strat} </span>
            <br>
            <span  class=" fw-bold" >رصيد القسائم من البترول  = ${ptrol.order} </span>
            <br>
            <span  class=" fw-bold" >----------------------------------------</span>
            <br>
            <span  class=" fw-bold" >الرصيد المتبقي من البترول  = ${ptrol.end} </span>
    `;
    document.getElementById('totalDisal').innerHTML =`
            <span  class=" fw-bold" >رصيد العميل من الديزل  = ${disal.strat} </span>
            <br>
            <span  class=" fw-bold" >رصيد القسائم من الديزل  = ${disal.order} </span>
            <br>
            <span  class=" fw-bold" >----------------------------------------</span>
            <br>
            <span  class=" fw-bold" >الرصيد المتبقي من الديزل  = ${disal.end} </span>
    `;
    // for (let i = 1; i < informationClintWithAcountType.options.length; i++) {
    //     var typeAcoutWithName = "";
    //     for (let index = 1; index < informationClint.options.length; index++) {
    //         if(informationClintWithAcountType.options[i].innerHTML.split(' | ')[0].split(" ")[0] === informationClint.options[index].innerHTML.split('-')[0].split(" ")[0])
    //         {
    //              typeAcoutWithName +=" "+ informationClint.options[index].innerHTML.split('-')[1] + " | ";
    //         }
    //     }
    //     informationClintWithAcountType.options[i].innerHTML =informationClintWithAcountType.options[i].innerHTML.split('|')[0]+ ' | '+typeAcoutWithName;
    // }

console.log(ptrolQuantityClint);
console.log(disalQuantityClint);
index =2
})
for (let i = 1; i < informationClintWithAcountType.options.length; i++) {
    var typeAcoutWithName = " | ";
    var sum =0;
    let fullName=(informationClintWithAcountType.options[i].innerHTML).toString().split(' ');
    for (let index = 1; index < informationClint.options.length; index++) {
        let fullNameSelect =(informationClint.options[index].innerHTML.split('-')[0]).toString().split(' ');
        if((informationClintWithAcountType.options[i].innerHTML).toString() === (informationClint.options[index].innerHTML.split('-')[0]).toString()
         && Number(fullName.length) === Number(fullNameSelect.length))
        {
             typeAcoutWithName +=" "+ informationClint.options[index].innerHTML.split('-')[1] + " | " ;
             sum +=Number(informationClint.options[index].innerHTML.split('-')[1].split(' ')[2]);
        }
    }
    if(sum == 0)
    {
        informationClintWithAcountType.options[i].innerHTML +=typeAcoutWithName;
        informationClintWithAcountType.options[i].style.display='none';
    }
    else
    {
        informationClintWithAcountType.options[i].innerHTML +=typeAcoutWithName;
    }
    
    console.log(informationClintWithAcountType.options[i].innerHTML);
}
console.log(informationClintWithAcountType.options[1].innerHTML.split('|')[2].split(' ')[4]);;

//add new element
add.addEventListener('click',function(e){
e.preventDefault();
console.log(true);
checkAcoutnClint();
if (!forms[0].checkValidity()) {
    console.log("true");
    forms[0].classList.add('was-validated');
  }
   else
 {
     newElement.innerHTML =`<div class="row tr_data border my-3 copunt">
    <div class="mb-3 col-3">
        <label class="col-lg-12 col-form-label titleInput" for="validationCustom05">النوع
            <span class="text-danger">*</span>
        </label>
        <div class="col-lg-12">
    <select class="form-control form-white inputRead type" onchange="getTotalFromnumberOfCouponAndquantity(${index})" data-placeholder="Choose a color..." name="type[]" required>
        <option disabled selected value="">الرجاء اختيار  نوع الكمية</option>
        ${ptrolTage}
        ${disalTage}
        </select>
 <div class="invalid-feedback">
                                            الرجاء اختار النوع
                                            </div>
    </div>
    </div>
    <div class="mb-3 col-3">
        <label class="col-lg-12 col-form-label titleInput" for="validationCustom02">عدد القسائم<span class="text-danger">*</span>
        </label>
        <div class="col-lg-12">
            <input name="numberOfCoupons[]" type="number"  onkeyup="getTotalFromnumberOfCouponAndquantity(${index})" class="form-control form-control-sm inputRead numberOfCoupons" id="validationCustom02" placeholder="ادخل عدد القسائم" required="">
            <div class="invalid-feedback">
                الرجاء ادخال  عدد القسائم
            </div>
        </div>
    </div>
    <div class="mb-3 col-3">
        <label class="col-lg-12 col-form-label titleInput" for="validationCustom06">الكمية
            <span class="text-danger">*</span>
        </label>
        <div class="col-lg-12">
            <input name="quantity[]" type="number" onkeyup="getTotalFromnumberOfCouponAndquantity(${index})" class="form-control inputRead quantity" id="validationCustom06" placeholder="ادخل الكمية.." required="">
            <div class="invalid-feedback">
                يرجاء ادخل الكمية بشكل صحيح
            </div>
        </div>
    </div>
    <div class="mb-3 col-2">
    <label class="col-lg-12 col-form-label titleInput" for="validationCustom06">المجموع
    </label>
    <div class="col-lg-12">
        <input name="total[]" type="number" disabled class="form-control inputRead total" id="validationCustom06" placeholder="0" required="">
    </div>
</div>
<div class="col-1 mb-3" style="direction: ltr;">
    <label class="col-12" title="حذف">
        <span class="text-danger fs-4 fw-bold"  style="cursor: pointer;" onclick="deleteTage(${index})" >X</span>
    </label>
</div>
</div>
    `;

    inputs.append(newElement.lastElementChild);
    type =document.querySelectorAll('.type');
    numberOfCoupons =document.querySelectorAll('.numberOfCoupons');
    quantities =document.querySelectorAll('.quantity');
    total =document.querySelectorAll('.total');
    tr_data =document.querySelectorAll('.tr_data');
    copunts =document.querySelectorAll('.copunt');
    coun++;
    index++;

 }
 });



//delete tage
function deleteTage(number)
{
    console.log(number  - 1);
    let index = number - 1
    console.log(tr_data[index]);
    // console.log(number);
    console.log(type[index].options[type[index].selectedIndex].value);
    tr_data[index].style.color='red';
    tr_data[index].style.display='none';

    if( Number(type[index].options[type[index].selectedIndex].value) === 0)
    {
        console.log('ptrol');
        totaltypes[index]=[{index: index, type: type[index].options[type[index].selectedIndex].value, value: total[index].value,ptrolValue:0,disalValue:0 }];
    }
    else if(Number(type[index].options[type[index].selectedIndex].value) === 1)
    {
        console.log('disal');
        totaltypes[index]=[{index: index, type: type[index].options[type[index].selectedIndex].value, value: total[index].value,ptrolValue:0,disalValue:0 }];
    }
    else
    {
        console.log("please select any option");
    }

    sumPtrol =0;
    sumDisal = 0;
    for (let index = 0; index < totaltypes.length; index++) {
        sumPtrol+=Number(totaltypes[index][0].ptrolValue);
        sumDisal+=Number(totaltypes[index][0].disalValue);
        ptrol.order=sumPtrol;
        disal.order = sumDisal;
    }

    informationClintWithAcountType.options[informationClintWithAcountType.selectedIndex].innerHTML=
    informationClintWithAcountType.options[informationClintWithAcountType.selectedIndex].innerHTML.split('|')[0] + " | " +
    ' بترول الرصيد ' + (( Number(ptrol.strat)  - Number(ptrol.order) )).toString()  +" | " + ' ديزل الرصيد ' + (( Number(disal.strat)  - Number(disal.order) )).toString()  +" | ";
    ptrol.end =Number(ptrol.strat)  - Number(ptrol.order);
    disal.end = Number(disal.strat)  - Number(disal.order);

    document.getElementById('totalPtrol').innerHTML =`
    <span  class=" fw-bold" >رصيد العميل من البترول  = ${ptrol.strat} </span>
    <br>
    <span  class=" fw-bold" >رصيد القسائم من البترول  = ${ptrol.order} </span>
    <br>
    <span  class=" fw-bold" >----------------------------------------</span>
    <br>
    <span  class=" fw-bold" >الرصيد المتبقي من البترول  =  ${Number(ptrol.strat)  - Number(ptrol.order)} </span>
`;

    document.getElementById('totalDisal').innerHTML =`
    <span  class=" fw-bold" >رصيد العميل من الديزل  = ${disal.strat} </span>
    <br>
    <span  class=" fw-bold" >رصيد القسائم من الديزل  = ${disal.order} </span>
    <br>
    <span  class=" fw-bold" >----------------------------------------</span>
    <br>
    <span  class=" fw-bold" >الرصيد المتبقي من الديزل  = ${Number(disal.strat)  - Number(disal.order)} </span>
`;

     total[index].removeAttribute('name');
     type[index].removeAttribute('name');
     numberOfCoupons[index].removeAttribute('name');
     quantities[index].removeAttribute('name');

     total[index].removeAttribute('required');
     type[index].removeAttribute('required');
     numberOfCoupons[index].removeAttribute('required');
     quantities[index].removeAttribute('required');

     total[index].classList.remove('inputRead');
     type[index].classList.remove('inputRead');
     numberOfCoupons[index].classList.remove('inputRead');
     quantities[index].classList.remove('inputRead');

 }

function getTotalFromnumberOfCouponAndquantity(number)
{
        sumPtrol =0;
        sumDisal = 0;
        checkAcoutnClint();
        let indexItem = number-1;
        console.log(indexItem);
        if(total[indexItem].value < 0 || numberOfCoupons[indexItem].value < 0 ||  quantities[indexItem].value < 0)
        {
            numberOfCoupons[indexItem].value =0;
            quantities[indexItem].value =0
        }
        total[indexItem].value =numberOfCoupons[indexItem].value * quantities[indexItem].value;
        if(totaltypes.length < number)
        {
            totaltypes.push({index: indexItem, type: Number(type[indexItem].options[type[indexItem].selectedIndex].value), value: total[indexItem].value });
        }
        else
        {
            if( type[indexItem].options[type[indexItem].selectedIndex].value == "0")
            {
                if ( Number(total[indexItem].value) > Number(ptrol.strat) ) {
                    console.log('this value biggier need');
                    total[indexItem].value = total[indexItem].value;
                    numberOfCoupons[indexItem].value = "";
                    quantities[indexItem].value ="" ;
                    total[indexItem].value ="";
                }

                totaltypes[indexItem]=[{index: indexItem, type: type[indexItem].options[type[indexItem].selectedIndex].value, value: total[indexItem].value,ptrolValue:total[indexItem].value,disalValue:0 }];
            }
            else if(type[indexItem].options[type[indexItem].selectedIndex].value == "1")
            {
                if ( Number(total[indexItem].value) > Number(disal.strat) ) {
                    console.log('this value biggier need');
                    total[indexItem].value = total[indexItem].value;
                    numberOfCoupons[indexItem].value = "";
                    quantities[indexItem].value ="" ;
                    total[indexItem].value ="";
                }

                totaltypes[indexItem]=[{index: indexItem, type: type[indexItem].options[type[indexItem].selectedIndex].value, value: total[indexItem].value,ptrolValue:0,disalValue:total[indexItem].value }];
            }
            else
            {
                console.log("please select any option");
            }
            sumPtrol =0;
            sumDisal = 0;
            for (let index = 0; index < totaltypes.length; index++) {
                sumPtrol+=Number(totaltypes[index][0].ptrolValue);
                sumDisal+=Number(totaltypes[index][0].disalValue);
                ptrol.order=sumPtrol;
                disal.order = sumDisal;
            }

            informationClintWithAcountType.options[informationClintWithAcountType.selectedIndex].innerHTML=
            informationClintWithAcountType.options[informationClintWithAcountType.selectedIndex].innerHTML.split('|')[0] + " | " +
            ' بترول الرصيد ' + (( Number(ptrol.strat)  - Number(ptrol.order) )) .toString() +" | " + ' ديزل الرصيد ' + (( Number(disal.strat)  - Number(disal.order) )).toString()  +" | ";

        }
        checkAcoutnClint();
        ptrol.end =Number(ptrol.strat)  - Number(ptrol.order);
        disal.end = Number(disal.strat)  - Number(disal.order);
        document.getElementById('totalPtrol').innerHTML =`
        <span  class=" fw-bold" >رصيد العميل من البترول  = ${ptrol.strat} </span>
        <br>
        <span  class=" fw-bold" >رصيد القسائم من البترول  = ${ptrol.order} </span>
        <br>
        <span  class=" fw-bold" >----------------------------------------</span>
        <br>
        <span  class=" fw-bold" >الرصيد المتبقي من البترول  =  ${Number(ptrol.strat)  - Number(ptrol.order)} </span>
`;
document.getElementById('totalDisal').innerHTML =`
        <span  class=" fw-bold" >رصيد العميل من الديزل  = ${disal.strat} </span>
        <br>
        <span  class=" fw-bold" >رصيد القسائم من الديزل  = ${disal.order} </span>
        <br>
        <span  class=" fw-bold" >----------------------------------------</span>
        <br>
        <span  class=" fw-bold" >الرصيد المتبقي من الديزل  = ${Number(disal.strat)  - Number(disal.order)} </span>
`;
}
