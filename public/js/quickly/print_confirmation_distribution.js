// const buttons = document.querySelectorAll('.showModal')
// var form = document.querySelectorAll('.need-validation')
// const modalFeather = document.querySelectorAll('.modalFeather')
// const titleBox =document.querySelectorAll('.titleBox')
// const containerContent =document.querySelectorAll('.containerContent');
// var clintName=document.createElement('div');
// var table=document.createElement('table');
// var table_tr=document.createElement('tr');
// var tbody =document.createElement('tbody');
// var btnClear =document.querySelectorAll('.btnClear');
// const inputRead = document.querySelectorAll('.inputRead')
// table.style.border ="1px solid #5bcfc5";
// table.style.width="100%";
// table_tr.style.border="1px solid #f5f5f5";
// buttons.forEach((button,index) => {
//   button.addEventListener('click',function(e){
//     console.log('run');
//     const titleInput=document.querySelectorAll('.titleInput')
//     var parents =document.querySelectorAll('.tr_data');
//     titleBox[index].innerHTML = button.dataset.title;
//     tbody.innerHTML = "";
//       if (!form[index].checkValidity())
//       {
//         e.preventDefault()
//         e.stopPropagation()
//         form[index].classList.add('was-validated')
//       }

//       else{
//         console.log(titleInput[0].textContent.split('*')[0]);
//         console.log(inputRead[0].options[inputRead[0].selectedIndex].text);

//         clintName.innerHTML = `<div class="row">
//         <p>
//         <strong>${titleInput[0].textContent.split('*')[0]}</strong>
//         :
//         <span>${inputRead[0].options[inputRead[0].selectedIndex].text}</span>
//         </p>
//         </div>`;
//         console.log(clintName);
//             containerContent[index].append(clintName);

//             table.innerHTML +=`<thead>
//                     <tr style="
//                     border: 1px solid #5bcfc5;">
//                         <th style="
//                     text-align: center;
//                     padding: 4px; ">الرقم</th>
//                         <th style="
//                     text-align: center;
//                     padding: 4px; ">العميل</th>
//                         <th style="
//                     text-align: center;
//                     padding: 4px; ">الكمية</th>
//                     <th style="
//                     text-align: center;
//                     padding: 4px; ">العمولة</th>
//                     <th style="
//                     text-align: center;
//                     padding: 4px; ">ملاحظة</th>
//                     </tr>
//                 </thead>
//                 `;

//                 let numberRow=1;
//                 for (let index = 0; index < parents.length; index++)
//                     {
//                         if (parents[index].style.display != 'none')
//                     {
//                         const inputRead = parents[index].querySelectorAll('.inputRead')
//                         var total =2;
//                         table_tr.innerHTML +=`
//                                          <td style="
//                                          text-align: center;
//                                          padding: 4px; "> ${numberRow}</td>`;
//                                          numberRow++;
//                         for (let i = 0; i < inputRead.length; i++)
//                         {
//                             if(inputRead[i].tagName === "SELECT")
//                                 {
//                                     table_tr.innerHTML +=`
//                                          <td style="
//                                          text-align: center;
//                                          padding: 4px; ">${inputRead[i].options[inputRead[i].selectedIndex].text}</td>
//                                     `;
//                                 }
//                                 else
//                                 {
//                                     table_tr.innerHTML +=`
//                                          <td style="
//                                          text-align: center;
//                                          padding: 4px; ">${inputRead[i].value}</td>
//                                     `;
//                                 }

//                         }
//                          tbody.innerHTML += table_tr.innerHTML;
//                         table_tr.innerHTML ="";

//                     }
//                 }
//                     table.append(tbody)
//                 containerContent[index].append(table)
//                 $('#print_confirmation').modal('show');
//                 $(modalFeather[index]).modal('hide');
//             }
//     });
//     });

// btnClear.forEach(clear => {
//     clear.addEventListener('click',function(e){
//         table.innerHTML ="";
//     })
// });

const buttons = document.querySelectorAll('.showModal')
var form = document.querySelectorAll('.need-validation')
const modalFeather = document.querySelectorAll('.modalFeather')
const titleBox =document.querySelectorAll('.titleBox')
const containerContent =document.querySelectorAll('.containerContent');
var clintName=document.createElement('div');
var table=document.createElement('table');
var table_tr=document.createElement('tr');
var tbody =document.createElement('tbody');
var btnClear =document.querySelectorAll('.btnClear');
const inputRead = document.querySelectorAll('.inputRead')
table.style.border ="1px solid #5bcfc5";
table.style.width="100%";
table_tr.style.border="1px solid #f5f5f5";
buttons.forEach((button,index) => {
  button.addEventListener('click',function(e){
    console.log('run');
    const titleInput=document.querySelectorAll('.titleInput')
    var parents =document.querySelectorAll('.tr_data');
    titleBox[index].innerHTML = button.dataset.title;
    tbody.innerHTML = "";
      if (!form[index].checkValidity())
      {
        e.preventDefault()
        e.stopPropagation()
        form[index].classList.add('was-validated')
      }

      else{

        console.log(titleInput[0].textContent);
        containerContent[0].innerHTML = `<div class="row title">
        <p>
        <strong>${titleInput[0].textContent.split('*')[0]}</strong>
        :
        <span>${inputRead[0].options[inputRead[0].selectedIndex].text}</span>
        </p>
        </div>`;

            table.innerHTML += table.innerHTML +=`<thead>
                                <tr style="
                                border: 1px solid #5bcfc5;">
                                    <th style="
                                text-align: center;
                                padding: 4px; ">الرقم</th>
                                    <th style="
                                text-align: center;
                                padding: 4px; ">العميل</th>
                                    <th style="
                                text-align: center;
                                padding: 4px; ">الكمية</th>
                                <th style="
                                text-align: center;
                                padding: 4px; ">العمولة</th>
                                <th style="
                                text-align: center;
                                padding: 4px; ">ملاحظة</th>
                                </tr>
                            </thead>
                            `;
                let numberRow=1;
                for (let index = 0; index < parents.length; index++)
                    { if (parents[index].style.display != 'none') {
                        const inputRead = parents[index].querySelectorAll('.inputRead')
                        var total =2;
                        table_tr.innerHTML +=`
                                         <td style="
                                         text-align: center;
                                         padding: 4px; "> ${numberRow}</td>`;
                                         numberRow++;
                        for (let i = 0; i < inputRead.length; i++)
                        {
                            if(inputRead[i].tagName === "SELECT")
                                {
                                    table_tr.innerHTML +=`
                                         <td style="
                                         text-align: center;
                                         padding: 4px; ">${inputRead[i].options[inputRead[i].selectedIndex].text}</td>
                                    `;
                                }
                                else
                                {
                                    table_tr.innerHTML +=`
                                         <td style="
                                         text-align: center;
                                         padding: 4px; ">${inputRead[i].value}</td>
                                    `;
                                }

                        }
                         tbody.innerHTML += table_tr.innerHTML;
                        table_tr.innerHTML ="";

                    }}
                    table.append(tbody)
                containerContent[index].append(table)
                $('#print_confirmation').modal('show');
                $(modalFeather[index]).modal('hide');
            }
    });
    });

btnClear.forEach(clear => {
    clear.addEventListener('click',function(e){
        table.innerHTML ="";
    })
});
