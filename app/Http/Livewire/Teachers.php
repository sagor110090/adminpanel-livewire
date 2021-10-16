<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Teacher;

class Teachers extends Component
{
    use WithPagination;

     protected $listeners = [
        'confirmed',
        'cancelled',
    ];

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord,$deleteId, $name, $email, $phone, $address;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.teachers.view', [
            'teachers' => Teacher::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('phone', 'LIKE', $keyWord)
						->orWhere('address', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }



    public function resetInput()
    {		
		$this->name = null;
		$this->email = null;
		$this->phone = null;
		$this->address = null;
    }

    public function store()
    {
        $this->validate([
		'name' => 'required',
		'email' => 'required',
		'phone' => 'required',
		'address' => 'required',
        ]);

        Teacher::create([ 
			'name' => $this-> name,
			'email' => $this-> email,
			'phone' => $this-> phone,
			'address' => $this-> address
        ]);

        $this->resetInput();
		$this->emit('closeModal');
		 $this->alert('success', 'Teacher Successfully created.');
    }

    public function edit($id)
    {
        $record = Teacher::findOrFail($id);

        $this->selected_id = $id; 
		$this->name = $record-> name;
		$this->email = $record-> email;
		$this->phone = $record-> phone;
		$this->address = $record-> address;

    }

    public function update()
    {
        $this->validate([
		'name' => 'required',
		'email' => 'required',
		'phone' => 'required',
		'address' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Teacher::find($this->selected_id);
            $record->update([ 
			'name' => $this-> name,
			'email' => $this-> email,
			'phone' => $this-> phone,
			'address' => $this-> address
            ]);

            $this->resetInput();
			$this->alert('success', 'Teacher Successfully updated.');
        }
    }

     public function triggerConfirm($id)
    {
        $this->datetId = $id;
        $this->confirm('Do you want to delete?', [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => true,
            'cancelButtonText' => 'Cancel',
            'onConfirmed' => 'confirmed',
            'onCancelled' => 'cancelled',
        ]);
    }

    public function confirmed()
    {
        $this->destroy();
        $this->alert( 'success', 'deleted successfully.');
    }

    public function cancelled()
    {
        $this->alert('info', 'Understood');
    }

    public function destroy()
    {
        if ($this->datetId) {
            $record = Teacher::where('id', $this->datetId);
            $record->delete();
        }
    }


}
