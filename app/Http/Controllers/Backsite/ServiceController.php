<?php

namespace App\Http\Controllers\Backsite;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
    public function index()
    {
        $totalUser = User::count();
        $totalService = Service::count();
        $totalComplaint = Complaint::count();
        $categories = Category::all();
        $services = Service::join('categories', 'services.category_id', '=', 'categories.id')
            ->orderByRaw("FIELD(categories.name, 'people', 'product', 'e-channel')") // Urutkan kategori dengan urutan khusus
            ->orderBy('services.name', 'asc') // Urutkan nama layanan secara ascending
            ->select('services.*')
            ->get();

        return view('pages.backsite.layanan.index', compact('totalUser', 'totalService', 'totalComplaint', 'categories', 'services'));
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
        $data = $request->all();
        // dd($data);
        Service::create($data);

        alert()->success('Pesan Sukses', 'Data layanan berhasil ditambahkan');
        return redirect()->route('backsite.layanan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $totalUser = User::count();
        $totalService = Service::count();
        $totalComplaint = Complaint::count();
        $categories = Category::all();
        $service = Service::find($id);
        return view('pages.backsite.layanan.edit', compact('totalUser', 'totalService', 'totalComplaint', 'categories', 'service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $service = Service::find($id);
        $data = $request->all();

        $service->update($data);

        alert()->success('Pesan Sukses', 'Data layanan berhasil diupdate');
        return redirect()->route('backsite.layanan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(404);
    }
}
