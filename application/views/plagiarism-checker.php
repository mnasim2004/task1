<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>

<head>
	<meta charSet="utf-8" />
	<?= link_tag('assets/css/plagarism_checker_1.css') ?>
	<?= link_tag('assets/css/plagarism_checker_2.css') ?>
	<?= link_tag('assets/css/plagarism_checker_3.css') ?>
	<?= link_tag('assets/css/plagarism_checker_4.css') ?>
	<title>Plagiarism</title>
	<meta name="viewport" content="width=device-width" />
	<meta name="description" content="Instant plagiarism check for essays and documents. Detect plagiarism, fix grammar errors, and improve your vocabulary in seconds." />
	<meta property="og:type" />
	<meta property="og:description" content="Instant plagiarism check for essays and documents. Detect plagiarism, fix grammar errors, and improve your vocabulary in seconds." />
	<!-- <meta property="og:image" content="https://static-web.grammarly.com/cms/master/public/open-graph/social-24.png" /> -->
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:site" content="@gandhinagaruniversity" />
	<meta name="next-head-count" content="28" />
	<noscript data-n-css=""></noscript>
	<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

	<style>
		body {
			margin: 0;
			padding: 0;
			border: none;
			transition: ease 0.5;
		}

		.p-0 {
			padding: 0;
		}

		.m-0 {
			margin: 0;
		}

		.gap-10 {
			gap: 10px;
		}

		.d-flex {
			display: flex;
			justify-content: center;
		}

		.flex-column {
			flex-direction: column;
		}

		.card {
			position: relative;
			width: 340px;
			height: 250px;
			border-radius: 8px;
			z-index: 1111;
			overflow: hidden;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			box-shadow: 20px 20px 60px #bebebe, -20px -20px 60px #ffffff;
		}

		.bg {
			position: absolute;
			top: 5px;
			left: 5px;
			width: 330px;
			height: 240px;
			z-index: 2;
			background: rgba(255, 255, 255, .95);
			backdrop-filter: blur(24px);
			border-radius: 6px;
			overflow: hidden;
			outline: 2px solid white;
			padding: 10px;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.blob {
			position: absolute;
			z-index: 1;
			top: 50%;
			left: 50%;
			width: 240px;
			height: 150px;
			border-radius: 50%;
			background-color: #1f243c;
			opacity: 1;
			filter: blur(12px);
			animation: blob-bounce 5s infinite ease;
		}

		@keyframes blob-bounce {
			0% {
				transform: translate(-100%, -100%) translate3d(0, 0, 0);
			}

			25% {
				transform: translate(-100%, -100%) translate3d(100%, 0, 0);
			}

			50% {
				transform: translate(-100%, -100%) translate3d(100%, 100%, 0);
			}

			75% {
				transform: translate(-100%, -100%) translate3d(0, 100%, 0);
			}

			100% {
				transform: translate(-100%, -100%) translate3d(0, 0, 0);
			}
		}

		input[type="number"]::-webkit-inner-spin-button,
		input[type="number"]::-webkit-outer-spin-button {
			-webkit-appearance: none;
			margin: 0;
		}

		input[type="number"] {
			-moz-appearance: textfield;
			appearance: textfield;
		}

		.btn {
			display: inline-block;
			font-size: 0.8rem;
			color: #fff !important;
			background: #1f243c;
			padding: 13px 25px;
			border-radius: 4px;
			transition: background-color 0.1s ease;
			box-sizing: border-box;
			transition: all 0.25s ease;
			border: 0;
			cursor: pointer;
			box-shadow: 0 10px 20px -10px #1f243c;
			text-wrap: nowrap;
		}

		.btn:hover {
			box-shadow: 0 20px 20px -10px #1f243c;
			transform: translateY(-1px);
		}

		@keyframes fadeIn {
			from {
				opacity: 0;
			}

			to {
				opacity: 1;
			}
		}

		.btn:disabled {
			cursor: default;
			opacity: .24;
		}

		#loading {
			display: none;
		}

		#frame-1 {
			display: block;
		}

		#frame-2 {
			display: none;
		}

		#preview {
			width: 100%;
			height: 100%;
		}

		#download {
			display: none;
		}

		#loader {
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.loader {
			display: block;
			--height-of-loader: 4px;
			--loader-color: #0071e2;
			width: 130px;
			height: var(--height-of-loader);
			border-radius: 30px;
			background-color: rgba(0, 0, 0, 0.2);
			position: relative;
		}

		.loader::before {
			content: "";
			position: absolute;
			background: var(--loader-color);
			top: 0;
			left: 0;
			width: 0%;
			height: 100%;
			border-radius: 30px;
			animation: moving 1s ease-in-out infinite;
		}

		@keyframes moving {
			50% {
				width: 100%;
			}

			100% {
				width: 0;
				right: 0;
				left: unset;
			}
		}

		.btn-bar {
			display: flex;
			justify-content: space-between;
		}

		.d-flex-full {
			gap: 4px;
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.check {
			display: inline-block;
			transform: rotate(45deg);
			height: 24px;
			width: 12px;
			margin-left: 8px;
			border-bottom: 7px solid #78b13f;
			border-right: 7px solid #78b13f;
		}

		.cross {
			margin: 0;
			padding: 0;
			border: 0;
			background: none;
			position: relative;
			width: 24px;
			height: 8px;
		}

		.cross:before,
		.cross:after {
			content: '';
			position: absolute;
			left: 0;
			right: 0;
			height: 10px;
			background: #ff0000;
			border-radius: 4px;
		}

		.cross:before {
			transform: rotate(45deg);
		}

		.cross:after {
			transform: rotate(-45deg);
		}

		#btn-loader {
			display: none;
			position: relative !important;
		}

		.radio-inputs {
			position: relative;
			display: flex;
			flex-wrap: wrap;
			border-radius: 0.5rem;
			background-color: #1f243c;
			box-sizing: border-box;
			box-shadow: 0 0 0px 1px rgba(0, 0, 0, 0.06);
			padding: 0.25rem;
			width: 300px;
			font-size: 14px;
		}

		.radio-inputs .radio {
			flex: 1 1 auto;
			text-align: center;
		}

		.radio-inputs .radio input {
			display: none;
		}

		.radio-inputs .radio .name {
			display: flex;
			cursor: pointer;
			align-items: center;
			justify-content: center;
			border-radius: 0.5rem;
			border: none;
			padding: .5rem 0;
			color: #fff;
			transition: all .15s ease-in-out;
		}

		.radio-inputs .radio input:checked+.name {
			background-color: #fff;
			color: #1f243c;
			font-weight: 600;
		}

		.form-box {
			gap: 30px;
			display: flex;
			align-items: center;
			flex-direction: column;
			justify-content: center;
		}

		#text-box {
			display: none;
		}

		#output-box {
			display: none;
		}
	</style>
