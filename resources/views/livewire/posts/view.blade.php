@section('title', __('Posts'))
<div>
    <div class="col-lg-12 col-md-12 col-12">
        <div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="mb-2 mb-lg-0">
                    <h3 class="mb-0 fw-bold text-white">Post Listing</h3>
                </div>
                <div>
                    <button type="button" href="#" data-bs-toggle="modal" wire:click.prevent="resetInput()"  data-bs-target="#staticBackdrop"
                        class="btn btn-white"><i class="fa fa-plus"></i> Create New Posts</button>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-12 col-lg-12 col-md-12 col-12 mt-6">
        <div class="card rounded-3">
            <div class="card-body">
                <div class="justify-content-between align-items-center mb-3">
                    @include('livewire.posts.create')
                    @include('livewire.posts.update')
				<div class="table-responsive">
                 <div class="mb-4">
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="Search Posts">
                        </div>
					<table class="table table-bordered table-sm">
						<thead class="thead">
							<tr>
								<td>#</td> 
								<th>Name</th>
								<th>Email</th>
								<th>Age</th>
								<th>About</th>
								<td>ACTIONS</td>
							</tr>
						</thead>
						<tbody>
							@foreach($posts as $row)
							<tr>
								<td>{{ $loop->iteration }}</td> 
								<td>{{ $row->name }}</td>
								<td>{{ $row->email }}</td>
								<td>{{ $row->age }}</td>
								<td>{{ $row->about }}</td>
								<td width="90">

                                        <button type="button" href="#" data-bs-toggle="modal" data-bs-target="#staticBackdropUpdate" class="btn btn-warning btn-sm"wire:click="edit({{ $row->id }})"><i
                                            class="fa fa-edit"></i></button>
                                            <button class="btn btn-danger btn-sm"
                                            onclick="confirm('Confirm Delete Post id {{ $row->id }}? \nDeleted Posts cannot be recovered!')||event.stopImmediatePropagation()"
                                            wire:click="destroy({{ $row->id }})"><i
                                                class="fa fa-trash"></i> </button>


								</td>
							@endforeach
						</tbody>
					</table>
					{{ $posts->links() }}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
