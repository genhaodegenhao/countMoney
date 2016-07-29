
	//开始挑战信息显示和隐藏
	var person_msg = document.getElementById("person_msg");
	var person_false = person_msg.querySelector(".wrap_false");
	person_false.onclick = function(){
		person_msg.style.display = "none";
		bgcolor.style.display = "none";
	}
	var show_msg = document.getElementById("show_msg");
	show_msg.onclick = function(){
		person_msg.style.display = "block";
		bgcolor.style.display = "block";
	}
	
	//规则信息显示
	var wrap = document.getElementById("wrap");
	var lis = wrap.getElementsByTagName("li");
	var rules = document.getElementById("rules");
	var rules_divs = rules.getElementsByTagName("div");
	var bgcolor = document.getElementById("bgcolor");
	
	for (var i=0;i<rules_divs.length;i++) {
		rules_divs[i].index=i;				
		rules_divs[i].onclick=function(){
			for (var i=0;i<rules_divs.length;i++) {
				lis[i].className="";
		}
		lis[this.index].className="wrap_show";
		bgcolor.style.display = "block";
		}
	}		
	//规则信息隐藏
	var wrap_false = wrap.querySelectorAll(".wrap_false");
	for (i=0;i<wrap_false.length;i++) {
		wrap_false[i].index = i;
		wrap_false[i].onclick = function(){
			lis[this.index].className = "";
		bgcolor.style.display = "none";
		}
	}









