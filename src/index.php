<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>2024 xxxxxx sample app</title>
    </head>
    <body>
        <h1>xxxxxx作成</h1>
        <?php 
        echo gethostname(); 
        
        // 下記の一行により静的解析（phpstan）でエラーになります。
        // echo $undefinedVariable;
        ?>
    </body>
</html>