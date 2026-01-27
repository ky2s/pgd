<?php
ini_set( 'display_errors', 1 );   
error_reporting( E_ALL );

include('helper/simple_html_dom.php');
include('config/connect.php');

function getCrawlData()
{
    
    // $html = file_get_html('https://www.indogold.id/harga-emas-hari-ini');
    // https://www.logammulia.com/id/harga-emas-hari-ini
    ob_start();
    // $url = 'https://www.logammulia.com/id/harga-emas-hari-ini';
    // $url='https://emasantam.id/harga-emas-antam-harian/';
    // $url ='https://hargaemas.io/';
    // $url='https://www.anekalogam.co.id/id';
    $url='https://cekresi.com/emas';
    $html = file_get_contents($url);

    ob_end_clean();

    $dom = new DOMDocument();
    libxml_use_internal_errors(true);

    // $dom = new DOMXPath();
    $dom->loadHTML($html); 
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);

    $tdNodes = $xpath->query('//td');

    // Periksa jika elemen ditemukan
    if ($tdNodes->length > 0) {
        // Ambil nilai teks dari elemen <td>
        $buy_value = $tdNodes->item(2)->nodeValue;
        preg_match('/\d{1,3}(?:,\d{3})*/', $buy_value, $matches);

        $sell_value = $tdNodes->item(3)->nodeValue;
        preg_match('/\d{1,3}(?:,\d{3})*/', $sell_value, $sell_matches);

        // foreach ($tdNodes as $tr) {
        //        echo "<pre>";
        //        print_r($dom->saveHTML($tr));
        //        echo "</pre>";
        // }
        
        // Hapus karakter koma (,) jika ingin mendapatkan nilai numerik
        $buy_value = str_replace(',', '', $matches[0]);
        $sell_value = str_replace(',', '', $sell_matches[0]);
        // $numericValue = str_replace('Rp', '', $numericValue);

    } else {
        echo "Element tidak ditemukan.";
    }

    return array("buy_val"=>$buy_value,"sell_val"=>$sell_value);
}


function getDaily(){

    $conn = DB();

    $sql = "select * from gold_daily order by created_at desc limit 1";
    $stmt = $conn->query($sql);
    $conn->close();

    return $stmt;
}

function getYesterday(){

    $conn = DB();

    $sql = "select * from gold_daily where DATE(created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) ";
    $stmt = $conn->query($sql);
    $conn->close();

    return $stmt;
}

function get7days(){

    $conn = DB();

    $sql = "select DATE_FORMAT(gd.created_at,'%d/%m') as day, gd.price from gold_daily gd WHERE gd.created_at > CURDATE() - INTERVAL 6 DAY  ";
    $stmt = $conn->query($sql);
    $conn->close();

    return $stmt;
}

function get30days(){

    $conn = DB();

    $sql = "select DATE_FORMAT(gd.created_at,'%d/%m') as day, gd.price from gold_daily gd WHERE gd.created_at > CURDATE() - INTERVAL 29 DAY ORDER BY gd.created_at ASC ";
    $stmt = $conn->query($sql);
    $conn->close();

    return $stmt;
}

function insertGold($name, $weight, $price, $selling_price)
{
    $conn = DB();

    $sql = "INSERT INTO gold_daily 
            (name, weight, price, selling_price, created_at) 
            VALUES (?, ?, ?, ?, CURRENT_TIMESTAMP)";

    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // s = string, d = double
    $stmt->bind_param(
        "sddd",
        $name,
        $weight,
        $price,
        $selling_price
    );

    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    echo "Data berhasil ditambahkan.";

    $stmt->close();
    $conn->close();

    return true;
}


function getCrawlDataShopee($url)
{
    // $html = file_get_html('https://www.indogold.id/harga-emas-hari-ini');
    //https://www.logammulia.com/id/harga-emas-hari-ini
    // ob_start();
    // $url = 'https://www.logammulia.com/id/harga-emas-hari-ini';
    // $shortUrl ='https://bit.ly/3xyzABC';
    // $shortUrl='https://www.anekalogam.co.id/id';
    // $shortUrl ='https://shopee.co.id/product/21907054/15028781503?uls_trackid=519epspp006v&utm_campaign=id_7svdty77kL&utm_content=----&utm_medium=affiliates&utm_source=an_11385090156&utm_term=c443rck6xh3m';

        
    // Resolusi URL (follow redirect)
// $context = stream_context_create([
//     'http' => [
//         'follow_location' => true, // Ikuti redirect
//     ],
// ]);
// $response = file_get_contents($url);

// ob_start();
//     // $url = 'https://www.logammulia.com/id/harga-emas-hari-ini';
//     $url ='https://www.indogold.id/harga-emas-hari-ini';
//     // $url='https://www.anekalogam.co.id/id';
//     $html = file_get_contents($url);

//     ob_end_clean();
// $finalUrl = $http_response_header[4] ?? null;



// Parsing URL akhir
// if ($finalUrl && preg_match('/Location:\s*(.+)/i', $finalUrl, $matches)) {
//     $finalUrl = trim($matches[1]);
// } else {
//     $finalUrl = $shortUrl; // Jika gagal resolve, tetap gunakan URL pendek
// }


    // $html = file_get_contents($response);

   
//     ob_start();
//     // $url = 'https://www.logammulia.com/id/harga-emas-hari-ini';
//     // $url ='https://www.indogold.id/harga-emas-hari-ini';
//     // $url='https://www.anekalogam.co.id/id';
//     $html = file_get_contents($url);

//     ob_end_clean();

//     $dom = new DOMDocument();
//     libxml_use_internal_errors(true);
//     // $dom = new DOMXPath();
//     $dom->loadHTML($html); 
//     libxml_clear_errors();

//     $xpath = new DOMXPath($dom);

//     $tdNodes = $xpath->query('//img');
     print_r($url);
exit;

    // Periksa jika elemen ditemukan
    if ($tdNodes->length > 0) {
        // Ambil nilai teks dari elemen <td>
        $value = $tdNodes->item(11)->nodeValue;
        
        // Hapus karakter koma (,) jika ingin mendapatkan nilai numerik
        // $numericValue = str_replace(',', '', $value);
        // $numericValue = str_replace('Rp', '', $numericValue);

    } else {
        echo "Element tidak ditemukan.";
    }
    

    return $value;
}



?>