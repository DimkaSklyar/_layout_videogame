<? 
// mb_internal_encoding("UTF-8");
// ini_set('error_reporting', E_ALL);
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
use PHPMailer\PHPMailer\PHPMailer;
require_once($_SERVER['DOCUMENT_ROOT'] . '/smartbasket/php/config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['userName']) ) {
			if(empty($_POST['userName'])) {
				echo 'notName';
				die;
			} else {
				$name = "<b>Имя: </b>" . strip_tags($_POST['userName']) . "<br>";
			}
		}
		if (isset($_POST['userTel']) ) {
			if(empty($_POST['userTel'])) {
				echo 'notTel';
				die;
			} else {
				$tel = "<b>Телефон: </b>" . strip_tags($_POST['userTel']) . "<br>";
			}
		}

		$productArr=[];
		$counter = 0;
		$body;
		$bodyHeader = '<table border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px; border-right:1px; border-color:#e2e2e2; border-style: solid; width:600px" width="600" align="center">
			<tr >
				<th colspan="3" style="width: 300px; padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;">' . $name . '</th>
				<th colspan="3" style="width: 300px; padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;">' . $tel . '</th>
			</tr>';

		foreach ($_POST as $key =>  $value) {
			$body.= '<tr>';
			if (is_array($value) || $value instanceof Traversable) {
				foreach ($value as $k => $v) {

					if($k == 'productImg'){
						$productImg = '<img src="' . $v . '" width="100" height="100" alt="картинка товара">';
						$body.=
							'
											<td style="width: 100px; padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
											<div style="padding: 5px;">
											'
												. $productImg .
											'
											</div></td>';
					}
					if($k == 'productName'){
						$body.=
							'<td style="width: 200px;  padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
											<div style="padding: 5px;">
											'
							. $v .
							'
											</div></td>';
					}
					if($k == 'productId'){
						$body.=
							'<td style="width: 100px;  padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
												<div style="padding: 5px;">
												'
							. $v .
							'
												</div></td>';
					}
					if($k == 'productPrice'){
						$body.=
							'<td style="width: 100px;  padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
												<div style="padding: 5px;">
												'
							. $v .
							'
												</div></td>';
					}
					if($k == 'productQuantity'){
						$body.=
							'<td style="width: 100px;  padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
												<div style="padding: 5px;">
												'
							. $v .
							'
												</div></td>';
					}

					if($k == 'productPriceCommon'){
						$body.=
							'<td style="width: 100px;  padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
												<div style="padding: 5px;">
												'
							. $v .
							'
												</div></td>';
					}

				}

				$body.= '</tr>';
			}

		};
		$bodybottom = '</table>';
	}

	if (defined('HOST')) {
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = HOST; 
        $mail->SMTPAuth = true; 
        $mail->Username = LOGIN;
        $mail->Password = PASS;
        $mail->SMTPSecure = 'ssl'; 
        $mail->Port = PORT;
    } else {
        $mail = new PHPMailer;
		}
		$mail->setFrom(SENDER);
    $mail->addAddress(CATCHER);
    if(defined(CATCHER2)){
        $mail->addAddress(CATCHER2);
    }
    $mail->CharSet = CHARSET;
    $mail->isHTML(true); 
		$mail->Subject = SUBJECT; // Заголовок письма
		$mail->Body = "$bodyHeader $body $bodybottom";
		if(!$mail->send()) {
            echo 'attantion';
        } else {
            // echo '<p class="smartlid__respond-success">' . SUCCESSMSGS . '</p>';
            echo 'successmsgs';
        }
} else {
	header ("Location: /");
}