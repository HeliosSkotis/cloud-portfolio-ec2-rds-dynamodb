# Deploy on Ubuntu EC2 (us-east-1)
1. Launch EC2 (t3.micro, Ubuntu 24.04) with an IAM role that allows DynamoDB; open HTTP 80 and SSH (your IP only).
2. Create RDS MySQL and link it to the EC2 instance (port 3306 only from EC2). Create DynamoDB table `student_skills` (partition key `student_id`, String).
3. On the server:
```
sudo apt update
sudo apt install -y apache2 php libapache2-mod-php php-mysql php-xml php-curl php-mbstring composer mysql-client unzip git
git clone https://github.com/HeliosSkotis/cloud-portfolio-ec2-rds-dynamodb.git && cd cloud-portfolio-ec2-rds-dynamodb
sudo mkdir -p /var/www/private && sudo cp private/db_config.example.php /var/www/private/db_config.php
sudo nano /var/www/private/db_config.php        # put real host, user, password
sudo chown -R www-data:www-data /var/www/private && sudo chmod 640 /var/www/private/db_config.php
mysql -h <RDS-ENDPOINT> -u admin -p < sql/schema.sql
sudo rm -f /var/www/html/index.html && sudo cp html/* /var/www/html/ && cd /var/www/html
sudo composer require aws/aws-sdk-php
sudo php seed_dynamodb.php && sudo rm seed_dynamodb.php
sudo systemctl restart apache2
```
4. Open `http://<EC2-PUBLIC-IP>/`, `/academic.php`, `/skills.php`.
