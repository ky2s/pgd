<?php include('home.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harga Emas Hari Ini | Update Harga Emas Harian | Pantau Harga Setiap Hari</title>
    <meta name="title" content="Update Harga Emas Harian | Pantau Harga Setiap Hari">
    <meta name="description" content="Pantau harga emas setiap hari dengan Etalastok Emas. Dapatkan update harga emas terbaru langsung dari HP kamu.">
    <link rel="canonical" href="https://emas.etalastok.com/">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://emas.etalastok.com">
    <meta property="og:title" content="Update Harga Emas Harian | Pantau Harga Setiap Hari">
    <meta property="og:description" content="Pantau harga emas setiap hari. Dapatkan update harga emas terbaru langsung dari HP kamu.">
    <meta property="og:image" content="https://etalastok.com/assets/img/emas-banner.jpg">

    <!-- Twitter -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="https://emas.etalastok.com">
    <meta name="twitter:title" content="Update Harga Emas Harian | Pantau Harga Setiap Hari">
    <meta name="twitter:description" content="Pantau harga emas setiap hari. Dapatkan update harga emas terbaru langsung dari HP kamu.">
    <meta name="twitter:image" content="https://etalastok.com/assets/img/emas-banner.jpg">

    <link rel="icon" href="/emas/etalastok-icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css"> 
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-R4RWJGMS50"></script>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-R4RWJGMS50');
    </script>

    <meta name="msvalidate.01" content="2BF5576477E1ED906C46D615A0DE816F" />  

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PK74FB9J');</script>
    <!-- End Google Tag Manager -->  

    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "WebSite",
        "name": "Etalastok Emas",
        "url": "https://emas.etalastok.com",
        "description": "Pantau harga emas setiap hari dan dapatkan pembaruan langsung di ponsel Anda.",
        "publisher": {
          "@type": "Organization",
          "name": "Etalastok"
        }
      }
      </script>
      <link rel="stylesheet" href="assets/css/style.css">
      <style>
        .benefits {
            height: 100%;
        }
        #resultCol {
            transition: all 0.3s ease;
        }
        </style>
