const suppliesList = document.querySelectorAll('.suppliesSelectedList');
const suppliesAccount =document.querySelectorAll('.supplies-account');
const tankList = document.querySelectorAll('.tank-list');
const tank_type = document.querySelectorAll('.typeTank');
 var quantityTank;

 tank_type.forEach((tank,index) => {
    tank.addEventListener('change',function(e){
        e.preventDefault();
        quantityTank =tank.options[tank.selectedIndex].text.split(' ');
       if (tank.options[tank.selectedIndex].dataset.type_tank == 0 )
       {
            console.log('run');
            suppliesList[index].options.selectedIndex = 0;
            suppliesAccount.forEach(element => {
                element.setAttribute('hidden',true);
                var  name = element.dataset.name.split(' ');
                var  quantitySupplay = element.dataset.quantity.split(' ');
                if(name[name.length - 1]=='بترول')
                {
                    element.removeAttribute('hidden')
                }
            });
         }

       else if (tank.options[tank.selectedIndex].dataset.type_tank == 1)
       {
        suppliesList[index].options.selectedIndex = 0;
        suppliesAccount.forEach(element => {
            element.setAttribute('hidden',true);
            var  name = element.dataset.name.split(' ');
            var  quantitySupplay = element.dataset.quantity.split(' ');
            if(name[name.length - 1]=='ديزل')
            {
                element.removeAttribute('hidden');
            }
         });
       }

       else{
        console.log("please select any option");
       }

    })

 });
