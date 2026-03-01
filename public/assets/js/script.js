function toggleTheme(){
document.body.classList.toggle("dark");
}


/* COUNTER */
const counters=document.querySelectorAll(".counter");
counters.forEach(counter=>{
const update=()=>{
const target=+counter.getAttribute("data-target");
const count=+counter.innerText;
const inc=target/200;
if(count<target){
counter.innerText=Math.ceil(count+inc);
setTimeout(update,20);
}else{
counter.innerText=target;
}
};
if(counter) update();
});

/* RESULTS BAR */
window.onload=()=>{
document.querySelectorAll(".bar span").forEach(bar=>{
bar.style.width=bar.getAttribute("data-width");
});
};

/* SWIPER */
new Swiper(".heroSwiper",{
slidesPerView:1,
loop:true,
autoplay:{
delay:5000,
disableOnInteraction:false
},
pagination:{
el:".hero-pagination",
clickable:true
}
});

new Swiper(".leaderSwiper",{
slidesPerView:1,
loop:true,
autoplay:{delay:3000},
breakpoints:{768:{slidesPerView:2}}
});

/* SCROLL REVEAL */
function reveal(){
document.querySelectorAll(".reveal").forEach(el=>{
const top=el.getBoundingClientRect().top;
if(top<window.innerHeight-100 && !el.classList.contains("active")){
el.classList.add("active");
if(el.querySelector("#indiaMap") && window._indiaMap){
setTimeout(function(){ window._indiaMap.invalidateSize(); }, 1100);
}
}
});
}
window.addEventListener("scroll",reveal);
reveal();

/* Section Dot Navigation */
const sectionDots = document.querySelectorAll(".section-dot");
if(sectionDots.length){
const sectionMap = new Map();
sectionDots.forEach(dot=>{
const target = document.querySelector(dot.getAttribute("href"));
if(target){
sectionMap.set(target, dot);
dot.addEventListener("click", event=>{
event.preventDefault();
target.scrollIntoView({behavior:"smooth", block:"start"});
});
}
});

const observer = new IntersectionObserver(entries=>{
entries.forEach(entry=>{
if(entry.isIntersecting){
sectionDots.forEach(dot=>dot.classList.remove("active"));
const activeDot = sectionMap.get(entry.target);
if(activeDot){
activeDot.classList.add("active");
}
}
});
},{threshold:0.6});

sectionMap.forEach((_, section)=>observer.observe(section));
}


/* our inspiration slider */

new Swiper(".inspirationSwiper",{
effect:"fade",
loop:true,
autoplay:{
delay:5000,
disableOnInteraction:false
},
pagination:{
el:".swiper-pagination",
clickable:true
}
});
 
/* our inspiration model */ 
   
var inspirationSwiper = new Swiper(".inspirationSwiper",{
effect:"fade",
loop:true,
autoplay:{
delay:5000,
disableOnInteraction:false
},
pagination:{
el:".swiper-pagination",
clickable:true
},
on:{
init:function(){
document.getElementById("totalSlides").innerText = this.slides.length - 2;
document.querySelector(".animate-text").classList.add("active");
},
slideChange:function(){
let realIndex = this.realIndex + 1;
document.getElementById("currentSlide").innerText = realIndex;

/* Text animation reset */
document.querySelectorAll(".animate-text").forEach(el=>{
el.classList.remove("active");
});
this.slides[this.activeIndex].querySelector(".animate-text").classList.add("active");
}
}
});
 
/* Press & Media */ 
/* Swiper */
new Swiper(".pressSwiper",{
slidesPerView:1,
spaceBetween:30,
loop:true,
autoplay:{delay:4000},
breakpoints:{
768:{slidesPerView:2},
1024:{slidesPerView:3}
}
});

/* Animated Counter */
const pressCounter=document.querySelector(".press-counter");
if(pressCounter){
let target=+pressCounter.getAttribute("data-target");
let count=0;

function updatePressCounter(){
if(count<target){
count+=2;
pressCounter.innerText=count;
requestAnimationFrame(updatePressCounter);
}else{
pressCounter.innerText=target;
}
}
updatePressCounter();
}

/* Filter */
document.querySelectorAll(".filter-btn").forEach(btn=>{
btn.addEventListener("click",()=>{
document.querySelectorAll(".filter-btn").forEach(b=>b.classList.remove("active"));
btn.classList.add("active");

let filter=btn.getAttribute("data-filter");

document.querySelectorAll(".press-item").forEach(item=>{
if(filter==="all" || item.dataset.category===filter){
item.style.display="block";
}else{
item.style.display="none";
}
});
});
});


/* Animate Progress Bars */
function animateResults(){
document.querySelectorAll(".progress-bar-fill").forEach(bar=>{
bar.style.width = bar.getAttribute("data-width");
});
}

/* Seat Counter Animation */
document.querySelectorAll(".seat-counter").forEach(counter=>{
const target = +counter.getAttribute("data-target");
let count = 0;

function update(){
if(count < target){
count += Math.ceil(target / 100);
counter.innerText = count;
requestAnimationFrame(update);
}else{
counter.innerText = target;
}
}
update();
});

/* Trigger Animation on Scroll */
window.addEventListener("scroll", function(){
const section = document.querySelector(".results-premium");
if(section){
const position = section.getBoundingClientRect().top;
if(position < window.innerHeight - 100){
animateResults();
}
}
});

/* Leaders Slider 

new Swiper(".leadersSwiper",{
slidesPerView:1,
loop:true,
navigation:{
nextEl:".swiper-button-next",
prevEl:".swiper-button-prev"
},
breakpoints:{
768:{slidesPerView:2},
1024:{slidesPerView:3}
}
}); */


/*
const leadersSwiper = new Swiper(".leadersSwiper",{
slidesPerView:3,
centeredSlides:true,
loop:true,
spaceBetween:40,
speed:900, /* Smooth snap 
effect:"coverflow", /* 3D effect 
coverflowEffect:{
rotate:0,
stretch:0,
depth:250,
modifier:1,
slideShadows:false
},
navigation:{
nextEl:".swiper-button-next",
prevEl:".swiper-button-prev"
},
breakpoints:{
0:{slidesPerView:1},
768:{slidesPerView:2},
1024:{slidesPerView:3}
},
on:{
slideChange:function(){
updateBackground(this.realIndex);
}
}
});*/

/* Background Gradient Shift - Not used in simple 4 column layout
function updateBackground(index){
const section = document.querySelector(".leaders-carousel-section");

const gradients = [
"linear-gradient(135deg,#6f8fb3,#4d6f94)",
"linear-gradient(135deg,#7d91b1,#5a6f8d)",
"linear-gradient(135deg,#6c8da7,#4c6b86)",
"linear-gradient(135deg,#7a86a3,#596480)"
];

section.style.background = gradients[index];
}
*/
  
 /* Leader Swiper */

const leadersSwiper = new Swiper(".leadersSwiper",{
slidesPerView:4,
loop:true,
spaceBetween:0,
speed:800,
autoplay:{
delay:3000,
disableOnInteraction:false
},
navigation:{
nextEl:".swiper-button-next",
prevEl:".swiper-button-prev"
},
breakpoints:{
0:{slidesPerView:1},
576:{slidesPerView:2},
768:{slidesPerView:3},
1024:{slidesPerView:4}
}
});