</head>
<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PK74FB9J"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div class="container-custom">
        <h1>Harga Emas Hari Ini <span class="unit">(/gram)</span></h1>
        <div class="date-info"></div>
        <div class="price" id="gold-price">Rp 0</div>
        <div id="price-change">
            <span id="price-status"></span>
        </div>
        <div class="price-before "><small>Harga kemarin: <span id="ytd-price">Rp 0<span></small></div>

        <h2 class="share-title">Bagikan ke Sosial Media</h2>

        <div class="share-buttons">
            <a class="share-button whatsapp" href="" target="_blank">
            <i class="fab fa-whatsapp"></i> WhatsApp
            </a>

            <a class="share-button facebook" href="https://www.facebook.com/sharer/sharer.php?u=https://emas.etalastok.com" target="_blank">
            <i class="fab fa-facebook"></i> Facebook
            </a>

            <a class="share-button twitter" href="" target="_blank">
            <i class="fab fa-twitter"></i> Twitter
            </a>
        </div>
    </div>

    <div class="container-custom">
        <button class="btn btn-secondary btn-sm" onclick="updateChartData('daily')">7 Hari</button>
        <button class="btn btn-secondary btn-sm" onclick="updateChartData('monthly')">1 Bulan</button>
        
        <div class="chart-container">
            <canvas id="goldChart"></canvas>
        </div>
    </div>

    <div class="container-custom">
        <div class="row">
            
            <!-- Kolom 1 -->
            <div class="col-12 col-md-6 mb-4">
                <div class="benefits">
                    <img src="assets/gold.jpg" class="img-fluid mb-3" alt="Emas">
                    <h2>Kelebihan dan Keuntungan Membeli Emas</h2>
                    <ul>
                        <li>Emas adalah aset yang tahan inflasi.</li>
                        <li>Emas memiliki likuiditas tinggi dan mudah diperjualbelikan.</li>
                        <li>Investasi emas dapat mendiversifikasi portofolio Anda.</li>
                        <li>Emas dapat digunakan sebagai jaminan untuk pinjaman.</li>
                        <li>Nilai emas cenderung stabil dan mengalami kenaikan dalam jangka panjang.</li>
                    </ul>
                </div>
            </div>

            <!-- Kolom 2 -->
            <div class="col-12 col-md-6 mb-4">
                <div class="benefits">
                    <img src="assets/grafic.jpg" class="img-fluid mb-3" alt="Grafik Emas">
                    <h2 class="card-title">Ikuti Pergerakan Harga Emas Setiap Hari!</h2>
                    <p class="card-text">
                        Anda ingin tahu harga emas terbaru setiap hari? Jangan lewatkan kesempatan untuk selalu up-to-date dengan informasi terkini mengenai pergerakan harga emas!
                    </p>
                    <h6>Kenapa Harus Berlangganan?</h6>
                    <ul>
                        <li><strong>Informasi Terkini</strong><br>
                            Dapatkan update harga emas terbaru setiap hari langsung di inbox Anda.</li>
                        <li><strong>Keputusan Investasi yang Tepat</strong><br>
                            Informasi harga emas yang akurat membantu Anda membuat keputusan investasi yang lebih baik.</li>
                        <li><strong>Tidak Ketinggalan Peluang</strong><br>
                            Jangan sampai melewatkan peluang emas untuk membeli atau menjual dengan harga terbaik.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
   
    <div class="subscribe container-custom">
        <h2>Gabung sekarang untuk update harga Emas</h2>
        <p>Masukkan email Anda di bawah ini dan mulai terima update harga emas setiap hari. <br>Langganan ini gratis dan dapat Anda batalkan kapan saja.</p>
        <form id="subscribe-form" method="POST">
            <input type="text" id="name" name="name" placeholder="Nama" required class="form-control">
            <input type="email" id="email" name="email" placeholder="Email" required class="form-control">
            <div class="tnc">
                <input type="checkbox" id="terms" required><label class="form-check-label" for="terms">Saya setuju untuk menerima email mengenai harga emas harian dan informasi terkait lainnya</label>
            </div>

            <button id="register-btn" type="submit" class="btn btn-primary btn-sm" disabled>Gabung Sekarang</button>
        </form>
        <div class="alert alert-warning mt-3 " role="alert">
            <p class="font-size-xs mb-0">Informasi kenaikan dan penurunan harga emas bersumber dari site resmi PT Antam Tbk <br>dan diperbaharui setiap pukul 09.00 WIB.</p>
        </div>

        <div class="mt-3 " >
            <p class="font-size-xs mb-0"><i class="fas fa-envelope"></i> info@etalastok.com</p>
        </div>
    </div>

    <div class="container-custom">
        <div class="row justify-content-center" id="mainRow">

            <!-- FORM COLUMN -->
            <div id="formCol" class="col-12 col-md-6 mx-auto">

            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="text-center mb-4">Kalkulator Untung / Rugi Emas</h5>
                    <div class="alert alert-light border text-center">
                        Harga jual hari ini (/gram)<br>
                        <strong id="hargaHariIni" class="text-success"></strong>
                    </div>

                    <div class="form-group">
                        <label>Berat emas (gram)</label>
                        <input type="number" class="form-control" id="berat" placeholder="Contoh: 3">
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp</span>
                            </div>
                            <input type="text" class="form-control" id="totalBeli" placeholder="4.500.000">
                        </div>
                    </div>

                    <button class="btn btn-primary btn-block" onclick="hitung()">Hitung</button>
                    <!-- <button class="btn btn-outline-secondary btn-block mt-2" onclick="resetCalc()">Reset</button> -->
                </div>
            </div>
            </div>

            <!-- RESULT COLUMN -->
            <div id="resultCol" class="col-12 col-md-6 d-none">

                <div id="resultCard" class="card shadow-sm h-100">
                    <div class="card-body text-center">

                    <p class="mb-1">Modal Awal</p>
                    <h5 id="modal"></h5>

                    <p class="mb-1 mt-3">Nilai Jual Hari Ini</p>
                    <h5 id="nilaiJual"></h5>

                    <hr>

                    <h5 id="status"></h5>
                    <h4 id="profit"></h4>

                    </div>
                </div>

            </div>

        </div>
        </div>


    <div class="container-custom">
        <div class="benefits">

            <h2 class="card-title">Apakah Anda termasuk orang yang ingin memiliki emas karena harganya yang cenderung naik dari hari ke hari?</h5>
            <a href="https://tokopedia.link/ShZPtc8UDOb"rel="nofollow" ><img src="assets/rahasia-membeli-emas-dengan-harga-diskon.jpg"></a>
            <p class="card-text">Meskipun ada juga sebagian orang yang suka memiliki emas karena ingin menjadikannya sebagai perhiasan dan sambil berinvestasi. Sebenarnya cara berinvestasi emas yang benar adalah dengan membeli emas logam mulia 23 karat. </p>

            <h6>Ada banyak masalah ketika kita harus membeli emas untuk berinvestasi, apa saja masalahnya? </h6>
            <ul>
                <li><strong>Emas cukup sulit untuk disimpan</strong>: 
                    <br>Bagaimana tidak? Semakin banyak emas yang kita miliki, kita akan semakin khawatir jika dicuri, akhirnya kita harus menyimpan pada brankas atau safe deposit box.</li>
                <li><strong>Emas batangan dengan gramasi yang kecil sebenarnya merugikan kita</strong>: 
                    <br>Karena pembuatan emas dengan gramasi yang kecil akan menjadi mahal pada biaya cetak.</li>
                <li><strong>Seri emas logam mulia desain berganti</strong>: 
                    <br>Setiap design emas berbeda-beda dan memiliki potongan harga yang berbeda.</li>
                <li><strong>sertifikat yang hilang</strong>: 
                    <br>Di zaman yang serba digital, menabung emas dengan buku tabungan emas adalah era yang modern.</li>
            </ul>

            <p>
            Tapi di buku ini kita akan belajar bagaimana caranya membeli emas lebih daripada yang Anda lakukan dengan buku tabungan emas. Anda membeli 1 gram seharga 1 gram emas? Dan tercatat pada buku tabungan? Hmmm... Strategi yang bagus! 
            </p>

            <p>Bagaimana kalau membeli 2 gram seharga 1 gram emas? Bagaimana bisa? Mari kita bahas dalam buku ini!</p>

            <a href="https://lynk.id/emas.etalastok" rel="nofollow" class="btn btn-primary btn mx-auto">Beli Bukunya Sekarang</a>
        </div>
    </div>

    <footer>&copy; 2024 Harga Emas</footer>
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>

        const termsCheckbox = document.getElementById('terms');
        const registerButton = document.getElementById('register-btn');

        termsCheckbox.addEventListener('change', function() {
            registerButton.disabled = !this.checked;
        });

        // Fetch gold price (dummy implementation)
        // Replace with actual API call if needed
        const todayPrice = <?= $dailyText ?>; // Today's price
        const yesterdayPrice = <?= $dailyYesText ?>; // Yesterday's price
        document.getElementById('gold-price').innerText = `Rp ${todayPrice.toLocaleString()}`;

        // date
        const dateElement = document.querySelector('.date-info');
        const today = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDate = today.toLocaleDateString('id-ID', options);
        dateElement.innerText = `${formattedDate}`;

        const priceChangeElement = document.getElementById('price-status');
        let priceChangeText = '';
        if (todayPrice > yesterdayPrice) {
            priceChangeText = `Naik Rp +${(todayPrice - yesterdayPrice).toLocaleString()} dari kemarin`;
            priceChangeElement.innerHTML = `<span style="color: green;">&#9650; ${priceChangeText}</span>`;
        } else if (todayPrice < yesterdayPrice) {
            priceChangeText = `Turun Rp -${(yesterdayPrice - todayPrice).toLocaleString()} dari kemarin`;
            priceChangeElement.innerHTML = `<span style="color: red;">&#9660; ${priceChangeText}</span>`;
        } else {
            priceChangeText = `Harga tetap sama seperti kemarin`;
            priceChangeElement.innerHTML = `<span>${priceChangeText}</span>`;
        }

        // yesterday
        document.getElementById('ytd-price').innerText =  `Rp ${yesterdayPrice.toLocaleString()}`;

        // share button
        const updateShareLinks = () => {
            const goldPriceText = document.getElementById('gold-price').innerText;
            const whatsappLink = document.querySelector('.share-button.whatsapp');
            const twitterLink = document.querySelector('.share-button.twitter');

            const whatsappMessage = encodeURIComponent(`Pantau harga emas setiap hari langsung dari HP kamu!\n\nHarga emas hari ini: ${goldPriceText}.\n${priceChangeText}.\n\nCek update terbaru dan jangan sampai ketinggalan info harga emas harian.\nKlik di sini: https://emas.etalastok.com`);
            const twitterMessage = encodeURIComponent(`Pantau harga emas setiap hari langsung dari HP kamu! Harga emas hari ini: ${goldPriceText}. ${priceChangeText}. Cek update terbaru dan jangan sampai ketinggalan info harga emas harian. Klik di sini: https://emas.etalastok.com`);

            whatsappLink.href = `https://api.whatsapp.com/send?text=${whatsappMessage}`;
            twitterLink.href = `https://twitter.com/intent/tweet?text=${twitterMessage}`;
        };
        updateShareLinks();

        // Gold price data
        const dailyData = {
            labels: <?=$days_json?>,
            datasets: [{
                label: 'Harga Emas 7 Hari',
                data: <?=$price_json?>,
                backgroundColor: 'rgba(230, 126, 34, 0.1)',
                borderColor: 'rgba(230, 126, 34, 1)',
                pointBackgroundColor: 'rgba(230, 126, 34, 1)',
                pointBorderColor: '#fff',
                pointHoverRadius: 6,
                pointRadius: 4,
                borderWidth: 2,
                fill: true,
            }]
        };

        const monthlyData = {
            labels: <?=$monthly_json?>,
            datasets: [{
                label: 'Harga Emas 1 Bulan',
                data: <?=$monthly_price_json?>,
                backgroundColor: 'rgba(46, 204, 113, 0.1)',
                borderColor: 'rgba(46, 204, 113, 1)',
                pointBackgroundColor: 'rgba(46, 204, 113, 1)',
                pointBorderColor: '#fff',
                pointHoverRadius: 6,
                pointRadius: 4,
                borderWidth: 2,
                fill: true,
            }]
        };

        // Chart configuration
        const config = {
            type: 'line',
            data: dailyData, // Default: harian
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            color: '#333',
                            font: {
                                size: 14,
                                family: 'Arial, sans-serif'
                            }
                        }
                    },
                    tooltip: {
                        backgroundColor: '#333',
                        titleColor: '#fff',
                        bodyColor: '#eee',
                        cornerRadius: 0,
                        padding: 10,
                    }
                },
                scales: {
                    x: {
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        },
                        ticks: {
                            color: '#666'
                        }
                    },
                    y: {
                        min: 2500000,
                        max: 3500000,
                        grid: {
                            color: 'rgba(0,0,0,0.05)'
                        },
                        ticks: {
                            color: '#666',
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    }
                }
            }
        };

        // Render the chart
        const goldChart = new Chart(
            document.getElementById('goldChart'),
            config
        );

        // Form submission handling (dummy implementation)
        // Form submission handling with AJAX
        $('#subscribe-form').on('submit', function(event) {
        event.preventDefault();
        const name = $('#name').val();
        const email = $('#email').val();
        const submitButton = $('#register-btn');

        submitButton.prop('disabled', true);
        submitButton.html('Memproses...');

        $.ajax({
            url: 'home.php', 
            method: 'POST',
            data: {
                name: name,
                email: email
            },
            success: function(response) {
                console.log(response.status);
                if (response.status === 'success') {
                    Swal.fire({
                        title: 'Kamu sudah berhasil bergabung',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'Oke Siap',
                        width: '90%', // Lebar pop-up di mobile
                        customClass: {
                            popup: 'swal-popup-mobile' // Tambahkan custom class kalau mau styling tambahan
                        }
                    });
                    $('#subscribe-form')[0].reset();
                } else {
                    Swal.fire({
                        title: 'Kamu gagal bergabung',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'Coba Lagi',
                        width: '90%',
                        customClass: {
                            popup: 'swal-popup-mobile'
                        }
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Gagal!',
                    text: 'Maaf, terjadi kesalahan. Silakan coba lagi.',
                    icon: 'error',
                    confirmButtonText: 'Mengerti',
                    width: '90%',
                    customClass: {
                        popup: 'swal-popup-mobile'
                    }
                });
            },
            complete: function() {
                submitButton.prop('disabled', false);
                submitButton.html('Gabung Sekarang');
            }
        });
    });

        // Function to update the chart data
        function updateChartData(period) {
            if (period === 'daily') {
                goldChart.data = dailyData;
            } else if (period === 'monthly') {
                goldChart.data = monthlyData;
            }
            goldChart.update();
        }
    </script>
    
    <script>
        const inputTotalBeli = document.getElementById("totalBeli");

        inputTotalBeli.addEventListener("input", function (e) {
        let value = e.target.value;

        // hapus semua selain angka
        value = value.replace(/\D/g, "");

        // format ribuan
        e.target.value = formatRupiah(value);
        });

        function formatRupiah(angka) {
        return angka.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        // hitung
        const hargaHariIni = <?= $dailySellText ?>; // realtime dari API
        document.getElementById("hargaHariIni").innerText =
        "Rp " + hargaHariIni.toLocaleString("id-ID");

        function hitung() {
            const berat = parseFloat(document.getElementById("berat").value);
            const totalBeli = parseFloat(
                document.getElementById("totalBeli").value.replace(/\./g, "")
            );


            if (!berat || !totalBeli) {
                alert("Mohon lengkapi data");
                return;
            }

            const modal = totalBeli;
            const nilaiJual = berat * hargaHariIni;
            const profit = nilaiJual - modal;
            const persen = (profit / modal) * 100;

            let statusText = "BEP";
            let statusClass = "text-secondary";

            if (profit > 0) {
                statusText = "Untung";
                statusClass = "text-success";
            } else if (profit < 0) {
                statusText = "Rugi";
                statusClass = "text-danger";
            }

            document.getElementById("modal").innerText =
                "Rp " + modal.toLocaleString("id-ID");

            document.getElementById("nilaiJual").innerText =
                "Rp " + nilaiJual.toLocaleString("id-ID");

            document.getElementById("status").innerHTML =
                `<span class="${statusClass}">${statusText}</span>`;

            document.getElementById("profit").innerHTML =
                `<span class="${statusClass}">
                Rp ${profit.toLocaleString("id-ID")} (${persen.toFixed(2)}%)
                </span>`;

            // ubah layout jadi 2 kolom (desktop)
            document.getElementById("formCol").classList.remove("mx-auto");
            document.getElementById("resultCol").classList.remove("d-none");

        }
        </script>


</body>
</html>
