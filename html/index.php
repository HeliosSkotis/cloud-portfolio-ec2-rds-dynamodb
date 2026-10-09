<?php require 'inc.php'; top('Home','h');?>
<section class="hero"><small class="blink">PRESS START</small><h1>SURYA<br>CHAKRAVARTHI</h1><div class="px" id="cls" style="color:var(--cy);font-size:12px"></div>
<p>3rd-year B.Tech AI &amp; ML at VIT-AP. I make smart, playable things: game design, AI simulations and interactive worlds.</p>
<div><a class="btn" href="academic.php">▶ QUEST LOG (RDS)</a><a class="btn b" href="skills.php">⚔ SKILL TREE (DYNAMODB)</a></div></section>
<section><h2>PLAYER STATS</h2><div class="grid"><div class="card stat rv"><b data-n="9.13" data-d="2">0</b><span>CGPA / 10</span></div>
<div class="card stat rv"><b data-n="92">0</b><span>Credits earned</span></div><div class="card stat rv"><b data-n="27">0</b><span>Quests cleared</span></div><div class="card stat rv"><b data-n="9">0</b><span>Certifications</span></div></div></section>
<section><h2>ARCHITECTURE</h2><div class="card rv px" style="font-size:10px;line-height:2.4;text-align:center">BROWSER → EC2 (APACHE + PHP)<br><span style="color:var(--cy)">→ RDS MYSQL · academic.php</span><br><span style="color:var(--pk)">→ DYNAMODB · skills.php</span></div></section>
<section id="game"><h2>ARCADE: TARGET PRACTICE</h2><div class="card"><div id="hud"><span>SCORE <b id="sc">0</b></span><span>TIME <b id="tm">20</b></span><span>BEST <b id="bs">0</b></span></div>
<div id="arena"><div id="msg">CLICK TO START<br>HIT THE ORBS!</div></div></div></section><?php bottom();?>
