<?php

namespace App\Http\Controllers\Services\Youtube;

use App\Http\Controllers\AnalyticsController;
use App\Models\Channel;
use App\Models\ChannelLastFeed;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Gbuckingham89\YouTubeRSSParser\Exceptions\LoadFeedUrlException;
use Illuminate\Http\Request;
use Gbuckingham89\YouTubeRSSParser\Parser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class ChannelController extends Controller
{
    private $urlBase;

    /**
     * @var
     */
    public $channel;

    /**
     * @var
     */
    public $lastFeed;

    public $logService;

    public function __construct()
    {
        $this->urlBase = env('C01_URL');
        $this->logService = new AnalyticsController();
    }

    /**
     * @throws LoadFeedUrlException
     */
    public function updateChannels()
    {
        $channels = DB::table('channel')
            ->select('channel_platform_id')
            ->distinct('channel_platform_id')
            ->get();

        foreach ($channels as $channel) {
            $this->getChannelData(basename($channel->channel_platform_id));
        }

    }

    /**
     * @throws LoadFeedUrlException
     */
    public function getChannelData($channelID)
    {
        $parser = new Parser();
        $channel = $parser->loadUrl($this->urlBase . $channelID);
        $this->setChannel($channel);
        $this->setLastFeed($channel->videos);
    }


    /**
     * @param $channel
     * @param string $platform
     */
    private function setChannel($channel, $platform = "youtube")
    {
        $this->channel = Channel::updateOrCreate(
            ["channel_platform_id" => $channel->url],
            [
                "name" => $channel->name,
                "channel_platform_id" => $channel->url,
                "platform" => $platform,
                "last_sync_at" => Carbon::now(),
            ]
        );

    }

    /**
     * @param $feeds
     */
    private function setLastFeed($feeds)
    {
        $this->lastFeed = ChannelLastFeed::updateOrCreate(
            ["channel_platform_id" => $this->channel->channel_platform_id],
            [
                "channel_platform_id" => $this->channel->channel_platform_id,
                "feed_platform_id" => $feeds[0]->id,
                "title" => $feeds[0]->title,
                "description" => $feeds[0]->description,
                "thumbnail_url" => $feeds[0]->thumbnail_url,
                "views" => $feeds[0]->views,
                "rating" => $feeds[0]->rating,
                "url" => $feeds[0]->url,
                "platform_published_at" => $feeds[0]->published_at,
                "platform_updated_at" => $feeds[0]->updated_at,

            ]
        );
    }

    /**
     * @param $keyword
     * @return array
     */
    public function findChannel($keyword)
    {
        $this->logService->logSearchTerm($keyword);

        $response = json_decode((Http::get(env('C01_S') . $keyword)->body()));
        $channels = [];
        foreach ($response->results as $item) {
            if (property_exists($item, "channel")) {
                $channels[] = $item;
            }
        }

        return $channels;
    }

    /**
     * @throws LoadFeedUrlException
     */
    public function registerChannel(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'url' => 'required'
            ]);

        if ($validator->fails()) {
            return $validator->errors();
        }
        $this->getChannelData(basename($request->input('url')));
    }

}
