/* ===========================================
   APOTEKKU
   Welcome JavaScript
=========================================== */

document.addEventListener("DOMContentLoaded", function () {

    // =======================================
    // AOS
    // =======================================

    AOS.init({
        duration: 1000,
        once: true,
        offset: 80
    });

    // =======================================
    // Navbar Scroll
    // =======================================

    const navbar = document.querySelector(".navbar");

    window.addEventListener("scroll", function () {

        if (window.scrollY > 40) {

            navbar.classList.add("scrolled");

        } else {

            navbar.classList.remove("scrolled");

        }

    });

    // =======================================
    // Hero Fade
    // =======================================

    const hero = document.querySelector(".hero");

    hero.classList.add("fade-up");

});

/* ===========================================
BUTTON RIPPLE EFFECT
=========================================== */

document.querySelectorAll(".btn").forEach(button=>{

button.addEventListener("click",function(e){

let circle=document.createElement("span");

let diameter=Math.max(this.clientWidth,this.clientHeight);

circle.style.width=diameter+"px";

circle.style.height=diameter+"px";

circle.style.left=e.offsetX-diameter/2+"px";

circle.style.top=e.offsetY-diameter/2+"px";

circle.classList.add("ripple");

let ripple=this.getElementsByClassName("ripple")[0];

if(ripple){

ripple.remove();

}

this.appendChild(circle);

});

});

/* ===========================================
PARALLAX
=========================================== */

document.addEventListener("mousemove",function(e){

const image=document.querySelector(".hero-image");

if(!image) return;

let x=(window.innerWidth/2-e.pageX)/45;

let y=(window.innerHeight/2-e.pageY)/45;

image.style.transform=

"translate("+x+"px,"+y+"px)";

});

/* ===========================================
GLASS GLOW
=========================================== */

const cards=document.querySelectorAll(".glass");

cards.forEach(card=>{

card.addEventListener("mouseenter",()=>{

card.style.boxShadow="0 25px 60px rgba(34,197,94,.35)";

});

card.addEventListener("mouseleave",()=>{

card.style.boxShadow="0 25px 60px rgba(0,0,0,.35)";

});

});

/* ===========================================
SMOOTH SCROLL
=========================================== */

document.querySelectorAll('a[href^="#"]').forEach(anchor=>{

anchor.addEventListener("click",function(e){

e.preventDefault();

const target=document.querySelector(this.getAttribute("href"));

if(target){

target.scrollIntoView({

behavior:"smooth"

});

}

});

});

/* ===========================================
   NAVBAR SCROLL
=========================================== */

window.addEventListener("scroll", function () {

    const navbar = document.querySelector(".navbar");

    if (window.scrollY > 40) {

        navbar.classList.add("scrolled");

    } else {

        navbar.classList.remove("scrolled");

    }

});

/* ===========================================
   HERO TYPING EFFECT
=========================================== */

const typingTitle = document.getElementById("typing-title");

if (typingTitle) {

    const text = "Selamat Datang di APOTEKKU";

    let i = 0;

    function typeWriter(){

        if(i < text.length){

            typingTitle.textContent += text.charAt(i);

            i++;

            setTimeout(typeWriter,70);

        }

    }

    typeWriter();

}