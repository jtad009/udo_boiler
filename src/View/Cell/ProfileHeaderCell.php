<?php

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * ProfileHeader cell
 */
class ProfileHeaderCell extends Cell {

    use \Cake\Log\LogTrait;

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($user_id) {
        $this->loadModel('Users');
        $user = $this->Users->find('all')->select(['last_login', 'first_name', 'last_name','id','user_type','role'])->where(['id' => $user_id])->hydrate(false)->toArray();
        //get a count of all the ads posted by this user
        $this->loadModel('Ads');
        $my_ads = $this->Ads->find()->where(['user_id' => $user_id]);
        //get a count of this users favourite ads
        $this->loadModel('FavouriteAds');
        $my_fav_ads = $this->FavouriteAds->find()->where(['user_id' => $user_id]);
        
        $this->set('user', $user);
        $this->set('my_ad_count', $my_ads->count());
        $this->set('my_fav_ad_count', $my_fav_ads->count());
    }

}
