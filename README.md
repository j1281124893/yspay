# ys-php-sdk-core

### 接口使用说明
此项目仅为方便服务商对接支付相关接口：涉及的支付如下：

#### 使用说明
1、生产参数请在Base.php getOptions()修改
2、业务代码以邮件为准

#### 一、收款类接口（PayTest.php）
1、反扫码支付：testBarcodepay  
2、担保交易确认收货：testTradeConfirm  
3、担保交易发货通知：testTradeDelivered  
4、支付宝生活号支付：testAlijsapi  
5、微信公众号、小程序支付：testWeixinPay  
6、行业码获取用户标识：testCupgetmulappUserid  
7、行业码支付：testCupmulappQrcodepay  
8、正扫支付：testQrcodepay  
9、手机控件支付：testMobileControlsPay  


#### 二、快捷类接口（FastpayTest.php）
1、快捷消费申请：testFastpay  
2、快捷消费授权：testfastpayAuthorize  
3、快捷重新获取授权码：testFastpayAuthorizeMsg  
4、发起签约申请：testTrusteeshipSign  
5、签约确认接口：testTrusteeshipSignConfirm  
6、快捷协议支付：testTrusteeshipfastPay   

#### 三、web、wap页面支付接口（PagePayTest.php）
1、WEB页面支付：testDirectpayCreatebyuser  
2、WAP页面支付:testWapDirectpayCreatebyuser  

#### 四、分账类接口（DivisionTest.php）
1、分账登记：testDivisionOnlineAccept  
2、分账查询：testDivisionOnlineQuery

#### 五、提现类接口（MerchantTest.php）
1、一般消费户提现：testDivisionOnlineAccept  
2、待结算账户提现：testMerchantWithdrawD0  
3、商户提现查询：testMerchantWithdrawQuery  
4、商户余额查询：testMerchantBalanceQuery

#### 六、退款类接口（OrderTest.php）
1、普通订单退款（不分账）：testTradeRefund  
2、分账订单退款（用交易金退）：testTradeRefundSplit  
3、一般消费户退款（用余额退）：testTradeRefundGeneralAccount  
4、退款交易查询：testTradeRefundQuery  
5、订单明细查询：testTradeOrderQuery  
6、收款交易对账单下载：testBillDownloadurlGet  

#### 七、代付类接口（ReplcepayTest.php）
1、单笔代付对账单：testDfBillDownloadurlGet  
2、单笔代付交易（银行卡）： testDfSingleQuickAccept  
3、单笔代付交易（平台内）：testDfSingleQuickInnerAccept  
4、单笔代付查询：testDfSingleQuickQuery  

#### 八、微信实名认证类接口（WeChatAuthenticateTest.php）
1、微信实名认证开户意愿申请：testWeChatAuthenticateApply  
2、图片上传口令获取：testRegisterTokenGet  
3、图片上传：testWeChatUploadPic  
4、微信实名认证-撤销申请单：testAuthenticateApplyCancel  
5、查询微信实名认证申请单状态：testAuthenticateQuery  
6、查询微信实名认证授权状态：testAuthenticateApplyQuery  

### 项目介绍
此项目为php语言开发
