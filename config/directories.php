<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 2/2/15
 * Time: 8:38 PM
 */

return [
    "user_photos"=>"https://s3-sa-east-1.amazonaws.com/profesionalxyz",
    "default_gravatar"=>"https://s3-sa-east-1.amazonaws.com/profesionalxyz/members/logos/default_member.png",
    "prefix"=>[
        "photo_bio"=>"phBio-",
        "logo"=>"logo-"
    ],
    "upload"=>[
        "photo_bio"=>"/members/bio/",
        "logo"=>"/members/logos/"
    ],
    "imagesizes"=>[
        "photo_bio"=>["x"=>100,"y"=>100],
        "logo"=>["x"=>48,"y"=>48]
    ]
];