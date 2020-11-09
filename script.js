/*global alert*/
/* eslint-env browser */
/* eslint-disable no-unused-vars */
function registerbutton(){
     var a = new XMLHttpRequest();var b = document.getElementById("b");var x = document.getElementById("aku");a.onreadystatechange = function(){if(this.readyState == 4 && this.status == 200){x.innerHTML = this.responseText;}};a.open("GET", "register.php?c="+username.value+"&d="+password.value+"&b="+email.value+"&hero="+hero.innerHTML, true);a.send();}
function loginbutton(){
     var a = new XMLHttpRequest();var x = document.getElementById("aku");a.onreadystatechange = function(){if(this.readyState == 4 && this.status == 200){x.innerHTML = this.responseText;}};a.open("GET", "login.php?a="+usernamelogin.value+"&b="+passwordlogin.value, true);a.send();}