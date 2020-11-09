/*global alert*/
/* eslint-env browser */
/* eslint-disable no-unused-vars */
function battle(){
     var a = new XMLHttpRequest();var x = document.getElementById("message");a.onreadystatechange = function(){if(this.readyState == 4 && this.status == 200){x.innerHTML = this.responseText;}};a.open("GET", "battle.php?player1="+name1.value, true);a.send();}
function attack(){
     var a = new XMLHttpRequest();var x = document.getElementById("message");a.onreadystatechange = function(){if(this.readyState == 4 && this.status == 200){x.innerHTML = this.responseText;}};a.open("GET", "attack.php?player1="+name1.value, true);a.send();}
function showplayer(){
     var a = new XMLHttpRequest();var x = document.getElementById("message");a.onreadystatechange = function(){if(this.readyState == 4 && this.status == 200){x.innerHTML = this.responseText;}};a.open("GET", "player.php?player1="+name1.value, true);a.send();}