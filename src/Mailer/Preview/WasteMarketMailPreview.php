<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of WasteMarketMailerPreview
 *
 * @author Epic
 */
namespace App\Mailer\Preview;
class WasteMarketMailPreview extends \DebugKit\Mailer\MailPreview {
    //put your code here
    public function welcome(){
        $this->loadModel('Users');
        $user = $this->Users->find()->first();
        $templates = '<table style="background-color: rgb(255, 255, 255); color: rgb(237, 28, 36);"><tbody><tr><td><h3><span style="color: rgb(0, 0, 0);"><br></span></h3><h3><span style="color: rgb(0, 0, 0);">Hi, :USERNAME</span></h3><p><span style="color: rgb(38, 40, 42); font-family: Arial, Helvetica, sans-serif; font-size: 12px;">Thank you for registering with </span><span style="color: rgb(0, 0, 0); font-size: 12px;">:APP_NAME</span><span style="font-size: 12px; color: rgb(38, 40, 42); font-family: Arial, Helvetica, sans-serif;">. </span><br></p><p class="callout"><span style="color: rgb(0, 0, 0);">To verify your email please click the following link. :link      </span></p><table class="social" width="100%"><tbody><tr><td><table align="left" class="column"><tbody><tr><td><h5 class=""><span style="color: rgb(0, 0, 0);">Connect with Us:</span></h5><p class=""><span style="color: rgb(0, 0, 0);"><a href="http://:facebook_handle/" class="soc-btn fb" target="_blank">Facebook</a> <a href="http://:twitter_handle/" class="soc-btn tw" target="_blank">Twitter</a> </span><a href="http://:youtube_handle/" target="_blank">Youtube</a><span style="color: rgb(0, 0, 0);"><a href="http://waste.dev/waste/share/templates/add#" class="soc-btn gp"></a></span></p></td></tr></tbody></table><table align="left" class="column"><tbody><tr><td><h5 class=""><span style="color: rgb(0, 0, 0);">Contact Info:</span></h5><p><span style="color: rgb(0, 0, 0);">Phone: <strong>:company_telephone</strong><br>Email: </span><a href="http://emailto:%20:company_mail/" target="_blank">:company_mail</a></p></td></tr></tbody></table><span style="color: rgb(0, 0, 0);"><span class="clear"></span></span></td></tr></tbody></table></td></tr></tbody></table>';
        return $this->getMailer("WasteMarket")
                    ->welcome($user,$templates)
                    ->set(["activationToken" => "dummy-token"]);

    }
}
