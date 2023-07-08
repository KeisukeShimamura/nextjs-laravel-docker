# 開発手順

## 開発環境立ち上げ

- Docker 起動

  ```
  docker-compose up -d --build
  ```

- MySQL のマイグレーション
  ```
  # PHPサーバーに入る
  docker compose exec php bash
  # マイグレーション実行
  php artisan migrate
  ```

## データベース変更

1. Docker コンテナに入り、migration ファイルを作成するコマンドを実行
   ```
   php artisan make:migration create_job_categories_table --create=job_categories
   ```
2. 作成された migration ファイルにテーブル項目を記載する
3. migration ファイルを実行
   ```
   php artisan migrate
   ```
4. Model を作成するために、以下のコマンドを実行
   ```
   php artisan make:model JobCategory
   ```
5. Model には以下のように変更可能な項目を記載
   ```
   // fillableに指定したプロパティは入力可能になる
   protected  $fillable = [
       'name',
       'permalink',
       'status',
   ];
   ```
6. routes/api.php にルーティングを追加
7. API の Controller を作成するために以下のコマンドを実行
   ```
   php artisan make:controller JobCategoryController --model=JobCategory
   ```

## フロントエンドの注意点

- API 連携
  - クライアントでの API 接続については、apiClient を使用すること
  - サーバ上での API 接続については、apiServer を使用すること
