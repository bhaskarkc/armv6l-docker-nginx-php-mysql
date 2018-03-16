include       /etc/nginx/fastcgi_params;
try_files     $uri =404;

fastcgi_pass  php-fpm:9000;
fastcgi_split_path_info ^(.+\.php)(/.+)$;
fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
fastcgi_param HTTP_PROXY      "";
