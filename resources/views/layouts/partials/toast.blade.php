<div id="toast" role="status" aria-live="polite" @if (session('status')) data-flash="{{ session('status') }}" @endif
     class="pointer-events-none fixed right-6 bottom-6 z-100 flex translate-y-2.5 items-center gap-[9px] rounded-xl bg-ink px-[17px] py-[13px] text-xs text-white opacity-0 shadow-float transition duration-250 [&.show]:translate-y-0 [&.show]:opacity-100">
    <i data-lucide="circle-check" class="size-[17px] text-primary-muted"></i>
    <span id="toastMessage">Done</span>
</div>
