<div>
    <h2 class="text-xl font-semibold leading-tight text-gray-800">
        Issues List
    </h2>

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>Client</th>
            <th>Title</th>
            <th>Description</th>
            <th>Created</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($issues as $issue)
            <tr >
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{ $issue->id }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{ $issue->client->name }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{ $issue->title }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{  substr($issue->description, 0, 50) . '...' }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    {{ $issue->created_at->toDateString() }}
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-sm leading-5 text-gray-900">
                    <a href="{{ route('issues.edit', $issue->id) }}" class="btn btn-sm btn-primary">
                        Edit
                    </a>
                    <button wire:click="delete({{ $issue }})" class="btn btn-sm btn-danger">
                        Delete
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="px-6 py-4 text-center leading-5 text-gray-900 whitespace-no-wrap">
                    No issues were found.
                </td>
            </tr>
        @endforelse

        </tbody>
    </table>
    <div class="d-flex justify-content-center mt-3">
        {!! $issues->links() !!}
    </div>
</div>
