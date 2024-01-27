<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
	/**
	 * Resolves a query builder instance for the model.
	 *
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public function query();

	/**
	 * Get all the data from the database.
	 *
	 * @return \Illuminate\Support\Collection
	 */
	public function all();

	/**
	 * Fetch a specific model from the database.
	 *
	 * @param mixed $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function find($id);

	/**
	 * Store a model to the database.
	 *
	 * @param array $data
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function create(array $data);

	/**
	 * Update and persist a model to the database.
	 *
	 * @param mixed $id
	 * @param array $data
	 * @return boolS
	 */
	public function update($id, array $data);

	/**
	 * Delete a model from the database.
	 *
	 * @param mixed $id
	 * @return \Illuminate\Database\Eloquent\Model
	 */
	public function delete($id);
}
