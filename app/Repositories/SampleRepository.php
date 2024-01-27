<?php

namespace App\Repositories;

use App\Models\Sample;
use App\Repositories\Contracts\SampleRepositoryInterface;
use Illuminate\Http\Request;

class SampleRepository implements SampleRepositoryInterface
{
	public function query()
	{
		return Sample::query();
	}

	public function all()
	{
		return $this->query()->get();
	}

	public function find($id)
	{
		return $this->query()->findOrFail($id);
	}

	public function create(array $data)
	{
		return $this->query()->create($data);
	}

	public function update($id, array $data)
	{
		$model = $this->find($id);

		return $model->update($data);
	}

	public function delete($id)
	{
		$model = $this->find($id);

		$model->delete();

		return $model;
    }

    public function getSamples(Request $request)
    {

        $samples = $this->query()
        ->paginate(10);

        return $samples;
    }
}
