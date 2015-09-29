function request_page(pn){
	
	
	if (pn == undefined) {
		pn = 1;
	}

	var result_box = document.getElementById("result_box");
	var pagination_controls = document.getElementById("pagination_controls");
	var month = document.getElementById("month_box").selectedIndex;
	var show = document.getElementById("show_box").selectedIndex;
	

	result_box.innerHTML = "Загрузка ...";
	
	var hr = new XMLHttpRequest();
    hr.open("POST", "php/main_parser.php", true);
    hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {

	    	//alert(hr.responseText);
			var data = JSON.parse(hr.responseText);

			var last = data.control_data.lastpage_num;
			
			html = '<table>';
			html += '<tr class="table-header"><th>ФИО на русском</th><th>ФИО на английском</th><th>Контрактник</th><th>Начислено</th><th>Взносы страховый и песионные</th></th><th>Сумма к выплате</th></tr>';
			for (var o in data) {
				if (data[o].fio_rus) {
					html += '<tr onclick="javascript:toggle_pop(this)"><td>'+data[o].fio_rus+'</td><td>'+data[o].fio_eng+'</td><td>'+data[o].is_contract+'</td><td>'+data[o].income+'</td><td>'+data[o].pensuranse+'</td><td>'+data[o].total_payout+'</td></tr>';
				}
			}
			html += '</table>';
			//alert(html);
			result_box.innerHTML = html;		
		    
		    if(last != 1){
				if (pn > 1) {
					pagination_ctrls += '<button onclick="request_page('+(pn-1)+')">&lt;</button>';
		    	}
				pagination_ctrls += ' &nbsp; &nbsp; <b>Страница '+pn+' из '+last+'</b> &nbsp; &nbsp; ';
		    	if (pn != last) {
		        	pagination_ctrls += '<button onclick="request_page('+(pn+1)+')">&gt;</button>';
		    	}
		    }

		    pagination_controls.innerHTML = pagination_ctrls;
	    }
    }
    
    var vars = "&pn="+pn+"&month="+month+"&show="+show;
    //alert (vars);
    hr.send(vars);
	

	// Создаем Управление страницей
	var pagination_ctrls = "";
    // Кнопки будут видны только когда результатов больше чем 1 страница

}

function setCurrentMoth() {
	var today = new Date();
	var month = today.getMonth();

	month_box = document.getElementById('month_box');
	month_box.selectedIndex = month;
}

function login() {
	
	var username = document.getElementById("username").value;
	var password = document.getElementById("password").value;

	var login_block	= document.getElementById("login-block");
	var login_label = document.getElementById("login-label");



	var hr = new XMLHttpRequest();
	hr.open("POST", "php/login.php", true);
	hr.setRequestHeader ("Content-type", "application/x-www-form-urlencoded");

	hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
	    	//alert(hr.responseText);
	    	
	    	var ary = hr.responseText.split("|");
	    	
	    	if (ary[0] == 1) {
		    	login_block.innerHTML = ary[1];
			} else {
				login_label.innerHTML = ary[1];
			}


	    }
	}
	
	var login_vars = "username="+username+"&password="+password;
	//alert (login_vars);
	hr.send(login_vars);
}


function logout() {
	var hr = new XMLHttpRequest();
	hr.open("POST", "php/logout.php", true);
	hr.setRequestHeader ("Content-type", "application/x-www-form-urlencoded");
	var login_block	= document.getElementById("login-block");


	hr.onreadystatechange = function() {
	    if(hr.readyState == 4 && hr.status == 200) {
	    	//alert(hr.responseText);
	    	if (hr.responseText !== "") {
		    	login_block.innerHTML = hr.responseText;
			}
	    }
	}

	hr.send();
}

function close_pop() {
	//alert('yoqqq!');
	var pop =document.getElementById('popup');
	var over = document.getElementById('overlay');

	pop.style.display = 'none';
	over.style.display = 'none';

}

function toggle_pop(el) {
	var pop =document.getElementById('popup');
	var over = document.getElementById('overlay');
	pop.style.display = 'block';
	
	over.style.opacity = '0.7';
    over.style.cursor = 'pointer';
    over.style.height = '1718px';
    over.style.background = 'rgb(119, 119, 119)';
	over.style.display = 'block';

	//pop.innerHtml = data;

}

setCurrentMoth();
request_page();
//alert (data);