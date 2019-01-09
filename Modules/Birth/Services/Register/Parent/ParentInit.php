<?php

namespace Modules\Birth\Services\Register\Parent;

trait ParentInit
{
	public function mother()
	{
		
        $this->mother = $this->status->wife[0]->mother()->firstOrCreate([]);
	}

	public function father()
	{
        $this->father = $this->status->wife[0]->marriage->husband->father()->firstOrCreate([]);
	}

	public function handleParent()
	{
		$this->father();
		$this->mother();
	}
}