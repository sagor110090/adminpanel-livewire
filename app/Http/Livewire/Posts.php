<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Posts extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $name, $email, $age, $about;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.posts.view', [
            'posts' => Post::latest()
						->orWhere('name', 'LIKE', $keyWord)
						->orWhere('email', 'LIKE', $keyWord)
						->orWhere('age', 'LIKE', $keyWord)
						->orWhere('about', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }

    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
		$this->name = null;
		$this->email = null;
		$this->age = null;
		$this->about = null;
    }

    public function store()
    {


        Post::create([
			'name' => $this-> name,
			'email' => $this-> email,
			'age' => $this-> age,
			'about' => $this-> about
        ]);

        $this->resetInput();
		$this->emit('closeModal');
        $this->alert('success', 'Post Successfully created.', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Cancel',
            'showCancelButton' =>  false,
            'showConfirmButton' =>  false,
      ]);
    }

    public function edit($id)
    {
        $record = Post::findOrFail($id);

        $this->selected_id = $id;
		$this->name = $record-> name;
		$this->email = $record-> email;
		$this->age = $record-> age;
		$this->about = $record-> about;

        $this->updateMode = true;
        
    }

    public function update()
    {


        if ($this->selected_id) {
			$record = Post::find($this->selected_id);
            $record->update([
			'name' => $this-> name,
			'email' => $this-> email,
			'age' => $this-> age,
			'about' => $this-> about
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Post Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Post::where('id', $id);
            $record->delete();
        }
    }
}
