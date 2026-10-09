<?php function top($t,$a=''){$n=fn($k,$u,$l)=>"<a href='$u' class='".($a==$k?'on':'')."'>$l</a>";?><!DOCTYPE html><html lang="en"><head><meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1,viewport-fit=cover"><title><?=$t?> | Surya Chakravarthi</title>
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="style.css"></head><body><canvas id="bg"></canvas>
<nav><b>P1 ★ SURYA</b><?=$n('h','index.php','Home').$n('a','academic.php','Quests · RDS').$n('s','skills.php','Skills · DynamoDB')?></nav><?php }
function bottom(){?><section id="contact"><h2>JOIN MY PARTY</h2><div class="grid">
<a class="card inv rv" href="https://www.linkedin.com/in/malaganti-pardha-surya-chakravarthi-a73774354" target="_blank" rel="noopener" style="color:inherit;text-decoration:none"><span class="ic">💼</span><div><b>LinkedIn</b><br><small>Connect with me</small></div></a>
<a class="card inv rv" href="https://github.com/HeliosSkotis" target="_blank" rel="noopener" style="color:inherit;text-decoration:none"><span class="ic">🕹️</span><div><b>GitHub · HeliosSkotis</b><br><small>See my code</small></div></a>
<a class="card inv rv" href="mailto:chakravarthi.24bca8072@vitapstudent.ac.in" style="color:inherit;text-decoration:none"><span class="ic">✉️</span><div><b>Send a message</b><br><small>chakravarthi.24bca8072@vitapstudent.ac.in</small></div></a></div></section>
<footer>© 2026 SURYA CHAKRAVARTHI · VIT-AP UNIVERSITY<br>HOSTED ON AMAZON EC2</footer><script src="app.js"></script></body></html><?php }
function banner($ok,$svc,$e=''){echo $ok?"<div class='ban ok'>✓ Successfully connected to $svc</div>":"<div class='ban bad'>✗ $svc connection failed".($e?': '.htmlspecialchars($e):'')."</div>";}
function h($s){return htmlspecialchars((string)$s);}
