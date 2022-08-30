### 概要
- 備品を管理するWebアプリケーション
- Laravelで開発されておりフロントエンドはBladeテンプレート、TailwindCSSを利用
- 認証機能は [Laravel Breeze](https://readouble.com/laravel/8.x/ja/starter-kits.html) を利用

### 開発に必要なドキュメント
- [要件定義書](https://docs.google.com/document/d/10duBlZQbkTgJgwmTmz3qrdLy41xV0D3ZSUgYS2ggUdM/edit#)
- [デザインカンプ](https://www.figma.com/file/QeXTIDAkIJGPLXe3VxIN7V/POSSE%E3%83%A9%E3%82%A4%E3%83%96%E3%83%A9%E3%83%AA?node-id=0%3A1)


### プロジェクトの立ち上げ
以下のコマンドを実行し、http://localhost:9000 にアクセスできると正常に動作してます。
```
make init
```


### コンテナ説明
|コンテナ名|役割|URL|
|:-|:-|:-|
|app|アプリケーションのソースコード|http://localhost:9000|
|web|php-fpm||
|mysql|名前の通り||
|phpmyadmin|名前の通り|http://localhost:1234|
|mailhog|メールサーバー|http://localhost:8025|


### 起動・ログイン
- `make up`で全てのコンテナが起動
- `make [container name]` でログイン可能
   - 例）`make app` でappコンテナに入ることができる（`artisan`を利用したい場合はこちらのコンテナ）
- 詳細はMakefileに記載されているためご確認ください


### デザインの反映

```
make app
npm run watch
```

※ `npm run watch`がメモリをかなり食うためコンテナが終了してしまうことがあります。Dockerに割り当てるメモリを4GBにしておくとスムーズに開発ができると思います。


### 注意
プルリクエストはテンプレートに従って作成してください
