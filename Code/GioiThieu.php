<?php
session_start();
$pageTitle = "GioiThieu";
$activeMenu = "GioiThieu";
include_once '../PRJ_Library/header.php';
if (isset($_SESSION["username"])) 
            
            $acc = $_SESSION["username"];
?>

<?php
$query = "SELECT * FROM version";
$result = mysqli_query($link, $query);
if (mysqli_num_rows($result) == 0) {
    die("No data in table");
}
?>




<div style="background-color:#fff ">
    <hr style="opacity: 0.1"/>
    <div class="container" style="padding-bottom: 10%;">
        <div class="row" style="text-align:  center;">
            <div class="col-sm-10" style="padding-top: 5%;padding-left: 17%;">
                <h1> GIỚI THIỆU </h1>
                <p>Công ty Cổ phần Đầu tư <strong>PHP Mobile</strong> là nhà bán lẻ số 1 Việt Nam về doanh thu và lợi nhuận. PHP Mobile vận hành các chuỗi bán lẻ <strong>PHPMobile.com</strong> </p>
            </div>
        </div></div>



    <div class="container" style="padding-bottom: 5%;padding-top: 0%;padding-left: 1%;">
        <div class="row">
            <div class="col-sm-4" style="padding-top: 11%;">
                <img width="50%" height="30%" src="../Images/Brand/samsung_logo_PNG12.png" style="
    margin-left: 25%;
    margin-bottom: 5%;
">
               
                <p><strong>Samsung</strong> được sáng lập bởi Lee Byung-chul năm 1938, được khởi đầu là một công ty buôn bán nhỏ. 3 thập kỉ sau, tập đoàn <strong>Samsung</strong> đa dạng hóa các ngành nghề bao gồm chế biến thực phẩm, dệt may, bảo hiểm, chứng khoán và bán lẻ. <strong>Samsung</strong> tham gia vào lĩnh vực công nghiệp điện tử vào cuối thập kỉ 60, xây dựng và công nghiệp đóng tàu vào giữa thập kỉ 70. </p>
            </div>


            <div class="col-sm-4" style="padding-top: 2%;">
                <img width="50%" height="30%" src="../Images/Brand/apple_logo_PNG19690.png" style="
    margin-left: 25%;
">
                
                <p><strong>Apple Inc. </strong>là một tập đoàn công nghệ máy tính của Mỹ có trụ sở chính đặt tại Cupertino, California.<strong>Apple</strong> được thành lập ngày 1 tháng 4 năm 1976 dưới tên <strong>Apple Computer, Inc.</strong>, và đổi tên thành <strong>Apple Inc. </strong> vào đầu năm 2007. Với lượng sản phẩm bán ra toàn cầu hàng năm là 13,9 tỷ đô la Mỹ (2005), 74 triệu thiết bị iPhone được bán ra chỉ trong một quý 4 năm 2014 và có hơn 98.000 nhân viên ở nhiều quốc gia, sản phẩm là máy tính cá nhân, phần mềm, phần cứng, thiết bị nghe nhạc và nhiều thiết bị đa phương tiện khác. </p>
            </div>
            <div class="col-sm-4" style="padding-top: 10%;">
                <img width="20%" height="15%" src="../Images/Brand/Huawei.png" style="
    margin-left: 38%;
">
                <p style="
    padding-top: 4%;
    ">  <strong>Huawei</strong> phục vụ 31 trong số 50 công ty khai thác viễn thông hàng đầu thế giới. Nó cũng chiếm 55% thị phần toàn cầu trong lĩnh vực nối mạng bằng dongle 3G di động. Hàng năm <strong>Huawei</strong> đầu tư khoảng 10% doanh thu hàng năm của mình để nghiên cứu và phát triển(R & D). và trong đó 46% nhân lực tham gia vào nghiên cứu và phát triển. Công ty đã nộp đơn xin cấp hơn 49.000 bằng sáng chế. Công ty có trung tâm nghiên cứu và phát triển ở Bắc Kinh, Thành Đô, Nam Kinh, Thượng Hải, Hàng Châu, Thâm Quyến, Vũ Hán và Tây An, Trung Quốc Ottawa, Canada, Bangalore, Ấn Độ; Jakarta, Indonesia, Mexico City, Mexico; Wijchen, Hà Lan, Karachi và Lahore, Pakistan, Ferbane, Cộng hòa Ireland, Moscow, Nga, Stockholm, Thụy Điển, Istanbul, Thổ Nhĩ Kỳ và Dallas và Silicon Valley, Hoa Kỳ. </p>
            </div>
        </div>
    </div>



    <div class="container" style="padding-bottom: 10%;padding-left: 1%;">
        <div class="row" style="padding-bottom: 5%;
             padding-top: 0%;
             padding-right: 0%;
             ">
            <div class="col-sm-4" >
                <img width="50%" height="30%" src="../Images/Brand/oppo5.png" style="
    margin-left: 24%;
">
                
                <p style="padding-top: 5%"><strong>OPPO Electronics Corp </strong>(với tên thương hiệu là OPPO - Camera Phone) (trước là: OPPO - Smartphone). là nhà sản xuất thiết bị điện tử Trung Quốc, có trụ sở đặt tại Đông Hoản, Quảng Đông.<strong>OPPO</strong> cung cấp một số sản phẩm chính như máy nghe nhạc MP3, Tivi LCD, eBook, DVD/Blu-ray và điện thoại thông minh. Thành lập vào năm 2004, công ty đã đăng ký tên thương hiệu OPPO ở nhiều quốc gia trên thế giới. </p>
            </div>

            <div class="col-sm-4" style="margin-top: -6.5%;" >
                <img width="50%" height="30%" src="../Images/Brand/Sony.png" style="
    margin-left: 24%; ">
                <p>Công ty công nghiệp <strong>Sony Corporation</strong>, gọi tắt là <strong>Sony</strong>, là một tập đoàn đa quốc gia của Nhật Bản, với trụ sở chính nằm tại Minato, Tokyo, Nhật Bản, và là tập đoàn điện tử đứng thứ 5 thế giới với 81,64 tỉ USD (2011). Sony là một trong những công ty hàng đầu thế giới về điện tử, sản xuất tivi, máy ảnh, máy tính xách tay và đồ dân dụng khác. </p>
            </div>

        </div>
    </div>





    


</div>





    <?php
    include_once '../PRJ_Library/footer.html';
    ?>
