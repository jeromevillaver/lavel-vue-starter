<?php

namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface SampleRepositoryInterface extends RepositoryInterface
{
	//define set of methods that Sample Repository must implement
     public function getSamples(Request $request);

}
