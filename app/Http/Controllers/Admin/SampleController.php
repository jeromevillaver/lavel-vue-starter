<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SampleRequest;
use App\Models\Sample;
use Illuminate\Http\Request;
use App\Repositories\Contracts\SampleRepositoryInterface;
use Inertia\Inertia;


class SampleController extends Controller
{
    public function __construct(protected SampleRepositoryInterface $sampleRepository){}

    public function index (Request $request){

        $samples = $this->sampleRepository->getSamples($request);

        return Inertia::render('Sample/Index', [
            'samples' => $samples,
            'flash' => function () {
                return [
                    'info' => session('info'),
                    'success' => session('success'),
                    'danger' => session('danger'),
                    'warning' => session('warning'),
                    'light' => session('light'),
                    'dark' => session('dark'),
                ];
            },
        ]);
    }

    public function create(){
        return Inertia::render('Sample/View');
    }

    public function store(SampleRequest $request){
        $this->sampleRepository->create($request->all());
        return redirect()->route('sample.index')->with('success', 'Sample successfully added');
    }

    public function edit($id){
        $sample = Sample::findOrFail($id);

        return Inertia::render('Sample/View', [
            'samples' => $sample
        ]);
    }

    public function update(SampleRequest $request, $id){
        $this->sampleRepository->update($id, $request->all());
        return redirect()->route('sample.index')->with('light', 'Sample successfully updated');
    }

    public function destroy($id){
         $this->sampleRepository->delete($id);

         return redirect()->route('sample.index')->with('danger', 'Sample successfully deleted');
    }
}
