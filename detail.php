<?php
session_start();

$title = 'Detail Page';
include_once('layouts/header.php');
require_once('db/dbhelper.php');
require_once('utils/utility.php');

$id = getGet('id');
$product = executeResult('select * from product where id = '.$id, true);
?>
<!-- body START -->
<div class="row">
    <div class="col-md-5">
        <img src="<?=$product['thumbnail']?>" style="width: 100%">
    </div>
    <div class="col-md-7">
        <p  style="font-size: 26px;"><?=$product['title']?></p>
        <p style="font-size: 26px; color: red"><?=number_format($product['price'], 0, '', '.')?> $</p>
        <button class="btn btn-info" onclick="addToCart(<?=$id?>)" style="width: 100%; font-size: 26px;">Add to cart</button>

    </div>
    <div class="col-md-12">
        <?=$product['content']?>
    </div>
</div>
<!-- body END -->
<script type="text/javascript">
    function addToCart(id) {
        $.post('api/api-product.php', {
            'action': 'add',
            'id': id
        }, function(data) {
            location.reload()
        })
    }
</script>
<?php
include_once('layouts/footer.php');
?>
