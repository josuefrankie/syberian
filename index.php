<?php
//Script Author: ᴛɪᴋᴏʟ4ʟɪғᴇ https://t.me/Tikol4Life
	include 'config.php';
	/*if (!(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' || $_SERVER['HTTPS'] == 1) || isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))	{
	   $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
	   header('HTTP/1.1 301 Moved Permanently');
	   header('Location: ' . $redirect);
	   exit();
	}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- BASIC DATA -->
	<meta charset="utf-8">
	<title><?php echo $site_name;?></title>
	<meta name="author" content="<?php echo $owner ?>">
	<link rel="icon" href="<?php echo $site_icon; ?>" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="<?php echo $owner ?> CC Checker">
	<!-- BOOTSTRAP -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body onload="ccgen();  onLoadChks();"style="background: linear-gradient(to bottom, #00126b 0%, #000000 98%)">
	<BGSOUND src="assets/sfx/success.mp3" loop=infinite>
	<audio id="click" src="assets/sfx/click.mp3"></audio>
	<audio id="error" src="assets/sfx/error.mp3"></audio>
	<audio id="success" src="assets/sfx/success.mp3"></audio>
	<audio id="hahahah" src="assets/sfx/hahahah.mp3"></audio>
	<div class="container" id="container">
		<!-- START OF IMAGE HEADER -->
		<div class="row justify-content-md-center">
			<div class="col-md">
				<center>
					<img class="rounded-circle" src="syberian.png" width="250" height="250" style="margin-top: 15px;" onclick="modalCCGEN();">
				</center>
			</div>
		</div>
		<!-- END OF IMAGE HEADER -->
		<!-- START OF FORMS -->
		<div class="row justify-content-md-center" style="margin-top: 20px;">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form>
					<div class="form-group">
						<center><label for="cards" style="font-family: angry;color: white">Generated Cards</label></center>
						<textarea class="form-control" style="background: transparent;color: #FFFFFF;overflow:hidden" id="cards" rows="5" placeholder="xxxxxxxxxxxxxxxx|xx|xxxx|xxx" required></textarea>
					</div>
					<div class="form-group">
						<center><label for="sk" style="font-family: angry;color: white">STRIPE API</label>
						<div class="input-group mb-3 ">
							<select class="form-control" id="api" style="background: transparent;color: #FFFFFF;" onchange="showDiv('hidden_div', this)">
								<?php for ($i=0; $i < count($api_file); $i++) {
								echo '<option style="background: #212121" value="'.$api_file[$i].'">'.$api_name[$i].'</option>';
								}?>	
							</select>
							<div class="input-group-append">
								<button class="btn btn-outline-danger" type="button" onclick="Settings();">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
										<path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
										</svg>
								</button>
							</div>
						</div>
						
					</div>
					<div class="form-group" id="hidden_div" style="display:none;">
						<center><label for="sk" style="font-family: angry;color: white;">STRIPE SECRET KEY (SK)</label>
						<div class="input-group mb-3">
							<input type="text" class="form-control" style="background: transparent;color: #FFFFFF;" id="sk" aria-describedby="sk" placeholder="sk_live_xxxxxxxxxxxxxxxxxx">
							<div class="input-group-append">
								<button class="btn btn-outline-danger" type="button" onclick="copySK();">
									<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-clipboard" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  										<path fill-rule="evenodd" d="M4 1.5H3a2 2 0 0 0-2 2V14a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V3.5a2 2 0 0 0-2-2h-1v1h1a1 1 0 0 1 1 1V14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V3.5a1 1 0 0 1 1-1h1v-1z"/>
  										<path fill-rule="evenodd" d="M9.5 1h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zm-3-1A1.5 1.5 0 0 0 5 1.5v1A1.5 1.5 0 0 0 6.5 4h3A1.5 1.5 0 0 0 11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3z"/>
									</svg>
								</button>
								<button class="btn btn-outline-danger" style="font-family: angry" type="button" onclick="checkSK();">CHECK SK</button>
							</div>
						</div>
					</div>
					<button style="font-family: Angry" style="margin-top: 20px" type="button" class="btn btn-outline-danger btn-block" onclick="checkCards();">CHECK CARDS</button>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row justify-content-md-center" style="margin-top: 40px;">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form>
					<div class="form-group">
						<div class="row">
							<div class="col-4">
								<button id="cardsLiveCVV" name="cardsLiveCVV" type="button" class="btn btn-outline-primary btn-block" style="font-size: 12px;font-family: angry; "> cvv : <span id="approved_counter_cvv">0</span></button>
								<div class="row">
									<div class="col-sm-4"></div>
									<div class="col-12 col-sm-8">
										<button type="button" style="margin-top: 10px;" name="clear_cvv" id="clear_cvv" class="btn btn-danger btn-sm btn-block" onclick="clearCVV();">Clear CVV</button>
									</div>
								</div>
							</div>
							<div class="col-4">
								<button id="cardsLiveCCN" name="cardsLiveCCN" type="button" class="btn btn-outline-warning btn-block" style="font-size: 12px;font-family: angry; "> ccn : <span id="approved_counter_ccn">0</span></button>
								<div class="row">
									<div class="col-sm-4"></div>
									<div class="col-12 col-sm-8">
										<button type="button" style="margin-top: 10px;" name="clear_ccn" id="clear_ccn" class="btn btn-danger btn-sm btn-block" onclick="clearCCN();">Clear CCN</button>
									</div>
								</div>
							</div>
							<div class="col-4">
								<button id="cardsDead" name="cardsDead" type="button" class="btn btn-outline-danger btn-block" style="font-size: 12px;font-family: angry; ">  dead : <span id="decline_counter">0</span></button>
								<div class="row">
									<div class="col-sm-4"></div>
									<div class="col-12 col-sm-8">
										<button type="button" style="margin-top: 10px;" name="clear_dead" id="clear_dead" class="btn btn-danger btn-sm btn-block" onclick="clearDead();">Clear DEAD</button>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row justify-content-md-center" >
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<form>
					<div class="form-group" style="margin-left: 40px;margin-right: 40px;">
						<div class="results" id="results">
						</div>
					</div>
				</form>
			</div>
			<div class="col-md-2"></div>
		</div>
		<!-- END OF FORMS -->
		<h6><div class="footer" id="footer"><p style="font-family: Angry;color: white"><marquee>Tikol4Life</marquee></p></center></div></h6>
	</div>
	<!-- START OF CCGEN MODAL -->
	<div class="modal fade" id="ccGEN" role="dialog" aria-hidden="true" >
		<div class="modal-dialog modal-dialog-centered"  style="background: transparent;">
			<div class="modal-content" style="background: transparent;">
				<div class="modal-body" style="background: #212121">
					<center style="margin-bottom: 20px">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" style="color: #ffffff">&times;</span>
						</button>
						<img class="rounded-circle" src="<?php echo $site_icon; ?>" width="200" height="200" style="margin-top: 10px;margin-bottom: 20px;" >
						<h5 style="font-family: angry;color: white;">CC Generator</h5>
					</center>
					<form name="console" id="console" role="form" method="POST">
						<div>
							<div class="row">
								<div class="col-8 col-lg-8">
									<div class="form-group">
										<label class="form-control-label text-white" style="font-family: Angry" style="margin-left: 10px" for="inputbin">BIN</label>
										<input id="ccpN" name="ccp" maxlength="19" type="text" id="inputbin" class="form-control text-white" style="background: transparent;" placeholder="xxxx xxxx xxxx xxxx">
									</div>
								</div>
								<div class="col-4 col-lg-4">
									<div class="form-group">
										<label class="form-control-label text-white" style="font-family: Angry" style="margin-left: 10px" for="inputcvv">CVV</label>
										<input type="text" id="eccv" name="eccv" style="background: transparent;" class="form-control text-white" placeholder="rnd" value="rnd">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-4 col-lg-4">
									<div class="form-group">
										<select name="ccoudatfmt" class="input_text" style="display:none;">
											<option value="CHECKER" selected="selected">CHK</option>
											<option value="CSV">CSV</option>
											<option value="XML">XML</option>
											<option value="JSON">JSON</option>
										</select>
										<input type="hidden" name="tr" value="2000">
										<input type="hidden" name="L" style="width: 20px" value="1L">
										<div type="hidden" id="bininfo" align="center"></div>
										<label class="form-control-label text-white" style="font-family: Angry" style="margin-left: 10px" for="inputmonth">MONTH</label>
										<select class="form-control text-white" style="background: transparent;" name="emeses">
											<option style="background: #212121" value="rnd">RANDOM  </option>
											<option style="background: #212121" value="01">01 - JAN</option>
											<option style="background: #212121" value="02">02 - FEB</option>
											<option style="background: #212121" value="03">03 - MAR</option>
											<option style="background: #212121" value="04">04 - APR</option>
											<option style="background: #212121" value="05">05 - MAY</option>
											<option style="background: #212121" value="06">06 - JUN</option>
											<option style="background: #212121" value="07">07 - JUL</option>
											<option style="background: #212121" value="08">08 - AUG</option>
											<option style="background: #212121" value="09">09 - SEP</option>
											<option style="background: #212121" value="10">10 - OCT</option>
											<option style="background: #212121" value="11">11 - NOV</option>
											<option style="background: #212121" value="12">12 - DEC</option>
										</select>
									</div>
								</div>
								<div class="col-4 col-lg-4">
									<div class="form-group">
										<label class="form-control-label text-white" style="font-family: Angry" style="margin-left: 10px" for="inputyear">YEAR</label>
										<select class="form-control text-white" style="background: transparent;" name="eyear">
											<option style="background: #212121" value="rnd">RANDOM</option>
											<option style="background: #212121" value="2020">2020</option>
											<option style="background: #212121" value="2021">2021</option>
											<option style="background: #212121" value="2022">2022</option>
											<option style="background: #212121" value="2023">2023</option>
											<option style="background: #212121" value="2024">2024</option>
											<option style="background: #212121" value="2025">2025</option>
											<option style="background: #212121" value="2026">2026</option>
											<option style="background: #212121" value="2027">2027</option>
											<option style="background: #212121" value="2028">2028</option>
											<option style="background: #212121" value="2029">2029</option>
											<option style="background: #212121" value="2030">2030</option>
										</select>
									</div>
								</div>
								<div class="col-4  col-lg-4">
									<div class="form-group">
										<label class="form-control-label text-white" style="font-family: Angry" style="margin-left: 10px" for="inputquantity">QUANTITY</label>
										<input type="number" name="ccghm" style="background: transparent;" maxlength="4" class="form-control text-white" value="10">
										<select name="ccnsp" class="input_text" style="display:none;">
											<option selected="selected">None</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<button type="button" style="font-family: Angry" style="margin-right: 20px;margin-left: 20px;" class="btn btn-outline-danger btn-block"  name="gerar" id="gerar" onclick="playClick();">GENERATE</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF CCGEN MODAL -->
	<!-- START OF TEMPLATE MODAL -->
	<div class="modal fade" id="Modal" data-keyboard="false" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog  modal-dialog-centered">
			<div class="modal-content" style="background: #212121">
				<div class="modal-body" style="background: #212121">
					<center style="margin-bottom: 20px">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" style="color: #ffffff">&times;</span>
						</button>
						<img class="rounded-circle" src="<?php echo $site_icon; ?>" width="200" height="200" style="margin-top: 10px;margin-bottom: 20px;" >
						<h5 class="modal-title" id="ModalTitle" style="color: #ffffff"></h5>
						<span id="ModalMsg" style="color: #ffffff;margin-top: 20px"></span>
					</center>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF TEMPLATE MODAL -->
	<!-- START OF SETTINGS MODAL -->
	<div class="modal fade" id="settingsModal" role="dialog" aria-hidden="true" >
		<div class="modal-dialog modal-dialog-centered"  style="background: transparent;">
			<div class="modal-content" style="background: transparent;">
				<div class="modal-body" style="background: #212121">
					<center style="margin-bottom: 20px">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true" style="color: #ffffff">&times;</span>
						</button>
						<img class="rounded-circle" src="<?php echo $site_icon; ?>" width="200" height="200" style="margin-top: 10px;margin-bottom: 20px;" >
						<h5 class="modal-title" id="exampleModalCenterTitle" style="font-family: angry;color: white">Additional Settings</h5>
					</center>

					<form name="settingForm" id="settingForm" role="form" method="POST">
						<div>
							<div class="row">
								<div class="col-12">
									<label class="form-control-label" style="font-family: angry;color: white" for="telebot">TELEGRAM FORWARDER</label>
									<div class="input-group mb-3">
										<input name="telebot" type="text" id="telebot" class="form-control text-white" style="background: transparent;" placeholder="Chat ID" >
										<div class="input-group-append">
											<button class="btn btn-outline-danger" type="button" onclick="howto();" >
												<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-patch-question" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													<path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
													<path fill-rule="evenodd" d="M10.273 2.513l-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
												</svg>
											</button>
											<button class="btn btn-outline-danger" type="button" onclick="testBot();" >
												<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-patch-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
													<path fill-rule="evenodd" d="M10.273 2.513l-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
													<path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
												</svg>
											</button>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-6 col-lg-6">
									<label class="form-control-label text-white" style="font-family: angry;color: white" for="tele_msg">MESSAGE</label>
									<select class="form-control text-white" style="background: transparent;" id="tele_msg" >
										<option style="background: #212121" value="1">CVV Only</option>
										<option style="background: #212121" value="2">CCN Only</option>
										<option style="background: #212121" value="3">CVV & CCN</option>
									</select>
								</div>
								<div class="col-6 col-lg-6">
									<div class="form-group">
										<label class="form-control-label text-white" style="font-family: angry;color: white" for="delay">DELAY</label>
										<select class="form-control text-white" style="background: transparent;" id="delay" >
											<option style="background: #212121" value="0">No Delay</option>
											<option style="background: #212121" value="200">0.2 Sec</option>
											<option style="background: #212121" value="500">0.5 Sec</option>
											<option style="background: #212121" value="1000" selected> 1  Sec</option>
											<option style="background: #212121" value="2000"> 2  Sec</option>
											<option style="background: #212121" value="3000"> 3  Sec</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</form>
					<center>
						<h6 id="TeleMsg" style="color: #ffffff;margin-top: 20px"></h6>
					</center>
					<div name="howto" id="howto">
						<center >
							<h5 class="modal-title" id="exampleModalCenterTitle" style="font-family: angry;color: white">How To Use</h5>
							<h6 style="color: #ffffff;">[1] Open our Telegram Bot: <a href="https://t.me/OppaTikoleroBot" target="_blank">@OppaTikoleroBot</a>.

							</h6>
							<h6 style="color: #ffffff;">[2] Copy-Paste the Chat ID given by the bot.</h6>
							<h6 style="color: #ffffff;">[3] Test the forwarder to check if it works.</h6>
						</center>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END OF SETTINGS MODAL -->
	<!-- BOOTSTRAP PLUGIN SCRIPTS-->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<!-- CHECKER PLUGIN SCRIPTS-->
	<script src="assets/js/Tikol4Life.js"></script>
</body>
</html>
