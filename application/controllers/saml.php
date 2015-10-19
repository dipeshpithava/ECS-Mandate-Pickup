<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Saml extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	private function aes_enc($plaintext){
	    $key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
	    $key_size =  strlen($key);
	    
	    // $plaintext = "dipeshpithava@gmail.com";
	    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
	    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
	    $ciphertext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key, $plaintext, MCRYPT_MODE_CBC, $iv);
	    $ciphertext = $iv . $ciphertext;
	    $ciphertext_base64 = base64_encode($ciphertext);
	    // echo  $ciphertext_base64 . "<br>";
	    return $ciphertext_base64;
	}
	private function open_ssl_encrypt($source){
		$fp=fopen(base_url()."/assets/keys/host.cert","r");
		$pub_key=fread($fp,8192);
		fclose($fp);
		openssl_get_publickey($pub_key);
		/*
		* NOTE:  Here you use the $pub_key value (converted, I guess)
		*/
		openssl_public_encrypt($source,$crypttext,$pub_key);
		// echo "<br/>";
		// echo "String crypted: $crypttext";
		return $crypttext;
	}
	public function test_dec($str){
		echo $this->decrypt($str);
	}
	public function encrypt($str){
		// $str = "dipeshpithava@gmail.in";
		$aes_enc = $this->aes_enc($str);
		echo "AES ENC:";
		echo "<br>";
		echo $aes_enc;
		echo "<br>";
		echo "<br>";
		$enc_str = $this->open_ssl_encrypt($aes_enc);
		echo "Open SSL enc:";
		echo "<br>";
		echo $enc_str;
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "<br>";
		echo "open ssl decrypted :";
		echo "<br>";
		echo $this->decrypt($enc_str);
	}
	public function decrypt($enc_str){
		$dec1 = $this->open_ssl_decrypt($enc_str);
		echo $dec1;
		echo "<br>";
		echo "<br>";
		echo "AES Dec:";
		echo "<br>";
		echo $this->aes_dec($dec1);
	}
	public function attr_val(){
		$crypttext = "qFltF0X+wzgRzXaU4Q2RRN4l0FeZ0Z2WE/KMaPQVTj5xQmDiKLPXxp4N/4a/SPvCXDKDg9B6mngcOBrXiQKyGUoCzdZvFV8q6FfuLvW7kAl1XOtSZ3D2Elt3t6uWIf2OEjiqOxTktpECFWcm4e3iyCPKvQv7hQneVXSFeB/PJepUCFGKVpQcwz6ZChWUqE70kX8GkoXynBwnidi2C4j+EfX3iP+Pe5jCA6d+h5X+ZwkZVXsDYHN45ZOj+WH2gJmOAwqInCH6Fz87rDPZdou+48h4tAU3DMx4FJf0nYMnQ8q/f9mdc3u4go2flqfJrVTYaF0sN3d6Z0EPOTb05MAkXd3PG3obxtiho34J2vPTQMdldnJ6Wjx21L3XRmbn1Cg+ReOSW22UjzGZekPtgH7HFUl/mRtESI8qRu0wwYzy07vr6PKAJNeCejTASlxF419qWHk/ttWQUkNhBYlX5h8sxC7ku9VonbvtjrhfVbgSPK2p0CwfUDCoIM3roZTmK7WjTKqOIqkvYPiy9LzFpjXSuUxvqIaWfcp5gdJ9XJcr49IdUyTxySSxhWpBBLTiI4OBUpyqb8Ttk+tbazXqsXjmJtJw2Y+CGssN1xYQ9a2KCSMIfzjI+RwBUNShZ0HfO3ZM";

		$fp=fopen(base_url()."/assets/keys/host.key","r");
		$priv_key=fread($fp,8192);
		fclose($fp);
		$res = openssl_get_privatekey($priv_key);
		openssl_private_decrypt($crypttext,$newsource,$res);
		// echo "<br/>";
		// echo "<br/>";
		echo "String decrypt : $newsource";
	}

	public function pub_dec(){
		// $str = 'VGhpcyBpcyBhbiBlbmNvZGVkIHN0cmluZw==';
		// echo base64_decode($str);
		// exit;

		// $str = '<Response xmlns="urn:oasis:names:tc:SAML:1.0:protocol" xmlns:saml="urn:oasis:names:tc:SAML:1.0:assertion" xmlns:samlp="urn:oasis:names:tc:SAML:1.0:protocol" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" IssueInstant="2015-08-11T14:42:02.053Z" MajorVersion="1" MinorVersion="1" Recipient="https://http://casaestilo.in/mandate_pickup/home/test_dec" ResponseID="_86f9a7ae842f3f2d7b4ffbed85111eb6"><ds:Signature xmlns:ds="http://www.w3.org/2000/09/xmldsig#"><ds:SignedInfo><ds:CanonicalizationMethod Algorithm="http://www.w3.org/2001/10/xml-exc-c14n#"></ds:CanonicalizationMethod><ds:SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"></ds:SignatureMethod><ds:Reference URI="#_86f9a7ae842f3f2d7b4ffbed85111eb6"><ds:Transforms><ds:Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"></ds:Transform><ds:Transform Algorithm="http://www.w3.org/2001/10/xml-exc-c14n#"><ec:InclusiveNamespaces xmlns:ec="http://www.w3.org/2001/10/xml-exc-c14n#" PrefixList="code ds kind rw saml samlp typens #default xsd xsi"></ec:InclusiveNamespaces></ds:Transform></ds:Transforms><ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"></ds:DigestMethod><ds:DigestValue>SSLxVXJiL7bTFtBtSOSjka8kGWM=</ds:DigestValue></ds:Reference></ds:SignedInfo><ds:SignatureValue>ITvGZFAsQyLFIMn387W/XFMcbXiF8xSKxYOqn4hYvd3hp3A5WpyUrCinwlGVr1cXAPpuL5eEhNgSSNQFESvPSZOayACVk1EqeHmyDTLijhIiOXeBCXQoqiE7JiXSPhUwy3eSQtR7Fh+OsJzgDWQg3wRbKfa7+rvomLCIphhi7MIFzIgvbmqikd4IPFwzaq3iSumbi/Ie953VeDyl2f9KpQAr7NcR68LQDLPa0eM/duhCgXm+8QWR82ZADbyroiETvAofki94v9j4wG7IDphSVKJ4VtawZ1s4DoU45UrSIP3P+vITW5bd9WhX0gNZFHZbeTDToRTqjdhtOMjatrXZdw==</ds:SignatureValue><ds:KeyInfo><ds:X509Data><ds:X509Certificate>MIIDYjCCAkqgAwIBAgIEVcoF7jANBgkqhkiG9w0BAQUFADBzMQswCQYDVQQGEwJJTjESMBAGA1UECBMJVGFtaWxOYWR1MRAwDgYDVQQHEwdDaGVubmFpMQwwCgYDVQQKEwNUQ1MxGjAYBgNVBAsTEUZpbmFuY2lhbFNlcnZpY2VzMRQwEgYDVQQDEwtBZGl0eWFCaXJsYTAeFw0xNTA4MTExNDI1NTBaFw0xNjA4MTAxNDI1NTBaMHMxCzAJBgNVBAYTAklOMRIwEAYDVQQIEwlUYW1pbE5hZHUxEDAOBgNVBAcTB0NoZW5uYWkxDDAKBgNVBAoTA1RDUzEaMBgGA1UECxMRRmluYW5jaWFsU2VydmljZXMxFDASBgNVBAMTC0FkaXR5YUJpcmxhMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAghl2wzvo+QU9P44Y0TIXjWuYIvgd81hDvqcZMU1Ec4btzT54QCQyTDkTkwt2X9Y6y1h32IrMvAZfdQHT+lEcp72OJc8A1xlvlCHEJNNAbhJ5Poyrg34kyv4+kRgha2bjjo/tO6uqeTcISGOSosq7BpaYdnpdmRcrLkCmC2YrTO/80Vzhy2+GWZStZUQ718zO6G+tPBjK81W6RzzNLdNyyU4G2db0NloP8FzOzhrJsQeyARA41ZQQQrNq3lAUuclh8REEqnift+XLQTFRPdIqq3wmN0wYcJySmp4ZYj2acjQkwv+P2P/DBU1koEges1aajym1ZmDmSke3oV1Lhoo1OwIDAQABMA0GCSqGSIb3DQEBBQUAA4IBAQBlN0QmwMf+qgZG7/wPdTa1z2Jtjasrb9uS/AK3bmAOcchNVJOIW9Av5CzofRf/RhEQGvPjvRsm261XZ8E0huIuapgPBnx3/DBjV7rJaFjq7jQpGcv57VkaLm70VXHzKfDHouqlg0zVCdW+LYjh5CxZAkBhb117eNHhKrZMBUYBmokmZUdGoaK5uffFqmGl7lXtuLSaSzPVo0l6njrovNxTuv7qHYBvufdK0NB21w2hPxOQMThGr3MWln44f6lb36RRXm5mWcnmxRpnz7RR/HeEhOOT3nEDFe3qdt1iL4efwnA/SzA0pOrNVJJIIGqkqIH2f90I53raWnoENf+I+EQr</ds:X509Certificate></ds:X509Data></ds:KeyInfo></ds:Signature><Status><StatusCode Value="samlp:Success"></StatusCode></Status><Assertion xmlns="urn:oasis:names:tc:SAML:1.0:assertion" AssertionID="_7a21e6e644c225e4c95b46f73394fb96" IssueInstant="2015-08-11T14:41:32.004Z" Issuer="1020_MyUniverse" MajorVersion="1" MinorVersion="1"><AuthenticationStatement AuthenticationInstant="2015-08-11T14:42:01.998Z" AuthenticationMethod="urn:oasis:names:tc:SAML:1.0:am:unspecified"><Subject><NameIdentifier Format="urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified">76231191-2F2C-46C3-AC66-B7F525224556</NameIdentifier><SubjectConfirmation><ConfirmationMethod>urn:oasis:names:tc:SAML:1.0:cm:bearer</ConfirmationMethod></SubjectConfirmation></Subject><SubjectLocality DNSAddress="01HW569396" IPAddress="172.20.247.30"></SubjectLocality></AuthenticationStatement><AttributeStatement><Subject><NameIdentifier Format="urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified">76231191-2F2C-46C3-AC66-B7F525224556</NameIdentifier><SubjectConfirmation><ConfirmationMethod>urn:oasis:names:tc:SAML:1.0:cm:bearer</ConfirmationMethod></SubjectConfirmation></Subject><Attribute AttributeName="TPAttributes" AttributeNamespace="www.techprocess.co.in"><AttributeValue>U+C7xWpJua8GFB+M1Fcusq6rxcO2X0qZ9xVnr1BLPGOFI/P2F11xx8NOlKNFQO7A3XcCwDwMnLXzEYoZ+yuoz0pQeAo2M1gCc3fOQfo7tHPtK5xymlRfPwV12aU8SwnteZa5VBxt+Xrd0wytAzhFO55oU2tXCCe2wKDXgVQKQtEZcLo9+FXtg8bPguBkqF+XbrNReJTctZcC5dUnaS3nd2gCqFmHOb9Ih/mgNfG4CGnQ5pZ/hLQn59Ez1FtF3Hwc4mjudNCVilr3uXl66E8PYOzJoiwXOoQjvLodu9IzGP+yQV8Bucn1jgCtJXjPfgf5qfYatT3cG63O/2IsjRnclw==:qFltF0X+wzgRzXaU4Q2RRN4l0FeZ0Z2WE/KMaPQVTj5xQmDiKLPXxp4N/4a/SPvCXDKDg9B6mngcOBrXiQKyGUoCzdZvFV8q6FfuLvW7kAl1XOtSZ3D2Elt3t6uWIf2OEjiqOxTktpECFWcm4e3iyCPKvQv7hQneVXSFeB/PJepUCFGKVpQcwz6ZChWUqE70kX8GkoXynBwnidi2C4j+EfX3iP+Pe5jCA6d+h5X+ZwkZVXsDYHN45ZOj+WH2gJmOAwqInCH6Fz87rDPZdou+48h4tAU3DMx4FJf0nYMnQ8q/f9mdc3u4go2flqfJrVTYaF0sN3d6Z0EPOTb05MAkXd3PG3obxtiho34J2vPTQMdldnJ6Wjx21L3XRmbn1Cg+ReOSW22UjzGZekPtgH7HFUl/mRtESI8qRu0wwYzy07vr6PKAJNeCejTASlxF419qWHk/ttWQUkNhBYlX5h8sxC7ku9VonbvtjrhfVbgSPK2p0CwfUDCoIM3roZTmK7WjTKqOIqkvYPiy9LzFpjXSuUxvqIaWfcp5gdJ9XJcr49IdUyTxySSxhWpBBLTiI4OBUpyqb8Ttk+tbazXqsXjmJtJw2Y+CGssN1xYQ9a2KCSMIfzjI+RwBUNShZ0HfO3ZM</AttributeValue></Attribute></AttributeStatement><ds:Signature xmlns:ds="http://www.w3.org/2000/09/xmldsig#"><ds:SignedInfo><ds:CanonicalizationMethod Algorithm="http://www.w3.org/2001/10/xml-exc-c14n#"></ds:CanonicalizationMethod><ds:SignatureMethod Algorithm="http://www.w3.org/2000/09/xmldsig#rsa-sha1"></ds:SignatureMethod><ds:Reference URI="#_7a21e6e644c225e4c95b46f73394fb96"><ds:Transforms><ds:Transform Algorithm="http://www.w3.org/2000/09/xmldsig#enveloped-signature"></ds:Transform><ds:Transform Algorithm="http://www.w3.org/2001/10/xml-exc-c14n#"><ec:InclusiveNamespaces xmlns:ec="http://www.w3.org/2001/10/xml-exc-c14n#" PrefixList="code ds kind rw saml samlp typens #default xsd xsi"></ec:InclusiveNamespaces></ds:Transform></ds:Transforms><ds:DigestMethod Algorithm="http://www.w3.org/2000/09/xmldsig#sha1"></ds:DigestMethod><ds:DigestValue>K/yXIPUu55Ms+Honk/cqs8f78Pg=</ds:DigestValue></ds:Reference></ds:SignedInfo><ds:SignatureValue>M3SRf1ePVosr8iHnWGUEU/LSsKwk/BSD0vQ9UCA4U3tzKTeuWkWqgHlV7+hxxuy1uYRJIhruarvxa6AdM36sY+VynPV94Hi0DVuzXRMSd/McuMH53TEJUTsD8+eC/ZmmuINiBcgf9BRzwhliN3+hIB112rYqkZyEH0Ghebble8FOAAwOzSzYsMIZxmL6eaosLHvOQB9nGukAj1BiIPqYwtiy98idOn2t/YySLqOC9CyAf+Y3b4cc1VwxuYLVDcI/1iHiz+/cXIuUftjc0fvXpJounVcTt4OVq1KO3pslkPZuz8t4qTCbOpCXcirNW6pebOLY87HAtwdDNs0gIlrv9A==</ds:SignatureValue><ds:KeyInfo><ds:X509Data><ds:X509Certificate>MIIDYjCCAkqgAwIBAgIEVcoF7jANBgkqhkiG9w0BAQUFADBzMQswCQYDVQQGEwJJTjESMBAGA1UECBMJVGFtaWxOYWR1MRAwDgYDVQQHEwdDaGVubmFpMQwwCgYDVQQKEwNUQ1MxGjAYBgNVBAsTEUZpbmFuY2lhbFNlcnZpY2VzMRQwEgYDVQQDEwtBZGl0eWFCaXJsYTAeFw0xNTA4MTExNDI1NTBaFw0xNjA4MTAxNDI1NTBaMHMxCzAJBgNVBAYTAklOMRIwEAYDVQQIEwlUYW1pbE5hZHUxEDAOBgNVBAcTB0NoZW5uYWkxDDAKBgNVBAoTA1RDUzEaMBgGA1UECxMRRmluYW5jaWFsU2VydmljZXMxFDASBgNVBAMTC0FkaXR5YUJpcmxhMIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAghl2wzvo+QU9P44Y0TIXjWuYIvgd81hDvqcZMU1Ec4btzT54QCQyTDkTkwt2X9Y6y1h32IrMvAZfdQHT+lEcp72OJc8A1xlvlCHEJNNAbhJ5Poyrg34kyv4+kRgha2bjjo/tO6uqeTcISGOSosq7BpaYdnpdmRcrLkCmC2YrTO/80Vzhy2+GWZStZUQ718zO6G+tPBjK81W6RzzNLdNyyU4G2db0NloP8FzOzhrJsQeyARA41ZQQQrNq3lAUuclh8REEqnift+XLQTFRPdIqq3wmN0wYcJySmp4ZYj2acjQkwv+P2P/DBU1koEges1aajym1ZmDmSke3oV1Lhoo1OwIDAQABMA0GCSqGSIb3DQEBBQUAA4IBAQBlN0QmwMf+qgZG7/wPdTa1z2Jtjasrb9uS/AK3bmAOcchNVJOIW9Av5CzofRf/RhEQGvPjvRsm261XZ8E0huIuapgPBnx3/DBjV7rJaFjq7jQpGcv57VkaLm70VXHzKfDHouqlg0zVCdW+LYjh5CxZAkBhb117eNHhKrZMBUYBmokmZUdGoaK5uffFqmGl7lXtuLSaSzPVo0l6njrovNxTuv7qHYBvufdK0NB21w2hPxOQMThGr3MWln44f6lb36RRXm5mWcnmxRpnz7RR/HeEhOOT3nEDFe3qdt1iL4efwnA/SzA0pOrNVJJIIGqkqIH2f90I53raWnoENf+I+EQr</ds:X509Certificate></ds:X509Data></ds:KeyInfo></ds:Signature></Assertion></Response>';

		// $crypttext = base64_encode($str);
		// echo $crypttext;
		// exit;

		$crypttext = "PFJlc3BvbnNlIHhtbG5zPSJ1cm46b2FzaXM6bmFtZXM6dGM6U0FNTDoxLjA6cHJvdG9jb2wiIHhtbG5zOnNhbWw9InVybjpvYXNpczpuYW1lczp0YzpTQU1MOjEuMDphc3NlcnRpb24iIHhtbG5zOnNhbWxwPSJ1cm46b2FzaXM6bmFtZXM6dGM6U0FNTDoxLjA6cHJvdG9jb2wiIHhtbG5zOnhzZD0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEiIHhtbG5zOnhzaT0iaHR0cDovL3d3dy53My5vcmcvMjAwMS9YTUxTY2hlbWEtaW5zdGFuY2UiIElzc3VlSW5zdGFudD0iMjAxNS0wOC0xMVQxNDo0MjowMi4wNTNaIiBNYWpvclZlcnNpb249IjEiIE1pbm9yVmVyc2lvbj0iMSIgUmVjaXBpZW50PSJodHRwczovL2h0dHA6Ly9jYXNhZXN0aWxvLmluL21hbmRhdGVfcGlja3VwL2hvbWUvdGVzdF9kZWMiIFJlc3BvbnNlSUQ9Il84NmY5YTdhZTg0MmYzZjJkN2I0ZmZiZWQ4NTExMWViNiI+PGRzOlNpZ25hdHVyZSB4bWxuczpkcz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC8wOS94bWxkc2lnIyI+CjxkczpTaWduZWRJbmZvPgo8ZHM6Q2Fub25pY2FsaXphdGlvbk1ldGhvZCBBbGdvcml0aG09Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvMTAveG1sLWV4Yy1jMTRuIyI+PC9kczpDYW5vbmljYWxpemF0aW9uTWV0aG9kPgo8ZHM6U2lnbmF0dXJlTWV0aG9kIEFsZ29yaXRobT0iaHR0cDovL3d3dy53My5vcmcvMjAwMC8wOS94bWxkc2lnI3JzYS1zaGExIj48L2RzOlNpZ25hdHVyZU1ldGhvZD4KPGRzOlJlZmVyZW5jZSBVUkk9IiNfODZmOWE3YWU4NDJmM2YyZDdiNGZmYmVkODUxMTFlYjYiPgo8ZHM6VHJhbnNmb3Jtcz4KPGRzOlRyYW5zZm9ybSBBbGdvcml0aG09Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvMDkveG1sZHNpZyNlbnZlbG9wZWQtc2lnbmF0dXJlIj48L2RzOlRyYW5zZm9ybT4KPGRzOlRyYW5zZm9ybSBBbGdvcml0aG09Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvMTAveG1sLWV4Yy1jMTRuIyI+PGVjOkluY2x1c2l2ZU5hbWVzcGFjZXMgeG1sbnM6ZWM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDEvMTAveG1sLWV4Yy1jMTRuIyIgUHJlZml4TGlzdD0iY29kZSBkcyBraW5kIHJ3IHNhbWwgc2FtbHAgdHlwZW5zICNkZWZhdWx0IHhzZCB4c2kiPjwvZWM6SW5jbHVzaXZlTmFtZXNwYWNlcz48L2RzOlRyYW5zZm9ybT4KPC9kczpUcmFuc2Zvcm1zPgo8ZHM6RGlnZXN0TWV0aG9kIEFsZ29yaXRobT0iaHR0cDovL3d3dy53My5vcmcvMjAwMC8wOS94bWxkc2lnI3NoYTEiPjwvZHM6RGlnZXN0TWV0aG9kPgo8ZHM6RGlnZXN0VmFsdWU+U1NMeFZYSmlMN2JURnRCdFNPU2prYThrR1dNPTwvZHM6RGlnZXN0VmFsdWU+CjwvZHM6UmVmZXJlbmNlPgo8L2RzOlNpZ25lZEluZm8+CjxkczpTaWduYXR1cmVWYWx1ZT5JVHZHWkZBc1F5TEZJTW4zODdXL1hGTWNiWGlGOHhTS3hZT3FuNGhZdmQzaHAzQTVXcHlVckNpbndsR1ZyMWNYQVBwdUw1ZUVoTmdTU05RRkVTdlBTWk9heUFDVmsxRXFlSG15RFRMaWpoSWlPWGVCQ1hRb3FpRTdKaVhTUGhVd3kzZVNRdFI3RmgrT3NKemdEV1FnM3dSYktmYTcrcnZvbUxDSXBoaGk3TUlGeklndmJtcWlrZDRJUEZ3emFxM2lTdW1iaS9JZTk1M1ZlRHlsMmY5S3BRQXI3TmNSNjhMUURMUGEwZU0vZHVoQ2dYbSs4UVdSODJaQURieXJvaUVUdkFvZmtpOTR2OWo0d0c3SURwaFNWS0o0VnRhd1oxczREb1U0NVVyU0lQM1ArdklUVzViZDlXaFgwZ05aRkhaYmVURFRvUlRxamRodE9NamF0clhaZHc9PTwvZHM6U2lnbmF0dXJlVmFsdWU+CjxkczpLZXlJbmZvPgo8ZHM6WDUwOURhdGE+CjxkczpYNTA5Q2VydGlmaWNhdGU+TUlJRFlqQ0NBa3FnQXdJQkFnSUVWY29GN2pBTkJna3Foa2lHOXcwQkFRVUZBREJ6TVFzd0NRWURWUVFHRXdKSlRqRVNNQkFHQTFVRUNCTUpWR0Z0YVd4T1lXUjFNUkF3RGdZRFZRUUhFd2REYUdWdWJtRnBNUXd3Q2dZRFZRUUtFd05VUTFNeEdqQVlCZ05WQkFzVEVVWnBibUZ1WTJsaGJGTmxjblpwWTJWek1SUXdFZ1lEVlFRREV3dEJaR2wwZVdGQ2FYSnNZVEFlRncweE5UQTRNVEV4TkRJMU5UQmFGdzB4TmpBNE1UQXhOREkxTlRCYU1ITXhDekFKQmdOVkJBWVRBa2xPTVJJd0VBWURWUVFJRXdsVVlXMXBiRTVoWkhVeEVEQU9CZ05WQkFjVEIwTm9aVzV1WVdreEREQUtCZ05WQkFvVEExUkRVekVhTUJnR0ExVUVDeE1SUm1sdVlXNWphV0ZzVTJWeWRtbGpaWE14RkRBU0JnTlZCQU1UQzBGa2FYUjVZVUpwY214aE1JSUJJakFOQmdrcWhraUc5dzBCQVFFRkFBT0NBUThBTUlJQkNnS0NBUUVBZ2hsMnd6dm8rUVU5UDQ0WTBUSVhqV3VZSXZnZDgxaER2cWNaTVUxRWM0YnR6VDU0UUNReVREa1Rrd3QyWDlZNnkxaDMySXJNdkFaZmRRSFQrbEVjcDcyT0pjOEExeGx2bENIRUpOTkFiaEo1UG95cmczNGt5djQra1JnaGEyYmpqby90TzZ1cWVUY0lTR09Tb3NxN0JwYVlkbnBkbVJjckxrQ21DMllyVE8vODBWemh5MitHV1pTdFpVUTcxOHpPNkcrdFBCaks4MVc2Unp6TkxkTnl5VTRHMmRiME5sb1A4RnpPemhySnNRZXlBUkE0MVpRUVFyTnEzbEFVdWNsaDhSRUVxbmlmdCtYTFFURlJQZElxcTN3bU4wd1ljSnlTbXA0WllqMmFjalFrd3YrUDJQL0RCVTFrb0VnZXMxYWFqeW0xWm1EbVNrZTNvVjFMaG9vMU93SURBUUFCTUEwR0NTcUdTSWIzRFFFQkJRVUFBNElCQVFCbE4wUW13TWYrcWdaRzcvd1BkVGExejJKdGphc3JiOXVTL0FLM2JtQU9jY2hOVkpPSVc5QXY1Q3pvZlJmL1JoRVFHdlBqdlJzbTI2MVhaOEUwaHVJdWFwZ1BCbngzL0RCalY3ckphRmpxN2pRcEdjdjU3VmthTG03MFZYSHpLZkRIb3VxbGcwelZDZFcrTFlqaDVDeFpBa0JoYjExN2VOSGhLclpNQlVZQm1va21aVWRHb2FLNXVmZkZxbUdsN2xYdHVMU2FTelBWbzBsNm5qcm92TnhUdXY3cUhZQnZ1ZmRLME5CMjF3MmhQeE9RTVRoR3IzTVdsbjQ0ZjZsYjM2UlJYbTVtV2NubXhScG56N1JSL0hlRWhPT1QzbkVERmUzcWR0MWlMNGVmd25BL1N6QTBwT3JOVkpKSUlHcWtxSUgyZjkwSTUzcmFXbm9FTmYrSStFUXI8L2RzOlg1MDlDZXJ0aWZpY2F0ZT4KPC9kczpYNTA5RGF0YT4KPC9kczpLZXlJbmZvPjwvZHM6U2lnbmF0dXJlPjxTdGF0dXM+PFN0YXR1c0NvZGUgVmFsdWU9InNhbWxwOlN1Y2Nlc3MiPjwvU3RhdHVzQ29kZT48L1N0YXR1cz48QXNzZXJ0aW9uIHhtbG5zPSJ1cm46b2FzaXM6bmFtZXM6dGM6U0FNTDoxLjA6YXNzZXJ0aW9uIiBBc3NlcnRpb25JRD0iXzdhMjFlNmU2NDRjMjI1ZTRjOTViNDZmNzMzOTRmYjk2IiBJc3N1ZUluc3RhbnQ9IjIwMTUtMDgtMTFUMTQ6NDE6MzIuMDA0WiIgSXNzdWVyPSIxMDIwX015VW5pdmVyc2UiIE1ham9yVmVyc2lvbj0iMSIgTWlub3JWZXJzaW9uPSIxIj48QXV0aGVudGljYXRpb25TdGF0ZW1lbnQgQXV0aGVudGljYXRpb25JbnN0YW50PSIyMDE1LTA4LTExVDE0OjQyOjAxLjk5OFoiIEF1dGhlbnRpY2F0aW9uTWV0aG9kPSJ1cm46b2FzaXM6bmFtZXM6dGM6U0FNTDoxLjA6YW06dW5zcGVjaWZpZWQiPjxTdWJqZWN0PjxOYW1lSWRlbnRpZmllciBGb3JtYXQ9InVybjpvYXNpczpuYW1lczp0YzpTQU1MOjEuMTpuYW1laWQtZm9ybWF0OnVuc3BlY2lmaWVkIj43NjIzMTE5MS0yRjJDLTQ2QzMtQUM2Ni1CN0Y1MjUyMjQ1NTY8L05hbWVJZGVudGlmaWVyPjxTdWJqZWN0Q29uZmlybWF0aW9uPjxDb25maXJtYXRpb25NZXRob2Q+dXJuOm9hc2lzOm5hbWVzOnRjOlNBTUw6MS4wOmNtOmJlYXJlcjwvQ29uZmlybWF0aW9uTWV0aG9kPjwvU3ViamVjdENvbmZpcm1hdGlvbj48L1N1YmplY3Q+PFN1YmplY3RMb2NhbGl0eSBETlNBZGRyZXNzPSIwMUhXNTY5Mzk2IiBJUEFkZHJlc3M9IjE3Mi4yMC4yNDcuMzAiPjwvU3ViamVjdExvY2FsaXR5PjwvQXV0aGVudGljYXRpb25TdGF0ZW1lbnQ+PEF0dHJpYnV0ZVN0YXRlbWVudD48U3ViamVjdD48TmFtZUlkZW50aWZpZXIgRm9ybWF0PSJ1cm46b2FzaXM6bmFtZXM6dGM6U0FNTDoxLjE6bmFtZWlkLWZvcm1hdDp1bnNwZWNpZmllZCI+NzYyMzExOTEtMkYyQy00NkMzLUFDNjYtQjdGNTI1MjI0NTU2PC9OYW1lSWRlbnRpZmllcj48U3ViamVjdENvbmZpcm1hdGlvbj48Q29uZmlybWF0aW9uTWV0aG9kPnVybjpvYXNpczpuYW1lczp0YzpTQU1MOjEuMDpjbTpiZWFyZXI8L0NvbmZpcm1hdGlvbk1ldGhvZD48L1N1YmplY3RDb25maXJtYXRpb24+PC9TdWJqZWN0PjxBdHRyaWJ1dGUgQXR0cmlidXRlTmFtZT0iVFBBdHRyaWJ1dGVzIiBBdHRyaWJ1dGVOYW1lc3BhY2U9Ind3dy50ZWNocHJvY2Vzcy5jby5pbiI+PEF0dHJpYnV0ZVZhbHVlPlUrQzd4V3BKdWE4R0ZCK00xRmN1c3E2cnhjTzJYMHFaOXhWbnIxQkxQR09GSS9QMkYxMXh4OE5PbEtORlFPN0EzWGNDd0R3TW5MWHpFWW9aK3l1b3owcFFlQW8yTTFnQ2MzZk9RZm83dEhQdEs1eHltbFJmUHdWMTJhVThTd250ZVphNVZCeHQrWHJkMHd5dEF6aEZPNTVvVTJ0WENDZTJ3S0RYZ1ZRS1F0RVpjTG85K0ZYdGc4YlBndUJrcUYrWGJyTlJlSlRjdFpjQzVkVW5hUzNuZDJnQ3FGbUhPYjlJaC9tZ05mRzRDR25RNXBaL2hMUW41OUV6MUZ0RjNId2M0bWp1ZE5DVmlscjN1WGw2NkU4UFlPekpvaXdYT29RanZMb2R1OUl6R1AreVFWOEJ1Y24xamdDdEpYalBmZ2Y1cWZZYXRUM2NHNjNPLzJJc2pSbmNsdz09OnFGbHRGMFgrd3pnUnpYYVU0UTJSUk40bDBGZVowWjJXRS9LTWFQUVZUajV4UW1EaUtMUFh4cDROLzRhL1NQdkNYREtEZzlCNm1uZ2NPQnJYaVFLeUdVb0N6ZFp2RlY4cTZGZnVMdlc3a0FsMVhPdFNaM0QyRWx0M3Q2dVdJZjJPRWppcU94VGt0cEVDRldjbTRlM2l5Q1BLdlF2N2hRbmVWWFNGZUIvUEplcFVDRkdLVnBRY3d6NlpDaFdVcUU3MGtYOEdrb1h5bkJ3bmlkaTJDNGorRWZYM2lQK1BlNWpDQTZkK2g1WCtad2taVlhzRFlITjQ1Wk9qK1dIMmdKbU9Bd3FJbkNINkZ6ODdyRFBaZG91KzQ4aDR0QVUzRE14NEZKZjBuWU1uUThxL2Y5bWRjM3U0Z28yZmxxZkpyVlRZYUYwc04zZDZaMEVQT1RiMDVNQWtYZDNQRzNvYnh0aWhvMzRKMnZQVFFNZGxkbko2V2p4MjFMM1hSbWJuMUNnK1JlT1NXMjJVanpHWmVrUHRnSDdIRlVsL21SdEVTSThxUnUwd3dZenkwN3ZyNlBLQUpOZUNlalRBU2x4RjQxOXFXSGsvdHRXUVVrTmhCWWxYNWg4c3hDN2t1OVZvbmJ2dGpyaGZWYmdTUEsycDBDd2ZVRENvSU0zcm9aVG1LN1dqVEtxT0lxa3ZZUGl5OUx6RnBqWFN1VXh2cUlhV2ZjcDVnZEo5WEpjcjQ5SWRVeVR4eVNTeGhXcEJCTFRpSTRPQlVweXFiOFR0ayt0YmF6WHFzWGptSnRKdzJZK0NHc3NOMXhZUTlhMktDU01JZnpqSStSd0JVTlNoWjBIZk8zWk08L0F0dHJpYnV0ZVZhbHVlPjwvQXR0cmlidXRlPjwvQXR0cmlidXRlU3RhdGVtZW50PjxkczpTaWduYXR1cmUgeG1sbnM6ZHM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvMDkveG1sZHNpZyMiPgo8ZHM6U2lnbmVkSW5mbz4KPGRzOkNhbm9uaWNhbGl6YXRpb25NZXRob2QgQWxnb3JpdGhtPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxLzEwL3htbC1leGMtYzE0biMiPjwvZHM6Q2Fub25pY2FsaXphdGlvbk1ldGhvZD4KPGRzOlNpZ25hdHVyZU1ldGhvZCBBbGdvcml0aG09Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvMDkveG1sZHNpZyNyc2Etc2hhMSI+PC9kczpTaWduYXR1cmVNZXRob2Q+CjxkczpSZWZlcmVuY2UgVVJJPSIjXzdhMjFlNmU2NDRjMjI1ZTRjOTViNDZmNzMzOTRmYjk2Ij4KPGRzOlRyYW5zZm9ybXM+CjxkczpUcmFuc2Zvcm0gQWxnb3JpdGhtPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwLzA5L3htbGRzaWcjZW52ZWxvcGVkLXNpZ25hdHVyZSI+PC9kczpUcmFuc2Zvcm0+CjxkczpUcmFuc2Zvcm0gQWxnb3JpdGhtPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxLzEwL3htbC1leGMtYzE0biMiPjxlYzpJbmNsdXNpdmVOYW1lc3BhY2VzIHhtbG5zOmVjPSJodHRwOi8vd3d3LnczLm9yZy8yMDAxLzEwL3htbC1leGMtYzE0biMiIFByZWZpeExpc3Q9ImNvZGUgZHMga2luZCBydyBzYW1sIHNhbWxwIHR5cGVucyAjZGVmYXVsdCB4c2QgeHNpIj48L2VjOkluY2x1c2l2ZU5hbWVzcGFjZXM+PC9kczpUcmFuc2Zvcm0+CjwvZHM6VHJhbnNmb3Jtcz4KPGRzOkRpZ2VzdE1ldGhvZCBBbGdvcml0aG09Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvMDkveG1sZHNpZyNzaGExIj48L2RzOkRpZ2VzdE1ldGhvZD4KPGRzOkRpZ2VzdFZhbHVlPksveVhJUFV1NTVNcytIb25rL2NxczhmNzhQZz08L2RzOkRpZ2VzdFZhbHVlPgo8L2RzOlJlZmVyZW5jZT4KPC9kczpTaWduZWRJbmZvPgo8ZHM6U2lnbmF0dXJlVmFsdWU+Ck0zU1JmMWVQVm9zcjhpSG5XR1VFVS9MU3NLd2svQlNEMHZROVVDQTRVM3R6S1RldVdrV3FnSGxWNytoeHh1eTF1WVJKSWhydWFydngKYTZBZE0zNnNZK1Z5blBWOTRIaTBEVnV6WFJNU2QvTWN1TUg1M1RFSlVUc0Q4K2VDL1ptbXVJTmlCY2dmOUJSendobGlOMytoSUIxMQoycllxa1p5RUgwR2hlYmJsZThGT0FBd096U3pZc01JWnhtTDZlYW9zTEh2T1FCOW5HdWtBajFCaUlQcVl3dGl5OThpZE9uMnQvWXlTCkxxT0M5Q3lBZitZM2I0Y2MxVnd4dVlMVkRjSS8xaUhpeisvY1hJdVVmdGpjMGZ2WHBKb3VuVmNUdDRPVnExS08zcHNsa1BadXo4dDQKcVRDYk9wQ1hjaXJOVzZwZWJPTFk4N0hBdHdkRE5zMGdJbHJ2OUE9PQo8L2RzOlNpZ25hdHVyZVZhbHVlPgo8ZHM6S2V5SW5mbz4KPGRzOlg1MDlEYXRhPgo8ZHM6WDUwOUNlcnRpZmljYXRlPgpNSUlEWWpDQ0FrcWdBd0lCQWdJRVZjb0Y3akFOQmdrcWhraUc5dzBCQVFVRkFEQnpNUXN3Q1FZRFZRUUdFd0pKVGpFU01CQUdBMVVFCkNCTUpWR0Z0YVd4T1lXUjFNUkF3RGdZRFZRUUhFd2REYUdWdWJtRnBNUXd3Q2dZRFZRUUtFd05VUTFNeEdqQVlCZ05WQkFzVEVVWnAKYm1GdVkybGhiRk5sY25acFkyVnpNUlF3RWdZRFZRUURFd3RCWkdsMGVXRkNhWEpzWVRBZUZ3MHhOVEE0TVRFeE5ESTFOVEJhRncweApOakE0TVRBeE5ESTFOVEJhTUhNeEN6QUpCZ05WQkFZVEFrbE9NUkl3RUFZRFZRUUlFd2xVWVcxcGJFNWhaSFV4RURBT0JnTlZCQWNUCkIwTm9aVzV1WVdreEREQUtCZ05WQkFvVEExUkRVekVhTUJnR0ExVUVDeE1SUm1sdVlXNWphV0ZzVTJWeWRtbGpaWE14RkRBU0JnTlYKQkFNVEMwRmthWFI1WVVKcGNteGhNSUlCSWpBTkJna3Foa2lHOXcwQkFRRUZBQU9DQVE4QU1JSUJDZ0tDQVFFQWdobDJ3enZvK1FVOQpQNDRZMFRJWGpXdVlJdmdkODFoRHZxY1pNVTFFYzRidHpUNTRRQ1F5VERrVGt3dDJYOVk2eTFoMzJJck12QVpmZFFIVCtsRWNwNzJPCkpjOEExeGx2bENIRUpOTkFiaEo1UG95cmczNGt5djQra1JnaGEyYmpqby90TzZ1cWVUY0lTR09Tb3NxN0JwYVlkbnBkbVJjckxrQ20KQzJZclRPLzgwVnpoeTIrR1daU3RaVVE3MTh6TzZHK3RQQmpLODFXNlJ6ek5MZE55eVU0RzJkYjBObG9QOEZ6T3pockpzUWV5QVJBNAoxWlFRUXJOcTNsQVV1Y2xoOFJFRXFuaWZ0K1hMUVRGUlBkSXFxM3dtTjB3WWNKeVNtcDRaWWoyYWNqUWt3ditQMlAvREJVMWtvRWdlCnMxYWFqeW0xWm1EbVNrZTNvVjFMaG9vMU93SURBUUFCTUEwR0NTcUdTSWIzRFFFQkJRVUFBNElCQVFCbE4wUW13TWYrcWdaRzcvd1AKZFRhMXoySnRqYXNyYjl1Uy9BSzNibUFPY2NoTlZKT0lXOUF2NUN6b2ZSZi9SaEVRR3ZQanZSc20yNjFYWjhFMGh1SXVhcGdQQm54MwovREJqVjdySmFGanE3alFwR2N2NTdWa2FMbTcwVlhIektmREhvdXFsZzB6VkNkVytMWWpoNUN4WkFrQmhiMTE3ZU5IaEtyWk1CVVlCCm1va21aVWRHb2FLNXVmZkZxbUdsN2xYdHVMU2FTelBWbzBsNm5qcm92TnhUdXY3cUhZQnZ1ZmRLME5CMjF3MmhQeE9RTVRoR3IzTVcKbG40NGY2bGIzNlJSWG01bVdjbm14UnBuejdSUi9IZUVoT09UM25FREZlM3FkdDFpTDRlZnduQS9TekEwcE9yTlZKSklJR3FrcUlIMgpmOTBJNTNyYVdub0VOZitJK0VRcgo8L2RzOlg1MDlDZXJ0aWZpY2F0ZT4KPC9kczpYNTA5RGF0YT4KPC9kczpLZXlJbmZvPjwvZHM6U2lnbmF0dXJlPjwvQXNzZXJ0aW9uPjwvUmVzcG9uc2U+";

		// if($encoded == $crypttext){
		// 	echo "Match";
		// }else{
		// 	echo "No Match";
		// }
		// exit;
		
		$cct = base64_decode($crypttext);
		// echo $cct;

		$xml = simplexml_load_string($cct);
		$json = json_encode($xml);
		$array = json_decode($json,TRUE);
		// print_r($array);
		// echo $array["Assertion"]["AttributeStatement"]["Attribute"]["AttributeValue"];
		// exit;
		// $all_data = explode(":", $array["Assertion"]["AttributeStatement"]["Attribute"]["AttributeValue"])[1];

		// Sample 1
		// $all_data = "qzE5m4gITQ4Ydn7cr77S3K2jcInnxo9R5zpOBVTlBxGaLX/2XEeWXEsBbIQFZYB1d8RnCVZ9+P9ZudGyKsNH6O/jqwDMbStTrvh4zI1MVYQFX3bk9k4KfnvgO25NPGtIy3E3V4ni1tLUlBncHFRZ4MHqyCPMMzT3f+YimZt6BUUWO603ugv7TBaVEO2KEvrVJnCMX45bSrbymhinHoxgGdaVAvLgfn0/M/Ov6sYXYovLKnuck9LZJB32QOuRiGmNfHAG5QncZnjr+JSpqR18b5drg+47TQG3cO5OPqlRwZd+VWtjZfsesyRnwX+g6ytRiV/fz8k3CjAXT6o091oDgrfwoBjHGw5RuhmblkMmlHjiMdHQfg2MnwPuYPUspjCdczmHeGnNy/y8FxelH4zrLXLGDB9rEwR8LxQ4h0XgyKEBXHKDvLvKAiTQsnV91HvPcvdUko5v2rwDFfcPklTmRYOgfTg947b2AsM5A9P3imfgSzXZmg9dPpE5iWGAvjpRRQjivFWSNz6hT5TPBDUGqsyirbl/hNYWTrHURCIS5lsL+hVU+b6hRPbdxkDgzl9tpE4WCy70WsFg0UDEF1Z4KwFaBPOISJf6uNKaTBaNM72orvjlpDYxKMVIi3MBca2/";

		// Sample 2
		// $all_data = "JokRaco8DaQXqApv6Cd2awNer/NJ95lgzbmvCjiATNk+qdt1VF+2PVaTDIYAdndau/7LZ2IAb/+twERc4r410pBk5D/U//a5wzPALuZ+552qLqstlCUos4GoTYuB84BLaV2wGxcA6Y+dlBaSY+Lm4RogCux8v5Ui3x1Yf+t2/vjQb3Y1LF+f80vrV6w5891ePzN8DI62wYLUIoLpILgqCIP5az7fjoy0/yfOufxQo+dIX2a1IZlVg+PWwgenJNv2+xaMwPQgjQ6a6QiokkYVEPKBWi5KmkaoOzHI34tqCMTcPRYrfoYmq4bBsF331dl0+VW/QKuypjGeO3ehRnu24CH07Yga1TXZ5O33eLgtTwSX4Thr7KnMz3VtXNEFf0m77EFB+Mh+GKdlXY4aOnPx+arpQ95B4gWE9PSoK3GJYqrP+DYFIEG5LYeIgVYUwuV/Bu1U0cZuwZ4GqunRJwPQLpaRUOD4gMGyEZT6HKSSW5N3bYwYFkkIbvuO0Z+q7RjxWrLhWJCzFnJSANN7HHFdoqpEVq7QnueX5FCqLlY6TP8TIYNNATav2elCUEJQiPSIingEK7dHWxPqUKBEkr6NWq1cnEh4A7fXkzqnZidIMbAEzHIIqGwgvpEbrQ4YTWsv";
		// $dec_data = $this->open_ssl_decrypt($all_data);
		// echo $dec_data;

		// With New Key
		$all_data = "5MOcHGLBDdWr54kG20gsw6ztmkBL23KQ6CQiMo58MVilEKobC7mftHxEk+IByQoR4a3Z7nE01GqxqLKp1DufFRjHZXHphoKILovJ53iJf2o8T30H+ods+k9AHWS5ty+L6kbVy16Lc4R8dCPoktjn5bNqjObQ/37IGr9hJ/BuTk5egin4b5mEPXwuc9iiWgYNN924GBK2GDgfJOv+dznfp7FxzfmxsPBu5wyJMKp415hddtnbmbcMWP/wcFS1x0wT7T4HG7BCBkl7AXTa0oQCGX0tR8HwL4oq0lYkIwrwIfdIqbR2Kji+4shnUimoCUADdtcScUfxn43CRbf4oOMHLAixOWpbfz7WuMkTezFhQ1f2WcdbR5sHpH+8HbiGFFh9kb3gjMdYMiMw95BjTCPuxgX/pMCyzbv4p+RVaJSZx42EUCuJ+F4ZDgkPWv9SYz0h7/WCbBi+M3DSdD/U/MQmfEYlNDG7kILfInbspE1RXXWUjCwAizIKa8Ip73WnPF47DOmcYbRLtTJnlfiom+DyaCbVuiGA5xBFk2Ix2ITdpZOVCLNAhEyZslNIWLWKkbxkL27E+sViwYU25dFa5MRke9nOcCwWxcsJO9+DsfwtGAb6dGc6ndKk9zRkM+HXads/";
		$dec_data = $this->open_ssl_decrypt1($all_data);
		echo $dec_data;
	}
	private function open_ssl_decrypt1($crypttext){
		$fp=fopen("keys/NB.key","r");
		$priv_key=fread($fp,8192);
		fclose($fp);
		$res = openssl_get_privatekey($priv_key);
		openssl_private_decrypt($crypttext,$newsource,$res);
		// echo "<br/>";
		// echo "<br/>";
		// echo "String decrypt : $newsource";
		return $newsource;
	}
	private function open_ssl_decrypt($crypttext){
		$fp=fopen(base_url()."/assets/keys/host.key","r");
		$priv_key=fread($fp,8192);
		fclose($fp);
		$res = openssl_get_privatekey($priv_key);
		openssl_private_decrypt($crypttext,$newsource,$res);
		// echo "<br/>";
		// echo "<br/>";
		// echo "String decrypt : $newsource";
		return $newsource;
	}
	private function aes_dec($ciphertext_base64){
		$key = pack('H*', "bcb04b7e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a3");
		$iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    	$iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		$ciphertext_dec = base64_decode($ciphertext_base64);
	    $iv_dec = substr($ciphertext_dec, 0, $iv_size);
	    $ciphertext_dec = substr($ciphertext_dec, $iv_size);
	    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key, $ciphertext_dec, MCRYPT_MODE_CBC, $iv_dec);
	    // echo  $plaintext_dec . "<br>";
	    return $plaintext_dec;
	}
}