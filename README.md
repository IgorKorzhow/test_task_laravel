После скачивания этого репозитория тебе нужно:
- добавить в etc/hosts следующую информацию 
  `127.0.0.1       start-docker.test`
- дать права на папку storage `sudo chmod -R 777 ./storage`
- вызвать команду `npm install`
- затем зайти в папку docker и написать `docker compose up -d`
- зайти в контейнер app и выполнить `composer install`
- выполнить `php artisan migrate`
- в папке с самим приложением вызвать команду `npm run dev`
## Ваш сайт доступен для использования


