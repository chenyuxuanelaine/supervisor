###环境要求:
1.PHP >= 5.5.9
2.OpenSSL PHP Extension
3.PDO PHP Extension
4.Mbstring PHP Extension
5.Tokenizer PHP Extension
###按照composer安装:
1.composer install或php composer.phar install
2.cp .env.example .env
3.修改.env文件里的APP_KEY值,可通过命令php artisan jwt:generate生成
4.php artisan migrate
5.php artisan db:seed
#将所有的设置选项合并成一个文件，让框架能够更快速的加载。
6.php artisan config:cache（这个可做可不做）
7.若使用了 Nginx，则可以在网站设置中增加以下设置来开启「优雅链接」：
location / { try_files $uri $uri/ /index.php?$query_string; }