/*global alert*/
/* eslint-env browser */
/* eslint-disable no-unused-vars */
function login(){var x = document.getElementById("register");var y = document.getElementById("login");
                 y.style.display = "block";x.style.display = "none";}

function register(){var x = document.getElementById("register");var y = document.getElementById("login");
                    x.style.display = "block";y.style.display = "none";}

function arrowleft(){var x = document.getElementById("ichigo");var y = document.getElementById("captainamerica");var hero = document.getElementById("hero");
                     if (x.style.display === "none") 
                     {
                         x.style.display = "block";
                         hero.innerHTML = "ichigo";
                         y.style.display = "none";
                     } 
                     else {
                         y.style.display = "block";
                         hero.innerHTML = "captainamerica";
                         x.style.display = "none";
                      }
                    }
function arrowright(){var x = document.getElementById("ichigo");var y = document.getElementById("captainamerica");var hero = document.getElementById("hero");
                     if (x.style.display === "none") 
                     {
                         x.style.display = "block";
                         hero.innerHTML = "ichigo";
                         y.style.display = "none";
                     } 
                     else {
                         y.style.display = "block";
                         hero.innerHTML = "captainamerica";
                         x.style.display = "none";
                      }
                    }
function ichigo(){var x = document.getElementById("A");x.innerHTML = "ichigo";}