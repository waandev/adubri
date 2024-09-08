<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\Complaint;
use App\Models\Feedback;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $totalUser = User::count();
        $totalService = Service::count();
        $totalComplaint = Complaint::count();
        $complaints = Complaint::all();
        return view('pages.backsite.aduan.index', compact('totalUser', 'totalService', 'totalComplaint', 'complaints'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $totalUser = User::count();
        $totalService = Service::count();
        $totalComplaint = Complaint::count();
        $complaint = Complaint::find($id);
        return view('pages.backsite.aduan.show', compact('totalUser', 'totalService', 'totalComplaint', 'complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sendFeedback(Request $request, string $id)
    {
        $complaint = Complaint::find($id);

        Feedback::create([
            'complaint_id' => $complaint->id,
            'feedback' => $request->feedback,
        ]);

        alert()->success('Pesan Sukses', 'Data feedback berhasil dikirim');
        return redirect()->route('backsite.aduan.index');
    }
}
