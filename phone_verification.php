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


<div class="verification container-custom">
    <h2>Masukkan Kode Verifikasi</h2>
    <p>Kami telah mengirimkan kode verifikasi sebanyak 6 digit ke nomor handphone Anda. Silakan masukkan kode tersebut di bawah ini.</p>
    <form id="verification-form" method="POST">
        <div class="verify-code-inputs" style="display: flex; gap: 10px;">
            <input type="text" maxlength="1" class="form-control verify-input" required pattern="[0-9]" title="Hanya angka">
            <input type="text" maxlength="1" class="form-control verify-input" required pattern="[0-9]" title="Hanya angka">
            <input type="text" maxlength="1" class="form-control verify-input" required pattern="[0-9]" title="Hanya angka">
            <input type="text" maxlength="1" class="form-control verify-input" required pattern="[0-9]" title="Hanya angka">
            <input type="text" maxlength="1" class="form-control verify-input" required pattern="[0-9]" title="Hanya angka">
            <input type="text" maxlength="1" class="form-control verify-input" required pattern="[0-9]" title="Hanya angka">
        </div>
        <button type="submit" class="btn btn-primary btn-sm mt-3">Verifikasi</button>
    </form>

    <div class="mt-3">
        <p class="font-size-xs mb-0">Tidak menerima kode? <a href="#" id="resend-code">Kirim ulang kode</a></p>
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

        document.addEventListener("DOMContentLoaded", function() {
            const inputs = document.querySelectorAll(".verify-input");
    
            inputs.forEach((input, index) => {
                input.addEventListener("input", function() {
                    if (this.value.length === 1 && index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                });
    
                input.addEventListener("keydown", function(e) {
                    if (e.key === "Backspace" && this.value === "" && index > 0) {
                        inputs[index - 1].focus();
                    }
                });
            });
        });

        // Form submission handling (dummy implementation)
        // Form submission handling with AJAX
        $('#verification-form').on('submit', function(event) {
            event.preventDefault();
            const code = Array.from(inputs).map(input => input.value).join('');
            const submitButton = $(this).find('button[type="submit"]');

            submitButton.prop('disabled', true);
            submitButton.html('Memproses...');

            $.ajax({
                url: 'verify.php', 
                method: 'POST',
                data: { code: code },
                success: function(response) {
                    if (response.status === 'success') {
                        Swal.fire({
                            title: 'Kode berhasil diverifikasi',
                            text: response.message,
                            icon: 'success',
                            confirmButtonText: 'Oke Siap',
                            width: '90%',
                            customClass: { popup: 'swal-popup-mobile' }
                        });
                        $('#verification-form')[0].reset();
                    } else {
                        Swal.fire({
                            title: 'Kode tidak valid',
                            text: response.message,
                            icon: 'error',
                            confirmButtonText: 'Coba Lagi',
                            width: '90%',
                            customClass: { popup: 'swal-popup-mobile' }
                        });
                    }
                },
                error: function() {
                    Swal.fire({
                        title: 'Gagal!',
                        text: 'Terjadi kesalahan. Silakan coba lagi.',
                        icon: 'error',
                        confirmButtonText: 'Mengerti',
                        width: '90%',
                        customClass: { popup: 'swal-popup-mobile' }
                    });
                },
                complete: function() {
                    submitButton.prop('disabled', false);
                    submitButton.html('Verifikasi');
                }
            });
        });

    </script>
    
</body>
</html>
