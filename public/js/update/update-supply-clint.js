	//edit clint
	const edit =document.querySelectorAll('.edit');
	document.querySelectorAll('.edit').forEach(item => {

			item.addEventListener('click', e => {
			document.getElementById("id").value =item.dataset.id;
 			document.getElementById("notice").value =item.dataset.notice;
			document.getElementById("quantity").value =item.dataset.quantity;
			document.getElementById("rate").value =item.dataset.rate;
			

			const selectClint = document.querySelector("#clintName");
			const selectSupply = document.querySelector("#supplyId");
			console.log(item.dataset.supply_id);
			console.log(selectSupply);
			for(var i=0; i < selectClint.options.length; i++)
			{
					if(selectClint.options[i].text === item.dataset.name)
					{
						selectClint.selectedIndex = i;
						break;
					}
			}
	
			for(var i=0; i < selectSupply.options.length; i++)
			{
				
					if(selectSupply.options[i].value === item.dataset.supply_id)
					{
						selectSupply.selectedIndex = i;
						break;
					}
			}
	
			$('#editModal').modal('show');
		})
	})
