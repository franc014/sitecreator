<?php
/**
 * Created by PhpStorm.
 * User: Juan Francisco Andrade
 * Date: 10/28/15
 * Time: 7:06 PM
 */

namespace App\Http\ViewComposers;


use Illuminate\Database\Eloquent\ModelNotFoundException;

trait MetaInfoGetter
{
    protected function getPageMetaInfo()
    {
        $pageName = $this->getRootPageName();
        try {
            $pageMetaInfo = $this->contenttypeRepository->getPageMetainfo($this->userName, $pageName);
            return $pageMetaInfo;
        } catch (ModelNotFoundException $mnf) {
            return null;
        }
    }
}