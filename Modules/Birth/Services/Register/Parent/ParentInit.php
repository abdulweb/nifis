<?php

namespace Modules\Birth\Services\Register\Parent;

trait ParentInit
{
	public function mother()
	{
        $this->status->wife()->mother->firstOrCreate([]);
	}

	public function father()
	{
        $this->status->wife->marriage->husband()->father->firstOrCreate([]);
	}

	public function handleParent()
	{
		$this->father();
		$this->mother();
	}
}