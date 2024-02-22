<?php

namespace App\Http\Controllers;

use App\Models\Jenis;
use App\Http\Requests\StoreJenisRequest;
use App\Http\Requests\UpdateJenisRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Exception;
use PDOException;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $data['jenis'] = Jenis::orderBy('created_at', 'DESC')->get();
            return view('Jenis.index')->with($data);
        } catch (QueryException | Exception | PDOException $error) {
            $this->failResponse($error->getCode());
        }
    }

    public function store(StoreJenisRequest $request)
    {
        try {
            DB::beginTransaction();
            Jenis::create($request->all());
            DB::commit();
            return redirect('jenis')->with('success', 'Jenis berhasil ditambahkan!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function update(StoreJenisRequest $request, Jenis $jeni)
    {
        try {
            DB::beginTransaction();
            $jeni->update($request->all());
            DB::commit();
            return redirect('jenis')->with('success', 'Jenis berhasil diupdate!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }

    public function destroy(Jenis $jeni)
    {
        try {
            DB::beginTransaction();
            $jeni->delete();
            DB::commit();
            return redirect('jenis')->with('success', 'Jenis berhasil dihapus!');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            return "Terjadi kesalahan :(" . $error->getMessage();
        }
    }
}
