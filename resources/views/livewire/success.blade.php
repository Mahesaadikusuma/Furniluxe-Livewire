<div>

    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="flex justify-center items-center min-h-screen flex-col text-center">
        <img src="{{ asset('assets/image/success.svg') }}" alt="">

        <h2 class="text-2xl text-neutral-800 font-bold my-5">Transaction Processed!</h2>
        <p class="lg:text-xl text-lg font-light text-slate-500">
            Silahkan tunggu konfirmasi email dari kami dan
            <br />
            kami akan menginformasikan resi secept mungkin!
        </p>

        <div class=" flex flex-col gap-3 mt-10 ">
            <a wire:navigate href="{{ route('dashboard') }}" class="bg-green-500 text-white w-52 text-center py-1 ">
                My Dashboard
            </a>

            <a wire:navigate href="{{ route('home') }}" class="bg-slate-200 text-slate-800 w-52 text-center py-1">
                Go to Shopping
            </a>
        </div>
    </div>
</div>
