var website = "";
var name = "";

var year = 0;
var month = 0;
var day = 0;
var hour = 0;
var minute = 0;
var seconds = 0;

var isOver = false;

function instantiateInfo(timestamp, recount, url, nameTimer){
	var time = parseInt(timestamp);
	var loop = parseInt(recount);
	
	website = url;
	name = nameTimer;
	
	do{
		if(time >= 31536000){
			year++;
			time -= 31536000;
		} else if(time >= 2592000 && time < 31536000){
			month++;
			time -= 2592000;
		} else if(time >= 86400 && time < 2592000){
			day++;
			time -= 86400;
		} else if(time >= 3600 && time < 86400){
			hour++;
			time -= 3600;
		} else if(time >= 60 && time < 3600){
			minute++;
			time -= 60;
		} else if(time < 60){
			seconds = time;
			time = 0;
		}
	} while(time>0);
	
	instantiateTimer(loop);
}

function instantiateTimer(recount){
	var timerShow = document.getElementById('showTimerTime');
	
	if(isOver){
		timerShow.innerHTML = "TIMER IS OVER";
		
		$('#btnRecount').removeClass('disabled');
		
		Notification.requestPermission(/* opcional: callback */);

		callNotification();
	} else{
		timerShow.innerHTML = year + ":" + month + ":" + day + ":" + minute + ":" + seconds;
		
		if (year <= 0 && month <= 0 && day <= 0 && hour <= 0 && minute <= 0 && seconds <= 0){
		isOver = true;
	} else if (month <= 0 && day <= 0 && hour <= 0 && minute <= 0 && seconds <= 0){
		year--;
		month = 11;
		day = 29;
		hour = 23;
		minute = 59;
		seconds = 59;
	} else if (day <= 0 && hour <= 0 && minute <= 0 && seconds <= 0){
		month--;
		day = 29;
		hour = 23;
		minute = 59;
		seconds = 59;
	} else if (hour <= 0 && minute <= 0 && seconds <= 0){
		day--;
		hour = 23;
		minute = 59;
		seconds = 59;
	} else if (minute <= 0 && seconds <= 0){
		hour--;
		minute = 59;
		seconds = 59;
	} else if(seconds <= 0){
		minute--;
		seconds = 59;
	}
	
	seconds--;
	
	setTimeout(instantiateTimer, 1000);
	}
}

function callNotification(){	
	var title = "Timercoin";
	var image = "http://i.stack.imgur.com/dmHl0.png";
	var message = "The timer " + name + " has over. Click here to access the website.";
	var link = website;
	
	var notification = new Notification(title, {
		icon: image,
		body: message
	});
	notification.onclick = function() {
		window.open(link);
	}
}

function restartCounter(idTimer){
	$.ajax({
	   type: "POST",
	   url: "@validations/timer-update-count.php",
	   data: {index:idTimer},
	   success: function(data)
	   {
		   alert(data);
		   location.reload();
	   }
	});
}