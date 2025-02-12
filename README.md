# AWS CodePipeline＋Amazon ECR＋Amazon ECSでのCI/CDパイプライン構築サンプル


## 事前準備

Dockerがインストールされていない場合は、インストールしておいてください。

## サンプルアプリケーションの構成


```shell
.
├── Dockerfile
└── src
    └── index.php
```

## 事前準備

composerをインストールしていない場合は、インストールしておいてください。
composerのインストール方法は以下のURLを参照してください。
https://getcomposer.org/download/

composerのインストールが完了したら、以下のコマンドを実行して、必要なライブラリをインストールしてください。

```shell
composer install --dev
composer dump-autoload
```

## 静的コード解析

```shell
vendor/bin/phpstan analyse src --level max
```

## ユニットテスト

```shell
vendor/bin/phpunit tests
```

## コンテナのビルド方法作成


```shell
docker build -t php-sample .
```

## コンテナのテスト起動

```shell
docker container run --rm -p 8080:80 -d php-sample:latest
```

起動ができたら、ブラウザで `http://localhost:8080` にアクセスすることでHTMLが表示されることを確認可能です。

```shell
curl http://localhost:8080
```

## AWS CodePipelineによるCI/CDパイプラインの構築手順

CloudFormationテンプレートを以下の順で実行しておいてください。

- iac/1_vpc.yml
- iac/2_ecr_ecs_alb.yml
- iac/3_codepipeline.yml

`iac/3_codepipeline.yml`の実行には、GitHubとの接続設定のARNが必要です。  
AWS CodePiplineのコンソール画面にある、`接続`からGitHub接続を作成し、そのARNを入力してください。
