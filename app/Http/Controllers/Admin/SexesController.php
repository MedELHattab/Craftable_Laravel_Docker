<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sex\BulkDestroySex;
use App\Http\Requests\Admin\Sex\DestroySex;
use App\Http\Requests\Admin\Sex\IndexSex;
use App\Http\Requests\Admin\Sex\StoreSex;
use App\Http\Requests\Admin\Sex\UpdateSex;
use App\Models\Sex;
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

class SexesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexSex $request
     * @return array|Factory|View
     */
    public function index(IndexSex $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Sex::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'name'],

            // set columns to searchIn
            ['id', 'name']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.sex.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.sex.create');

        return view('admin.sex.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSex $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreSex $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Sex
        $sex = Sex::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/sexes'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/sexes');
    }

    /**
     * Display the specified resource.
     *
     * @param Sex $sex
     * @throws AuthorizationException
     * @return void
     */
    public function show(Sex $sex)
    {
        $this->authorize('admin.sex.show', $sex);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Sex $sex
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Sex $sex)
    {
        $this->authorize('admin.sex.edit', $sex);


        return view('admin.sex.edit', [
            'sex' => $sex,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSex $request
     * @param Sex $sex
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateSex $request, Sex $sex)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Sex
        $sex->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/sexes'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/sexes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroySex $request
     * @param Sex $sex
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroySex $request, Sex $sex)
    {
        $sex->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroySex $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroySex $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Sex::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
