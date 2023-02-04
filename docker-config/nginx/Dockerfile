FROM alpine:3.6

# nginxのインストール
RUN apk update && \
    apk add --no-cache nginx
RUN mkdir -p /run/nginx

# TimeZoneをAsia/Tokyoに設定する
RUN apk --no-cache add tzdata \
    && cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime \
    && apk del tzdata

# フォアグラウンドでnginx実行
CMD nginx -g "daemon off;"