# Line Echo Bot Template for Laravel 10

這個 Template 可以讓你使用 Laravel 10 快速建立一個 Line 聊天機器人，用於回應使用者的訊息。

## 環境需求

- [PHP 8.1](https://www.php.net/releases/8.1/en.php)
- [Composer](https://getcomposer.org/)
- 公開的 HTTPS 網址，或者使用 [Ngrok](https://ngrok.com/) 等反向代理工具做測試。

## 安裝步驟

- 安裝相關套件：`composer install`

- 複製 `.env.example` 到 `.env` 並設定參數 `LINE_BOT_CHANNEL_ACCESS_TOKEN`。
    - 確保你已經在 [Line 開發者控制台](https://developers.line.biz/console/) 中建立一個機器人，並取得 `Channel Access Token`。

- 生成 Laravel 金鑰：`php artisan key:generate`

- 啟動本地伺服器（測試用）：`php artisan serve`
    - 你可以使用 [Ngrok](https://ngrok.com/) 取得 HTTPS 網址做測試：`ngrok http 8000`

- 前往 [Line 開發者控制台](https://developers.line.biz/console/) 設定你的 Webhook URL。
    - 範例網址：`https://example.com/api/linebot/echo`。

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
