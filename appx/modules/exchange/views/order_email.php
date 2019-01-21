<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Order Confirmation</title>
	<style>
	html,
	body,
	table,
	tbody,
	tr,
	td,
	div,
	p,
	ul,
	ol,
	li,
	h1,
	h2,
	h3,
	h4,
	h5,
	h6 {
		margin: 0;
		padding: 0;
	}

	body {
		margin: 0;
		padding: 0;
		font-size: 0;
		line-height: 0;
		-ms-text-size-adjust: 100%;
		-webkit-text-size-adjust: 100%;
	}

	table {
		border-spacing: 0;
		mso-table-lspace: 0pt;
		mso-table-rspace: 0pt;
	}

	table td {
		border-collapse: collapse;
	}

	.ExternalClass {
		width: 100%;
	}

	.ExternalClass,
	.ExternalClass p,
	.ExternalClass span,
	.ExternalClass font,
	.ExternalClass td,
	.ExternalClass div {
		line-height: 100%;
	}
	/* Outermost container in Outlook.com */

	.ReadMsgBody {
		width: 100%;
	}

	img {
		-ms-interpolation-mode: bicubic;
	}
</style>
<style>
.container600 {
	width: 600px;
	max-width: 100%;
}

@media all and (max-width: 600px) {
	.container600 {
		width: 100% !important;
	}
}

.col49 {
	width: 49%;
}

.col2 {
	width: 2%;
}
.col50 {
	width: 50%;
}

@media all and (max-width: 599px) {
	.fluid {
		width: 100% !important;
	}
	.reorder {
		width: 100% !important;
		margin: 0 auto 10px;
	}
	.ghost-column {
		display:none;
		height:0;
		width:0;
		overflow:hidden;
		max-height:0;
		max-width:0;
	}
}
</style>

				    <!--[if gte mso 9]>
				        <style>
				            .ol {
				              width: 100%;
				            }
				        </style>
				    <![endif]-->
				</head>
				<body style="background-color: #f4f4f4;">
					<center>

				      <!--[if gte mso 9]><table width="600" cellpadding="0" cellspacing="0"><tr><td>
				      <![endif]-->
				      <table class="container600" cellpadding="0" cellspacing="0" border="0" width="100%" style="width:calc(100%);max-width:calc(600px);margin: 0 auto;">
				      	<tr>
				      		<td width="100%" style="text-align: left;">
				      			<table width="100%" cellpadding="0" cellspacing="0" border="0" style="min-width:100%;">
				      				<tr>
				      					<td width="100%" style="background-color:#F8F7F0;color:#58585A;padding:30px;">
				      						<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      							<tr>
				      								<td style="padding-top:10px;padding-bottom:24px;">
				      									<h1 style="font-family:Arial;font-size:28px;line-height:32px;">Forex Trader Order Confirmation</h1>
				      								</td>
				      							</tr>
				      						</table>
				      						<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      							<tr>
				      								<td style="padding-top:15px;padding-bottom:15px;">
				      									<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;">You have ordered foreign currency from our platform with the following details:</p>
				      								</td>
				      							</tr>
				      						</table>
				      					</td>
				      				</tr>
				      			</table>


				      			<table width="100%" cellpadding="0" cellspacing="0" border="0" style="min-width:100%;">
				      				<tr>
				      					<td width="100%" style="min-width:100%;background-color:#ffffff;padding:20px;">
				      						<table width="100%" cellpadding="0" cellspacing="0" border="0">
				      							<tr>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;"><strong>ORDER NUMBER:</strong></p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;">'.$order_details[0]['or_id'].'</p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      							</tr>



				      						</table>

				      						<table width="100%" cellpadding="0" cellspacing="0" border="0">
				      							<tr>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;"><strong>FOREIGN CURRENCY:</strong></p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;">'.$order_details[0]['fc_name'].'</p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      							</tr>



				      						</table>



				      						<table width="100%" cellpadding="0" cellspacing="0" border="0">
				      							<tr>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;"><strong>EXCHANGE RATE:</strong></p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;">'.$order_details[0]['er_rate'].'</p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      							</tr>



				      						</table>


				      						<table width="100%" cellpadding="0" cellspacing="0" border="0">
				      							<tr>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;"><strong>SURCHARGE PERCENTAGE:</strong></p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;">'.$order_details[0]['or_surcharge_percentage'].'</p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      							</tr>



				      						</table>


				      						<table width="100%" cellpadding="0" cellspacing="0" border="0">
				      							<tr>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;"><strong>FOREIGN CURRENCY PURCHASED:</strong></p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;">'.$order_details[0]['or_foreign_currency'].'</p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      							</tr>
				      						</table>

				      						<table width="100%" cellpadding="0" cellspacing="0" border="0">
				      							<tr>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;"><strong>ZAR AMOUNT:</strong></p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;">'.$order_details[0]['or_domestic_currency'].'</p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      							</tr>
				      						</table>


				      						<table width="100%" cellpadding="0" cellspacing="0" border="0">
				      							<tr>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;"><strong>SURCHARGE AMOUNT:</strong></p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;">'.$order_details[0]['or_surcharge_amount'].'</p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      							</tr>
				      						</table>


				      						<table width="100%" cellpadding="0" cellspacing="0" border="0">
				      							<tr>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;"><strong>ORDER DATE:</strong></p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      								<td width="50%" valign="top" style="background-color:#ffffff;">
				      									<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      										<tr>
				      											<td style="padding-top:15px;padding-bottom:15px;">
				      												<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;">'.$order_details[0]['or_date'].'</p>
				      											</td>
				      										</tr>
				      									</table>
				      								</td>
				      							</tr>
				      						</table>


				      					</td>
				      				</tr>
				      			</table>



				      		</td>
				      	</tr>
				      </table>

				      <table width="100%" cellpadding="0" cellspacing="0" border="0" style="min-width:100%;">
				      	<tr>
				      		<td width="100%" style="min-width:100%;">
				      			<table cellpadding="0" cellspacing="0" border="0" width="100%">
				      				<tr>
				      					<td style="padding:30px;background-color:#54be73;color:#ffffff;">
				      						<p style="font-family:Georgia, Arial, sans-serif;font-size:16px;line-height:20px;text-align: center;">2019 @ COPYRIGHT - FOREX TRADER</p>
				      					</td>
				      				</tr>
				      			</table>
				      		</td>
				      	</tr>
				      </table>
				  </td>
				</tr>
			</table>
				      <!--[if gte mso 9]></td></tr></table>
				      <![endif]-->
				  </center>
				</body>
				</html>