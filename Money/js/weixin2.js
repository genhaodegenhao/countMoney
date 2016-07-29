
var text = document.getElementById("text");
var divs=text.getElementsByTagName("div");
var index=0;
	function showe(){
		index++;
		if(index>2){
			index=0;
		}
		for (i=0;i<divs.length;i++) {
			divs[i].className="";
		}
		divs[index].className="show";
	}
	setInterval(showe,3000);

//滑动手指的时候钱向上运动
var qian = document.getElementById("qian");
var pointer = document.getElementById("pointer");
var count = document.getElementById("count");
var spans = count.getElementsByTagName("span");
var num = 5;

function bl(s){
	return s<10?"0"+s:s;
}

var arr = [];
var score = "";
function clock_time(){
	num--;
	spans[3].innerHTML = bl(num);
	if (num<=0) {
		clearInterval(timer);
		arr[0] = b;
		arr[1] = s;
		arr[2] = g;
//		console.log(arr);
		var score = arr.join("");				//获得总的成绩
//		alert("您的成绩为"+defen);
//		return defen;
		
		var box =document.getElementById("box");
		var boxer = document.getElementById("boxer");
		box.style.display = "none";
		boxer.style.display = "block";
		
		var url = "defen.php?openid="+openid+"&score="+score;
		requestByGET(url,function(score){
			var highScore = document.getElementById("highScore");
			highScore.innerHTML = score;
			
			var url4 = "getRanking.php?score="+score;
			requestByGET(url4,function(res){
				var rank = document.getElementById("rank");
				console.log(res);
				rank.innerHTML = res+"位";
			});
			
		});
		var total = document.getElementById("total");
		total.innerHTML = "￥" + score; 
		
		var again = document.getElementById("again");
		again.onclick = function(){
			window.location.href = "weixin1.html";
		}
	}
}

var timer = setInterval(clock_time,1000);
qian.onclick = function(){
	addCount();
	if (qian.className == "") {
		qian.className = "active4";
	}else{
		qian.className = "";
	}
	if (pointer.className == "") {
		pointer.className = "active5";
	}else{
		pointer.className = "";
	}
}

var g = 0;
var s = 0;
var b = 0;
function addCount(){
	g++;								//个位数随着点击每次加1
	if (g<=9) {						//当个位数小于等于9时
		spans[2].innerHTML = g;		//个位数每次加1
	}else{							//否者当个位数大于9时，
		spans[2].innerHTML = 0;		//个位数清零
		g=0;							
		s++;							//每当个位数大于9时，十位数加1
		if (s<=9) {					//当十位数小于9时
			spans[1].innerHTML  = s;		//十位数每次加1
		}else{						//当十位数大于9时
			b++;						//百分位加1
			s=0;						//十分位清零
			spans[1].innerHTML = s;
			spans[0].innerHTML = b;
		}
	}
}





















