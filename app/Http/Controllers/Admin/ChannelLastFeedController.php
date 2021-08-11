<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ChannelLastFeed\BulkDestroyChannelLastFeed;
use App\Http\Requests\Admin\ChannelLastFeed\DestroyChannelLastFeed;
use App\Http\Requests\Admin\ChannelLastFeed\IndexChannelLastFeed;
use App\Http\Requests\Admin\ChannelLastFeed\StoreChannelLastFeed;
use App\Http\Requests\Admin\ChannelLastFeed\UpdateChannelLastFeed;
use App\Models\ChannelLastFeed;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ChannelLastFeedController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexChannelLastFeed $request
     * @return array|Factory|View
     */
    public function index(IndexChannelLastFeed $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(ChannelLastFeed::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'channel_platform_id', 'feed_platform_id', 'title', 'thumbnail_url', 'views', 'rating', 'url', 'platform_published_at', 'platform_updated_at'],

            // set columns to searchIn
            ['id', 'channel_platform_id', 'feed_platform_id', 'title', 'description', 'thumbnail_url', 'views', 'rating', 'url']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.channel-last-feed.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.channel-last-feed.create');

        return view('admin.channel-last-feed.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreChannelLastFeed $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreChannelLastFeed $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the ChannelLastFeed
        $channelLastFeed = ChannelLastFeed::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/channel-last-feeds'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/channel-last-feeds');
    }

    /**
     * Display the specified resource.
     *
     * @param ChannelLastFeed $channelLastFeed
     * @throws AuthorizationException
     * @return void
     */
    public function show(ChannelLastFeed $channelLastFeed)
    {
        $this->authorize('admin.channel-last-feed.show', $channelLastFeed);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ChannelLastFeed $channelLastFeed
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(ChannelLastFeed $channelLastFeed)
    {
        $this->authorize('admin.channel-last-feed.edit', $channelLastFeed);


        return view('admin.channel-last-feed.edit', [
            'channelLastFeed' => $channelLastFeed,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateChannelLastFeed $request
     * @param ChannelLastFeed $channelLastFeed
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateChannelLastFeed $request, ChannelLastFeed $channelLastFeed)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values ChannelLastFeed
        $channelLastFeed->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/channel-last-feeds'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/channel-last-feeds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyChannelLastFeed $request
     * @param ChannelLastFeed $channelLastFeed
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyChannelLastFeed $request, ChannelLastFeed $channelLastFeed)
    {
        $channelLastFeed->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyChannelLastFeed $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyChannelLastFeed $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    ChannelLastFeed::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
