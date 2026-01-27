<?php include('home.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Harga Emas Hari Ini | Update Harga Emas Harian | Pantau Harga Setiap Hari</title>
    <meta name="title" content="Update Harga Emas Harian | Pantau Harga Setiap Hari">
    <meta name="description" content="Pantau harga emas setiap hari dengan Etalastok Emas. Dapatkan update harga emas terbaru langsung dari HP kamu.">

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
    
</head>
<body>


    <div class="subscribe container-custom wa">
        <h2>Gabung sekarang untuk update via WhatsApp</h2>
        <p>Masukkan nomor handphone Anda di bawah ini dan mulai terima update harga emas setiap hari. <br>Langganan ini gratis dan dapat Anda batalkan kapan saja.</p>
    
        <form id="phone-subscribe-form" method="POST">
            <div class="phone-input-wrapper" style="display: flex; align-items: center;justify-content:center; ">
                <span class="phone-prefix" style="padding: 0 10px; background-color: #f0f0f0; border: 1px solid #ccc; border-right: none; height: 38px; display: flex; align-items: center;">+62</span>
                <input type="tel" id="phone" name="phone" placeholder="exp: 8571999888" required class="form-control" style="border-left: none;" pattern="[0-9]+" title="Hanya boleh angka">
            </div>
            
            <div class="tnc">
                <input type="checkbox" id="terms" required><label class="form-check-label" for="terms">Saya setuju untuk menerima pesan WA mengenai harga emas harian dan informasi terkait lainnya</label>
            </div>

            <button id="phone-register-btn" type="submit" class="btn btn-primary btn-sm" disabled>Lanjutkan</button>
        </form>
        <div class="alert alert-warning mt-3" role="alert">
            <p class="font-size-xs mb-0">Informasi kenaikan dan penurunan harga emas bersumber dari site resmi PT Antam Tbk <br>dan diperbaharui setiap pukul 09.00 WIB.</p>
        </div>

        <div class="mt-3">
            <p class="font-size-xs mb-0"><i class="fas fa-envelope"></i> info@etalastok.com</p>
        </div>
    </div>


    <footer>&copy; <?php echo date('Y') ?> Etalastok | Harga Emas</footer>
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

    </script>
    
</body>
</html>
