<div class="border border-red-500 bg-red-100 text-red-700 font-bold uppercase p-2 mt-2 text-xs text-center rounded-md"
    x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 15000)">
    {{ $message }}
</div>
