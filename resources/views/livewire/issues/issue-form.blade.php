<div>
    <h1>{{ $editing ? 'Edit Client Issue ' : 'Create Client Issue' }}</h1>
    <div class="card mt-3">
        <div class="card-body">
            <form wire:submit="save">
                <div class="mb-3">
                    <label for="title">Issue title</label>
                    <input wire:model="title" id="title" class="form-control" type="text" name="title" required />
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email">Description:</label>
                    <textarea  class="form-control" rows="5" id="description" name="description" wire:model="description"></textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="pwd">Client:</label>
                    <select id="client_id" class="form-control" wire:model="client_id">
                        <option value="" selected>-- Choose client --</option>
                        @foreach( $clients as $client )
                            <option value="{{ $client->id }}" >{{ $client->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('client_id'))
                        <span class="text-danger">{{ $errors->first('client_id') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary cursor-not-allowed">
                    <span>Save</span>
                </button>
            </form>
        </div>
    </div>
</div>
