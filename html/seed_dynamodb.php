<?php // Run once: sudo php seed_dynamodb.php
require __DIR__.'/vendor/autoload.php';
use Aws\DynamoDb\{DynamoDbClient,Marshaler};
$db=new DynamoDbClient(['version'=>'latest','region'=>'us-east-1']);$m=new Marshaler();
$S=fn($g,$l)=>array_map(fn($x)=>['group'=>$g,'name'=>$x[0],'level'=>$x[1]],$l);
$skills=array_merge($S('PROGRAMMING',[['Python',85],['Java',78],['C',70],['JavaScript',65],['MATLAB',55]]),
$S('GAME & DESIGN',[['Unity',50],['Krita / GIMP',65],['Figma',45],['Game Mechanics',55]]),
$S('AI & CS',[['Pattern Recognition',60],['Data Structures',85],['ML Basics',65],['Graph Neural Nets',40],['Databases / SQL',70]]));
$C=fn($i,$n,$s)=>['icon'=>$i,'name'=>$n,'issuer'=>$s];
$db->putItem(['TableName'=>'student_skills','Item'=>$m->marshalItem([
'student_id'=>'surya-chakravarthi','skills'=>$skills,'interests'=>['Game Design','AI Simulations','Robotics','Graph ML'],
'certifications'=>[$C('🎨','Character Design for Video Games','Coursera · CalArts'),$C('🐍','Python Course','Kaggle'),$C('📐','MATLAB Onramp','MathWorks'),$C('☕','OOPs in Java','Code360'),$C('☕','Basics of Java','Code360'),$C('🐍','Introduction to Python','SoloLearn'),$C('⚙️','Introduction to C','SoloLearn'),$C('🌐','Introduction to HTML','SoloLearn'),$C('🖌️','Graphic Design & Visual Comm.','VIT-AP VISH')],
'projects'=>[['name'=>'Financial Fraud Detection using GNN','status'=>'In Progress','desc'=>'Graph Neural Network that models accounts and transactions as a graph to flag fraud.'],
['name'=>'Personal Web Portfolio · Amazon S3','status'=>'Cleared','desc'=>'Static portfolio hosted on Amazon S3 static website hosting.'],
['name'=>'Crackit AI','status'=>'Cleared','desc'=>'AI mock-interview simulator that generates questions and evaluates answers.'],
['name'=>'Cloud Portfolio · EC2 + RDS + DynamoDB','status'=>'Cleared','desc'=>'Dynamic PHP site reading academics from RDS MySQL and skills from DynamoDB.']]])]);
echo "Seeded\n";
