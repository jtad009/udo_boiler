<?php

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * FeaturedAds cell
 * @property \App\Model\Entity\AdsFeaturedAdsPrice $AdsFeaturedAdsPrices
 * @property \App\Model\Entity\FeaturedAdsPrice $FeaturedAdsPrices
 */
class FeaturedAdsCell extends Cell {

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
    public function display() {
        $this->loadModel('FeaturedAdsPrices');

        $this->loadModel('AdsFeaturedAdsPrices');
        $featured = $this->AdsFeaturedAdsPrices->find()->contain([
                    'Ads' => function (\Cake\Database\Query $q) {
                        return $q->where(['isFeatured' => 1]);
                    },
                            'Ads.AdsImages' => function (\Cake\Database\Query $q) {
                        return $q->select(['path_to_image', 'ad_id']);
                    },
                            'Ads.Categories' => function(\Cake\Database\Query $q) {
                        return $q->select(['category', 'id']);
                    },
                            'Ads.Brands' => function(\Cake\Database\Query $q) {
                        return $q->select(['brand']);
                    },
                            'Ads.Users.Countries' => function(\Cake\Database\Query $q) {
                        return $q->select(['country']);
                    },
                            'Ads.Users.States' => function(\Cake\Database\Query $q) {
                        return $q->select(['state']);
                    }, 'Ads.Users' => function(\Cake\Database\Query $q) {
                        return $q->select(['user_type']);
                    }
                        ])->where(['expired' => 0, 'paid' => 1,]);
                $this->confirmExpiry();
                //var_dump($featured->hydrate(false)->toArray());
                $this->set('featured', $featured);
            }
            
            private function confirmExpiry() {
                $result = \Cake\Datasource\ConnectionManager::get('default')->execute('SELECT duration,transaction.created,ad_id,ads_featured_ads_prices.id  FROM featured_ads_prices INNER JOIN  ads_featured_ads_prices ON featured_ads_prices.id = featured_ads_price_id INNER JOIN transactions transaction ON transaction.order_id = ads_featured_ads_prices.order_id WHERE expired = 0 AND paid = 1 ')->fetchAll('assoc');

                for ($i = 0; $i < count($result); $i++):
                    $now = new \Cake\I18n\Time($result[$i]['created']);
                    $date = $now->addDays($result[$i]['duration']);
                    if ($now->isPast())://Delete isFeatured From ad table and set ad to expired in the featured_price table if date for expiry is reached
                        \Cake\Datasource\ConnectionManager::get('default')->execute("UPDATE ads SET isFeatured = 0 WHERE id = :id", [':id' => $result[$i]['ad_id']]);
                        \Cake\Datasource\ConnectionManager::get('default')->execute("UPDATE ads_featured_ads_prices SET expired = 1 WHERE id = :id", [':id' => $result[$i]['id']]);
                   endif;


                endfor;
            }

        }
        