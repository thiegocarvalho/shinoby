<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SearchHistory\BulkDestroySearchHistory;
use App\Http\Requests\Admin\SearchHistory\DestroySearchHistory;
use App\Http\Requests\Admin\SearchHistory\IndexSearchHistory;
use App\Http\Requests\Admin\SearchHistory\StoreSearchHistory;
use App\Http\Requests\Admin\SearchHistory\UpdateSearchHistory;
use App\Models\SearchHistory;
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

class SearchHistoryController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSearchHistory $request
     * @return array|Factory|View
     */
    public function index(IndexSearchHistory $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(SearchHistory::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'term', 'hits'],

            // set columns to searchIn
            ['id', 'term']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.search-history.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.search-history.create');

        return view('admin.search-history.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSearchHistory $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSearchHistory $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the SearchHistory
        $searchHistory = SearchHistory::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/search-histories'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/search-histories');
    }

    /**
     * Display the specified resource.
     *
     * @param SearchHistory $searchHistory
     * @throws AuthorizationException
     * @return void
     */
    public function show(SearchHistory $searchHistory)
    {
        $this->authorize('admin.search-history.show', $searchHistory);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param SearchHistory $searchHistory
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(SearchHistory $searchHistory)
    {
        $this->authorize('admin.search-history.edit', $searchHistory);


        return view('admin.search-history.edit', [
            'searchHistory' => $searchHistory,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSearchHistory $request
     * @param SearchHistory $searchHistory
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSearchHistory $request, SearchHistory $searchHistory)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values SearchHistory
        $searchHistory->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/search-histories'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/search-histories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySearchHistory $request
     * @param SearchHistory $searchHistory
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySearchHistory $request, SearchHistory $searchHistory)
    {
        $searchHistory->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySearchHistory $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySearchHistory $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    SearchHistory::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
