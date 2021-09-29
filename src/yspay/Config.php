<?php

namespace Yspay\SDK\Gathering\Kernel;


class Config
{
	public $postType;
	public $url;
	public $charset = "utf-8";
	public $charsetGBK = "GBK";
	public $sign_type = "RSA";
	public $partner_id;
	public $notify_url;
	public $dfUrl;
	public $dfOderUrl;
	public $commonUrl;
	public $qrcodeUrl;
	public $trusteeshipUrl;
	public $searchUrl;
	public $version = "3.0";
    public $private_key;
    public $pfxpassword;
    public $publicKey
        ="-----BEGIN CERTIFICATE-----
MIICizCCAfSgAwIBAgIEIL4JYzANBgkqhkiG9w0BAQQFADBcMQ8wDQYDVQQDDAZ5
c2VwYXkxDzANBgNVBAsMBnlzZXBheTERMA8GA1UECgwIb3JnYW5pemUxCzAJBgNV
BAcMAnN6MQswCQYDVQQGEwJjbjELMAkGA1UECAwCZ2QwHhcNMTMwMzA0MDgwMzUy
WhcNNDMwMjI1MDgwMzUyWjBcMQ8wDQYDVQQDDAZ5c2VwYXkxDzANBgNVBAsMBnlz
ZXBheTERMA8GA1UECgwIb3JnYW5pemUxCzAJBgNVBAcMAnN6MQswCQYDVQQGEwJj
bjELMAkGA1UECAwCZ2QwgZ8wDQYJKoZIhvcNAQEBBQADgY0AMIGJAoGBALtI+SYh
R/Zq7CSBtVyEzJ94IOAgK4DUYqtLBFsMjbhQxWHMOBwjEJSYUbn8N9w8nPR3ehX0
aCR3j/s2a15G+Y2c44Y06eZHoAYQpp8OkvWYB2md2amQBnR/o5Wjc/LkkODbC3x3
67d0XQAVbB3auuuqxxa/ElUHnkOe5l9eXYLJAgMBAAGjWjBYMB0GA1UdDgQWBBQB
rC+ShJLjpMYmmEbcr6p6Ma6FTDAfBgNVHSMEGDAWgBTNRc1cSoLvynQarb/pETbg
WClymDAJBgNVHRMEAjAAMAsGA1UdDwQEAwIEkDANBgkqhkiG9w0BAQQFAAOBgQBB
5m8oxrt1KnfbFP+akJvctjhbta5JzenDlCfYcZtykYLSMwkmhd670/y4tJc35P0Z
X/x1bJiAS+2i90L6f8P/WuBMxeI1KuX4Grk22ivw3nweWbGOUCN/PEC5YwUqHope
qHzs09O12ANXXgS35L2wgUxQOB1jcuhLXy2Z94pGYg==
-----END CERTIFICATE-----";

}
