<?php
require_once("getData.php");
$get_data = new getData();
$name=$get_data->getUserData();
?>


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>
  <link rel="stylesheet" href="style.css">
</head>


<body>
    <header>
        <div class="logo">
            <div class="logo_inner">
            <img src="1599315827_logo (1).png" alt="Y&G Group_logo" width=200px height=120px>
            </div>
        </div>
        <div class="header_main">
            <div class="name">
                <div class="text">ようこそ <?php echo $name["last_name"].$name["first_name"];?>さん</div>
            </div>
            <div class="time">
                <div class="text">最終ログイン日：2023-09-11 22:11:00</div>
            </div>            
        </div>
    </header>

    <main>
    <table>
            <tr>
                <th>記事id</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr>
            <?php 
            $post_data=$get_data -> getPostData();
            while ($row = $post_data->fetch(PDO::FETCH_ASSOC)) {  ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php if ($row['category_no']==1){
                                    echo "食事";
                                }elseif ($row['category_no']==2){
                                    echo "旅行";
                                }elseif ($row['category_no']==3){
                                    echo "その他";
                                }; ?></td>
                    <td><?php echo $row['comment']; ?></td>
                    <td><?php echo $row['created']; ?></td>
                </tr>
            <?php } ?>
        </table>


        </div> 
    </main>
    <footer>
        <div class="service_name">
            <p>Y&G group.inc</p>
        </div>
    </footer>
</body>

</html>