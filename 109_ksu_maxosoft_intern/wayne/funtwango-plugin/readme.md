# 使用說明

透過 composer 實現 autoload 功能，namespace 為 Includes

使用此架構時，需要在 Init.php get_services 註冊要使用的 .php

創建的 .php 需包含 function register（可將其想像為 __construct）

檔案架構分為 Api, Base, Classes, Pages

### Api
1. 處理 Callbacks
2. SettingsApi.php 則提供創建 Backend addMainPage 頁面的 factory

### Base
1. Activate.php 當 plugin 啟用時
2. Deactivate.php 當 plugin 停用時
3. BaseController.php （暫無功能）
4. Enqueue.php 註冊自定義 assets 的 .css 與 .js
5. SettingsLinks.php 在外掛頁面加入 設定 連結

### Classes
1. 單純使用 function

### Pages
1. 自定義頁面

### templates
1. 自定義頁面樣式

### uninstall.php
1. 當 plugin 被移除時執行
2. 內容應當刪除與此 plugin 相關的所有資料
