<?php 

ini_set( 'display_errors', 1 );   
error_reporting( E_ALL );

include('helper/mail.php');
include('helper/wa.php');
include('helper/helper.php');
include('model/gold_model.php');
include('model/user_model.php');

sleep(rand(0, 450));
$strprice = getCrawlData();
// print_r($strprice);
//     exit();       

$temp_price = removeCommasAndConvertToInt($strprice);

// penyesuaian harga Antam
// $price = $temp_price - 30000;
$price = $temp_price;
// checking value
$result = getDaily();

if ($result->num_rows > 0 && $price > 0) {

    // Mengambil satu baris
    $row = $result->fetch_assoc();
   
    if($row['price'] > $price)
    {
        $diff = $row['price'] - $price;
        
        // SEND MAIL ---------------------------------------------------------------------------------------
        $subject = "Harga Emas Turun Rp ". (string)$diff;
        
        // get data 
        $users = getUserRows();

        $receiver = [];
        if ($users->num_rows > 0) {
            
            $date = date("d F Y H:i", time());
            $currentYear = date("Y");
            while ($row = $users->fetch_assoc()) {

                $msg = "
                <!DOCTYPE html>
                <html lang='en'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Update Harga Emas</title>
                </head>
                <body style='margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f9f9f9; color: #333333;'>
                    <table role='presentation' style='width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff;'>
                        <tr>
                            <td style='background-color: #4CAF50; text-align: center; padding: 20px;'>
                                <h1 style='margin: 0; color: #ffffff; font-size: 24px;'>Update Harga Emas Antam</h1>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding: 20px; color: #333333; font-size: 16px; line-height: 1.5;'>
                                <p>Halo " . $row['name'] . ",</p>
                                <p>Kami ingin menginformasikan bahwa harga 1 gram emas Antam per tanggal <strong>" . $date . "</strong> adalah <strong>" . $strprice . "</strong>.</p>
                                <p>Untuk melihat data harga emas dalam 7 hari terakhir, Anda dapat mengaksesnya melalui link berikut:</p>
                                <p style='text-align: center;'>
                                    <a href='https://etalastok.com/emas' style='display: inline-block; background-color: #4CAF50; color: #ffffff; padding: 10px 20px; text-decoration: none; border-radius: 5px; font-size: 16px;'>Cek Harga Emas Harian</a>
                                </p>
                            </td>
                        </tr>
                        <tr>
                            <td style='background-color: #f1f1f1; text-align: center; padding: 20px; font-size: 12px; color: #888888;'>
                                <p>&copy; ".$currentYear." Etalastok Emas. All rights reserved.</p>
                                <p><a href='#' style='color: #888888; text-decoration: none;'>Unsubscribe</a></p>
                            </td>
                        </tr>
                    </table>
                </body>
                </html>
                ";

                // Menyiapkan data penerima
                $receiver = array(
                    "name" => $row['name'],
                    "email" => $row['email'],
                    "message" => $msg,
                );

                // Mengirim email menggunakan fungsi sendMail
                $send = sendMail($subject, $receiver);

                if(!empty($row['phone'])){
                    
                    $msg_wa = "Hai ".$row['name'].", kami informasikan harga emas Antam hari ini (". $date .") turun Rp ".(string)$diff.". Harga 1gr emas hari ini adalah Rp ".$strprice.". Untuk melihat data harga emas 7 hari sebelumnya Anda bisa cek selengkapnya disini https://etalastok.com/emas";
                    $send_wa = sendWA($row['phone'], $msg_wa);
                    echo "<br>".$send_wa;
                }

                echo "<br>".$send;
            }
        }
        
    }

} else {
    echo "Data tidak tersedia";
}

// INSERT NEW DATA ---------------------------------------------------------------------------------------
if($price >= 1){
    $result = insertGold("Emas Antam", 1, $price);
}

?>