function request_page(pn){
	
	var results_box = document.getElementById("result_box");
	var pagination_controls = document.getElementById("pagination_controls");
	
	results_box.innerHTML = "loading results ...";
	
	var hr = new XMLHttpRequest();
    hr.open("POST", "pagination_parser.php", true);
    hr.setRequestHeader("Content-type", "application/json");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
			
			var data = JSON.parse(hr.responseText);
			alert(data);
			var json = eval(<?php echo)
			results_box.innerHTML = data['object']['id'];
	    }
    }
    
    hr.send("rpp="+rpp+"&last="+last+"&pn="+pn);
	// Change the pagination controls
	var paginationCtrls = "";
    // Only if there is more than 1 page worth of results give the user pagination controls
    if(last != 1){
		if (pn > 1) {
			paginationCtrls += '<button onclick="request_page('+(pn-1)+')">&lt;</button>';
    	}
		paginationCtrls += ' &nbsp; &nbsp; <b>Page '+pn+' of '+last+'</b> &nbsp; &nbsp; ';
    	if (pn != last) {
        	paginationCtrls += '<button onclick="request_page('+(pn+1)+')">&gt;</button>';
    	}
    }
	pagination_controls.innerHTML = paginationCtrls;
}
