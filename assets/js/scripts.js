function save_in_touch()
{ 
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var company = document.getElementById("company").value;
    var form_type = document.getElementById("form_type").value;
    if(name === ''){
        name = document.getElementById("m-name").value;
    }
    if(email === ''){
        email = document.getElementById("m-email").value;
    }
    if(company === ''){
        company = document.getElementById("m-company").value;
    }
    if(name === ''){
        name = document.getElementById("td-name").value;
    }
    if(email === ''){
        email = document.getElementById("td-email").value;
    }
    if(company === ''){
        company = document.getElementById("td-company").value;
    }
    if(name === ''){
        name = document.getElementById("c-name").value;
    }
    if(email === ''){
        email = document.getElementById("c-email").value;
    }
    if(company === ''){
        company = document.getElementById("c-company").value;
    }
    
    
    
    if(name !== '' && email !== '' && company !== '' && form_type !== ''){
    $.ajax({
        
    	type:"POST",
    	url:"home/getInTouch",
    	data: {'name': name, 'email' : email, 'company': company, 'form_type': form_type},
    	//contentType: 'application/json',
    	success: function(response){
    		//console.log("Completed processes for dept");
    		if(response){
			    console.log(response);
    		}
        
    
    	}
    });
    }
    else{
        return false;
    }
}