function ulti(){
     var a = new XMLHttpRequest();var y = document.getElementById("name");a.onreadystatechange = function(){if(this.readyState == 4 && this.status == 200){y.innerHTML = this.responseText;}};a.open("GET", "skill2.php?", true);a.send();}