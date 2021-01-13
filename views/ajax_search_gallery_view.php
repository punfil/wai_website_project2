<!DOCTYPE HTML>
<html lang="pl">
<head>
    <link rel="stylesheet" href="static/style.css" />
    <meta charset="UTF-8">
</head>
<body>
    <div class="instead_of_center">
                
                <?php
                foreach ($photos as $current_photo){
                    ?>
                    <div style="display:flex;">
                    <a href="<?php echo $current_photo['full_photo']; ?>"><img src="<?php echo $current_photo['miniature']; ?>" alt="Mini_photo" title="Photo"/></a>
                    <p>Autor: 
                    <?php
                    echo $current_photo['autor']
                    ?>
                    <br/>Tytuł:
                    <?php
                    echo $current_photo['title'];
                    ?>
                    <br /> <?php echo $current_photo['is_private'];
                    ?>
                    </p>
                    </div>
                    <?php
                 }
                 
                ?>
    </div>
</body>
</html> 