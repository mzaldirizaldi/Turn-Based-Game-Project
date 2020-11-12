function bossleft(){var x = document.getElementById("thanos");var y = document.getElementById("madara");var boss = document.getElementById("bossname");
                     if (x.style.display === "none") 
                     {
                         x.style.display = "block";
                         boss.innerHTML = "thanos";
                         y.style.display = "none";
                     } 
                     else {
                         y.style.display = "block";
                         boss.innerHTML = "madara";
                         x.style.display = "none";
                      }
                    }
function bossright(){var x = document.getElementById("thanos");var y = document.getElementById("madara");var boss = document.getElementById("bossname");
                     if (x.style.display === "none") 
                     {
                         x.style.display = "block";
                         boss.innerHTML = "thanos";
                         y.style.display = "none";
                     } 
                     else {
                         y.style.display = "block";
                         boss.innerHTML = "madara";
                         x.style.display = "none";
                      }
                    }

function createroom(){
     var a = new XMLHttpRequest();var b = document.getElementById("b");var x = document.getElementById("message");var z = document.getElementById("register");var y = document.getElementById("login");a.onreadystatechange = function(){if(this.readyState == 4 && this.status == 200){location.reload();}};a.open("GET", "createroom.php?boss="+bossname.innerHTML, true);a.send();}

function roomlist(){
     var a = new XMLHttpRequest();var x = document.getElementById("roomlist");a.onreadystatechange = function(){if(this.readyState == 4 && this.status == 200){x.innerHTML = this.responseText;}};a.open("GET", "room.php?a="+roomid.value, true);a.send();}