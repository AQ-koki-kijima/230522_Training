# docker-laravel 🐳

<p align="center">
    <img src="https://user-images.githubusercontent.com/35098175/145682384-0f531ede-96e0-44c3-a35e-32494bd9af42.png" alt="docker-laravel">
</p>
<p align="center">
    <img src="https://github.com/ucan-lab/docker-laravel/actions/workflows/laravel-create-project.yml/badge.svg" alt="Test laravel-create-project.yml">
    <img src="https://github.com/ucan-lab/docker-laravel/actions/workflows/laravel-git-clone.yml/badge.svg" alt="Test laravel-git-clone.yml">
    <img src="https://img.shields.io/github/license/ucan-lab/docker-laravel" alt="License">
</p>

## 環境構築

1. Git clone & change directory
2. Execute the following command

```bash
$ make init
```

以下のURLでルートページが表示されます

http://localhost

## おやくそく
### 1. 命名規則
* htmlはキャメルケースに従ってください。(getCurryRice)
* phpはPSRに準拠(https://www.infiniteloop.co.jp/docs/psr/psr-2-coding-style-guide.php)

### 2. MVC+Sにしたがって
コーディングの際、以下にしたがってください。
* Model：データベースからテーブルを取得するのみ(ex. DB::table($this->table))
* Service：ビジネスロジックはすべてここで記述（削除も含む）
* Controller：データに関する指示の橋渡しのみ。<br>
一つの機能につき、一つのコントローラが対応します。<br>
一つのコントローラが複数メソッドを持てます。


### 3. プルリク単位
基本的には、CRUDそれぞれで行ってください。

### 4. ブランチの命名規則
* ケバブケースで行います。
* 名前/機能名-C/R/U/D<br>
(ex)kijima/facility-create

### 5. bladeファイルの格納方法について
* template, 機能ごとに、フォルダ分けしてください。<br>
例：templateはtemplateフォルダに、facility関係はfacilityフォルダに。

## Container structures

```bash
├── app
├── web
└── db
```

### app container

- Base image
  - [php](https://hub.docker.com/_/php):10.11-fpm-bullseye
  - [composer](https://hub.docker.com/_/composer):2.3

### web container

- Base image
  - [nginx](https://hub.docker.com/_/nginx):1.22

### db container

- Base image
  - [mysql/mysql-server](https://hub.docker.com/r/mysql/mysql-server):8.0

### mailhog container

- Base image
  - [mailhog/mailhog](https://hub.docker.com/r/mailhog/mailhog)

# テーブル定義
**users テーブル**
| No | カラム名     | データ型         | Not NULL | デフォルト値 | 備考           |
|---|-----------|--------------|---------|----------|--------------|
| 1 | id        | BIGINT       | YES     | None     | 主キー、自動増分 |
| 2 | name      | VARCHAR(100) | YES     | None     |              |
| 3 | email     | VARCHAR(100) | YES     | None     |              |
| 4 | password  | VARCHAR(100) | YES     | None     | 暗号化されたパスワード |
| 5 | created_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP |           |
| 6 | updated_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP | 更新時に自動的にタイムスタンプ更新 |

**facilities テーブル**
| No | カラム名     | データ型         | Not NULL | デフォルト値 | 備考           |
|---|-----------|--------------|---------|----------|--------------|
| 1 | id        | BIGINT       | YES     | None     | 主キー、自動増分 |
| 2 | name      | VARCHAR(100) | YES     | None     |              |
| 3 | description | TEXT       | NO      | NULL     |              |
| 4 | location  | VARCHAR(200) | YES     | None     |              |
| 5 | category  | VARCHAR(50)  | YES     | None     |              |
| 6 | created_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP |           |
| 7 | updated_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP | 更新時に自動的にタイムスタンプ更新 |

**services テーブル**
| No | カラム名     | データ型         | Not NULL | デフォルト値 | 備考           |
|---|-----------|--------------|---------|----------|--------------|
| 1 | id        | BIGINT       | YES     | None     | 主キー、自動増分 |
| 2 | facility_id | INT        | YES     | None     | facilities テーブルへの外部キー |
| 3 | name      | VARCHAR(100) | YES     | None     |              |
| 4 | price     | INT          | YES     | None     |              |
| 5 | description | TEXT       | NO      | NULL     |              |
| 6 | limit     | INT          | NO      | NULL     |              |
| 7 | created_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP |           |
| 8 | updated_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP | 更新時に自動的にタイムスタンプ更新 |

**reservations テーブル**
| No | カラム名     | データ型         | Not NULL | デフォルト値 | 備考           |
|---|-----------|--------------|---------|----------|--------------|
| 1 | id        | BIGINT       | YES     | None     | 主キー、自動増分 |
| 2 | user_id   | INT          | YES     | None     | users テーブルへの外部キー |
| 3 | facility_id | INT        | YES     | None     | facilities テーブルへの外部キー |
| 4 | service_id | INT         | YES     | None     | services テーブルへの外部キー |
| 5 | start_datetime           | DATE    | YES      | None     |              |
| 6 | end_datetime             | TIME    | YES      | None     |              |
| 7 | status    | VARCHAR(20)  | YES     | None     | 新規、変更、キャンセル等 |
| 8 | created_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP |           |
| 9 | updated_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP | 更新時に自動的にタイムスタンプ更新 |

**admins テーブル**
| No | カラム名     | データ型         | Not NULL | デフォルト値 | 備考           |
|---|-----------|--------------|---------|----------|--------------|
| 1 | id        | BIGINT       | YES     | None     | 主キー、自動増分 |
| 2 | facility_id | BIGINT       | NO      | None     |              |
| 3 | name      | VARCHAR(100) | YES     | None     |              |
| 4 | email     | VARCHAR(100) | YES     | None     |              |
| 5 | password  | VARCHAR(100) | YES     | None     | 暗号化されたパスワード |
| 6 | created_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP |           |
| 7 | updated_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP | 更新時に自動的にタイムスタンプ更新 |

**system_admins テーブル**
| No | カラム名     | データ型         | Not NULL | デフォルト値 | 備考           |
|---|-----------|--------------|---------|----------|--------------|
| 1 | id        | BIGINT       | YES     | None     | 主キー、自動増分 |
| 2 | name      | VARCHAR(100) | YES     | None     |              |
| 3 | email     | VARCHAR(100) | YES     | None     |              |
| 4 | password  | VARCHAR(100) | YES     | None     | 暗号化されたパスワード |
| 5 | created_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP |           |
| 6 | updated_at| TIMESTAMP    | YES     | CURRENT_TIMESTAMP | 更新時に自動的にタイムスタンプ更新 |