</head>

<body>
	<div class="page_page__KiF7S page_pageFontFamilyGlyph__ZoNFJ">
		<div class="headerContainerRelative_QHpyYVio primaryHeaderContainerRelative_QHpyYVio">
			<div class="headerAbsolute_QHpyYVio">
				<nav aria-label="primary" class="primaryHeaderBase_MLJ1wzb3 primaryHeader24_MLJ1wzb3">
				</nav>
			</div>
		</div>
		<main class="page_main__0G8mr">
			<div class="page-section_pagePaddingContainer1080__BJePD">
				<div id="sectionGrammarCheck_4VB8kepvT7ciShVSz6rHX" class="page-section_pageContentContainer__VmDSC page-section_pageContentWidth1080Container__CLPb2 image_containedImage__KlScm page-section_pageSectionCompact__iSyp8 text-checker_container__X7ukv">
					<div class="single-column_singleCol1080__r5oYq single-column_alignDefault__7f6mc">
						<div class="feature-highlight_wrapperStyle__lDFsM">
							<h1 class="HL_dkKeNHYB">Anvii</h1>
							<div style="height:40px;flex-shrink:0"></div>
							<div class="TL_dkKeNHYB">Anvii is an AI plagiarism checker detects plagiarism in your text, docx, pdfs, ppts files and writing issues.<br /></div>
							<div style="height:40px;flex-shrink:0"></div>
							<p>Please select type of plagiarism checker</p>
							<br />
							<div class="d-flex justify-content-center">
								<div class="radio-inputs">
									<label class="radio">
										<input type="radio" name="radio" value="pdf" checked="">
										<span class="name">PDF</span>
									</label>
									<label class="radio">
										<input type="radio" name="radio" value="txt">
										<span class="name">TXT</span>
									</label>
									<label class="radio">
										<input type="radio" name="radio" value="docx">
										<span class="name">DOCX</span>
									</label>
									<label class="radio">
										<input type="radio" name="radio" value="pptx">
										<span class="name">PPTX</span>
									</label>
									<label class="radio">
										<input type="radio" name="radio" value="text">
										<span class="name">PLAIN TEXT</span>
									</label>
								</div>
							</div>
						</div>
						<div style="height:40px;flex-shrink:0"></div>
						<!-- <div style="height:16px;flex-shrink:0"></div> -->
					</div>
					<div class="card" id="frame-1">
						<div class="bg">
							<div id="btn-text">
								<form id="files_checker">
									<div class="form-box">
										<div class="d-flex-full">
											<div>
												<button class="base_PbRSndwM paddingDefault_PbRSndwM uploadButton_kxwiuAVw form_ctaButton__khCPU" type="button" data-status="enabled" onclick="document.getElementById('fileInput1').click();">
													<span class="content_PbRSndwM">
														<span class="iconWrapper_PbRSndwM" style="margin-right:0.75rem" aria-hidden="true">
															<svg width="20" height="21" fill="none" xmlns="http://www.w3.org/2000/svg">
																<title>Upload assignment of student 1</title>
																<path fill-rule="evenodd" clip-rule="evenodd" d="m10 .793 4.854 4.854a.5.5 0 0 1-.708.707L10.5 2.707V15.5a.5.5 0 0 1-1 0V2.707L5.854 6.354a.5.5 0 1 1-.708-.707L10 .793zM1 16a.5.5 0 0 1 .5.5v2A1.5 1.5 0 0 0 3 20h14a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 1 1 1 0v2A2.5 2.5 0 0 1 17 21H3a2.5 2.5 0 0 1-2.5-2.5v-2A.5.5 0 0 1 1 16z" fill="currentColor"></path>
															</svg>
														</span>Upload assignment of student 1
													</span>
												</button>
												<input id="fileInput1" aria-hidden="true" class="input_kxwiuAVw" type="file" name="file1" accept="application/pdf,.doc,.docx,.odt,.rtf,.txt,.htm,.html" style="display: none;" onchange="validateFileType(this)" />
											</div>
											<div id="uploadStatus1"></div>
										</div>
										<div class="d-flex">
											<div>
												<button class="base_PbRSndwM paddingDefault_PbRSndwM uploadButton_kxwiuAVw form_ctaButton__khCPU" type="button" data-status="enabled" onclick="document.getElementById('fileInput2').click();">
													<span class="content_PbRSndwM">
														<span class="iconWrapper_PbRSndwM" style="margin-right:0.75rem" aria-hidden="true">
															<svg width="20" height="21" fill="none" xmlns="http://www.w3.org/2000/svg">
																<title>Upload assignment of student 2</title>
																<path fill-rule="evenodd" clip-rule="evenodd" d="m10 .793 4.854 4.854a.5.5 0 0 1-.708.707L10.5 2.707V15.5a.5.5 0 0 1-1 0V2.707L5.854 6.354a.5.5 0 1 1-.708-.707L10 .793zM1 16a.5.5 0 0 1 .5.5v2A1.5 1.5 0 0 0 3 20h14a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 1 1 1 0v2A2.5 2.5 0 0 1 17 21H3a2.5 2.5 0 0 1-2.5-2.5v-2A.5.5 0 0 1 1 16z" fill="currentColor"></path>
															</svg>
														</span>Upload assignment of student 2
													</span>
												</button>
												<input id="fileInput2" aria-hidden="true" class="input_kxwiuAVw" type="file" name="file2" accept="application/pdf,.doc,.docx,.odt,.rtf,.txt,.htm,.html" style="display: none;" onchange="validateFileType(this)" />
											</div>
											<div id="uploadStatus2"></div>
										</div>
										<div>
											<button class="btn" type="submit">
												<span class="content_PbRSndwM">
													<b>Checking authenticity of research</b>
												</span>
											</button>
										</div>
									</div>
								</form>
							</div>
							<div id="btn-loader">
								<lottie-player src="https://lottie.host/b6d57cc6-b9e4-43a4-8f47-fa6f09fede83/poDScFXVVI.json" background="transparent" speed="1" loop autoplay></lottie-player>
							</div>
						</div>
						<div class="blob"></div>
					</div>
					<div class="form_container__4OChq form_onePageReportContainer__OTm5R" id="text-box">
						<form class="form_form__okfjE" id="text_checker">
							<div class="form_formContent__MMC7Z">
								<div class="form_textAreaContainer__3iFA4 form_onePageReportTextAreaContainer__elPgq">
									<textarea class="form_textAreaInput__d_XIK C3_dkKeNHYB" id="plain-text-input" name="userText" spellcheck="false" placeholder="Enter text to check for plagiarism and writing errors." maxLength="10000"></textarea>
								</div>
								<div style="height:8px;flex-shrink:0"></div>
								<div class="form_ctaContainer__dSGmh btn-bar">
									<div>
										<button class="btn" type="submit" id="check_plagiarism">
											<span class="content_PbRSndwM" id="btn-text">
												<b>Checking authenticity of research</b>
											</span>
											<div class="loadingContainer_PbRSndwM" id="btn-loader">
												<span class="spinnerContainer_PbRSndwM">
													<svg class="spin_FJdjscKR" width="24" height="24" viewBox="0 0 24 24">
														<g stroke="currentColor" stroke-width="2" fill="none" fill-rule="evenodd" stroke-linecap="round">
															<circle opacity=".3" cx="12" cy="12" r="9"></circle>
															<path d="M 21 12 A 9 9 0 0 0 12 3"></path>
														</g>
													</svg>
												</span>
											</div>
										</button>
									</div>
									<div class="C5_dkKeNHYB form_characterCount__kHV06"><span id="text-reflector">0</span>/<b>10000</b></div>
								</div>
							</div>
						</form>
					</div>
					<div style="height:40px;flex-shrink:0"></div>
					<div class="form_container__4OChq form_onePageReportContainer__OTm5R" id="output-box">
						<form class="form_form__okfjE" id="files_checker">
							<div class="form_formContent__MMC7Z">
								<div class="form_textAreaContainer__3iFA4 form_onePageReportTextAreaContainer__elPgq">
									<textarea class="form_textAreaInput__d_XIK C3_dkKeNHYB" id="outputBox" style="text-align: center;" spellcheck="false" placeholder="Upload file to compare and check for plagiarism errors." maxLength="10000"></textarea>
								</div>
								<div style="height:8px;flex-shrink:0"></div>
							</div>
						</form>
					</div>



					<!-- new code  -->

					<div class="result rescard ">
						<div class=" resultb  incard">
							<div class="">
								<div style="font-weight:bold;" class="incard-2">Scan Properties</div>
							</div>
							<div class="incard-2">
								<div class="">
									<label class="label_heading text_break fw400">Number of Words : <span class="fs16 color_222222 fw600" id="word-count_below">0</span> </label>
									<br>
									<label class="label_heading text_break fw400">Results Found : <span class="fs16 color_222222 fw600" id="no_of_rzlt_fond">0</span></label>
								</div>
							</div>
						</div>
						<div class="resultb incard">
							<div style="    padding-left: 55px;padding-right: 55px;" class="">

								<div class="donut" style="--first: .40; --second: .60;">
									<div class="donut__slice donut__slice__first"></div>
									<div class="donut__slice donut__slice__second"></div>
									<div class="donut__label">
										<div class="donut__label__heading">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="resultb incard ">
							<div class="resultb-1 ">
								<span class="plag_percentage">40%</span>
								<span class="dash_valuep"></span>
								<span style=" padding-left:30px; " class="">Plagiarism </span>
							</div>
							<div class="resultb-1 ">
								<span class="unique_percentage ">60%</span>
								<span class="dash_valueu"></span>
								<span style=" padding-left:30px; " class="">Unique</span>
							</div>
							<div class="resultb-1-1"><a href="" type="button" style="text-align:center;" class="sub-button">Start New Search</a>
							</div>

						</div>
					</div>
				</div>
				<!-- new code  -->
			</div>
	</div>
	</main>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			// Get all radio inputs
			const radioInputs = document.querySelectorAll('.radio-inputs input[type="radio"]');

			// Add change event listener to each radio input
			radioInputs.forEach(input => {
				input.addEventListener('change', function() {
					// Check if the radio input is checked
					if (this.value == 'text') {
						document.getElementById('text-box').style.display = 'block';
						document.getElementById('frame-1').style.display = 'none';
					} else {
						document.getElementById('frame-1').style.display = 'block';
						document.getElementById('text-box').style.display = 'none';
					}
				});
			});

			$('#fileInput1').change(function() {
				var file_data = $('#fileInput1').prop('files')[0];
				$('#uploadStatus1').html('<div class="check"></div>');
			});

			$('#fileInput2').change(function() {
				var file_data = $('#fileInput2').prop('files')[0];
				$('#uploadStatus2').html('<div class="check"></div>');
			});

			$('#files_checker').submit(function(e) {
				e.preventDefault();
				$('#check_plagiarism').attr("disabled");
				$('#btn-text').css('display', 'none');
				$('#btn-loader').css('display', 'block');
				var file1_data = $('#fileInput1').prop('files')[0];
				var file2_data = $('#fileInput2').prop('files')[0];
				var form_data = new FormData();
				form_data.append('file1', file1_data);
				form_data.append('file2', file2_data);

				$.ajax({
					url: '<?= base_url('plagiarism_checker/check') ?>',
					dataType: 'text',
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,
					type: 'post',
					success: function(response) {
						$('#btn-text').css('display', 'block');
						$('#btn-loader').css('display', 'none');
						$('#check_plagiarism').removeAttr("disabled");
						$('#output-box').css('display', 'block');
						$('#outputBox').text(response);
					},
					error: function(xhr, status, error) {
						console.error(xhr.responseText);
					}
				});
			});

			$('#text_checker').submit(function(e) {
				e.preventDefault();
				var pain_text = $('#plain-text-input').val();
				var form_data = new FormData();
				form_data.append('text', pain_text);

				$.ajax({
					url: '<?= base_url('plagiarism_checker/check_text') ?>',
					dataType: 'text',
					cache: false,
					contentType: false,
					processData: false,
					data: form_data,
					type: 'post',
					success: function(response) {
						$('#output-box').css('display', 'block');
						$('#outputBox').text(response);
					},
					error: function(xhr, status, error) {
						console.error(xhr.responseText);
					}
				});
			});
		});

		function validateFileType(input) {
			const validFileTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.oasis.opendocument.text', 'text/rtf', 'text/plain', 'text/html'];
			const file = input.files[0];
			if (!validFileTypes.includes(file.type)) {
				alert("Invalid file type. Please select a PDF, DOC, DOCX, ODT, RTF, TXT, HTML file.");
				input.value = ''; // Reset the file input
			}
		}

		// Get the textarea and span element
		const textArea = document.getElementById('plain-text-input');
		const textReflector = document.getElementById('text-reflector');
		const maxLength = 10000; // Maximum character limit

		document.addEventListener("DOMContentLoaded", function() {
			// Get the button element by its id
			var button = document.getElementById("check_plagiarism");

			// Add an event listener for the button click
			button.addEventListener("click", function() {
				// Get the result element by its class name
				var result = document.querySelector(".result");

				// Toggle the visibility of the result element
				result.classList.toggle("visible");

				// Scroll to the bottom
				result.scrollIntoView({
					behavior: 'smooth',
					block: 'end'
				});
			});
		});
		// Add event listener for input events
		textArea.addEventListener('input', function() {
			// Get the current length of the text
			const currentLength = this.value.length;

			// Update the text reflector span with the current length
			textReflector.textContent = currentLength;

			// Optionally, change color as it comes closer to the limit
			const percent = (currentLength / maxLength) * 100;
			if (percent >= 90) {
				textReflector.style.color = 'red'; // Change color to red if 90% or more of the limit is reached
			} else {
				textReflector.style.color = 'black'; // Reset color to black if below 90% of the limit
			}
		});
	</script>
</body>

</html>