const header=document.getElementById('header'),nav=document.getElementById('nav'),menu=document.getElementById('menu'),hero=document.querySelector('.hero-image'),feature=document.querySelector('.feature-photo');
menu.addEventListener('click',()=>nav.classList.toggle('open'));
nav.querySelectorAll('a').forEach(a=>a.addEventListener('click',()=>nav.classList.remove('open')));
function scrollFx(){
 const y=window.scrollY;
 header.classList.toggle('scrolled',y>35);
 if(window.innerWidth>700 && y<window.innerHeight*1.15) hero.style.transform=`translate3d(0,${y*.16}px,0) scale(1.04)`;
}
window.addEventListener('scroll',scrollFx,{passive:true});scrollFx();
const counters=document.querySelectorAll('[data-count]');let done=false;
const obs=new IntersectionObserver(es=>{if(es.some(e=>e.isIntersecting)&&!done){done=true;counters.forEach(el=>{let end=+el.dataset.count,start=0;let t=setInterval(()=>{start+=Math.ceil(end/25);if(start>=end){start=end;clearInterval(t)}el.textContent=start},35)})}},{threshold:.4});
obs.observe(document.querySelector('.stats'));
