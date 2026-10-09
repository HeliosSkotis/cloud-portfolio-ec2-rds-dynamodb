<?php require 'inc.php'; require '/var/www/html/vendor/autoload.php'; top('Skill Tree','s');
use Aws\DynamoDb\{DynamoDbClient,Marshaler};$it=[];$ok=false;$err='';
try{$db=new DynamoDbClient(['version'=>'latest','region'=>'us-east-1']);
$r=$db->query(['TableName'=>'student_skills','KeyConditionExpression'=>'student_id = :s','ExpressionAttributeValues'=>[':s'=>['S'=>'surya-chakravarthi']]]);
$it=(new Marshaler())->unmarshalItem($r['Items'][0]??[]);$ok=!empty($it);}catch(Exception $e){$err='Check IAM role, region and table';}
$g=[];foreach($it['skills']??[] as $s)$g[$s['group']][]=$s;?>
<section class="skills"><h2>SKILL TREE</h2><p class="sub">Retrieved live from Amazon DynamoDB via AWS SDK for PHP</p><?php banner($ok,'Amazon DynamoDB',$err);?>
<div class="tabs"><input id="q" style="margin-left:0" placeholder="Filter skills…"></div>
<div class="grid"><?php foreach($g as $name=>$l):?><div class="card rv"><h3><?=h($name)?></h3><?php foreach($l as $s):?><div class="sk chip"><span><?=h($s['name'])?></span><span style="color:var(--yl)">LV <?=round($s['level']/10)?></span></div><div class="xp"><i data-w="<?=(int)$s['level']?>"></i></div><?php endforeach;?></div><?php endforeach;?></div></section>
<section><h2>LOOT INVENTORY</h2><div class="grid"><?php foreach($it['certifications']??[] as $c):?><div class="card inv rv"><span class="ic"><?=h($c['icon'])?></span><div><b><?=h($c['name'])?></b><br><small><?=h($c['issuer'])?></small></div></div><?php endforeach;?></div></section>
<section><h2>PROJECTS</h2><div class="grid"><?php foreach($it['projects']??[] as $p):$d=$p['status']=='Cleared';?><div class="card boss rv"><small style="color:var(--<?=$d?'gn':'yl'?>)"><?=$d?'✔ CLEARED':'ACTIVE · IN PROGRESS'?></small><h3><?=h(strtoupper($p['name']))?></h3><p><?=h($p['desc'])?></p></div><?php endforeach;?></div></section><?php bottom();?>
