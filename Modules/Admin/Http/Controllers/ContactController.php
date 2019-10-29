<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Repositories\Contact\ContactRepositoryInterface;

class ContactController extends Controller
{
    protected $contact;

    public function __construct(
        ContactRepositoryInterface $contact
    ) {
        $this->contact = $contact;
    }

    /**
     * List contact
     * @return Response
     */
    public function index()
    {
        $filter = request()->all();
        $data = $this->contact->list($filter);
        return view('admin::contact.index', [
            'list' => $data['list'],
            'filter' => $data['filter']
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show detail contact.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $getItem = $this->contact->getItem($id);
        return view('admin::contact.detail', [
            'item' => $getItem
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
