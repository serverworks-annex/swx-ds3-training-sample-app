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
