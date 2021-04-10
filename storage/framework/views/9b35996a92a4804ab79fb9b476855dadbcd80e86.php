<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
</head>
<body>
    <style>
        @media  only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media  only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }

		.header {color: #333; font-size: 19px; font-weight: bold; text-shadow: 0 1px 0 white;}
		.content-cell {font-size: 16px; line-height: 1.5;}
        .button {font-size: 16px; margin-bottom: 25px;}
		#logo {margin-bottom: 30px!important;}
		#td-content {color: #000000!important; text-align: justify!important;}
    </style>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" role="presentation">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0">
                            <table class="inner-body" align="center" width="750" cellpadding="0" cellspacing="0" role="presentation">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell">
										<table class="subcopy" width="100%" cellpadding="0" cellspacing="0" role="presentation">
											<tr id="tr-logo">
												<td align="center">
													<img id="logo" src="<?php echo e(asset('assets/images/logo/psikologi.png')); ?>" width="250">
												</td>
											</tr>
											<tr>
												<td id="td-content">
													<strong>Yth <?php echo e($user->nama_user); ?>,</strong>
													<br>
													Selamat Datang di PersonalityTalk!
													<br>
													Akun Anda telah berhasil diverifikasi. Sekarang Anda sudah dapat menggunakan fasilitas dari kami. Caranya tinggal <strong><a href="https://psikologanda.com"  target="_blank">KLIK DISINI</a></strong>.
												</td>
											</tr>
										</table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

					<tr>
						<td>
							<table class="footer" align="center" width="750" cellpadding="0" cellspacing="0" role="presentation">
								<tr>
									<td class="content-cell" align="center">
										© <?php echo e(date('Y')); ?> <?php echo e(config('app.name')); ?>. All rights reserved.
									</td>
								</tr>
							</table>
						</td>
					</tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
<?php /**PATH /var/www/vhosts/psikologanda.com/laravel-akademi/resources/views/email/verification.blade.php ENDPATH**/ ?>