<?php
    include 'inc/header.php';
?>

<?php
    include '../classes/customer.php';
    include '../classes/cart.php'
?>

    <?php
        $ct = new cart();
        $id = $_GET['sendid'];
    ?>
    <div class="py-5" style="text-align: center">
        <h2>Gửi đơn giá qua email</h2>
        <form class="card px-5 py-5" method="post" style="width: 700px;margin: auto" action="action.php">
            
            <table style="width: 100%">
            <style>
                table {
                border-collapse: collapse;
                border-spacing: 0;
                width: 70%;
                }

                th, td {
                text-align: left;
                padding: 3px;
                }
                .form-control{
                    height: 45px;
                    font-size: 15px;
                }
            </style>
                <?php 
                   $get_price_by_id = $ct->get_orderdetail_byId($id);
                   if($get_price_by_id){
                       while ($result = $get_price_by_id->fetch_assoc()) {
                ?>   
                <tr>
                    <td style="width: 50px">Send to:</td>
                    <td><input class="form-control form-control-lg" value="<?php echo $result['email'] ?>" name="send_to" style="width: 100%" placeholder="send to email address"></td>
                </tr>
                <tr>
                    <td style="width: 50px">Subject:</td>
                    <td><input class="form-control form-control-lg" value="<?php echo '[Don gia hoa don so '. $result['id'].']' ?>" name="subject" style="width: 100%" placeholder="subject"></td>
                </tr>
                <tr>
                    <td style="width: 100px;vertical-align: top;">Content:</td>
                    <td ><textarea style="line-height: 25px;" class="form-control form-control-lg" rows="4" style="width: 100%" name="content"><?php echo 'Kính gửi anh/chị '. $result['name'].'. Tổng giá trị hoá đơn của anh/chị là: '.$result['price'].' VND'; ?> </textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="text-center"><button class="btn btn-success mr-2 btn-lg" type="submit">Gửi mail</button></td>
                </tr>
                <?php
                       }
                    }
                ?>
            </table>
        </form>
    </div>
<?php
    include 'inc/footer.php';
?>
