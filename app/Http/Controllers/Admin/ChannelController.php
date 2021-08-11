<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Channel\BulkDestroyChannel;
use App\Http\Requests\Admin\Channel\DestroyChannel;
use App\Http\Requests\Admin\Channel\IndexChannel;
use App\Http\Requests\Admin\Channel\StoreChannel;
use App\Http\Requests\Admin\Channel\UpdateChannel;
use App\Models\Channel;
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

class ChannelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexChannel $request
     * @return array|Factory|View
     */
    public function index(IndexChannel $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Channel::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name', 'channel_platform_id', 'platform', 'last_sync_at'],

            // set columns to searchIn
            ['id', 'name', 'channel_platform_id', 'platform']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.channel.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.channel.create');

        return view('admin.channel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreChannel $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreChannel $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Channel
        $channel = Channel::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/channels'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/channels');
    }

    /**
     * Display the specified resource.
     *
     * @param Channel $channel
     * @throws AuthorizationException
     * @return void
     */
    public function show(Channel $channel)
    {
        $this->authorize('admin.channel.show', $channel);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Channel $channel
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Channel $channel)
    {
        $this->authorize('admin.channel.edit', $channel);


        return view('admin.channel.edit', [
            'channel' => $channel,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateChannel $request
     * @param Channel $channel
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateChannel $request, Channel $channel)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Channel
        $channel->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/channels'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/channels');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyChannel $request
     * @param Channel $channel
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyChannel $request, Channel $channel)
    {
        $channel->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyChannel $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyChannel $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Channel::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
