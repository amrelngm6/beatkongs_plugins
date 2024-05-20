!function(e){"use strict";const n={init:function(){let n=this;e("#dokan-stripe-express-account-connect").on("click",n.signUp),e("#dokan-stripe-express-dashboard-login").on("click",n.expressLogin),e("#dokan-stripe-express-account-disconnect").on("click",n.disconnect),e("#dokan-stripe-express-account-cancel").on("click",n.cancelAccount)},signUp:function(o){o.preventDefault(),n.hideMessage(),n.showProcessing();let s=e("#dokan_stripe_express_vendor_country").length?e("#dokan_stripe_express_vendor_country").val().trim():void 0;if(e("#dokan_stripe_express_country_select_error").length&&e("#dokan_stripe_express_country_select_error").remove(),void 0!==s&&!s.length&&e("#dokan_stripe_express_vendor_country").length)return e(`<p class="error" id="dokan_stripe_express_country_select_error">${dokanStripeExpressData.i18n.country_select_error}</p>`).insertAfter("#dokan_stripe_express_vendor_country"),void n.hideProcessing();e.post(dokanStripeExpressData.ajaxurl,{country:void 0!==s?s:"",action:"dokan_stripe_express_vendor_signup",url_args:window.location.search,_wpnonce:dokanStripeExpressData.nonce},(function(e){e.success?window.location.replace(e.data.url):(n.hideProcessing(),n.showMessage(e.data,!0))}))},expressLogin:function(o){o.preventDefault(),n.hideMessage(),n.showProcessing(),e.post(dokanStripeExpressData.ajaxurl,{action:"dokan_stripe_express_get_login_url",_wpnonce:dokanStripeExpressData.nonce},(function(e){e.success?window.open(e.data.url,"_blank"):n.showMessage(e.data,!0),n.hideProcessing()}))},disconnect:function(o){o.preventDefault(),n.hideMessage(),n.showProcessing(),e.post(dokanStripeExpressData.ajaxurl,{action:"dokan_stripe_express_vendor_disconnect",_wpnonce:dokanStripeExpressData.nonce},(function(e){e.success?(n.showMessage(e.data),window.location.reload(!0)):n.showMessage(e.data,!0),n.hideProcessing()}))},cancelAccount:async function(o){var s,a,t,r;o.preventDefault(),n.hideMessage(),n.showProcessing();let i={title:null!==(s=dokanStripeExpressData.i18n?.cancel_onboarding?.title)&&void 0!==s?s:"Cancel Onboarding",text:null!==(a=dokanStripeExpressData.i18n?.cancel_onboarding?.text)&&void 0!==a?a:"Are you sure you want to cancel current onboarding process? Note that, you can't undo this action.",icon:"info",width:600,showCloseButton:!1,showCancelButton:!0,cancelButtonText:null!==(t=dokanStripeExpressData.i18n?.cancel_onboarding?.cancelButtonText)&&void 0!==t?t:"No",confirmButtonText:null!==(r=dokanStripeExpressData.i18n?.cancel_onboarding?.confirmButtonText)&&void 0!==r?r:"Yes, Cancel Onboarding",confirmButtonColor:"#1A9ED4",showLoaderOnConfirm:!0,allowOutsideClick:!1};dokanStripeExpressData.i18n?.cancel_onboarding?.is_setup_wizard&&delete i.icon;const c={action:"dokan_stripe_express_cancel_onboarding",_wpnonce:dokanStripeExpressData.nonce};await Swal.fire({...i,preConfirm:()=>e.post(dokanStripeExpressData.ajaxurl,c).done((e=>e)).always((()=>{n.hideProcessing()})).fail((e=>{let n=dokan_handle_ajax_error(e);var o;return n&&Swal.fire(null!==(o=dokanStripeExpressData.i18n?.cancel_onboarding?.errorMessage)&&void 0!==o?o:"Something went wrong!",n,"error"),!1})),allowOutsideClick:()=>!Swal.isLoading(),backdrop:!0}).then((async e=>{var o,s;n.hideProcessing(),e.isConfirmed&&await Swal.fire({icon:"success",title:null!==(o=dokanStripeExpressData.i18n?.cancel_onboarding?.successTitle)&&void 0!==o?o:"Success",width:600,text:null!==(s=dokanStripeExpressData.i18n?.cancel_onboarding?.successMessage)&&void 0!==s?s:"Onboarding Cancelled"}).then((async e=>{window.location.reload(!0)}))}))},showProcessing:function(){e("#dokan-stripe-express-payment").block({message:null,overlayCSS:{background:"#fff",opacity:.6}})},hideProcessing:function(){e("#dokan-stripe-express-payment").unblock()},showMessage:function(n,o){let s=e(o?"#dokan-stripe-express-signup-error":"#dokan-stripe-express-signup-message");s.html(n),s.show()},hideMessage:function(){e("#dokan-stripe-express-payment .signup-message").each((function(){e(this).html(""),e(this).hide()}))}};e(document).ready((function(){n.init()}))}(jQuery);