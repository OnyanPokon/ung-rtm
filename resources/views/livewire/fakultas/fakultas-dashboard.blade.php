<main class="bg-[#f9fafc] min-h-screen">
  <section class="max-w-screen-xl mx-auto px-8 py-24 grid grid-cols-12 gap-4 ">
    @foreach($dataAdmin as $card)
    <div class="p-8 bg-white rounded-md shadow-sm border border-neutral-100 flex items-center gap-x-4 col-span-3">
      <div class="text-4xl">
        <span class="text-color-primary-500">
          <i class="{{ $card['icon'] }}"></i>
        </span>
      </div>
      <div class="flex flex-col">
        <p class="text-2xl font-bold">{{ $card['value'] }}</p>
        <p class="text-sm text-slate-500 font-semibold">{{ $card['label'] }}</p>
      </div>
    </div>
    @endforeach
  </section>
</main>