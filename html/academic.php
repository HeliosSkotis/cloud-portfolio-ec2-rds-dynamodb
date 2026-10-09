<?php require 'inc.php'; top('Quest Log','a');$rows=[];$ok=false;$err='';
try{$c=require '/var/www/private/db_config.php';
$pdo=new PDO("mysql:host={$c['host']};dbname={$c['db']};charset=utf8mb4",$c['user'],$c['pass'],[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,PDO::ATTR_TIMEOUT=>5]);
$rows=$pdo->query("SELECT code,subject,credits,grade,semester FROM academic_records ORDER BY semester,id")->fetchAll();$ok=true;}
catch(Exception $e){$err='Check db_config.php and the RDS security group';}
$n=['S'=>0,'A'=>0,'B'=>0,'P'=>0];$cr=0;foreach($rows as $r){$cr+=$r['credits'];$n[$r['grade']]=($n[$r['grade']]??0)+1;}?>
<section><h2>QUEST LOG</h2><p class="sub">Retrieved live from Amazon RDS MySQL via PDO</p><?php banner($ok,'Amazon RDS MySQL',$err);?>
<div class="grid"><div class="card stat"><b data-n="9.13" data-d="2">0</b><span>CGPA (official)</span></div><div class="card stat"><b data-n="<?=$cr?>">0</b><span>Credits</span></div><div class="card stat"><b data-n="<?=count($rows)?>">0</b><span>Quests</span></div>
<div class="card stat"><div style="display:grid;gap:8px"><div class="r S">S ×<?=$n['S']?></div><div class="r A">A ×<?=$n['A']?></div><div class="r B">B ×<?=$n['B']?></div></div></div></div>
<div class="tabs" style="margin-top:22px"><button class="on" data-s="0">All</button><?php for($i=1;$i<=4;$i++)echo "<button data-s='$i'>Sem $i</button>";?><input id="q" placeholder="Search quest…"></div>
<div class="card" style="padding:0"><?php foreach($rows as $r):?><div class="q" data-s="<?=(int)$r['semester']?>"><small><?=h($r['code'])?></small><span><?=h($r['subject'])?></span><small class="cr"><?=(int)$r['credits']?> CR</small><div class="r <?=h($r['grade'])?>"><?=h($r['grade'])?></div></div><?php endforeach;?></div></section><?php bottom();?>
