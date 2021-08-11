<?php

namespace App\Http\Controllers\Services\ShortLink;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

/**
 * Class ShortLink
 * @package App\Http\Controllers\Services
 */
class ShortLink extends Controller
{

    /**
     * @var $shortLink
     */
    private $shortLink;

    /**
     * ShortLink constructor.
     * @param string $link
     * @throws \Exception
     */
    public function __construct(string $link)
    {
        try {
            $this->setShortLink(Http::get(env('SHORT_LINK_URL') . $link));
            return $this->getShortLink();
        }catch(\Exception $exception)
        {
            throw $exception;
        }

    }

    /**
     * @param Response $response
     */
    private function setShortLink(Response $response)
    {
        $this->shortLink = $response->json('shortenedUrl');
    }

    /**
     * @return mixed
     */
    public function getShortLink()
    {
        return $this->shortLink;
    }


}
