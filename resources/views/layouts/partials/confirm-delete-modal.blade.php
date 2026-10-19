{{--
    Shared delete confirmation. Any button with data-confirm-delete="<destroy URL>"
    and data-name="<record name>" opens this dialog and submits a DELETE request.
--}}
<dialog id="confirmDeleteModal" class="m-auto w-[min(400px,calc(100%-32px))] rounded-[18px] border border-line bg-white p-6 text-ink shadow-float backdrop:bg-ink/35 backdrop:backdrop-blur-sm">
    <form method="POST" id="confirmDeleteForm">
        @csrf
        @method('DELETE')

        <span class="mb-4 grid size-11 place-items-center rounded-[13px] bg-danger-soft text-danger">
            <i data-lucide="trash-2" class="size-5"></i>
        </span>
        <h2 class="mb-1.5 font-display text-lg font-bold">Delete <span id="confirmDeleteName">this record</span>?</h2>
        <p class="text-[11px] leading-normal text-muted">This can’t be undone.</p>

        <div class="mt-6 flex justify-end gap-[9px]">
            <x-button variant="neutral" data-close-modal>Cancel</x-button>
            <x-button variant="danger" type="submit">Delete</x-button>
        </div>
    </form>
</dialog>
