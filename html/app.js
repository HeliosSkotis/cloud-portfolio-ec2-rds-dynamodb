const $=(s,r=document)=>[...r.querySelectorAll(s)];
function count(el,n,d=0){let t0;const f=t=>{t0??=t;const p=Math.min((t-t0)/1500,1);el.textContent=(n*p).toFixed(d);p<1&&requestAnimationFrame(f)};requestAnimationFrame(f)}
$('[data-n]').forEach(e=>count(e,+e.dataset.n,+(e.dataset.d||0)));
const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');$('[data-w]',e.target).forEach(i=>i.style.width=i.dataset.w+'%');io.unobserve(e.target)}}),{threshold:.15});$('.rv').forEach(x=>io.observe(x));
const cv=document.getElementById('bg'),x=cv.getContext('2d');let S=[];function rs(){cv.width=innerWidth;cv.height=innerHeight;S=Array.from({length:90},()=>({x:Math.random()*cv.width,y:Math.random()*cv.height,z:Math.random()*2+.3,c:['#ff2e93','#00e5ff','#ffd23f','#fff'][Math.random()*4|0]}))}rs();addEventListener('resize',rs);
(function a(){x.clearRect(0,0,cv.width,cv.height);S.forEach(s=>{s.y+=s.z*.5;if(s.y>cv.height)s.y=0;x.fillStyle=s.c;x.globalAlpha=.7;x.fillRect(s.x,s.y,s.z*2,s.z*2)});requestAnimationFrame(a)})();
const cl=document.getElementById('cls');if(cl){const W=['CLASS: AI / ML ENGINEER','SUBCLASS: GAME DESIGNER','WEAPON: PYTHON + UNITY'];let wi=0,ci=0;(function t(){const s=W[wi];cl.textContent=s.slice(0,ci++);if(ci>s.length+14){ci=0;wi=(wi+1)%W.length}setTimeout(t,70)})()}
// filters (quests + skills)
let sem=0;const q=document.getElementById('q');
function flt(){const v=(q?.value||'').toLowerCase();$('.q').forEach(r=>r.hidden=!((!sem||r.dataset.s==sem)&&r.textContent.toLowerCase().includes(v)));$('.sk.chip').forEach(c=>{const h=!c.textContent.toLowerCase().includes(v);c.hidden=h;if(c.nextElementSibling)c.nextElementSibling.hidden=h})}
if(q)q.oninput=flt;$('.tabs button').forEach(b=>b.onclick=()=>{$('.tabs button').forEach(y=>y.classList.remove('on'));b.classList.add('on');sem=+b.dataset.s;flt()});
// arcade
const ar=document.getElementById('arena');if(ar){let sc=0,tl=0,run=0,best=0,iv;const g=i=>document.getElementById(i);
function orb(){$('.t',ar).forEach(o=>o.remove());const o=document.createElement('div');o.className='t';o.style.left=Math.random()*(ar.clientWidth-46)+'px';o.style.top=Math.random()*(ar.clientHeight-46)+'px';o.onclick=e=>{e.stopPropagation();sc++;g('sc').textContent=sc;orb()};ar.append(o)}
function end(){run=0;clearInterval(iv);$('.t',ar).forEach(o=>o.remove());best=Math.max(best,sc);g('bs').textContent=best;g('msg').style.display='grid';g('msg').innerHTML=`GAME OVER<br>SCORE ${sc}<br><span style="color:var(--yl)">${sc>=25?'LEGENDARY!':sc>=15?'NICE AIM!':'TRY AGAIN'}</span><br>CLICK TO RETRY`}
ar.onclick=()=>{if(run)return;run=1;sc=0;tl=20;g('sc').textContent=0;g('tm').textContent=20;g('msg').style.display='none';orb();iv=setInterval(()=>{g('tm').textContent=--tl;if(tl<=0)end()},1000)}}
