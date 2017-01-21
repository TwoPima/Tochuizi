<?php
$config = array (
		//应用ID,您的APPID。
		'app_id' => "2016090501852330",

		//商户私钥，您的原始格式RSA私钥
//		'merchant_private_key' => "MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAKkJcEY30rHEnuwHBwoRmhXx8NTXHPvfKGm9su9kznZdbn2pE10d1dbaFNq2VaIId2q9uFSJLn4N3QVTwEYoaHzP+wIU8kF2OikJRuFiPfuERcFuwsIGNwUyHJmfAneToABWUVcavsNvKUOBXOCdohbeJy2D9khrk76ZNyP3SV4dAgMBAAECgYAiGwRrNoItWfWSu8xAzNJhESK9XvW7IAiAZUUAJj++BBXyBrYgeI+XvQKuKlHW0ox9ne/eJpuZ1WQ92esWfLqv+AlewQwwR2yTjV3uJFhTZIrjGwpyWTR6Kj/GjJcbCAcHHYFQ5DNXwB/7ONveXzARfU9Elp3Sil5am6ByMtPLIQJBAN5XHVwgnSxwS29sz3Mns7as9JaF2pA3mLdkgMrUQzklY5OGt3oQaQihvGz66zNl4Eed603U+DeArC1zjNPYYXkCQQDCoIdg2OU/zS07CRsCL76FvuhqPew1/wx6N4eexbmMkAqUvpzPeFvEGjuKCGnJv/wrxPK4fmnaHBMtJu5U3jzFAkBvV2qxfveWkGmGVBQS07fwa+5UDpXkEKNee2rvp5o+XNXfw9/PtbYTh4LnhEQSShslYhS6tkLS8JHIdQv57mrpAkBCqtxUp1c32J9itobC4/neNHvGULnF8Tyj7LuO/mnFpV2KgBSU2MSOUvIMIT+jdRj7ITaHTf4SUUWcVNaUyZ+FAkEAs3RmCQmWnk2q7xhVdAkg/mXZf/K2eFRRMj88glfRs+SqJvHdCB/gvquvXqTgQu69zsGdqth+67QP/YcEawxSRQ==",
				'merchant_private_key' => "MIICXAIBAAKBgQCpCXBGN9KxxJ7sBwcKEZoV8fDU1xz73yhpvbLvZM52XW59qRNdHdXW2hTatlWiCHdqvbhUiS5+Dd0FU8BGKGh8z/sCFPJBdjopCUbhYj37hEXBbsLCBjcFMhyZnwJ3k6AAVlFXGr7DbylDgVzgnaIW3ictg/ZIa5O+mTcj90leHQIDAQABAoGAIhsEazaCLVn1krvMQMzSYREivV71uyAIgGVFACY/vgQV8ga2IHiPl70CripR1tKMfZ3v3iabmdVkPdnrFny6r/gJXsEMMEdsk41d7iRYU2SK4xsKclk0eio/xoyXGwgHBx2BUOQzV8Af+zjb3l8wEX1PRJad0opeWpugcjLTyyECQQDeVx1cIJ0scEtvbM9zJ7O2rPSWhdqQN5i3ZIDK1EM5JWOThrd6EGkIobxs+uszZeBHnetN1Pg3gKwtc4zT2GF5AkEAwqCHYNjlP80tOwkbAi++hb7oaj3sNf8MejeHnsW5jJAKlL6cz3hbxBo7ighpyb/8K8TyuH5p2hwTLSbuVN48xQJAb1dqsX73lpBphlQUEtO38GvuVA6V5BCjXntq76eaPlzV38Pfz7W2E4eC54REEkobJWIUurZC0vCRyHUL+e5q6QJAQqrcVKdXN9ifYraGwuP53jR7xlC5xfE8o+y7jv5pxaVdioAUlNjEjlLyDCE/o3UY+yE2h03+ElFFnFTWlMmfhQJBALN0ZgkJlp5Nqu8YVXQJIP5l2X/ytnhUUTI/PIJX0bPkqibx3Qgf4L6rr16k4ELuvc7BnarYfuu0D/2HBGsMUkU=",

		//异步通知地址
		'notify_url' => "http://www.tigerjob.com:9999/alipay.trade.wap.pay-PHP-UTF-8/notify_url.php",

		//同步跳转
		'return_url' => "http://www.tigerjob.com:9999/alipay.trade.wap.pay-PHP-UTF-8/return_url.php",

		//编码格式
		'charset' => "UTF-8",

		//支付宝网关
		'gatewayUrl' => "https://openapi.alipay.com/gateway.do",

		//支付宝公钥
		'alipay_public_key' => "MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCnxj/9qwVfgoUh/y2W89L6BkRAFljhNhgPdyPuBV64bfQNN1PjbCzkIM6qRdKBoLPXmKKMiFYnkd6rAoprih3/PrQEB/VsW8OoM8fxn67UDYuyBTqA23MML9q1+ilIZwBC2AQ2UBVOrFXfFl75p6/B5KsiNG9zpgmLCUYuLkxpLQIDAQAB",


);