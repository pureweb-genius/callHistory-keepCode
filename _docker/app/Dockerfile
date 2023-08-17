# Используем образ с Nginx в качестве базового образа
FROM nginx:latest

# Копируем наш файл конфигурации Nginx внутрь контейнера
COPY ._docker/nginx/conf.d/nginx.conf /etc/nginx/conf.d/default.conf

# Открываем порт 80 для входящих запросов
EXPOSE 80

# Указываем рабочую директорию для контейнера
WORKDIR /var/www/html
